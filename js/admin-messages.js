(function () {
  var buttons = document.querySelectorAll(".js-message-view");
  if (!buttons.length) {
    return;
  }

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      var targetId = button.getAttribute("data-target");
      if (!targetId) {
        return;
      }

      var detailRow = document.getElementById(targetId);
      if (!detailRow) {
        return;
      }

      detailRow.classList.toggle("d-none");
      button.textContent = detailRow.classList.contains("d-none")
        ? "View"
        : "Hide";
    });
  });
})();
