<?php

require_once __DIR__ . '/_bootstrap.php';

$pageTitle = 'Content Modules';
$activePage = 'content';

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
  <h2>Property Module</h2>
  <div class="admin-quick-actions">
    <a class="btn btn-outline-primary admin-btn" href="modules/properties/index.php">Index</a>
    <a class="btn btn-outline-primary admin-btn" href="modules/properties/create.php">Create</a>
    <a class="btn btn-outline-primary admin-btn" href="properties.php">Edit/Delete (from list)</a>
  </div>
</section>

<section class="admin-card">
  <h2>Gallery Module</h2>
  <div class="admin-quick-actions">
    <a class="btn btn-outline-primary admin-btn" href="modules/gallery/index.php">Index</a>
    <a class="btn btn-outline-primary admin-btn" href="modules/gallery/create.php">Create</a>
    <a class="btn btn-outline-primary admin-btn" href="gallery.php">Edit/Delete (from list)</a>
  </div>
</section>

<section class="admin-card">
  <h2>Messages Module</h2>
  <div class="admin-quick-actions">
    <a class="btn btn-outline-primary admin-btn" href="modules/messages/index.php">Index</a>
    <a class="btn btn-outline-primary admin-btn" href="messages.php">View/Delete</a>
  </div>
</section>

<section class="admin-card">
  <h2>Enquiries Module</h2>
  <div class="admin-quick-actions">
    <a class="btn btn-outline-primary admin-btn" href="modules/enquiries/index.php">Index</a>
    <a class="btn btn-outline-primary admin-btn" href="enquiries.php">View/Delete</a>
  </div>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>