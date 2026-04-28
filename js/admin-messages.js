(function () {
  var buttons = document.querySelectorAll(".js-message-view");
  if (!buttons.length) {
    return;
  }

  // Create modal element only when needed
  function createModal() {
    var modalHtml = `
      <div class="admin-detail-modal-overlay d-none" id="adminDetailModal">
        <div class="admin-detail-modal">
          <div class="admin-detail-modal-header">
            <div class="admin-detail-modal-header-info">
              <h3 class="admin-detail-modal-title"></h3>
              <div class="admin-detail-modal-subtitle"></div>
            </div>
            <div class="admin-detail-modal-actions">
              <button type="button" class="admin-detail-modal-read-btn">Read</button>
              <button type="button" class="admin-detail-modal-close">&times;</button>
            </div>
          </div>
          <div class="admin-detail-modal-body">
            <div class="admin-detail-contact-info">
              <div class="admin-detail-contact-row">
                <div class="admin-detail-field">
                  <span class="admin-detail-label">NAME:</span>
                  <span class="admin-detail-value name-value"></span>
                </div>
                <div class="admin-detail-field">
                  <span class="admin-detail-label">PHONE:</span>
                  <span class="admin-detail-value phone-value"></span>
                </div>
                <div class="admin-detail-field">
                  <span class="admin-detail-label">EMAIL:</span>
                  <span class="admin-detail-value email-value"></span>
                </div>
                <div class="admin-detail-field">
                  <span class="admin-detail-label">SUBMITTED:</span>
                  <span class="admin-detail-value submitted-value"></span>
                </div>
                <div class="admin-detail-field enquiry-only-field d-none">
                  <span class="admin-detail-label">LOOKING TO:</span>
                  <span class="admin-detail-value looking-to-value"></span>
                </div>
                <div class="admin-detail-field enquiry-only-field d-none">
                  <span class="admin-detail-label">PROPERTY GROUP:</span>
                  <span class="admin-detail-value property-group-value"></span>
                </div>
                <div class="admin-detail-field enquiry-only-field d-none">
                  <span class="admin-detail-label">PROPERTY TYPE:</span>
                  <span class="admin-detail-value property-type-value"></span>
                </div>
                <div class="admin-detail-field">
                  <span class="admin-detail-label">IP ADDRESS:</span>
                  <span class="admin-detail-value ip-value"></span>
                </div>
              </div>
            </div>
            <div class="admin-detail-modal-message-section">
              <div class="admin-detail-field">
                <span class="admin-detail-label">SUBJECT:</span>
                <div class="admin-detail-subject-content"></div>
              </div>
              <div class="admin-detail-field">
                <span class="admin-detail-label">MESSAGE:</span>
                <div class="admin-detail-message-content"></div>
              </div>
            </div>
            <div class="admin-detail-modal-footer">
              <button type="button" class="admin-detail-modal-reply-btn">Reply via Email</button>
              <button type="button" class="admin-detail-modal-delete-btn">Delete Message</button>
            </div>
          </div>
        </div>
      </div>
    `;

    document.body.insertAdjacentHTML('beforeend', modalHtml);
    return document.getElementById('adminDetailModal');
  }

  var modal = null;

  function getOrCreateModal() {
    if (!modal) {
      modal = createModal();
      setupModalEvents();
    }
    return modal;
  }

  function setupModalEvents() {
    var closeBtn = modal.querySelector('.admin-detail-modal-close');
    var readBtn = modal.querySelector('.admin-detail-modal-read-btn');
    var replyBtn = modal.querySelector('.admin-detail-modal-reply-btn');
    var deleteBtn = modal.querySelector('.admin-detail-modal-delete-btn');

    // Close modal when clicking close button
    closeBtn.addEventListener('click', closeModal);
    readBtn.addEventListener('click', closeModal);
    
    // Close modal when clicking overlay
    modal.addEventListener('click', function(e) {
      if (e.target === modal) {
        closeModal();
      }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !modal.classList.contains('d-none')) {
        closeModal();
      }
    });
  }

  function closeModal() {
    modal.classList.add('d-none');
    document.body.style.overflow = '';
  }

  function openModal(data) {
    var modalInstance = getOrCreateModal();
    var modalTitle = modalInstance.querySelector('.admin-detail-modal-title');
    var modalSubtitle = modalInstance.querySelector('.admin-detail-modal-subtitle');
    var nameValue = modalInstance.querySelector('.name-value');
    var phoneValue = modalInstance.querySelector('.phone-value');
    var emailValue = modalInstance.querySelector('.email-value');
    var lookingToValue = modalInstance.querySelector('.looking-to-value');
    var propertyGroupValue = modalInstance.querySelector('.property-group-value');
    var propertyTypeValue = modalInstance.querySelector('.property-type-value');
    var ipValue = modalInstance.querySelector('.ip-value');
    var submittedValue = modalInstance.querySelector('.submitted-value');
    var subjectContent = modalInstance.querySelector('.admin-detail-subject-content');
    var messageContent = modalInstance.querySelector('.admin-detail-message-content');
    var replyBtn = modalInstance.querySelector('.admin-detail-modal-reply-btn');
    var deleteBtn = modalInstance.querySelector('.admin-detail-modal-delete-btn');
    var enquiryFields = modalInstance.querySelectorAll('.enquiry-only-field');

    var isMessage = data.type === 'message';
    
    // Show/hide enquiry-specific fields
    enquiryFields.forEach(function(field) {
      if (isMessage) {
        field.classList.add('d-none');
      } else {
        field.classList.remove('d-none');
      }
    });
    
    // Set header info
    modalTitle.textContent = isMessage ? 'Message Details' : 'Enquiry Details';
    
    if (isMessage) {
      modalSubtitle.textContent = 'Contact Message';
      nameValue.textContent = data.name || '';
      phoneValue.textContent = data.phone || '';
      emailValue.textContent = data.email || '';
      ipValue.textContent = data.ip_address || 'N/A';
      submittedValue.textContent = data.created_at || '';
      subjectContent.textContent = data.subject || '';
      messageContent.textContent = data.message || '';
      
      // Setup delete button for messages
      deleteBtn.onclick = function() {
        if (confirm('Delete this message?')) {
          // Find and submit the delete form
          var deleteForm = document.querySelector('form[action*="delete.php"]');
          if (deleteForm) {
            deleteForm.submit();
          }
        }
      };
    } else {
      // Enquiry data
      modalSubtitle.textContent = 'Property Enquiry';
      nameValue.textContent = data.full_name || '';
      phoneValue.textContent = data.phone || '';
      emailValue.textContent = data.email || '';
      lookingToValue.textContent = data.looking_to || '';
      propertyGroupValue.textContent = data.property_group || '';
      propertyTypeValue.textContent = data.property_type || '';
      ipValue.textContent = data.ip_address || 'N/A';
      submittedValue.textContent = data.created_at || '';
      subjectContent.textContent = data.subject || '';
      messageContent.textContent = data.message || '';
      
      // Setup delete button for enquiries
      deleteBtn.onclick = function() {
        if (confirm('Delete this enquiry?')) {
          // Find and submit the delete form
          var deleteForm = document.querySelector('form[action*="delete.php"]');
          if (deleteForm) {
            deleteForm.submit();
          }
        }
      };
    }
    
    // Setup reply button
    replyBtn.onclick = function() {
      var email = isMessage ? data.email : data.email;
      var subject = isMessage ? data.subject : data.subject;
      window.location.href = 'mailto:' + (email || '') + '?subject=Re: ' + (subject || 'No subject');
    };
    
    modalInstance.classList.remove('d-none');
    document.body.style.overflow = 'hidden';
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

      var detailContent = detailRow.querySelector('.admin-detail-value');
      if (!detailContent) {
        return;
      }

      // Parse data from the detail row
      var isMessage = targetId.includes('message-row');
      var data = {
        type: isMessage ? 'message' : 'enquiry'
      };

      if (isMessage) {
        // Extract message data from the row
        var row = detailRow.closest('tr').previousElementSibling;
        if (row) {
          var cells = row.querySelectorAll('td');
          data.created_at = cells[0]?.textContent.trim() || '';
          data.name = cells[1]?.textContent.trim() || '';
          var contactCell = cells[2]?.textContent.trim() || '';
          var contactLines = contactCell.split('\n');
          data.phone = contactLines[0]?.trim() || '';
          data.email = contactLines[1]?.trim() || '';
          data.subject = cells[3]?.textContent.trim() || '';
          data.message = detailContent.textContent.trim() || '';
          data.ip_address = 'N/A'; // Not displayed in table but available in DB
        }
      } else {
        // Extract enquiry data from the row
        var row = detailRow.closest('tr').previousElementSibling;
        if (row) {
          var cells = row.querySelectorAll('td');
          data.created_at = cells[0]?.textContent.trim() || '';
          data.full_name = cells[1]?.textContent.trim() || '';
          var contactCell = cells[2]?.textContent.trim() || '';
          var contactLines = contactCell.split('\n');
          data.phone = contactLines[0]?.trim() || '';
          data.email = contactLines[1]?.trim() || '';
          var preferenceCell = cells[3]?.textContent.trim() || '';
          var preferenceLines = preferenceCell.split('\n');
          data.looking_to = preferenceLines[0]?.split('/')?.[0]?.trim() || '';
          data.property_group = preferenceLines[0]?.split('/')?.[1]?.trim() || '';
          data.property_type = preferenceLines[1]?.trim() || '';
          var messageCell = cells[4]?.textContent.trim() || '';
          var messageLines = messageCell.split('\n');
          data.subject = messageLines[0]?.replace('Subject:', '').trim() || '';
          data.message = detailContent.textContent.replace(/Subject:.*?\n/, '').trim() || '';
          data.ip_address = 'N/A'; // Not displayed in table but available in DB
        }
      }

      openModal(data);
    });
  });
})();
