(function () {
  var picker = document.getElementById("showcase-image-picker");
  var addButton = document.getElementById("add-showcase-image-btn");
  var filesInput = document.getElementById("showcase-images-input");
  var list = document.getElementById("showcase-images-list");

  if (!picker || !addButton || !filesInput || !list) {
    return;
  }

  var transfer =
    typeof DataTransfer !== "undefined" ? new DataTransfer() : null;

  function existingCount() {
    return list.querySelectorAll('li[data-item-type="existing"]').length;
  }

  function totalCount() {
    var pending = transfer ? transfer.files.length : 0;
    return existingCount() + pending;
  }

  function syncFiles() {
    if (transfer) {
      filesInput.files = transfer.files;
    }
  }

  function removePending(index) {
    if (!transfer) {
      return;
    }

    var rebuilt = new DataTransfer();
    for (var i = 0; i < transfer.files.length; i++) {
      if (i !== index) {
        rebuilt.items.add(transfer.files[i]);
      }
    }
    transfer = rebuilt;
    syncFiles();
    renderPending();
  }

  function renderPending() {
    if (!transfer) {
      return;
    }

    var pendingNodes = list.querySelectorAll('li[data-item-type="pending"]');
    pendingNodes.forEach(function (node) {
      node.remove();
    });

    for (var i = 0; i < transfer.files.length; i++) {
      var file = transfer.files[i];
      var item = document.createElement("li");
      item.className = "admin-upload-item";
      item.setAttribute("data-item-type", "pending");

      var label = document.createElement("span");
      label.textContent = file.name + " (to upload)";

      var button = document.createElement("button");
      button.type = "button";
      button.className = "btn btn-sm btn-outline-danger";
      button.textContent = "Remove";
      button.setAttribute("data-remove-pending", String(i));

      item.appendChild(label);
      item.appendChild(button);
      list.appendChild(item);
    }
  }

  addButton.addEventListener("click", function () {
    var file = picker.files && picker.files[0] ? picker.files[0] : null;
    if (!file) {
      return;
    }

    if (totalCount() >= 5) {
      window.alert("You can add only up to 5 showcase images.");
      picker.value = "";
      return;
    }

    if (!transfer) {
      // Fallback for older browsers: use the native multi-file input directly.
      filesInput.classList.remove("d-none");
      filesInput.classList.add("form-control");
      filesInput.focus();
      picker.value = "";
      return;
    }

    transfer.items.add(file);
    syncFiles();
    renderPending();
    picker.value = "";
  });

  list.addEventListener("click", function (event) {
    var target = event.target;
    if (!(target instanceof HTMLElement)) {
      return;
    }

    if (target.classList.contains("js-remove-existing-image")) {
      var row = target.closest("li[data-item-type='existing']");
      if (row) {
        row.remove();
      }
      return;
    }

    var pendingIndex = target.getAttribute("data-remove-pending");
    if (pendingIndex !== null) {
      removePending(Number(pendingIndex));
    }
  });

  function splitLines(value) {
    if (!value) {
      return [];
    }

    return value
      .split(/\r\n|\r|\n/)
      .map(function (line) {
        return line.trim();
      })
      .filter(function (line) {
        return line !== "";
      });
  }

  function initTextRepeater(config) {
    var listNode = document.getElementById(config.listId);
    var addNode = document.getElementById(config.addButtonId);
    var storeNode = document.getElementById(config.storeId);

    if (!listNode || !addNode || !storeNode) {
      return;
    }

    var items = [];

    function hydrateFromStore() {
      var lines = splitLines(storeNode.value);
      items = lines.map(function (line) {
        if (config.mode === "pair") {
          var parts = line.split("|");
          var label = (parts.shift() || "").trim();
          var value = parts.join("|").trim();
          return { label: label, value: value };
        }

        return line;
      });

      if (config.maxItems && items.length > config.maxItems) {
        items = items.slice(0, config.maxItems);
      }
    }

    function syncStore() {
      if (config.mode === "pair") {
        storeNode.value = items
          .map(function (item) {
            return item.label + "|" + item.value;
          })
          .join("\n");
        return;
      }

      storeNode.value = items.join("\n");
    }

    function render() {
      listNode.innerHTML = "";

      items.forEach(function (item, index) {
        var row = document.createElement("li");
        row.className = "admin-upload-item";

        var text = document.createElement("span");
        text.textContent =
          config.mode === "pair"
            ? item.label + ": " + item.value
            : item;

        var removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "btn btn-sm btn-outline-danger";
        removeButton.textContent = "Remove";
        removeButton.setAttribute("data-remove-index", String(index));

        row.appendChild(text);
        row.appendChild(removeButton);
        listNode.appendChild(row);
      });

      syncStore();
    }

    function addItem() {
      if (config.mode === "pair") {
        var labelSelect = document.getElementById(config.labelSelectId);
        var customLabel = document.getElementById(config.customLabelId);
        var valueInput = document.getElementById(config.valueInputId);

        if (!labelSelect || !valueInput) {
          return;
        }

        var selectedLabel = (labelSelect.value || "").trim();
        var finalLabel = selectedLabel;
        if (selectedLabel === "__custom__") {
          finalLabel = customLabel ? customLabel.value.trim() : "";
        }

        var value = valueInput.value.trim();
        if (finalLabel === "" || value === "") {
          return;
        }

        items.push({ label: finalLabel, value: value });
        valueInput.value = "";
        if (customLabel) {
          customLabel.value = "";
        }
        render();
        return;
      }

      var textInput = document.getElementById(config.textInputId);
      if (!textInput) {
        return;
      }

      var textValue = textInput.value.trim();
      if (textValue === "") {
        return;
      }

      if (config.maxItems && items.length >= config.maxItems) {
        window.alert("You can add only up to " + config.maxItems + " items.");
        textInput.value = "";
        return;
      }

      items.push(textValue);
      textInput.value = "";
      render();
    }

    addNode.addEventListener("click", addItem);

    listNode.addEventListener("click", function (event) {
      var target = event.target;
      if (!(target instanceof HTMLElement)) {
        return;
      }

      var removeIndexAttr = target.getAttribute("data-remove-index");
      if (removeIndexAttr === null) {
        return;
      }

      var removeIndex = Number(removeIndexAttr);
      if (Number.isNaN(removeIndex) || removeIndex < 0 || removeIndex >= items.length) {
        return;
      }

      items.splice(removeIndex, 1);
      render();
    });

    if (config.mode === "pair") {
      var labelSelectNode = document.getElementById(config.labelSelectId);
      var customLabelNode = document.getElementById(config.customLabelId);
      if (labelSelectNode && customLabelNode) {
        labelSelectNode.addEventListener("change", function () {
          var showCustom = labelSelectNode.value === "__custom__";
          customLabelNode.style.display = showCustom ? "block" : "none";
        });
      }
    }

    hydrateFromStore();
    render();
  }

  initTextRepeater({
    mode: "pair",
    listId: "details-list",
    addButtonId: "details-add-btn",
    storeId: "details-textarea",
    labelSelectId: "details-label-select",
    customLabelId: "details-custom-label",
    valueInputId: "details-value-input",
  });

  initTextRepeater({
    mode: "single",
    listId: "features-list",
    addButtonId: "features-add-btn",
    storeId: "features-textarea",
    textInputId: "features-input",
    maxItems: 15,
  });

  initTextRepeater({
    mode: "single",
    listId: "highlights-list",
    addButtonId: "highlights-add-btn",
    storeId: "highlights-textarea",
    textInputId: "highlights-input",
  });

  initTextRepeater({
    mode: "single",
    listId: "nearby-list",
    addButtonId: "nearby-add-btn",
    storeId: "nearby-textarea",
    textInputId: "nearby-input",
  });
})();
