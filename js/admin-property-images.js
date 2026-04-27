(function () {
  var picker = document.getElementById("showcase-image-picker");
  var addButton = document.getElementById("add-showcase-image-btn");
  var filesInput = document.getElementById("showcase-images-input");
  var list = document.getElementById("showcase-images-list");

  if (!picker || !addButton || !filesInput || !list) {
    return;
  }

  var transfer = new DataTransfer();

  function existingCount() {
    return list.querySelectorAll('li[data-item-type="existing"]').length;
  }

  function totalCount() {
    return existingCount() + transfer.files.length;
  }

  function syncFiles() {
    filesInput.files = transfer.files;
  }

  function removePending(index) {
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
})();
