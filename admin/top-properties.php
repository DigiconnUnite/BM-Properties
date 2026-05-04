<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;

if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $editing = $editId > 0 ? get_top_property_by_id($editId) : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? 'save');

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            delete_top_property($id);
            $message = 'Top property deleted.';
        }
    } else {
        $id = (int) ($_POST['id'] ?? 0);
        $existing = $id > 0 ? get_top_property_by_id($id) : null;
        $title = clean_text((string) ($_POST['title'] ?? ''));
        $tagLabel = clean_text((string) ($_POST['tag_label'] ?? ''));
        $summary = clean_text((string) ($_POST['summary'] ?? ''));
        $isActive = isset($_POST['is_active']) ? 1 : 0;
        $highlights = array_slice(split_lines((string) ($_POST['highlights'] ?? '')), 0, 3);
        $imagePath = (string) ($existing['image_path'] ?? '');
        $oldImagePath = $imagePath;

        $uploadRoot = realpath(__DIR__ . '/..');
        if (is_string($uploadRoot) && $uploadRoot !== '') {
            $uploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'top-properties';
            $uploadError = null;
            $uploadedImage = upload_image_file($_FILES['image_file'] ?? [], $uploadDir, 'uploads/top-properties', $uploadError);
            if ($uploadedImage !== null) {
                $imagePath = $uploadedImage;
            } elseif ($uploadError !== null) {
                $error = $uploadError;
            }
        }

        if ($error !== '') {
            // Keep upload validation message.
        } elseif ($title === '') {
            $error = 'Title is required.';
        } elseif ($imagePath === '') {
            $error = 'Please upload a WEBP image.';
        } elseif ($summary === '') {
            $error = 'Summary is required.';
        } else {
            save_top_property([
                'title' => $title,
                'image_path' => $imagePath,
                'tag_label' => $tagLabel,
                'highlights' => $highlights,
                'summary' => $summary,
                'is_active' => $isActive,
            ], $id > 0 ? $id : null);

            if ($oldImagePath !== '' && $oldImagePath !== $imagePath) {
                delete_uploaded_file($oldImagePath);
            }

            $message = $id > 0 ? 'Top property updated.' : 'Top property added.';
            $editing = null;
        }
    }
}

$pageTitle = 'Top Properties';
$activePage = 'top-properties';
$items = get_admin_top_properties();
$limitReached = count($items) >= 4 && !$editing;
$limitWarning = '';
if ($limitReached) {
    $limitWarning = 'You have reached the maximum limit of 4 top properties. To add a new property, please delete an existing one first.';
}

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?> 
<section class="admin-card main-content">
    <h2><?php echo $editing ? 'Edit Top Property' : 'Add Top Property'; ?></h2>
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($limitWarning !== ''): ?>
        <div class="alert alert-warning"><?php echo htmlspecialchars($limitWarning, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if (!$limitReached): ?>
    <form method="post" class="admin-form-grid" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
        <input type="hidden" name="action" value="save">

        <div>
            <label>Title</label>
            <input class="form-control" name="title" required maxlength="160"
                value="<?php echo htmlspecialchars((string) ($editing['title'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div>
            <label>Card Tag</label>
            <input class="form-control" name="tag_label" maxlength="120"
                value="<?php echo htmlspecialchars((string) ($editing['tag_label'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="Defaults to title">
        </div>
                <div class="admin-form-full">
            <label>Upload Image (WEBP only, max 1MB)</label>
            <input class="form-control" type="file" name="image_file" accept=".webp,image/webp" <?php echo $editing ? '' : 'required'; ?>>
        </div>
        <div class="admin-form-full admin-repeater" id="top-highlights-repeater">
            <label>Highlights</label>
            <div class="admin-repeater-controls">
                <input class="form-control" id="top-highlights-input" type="text" placeholder="Enter highlight">
                <button class="btn btn-outline-primary admin-btn" type="button" id="top-highlights-add-btn">Add</button>
            </div>
            <ul class="admin-upload-list" id="top-highlights-list"></ul>
            <textarea class="form-control d-none" id="top-highlights-textarea" name="highlights" rows="3"><?php echo htmlspecialchars(implode("\n", (array) ($editing['highlights'] ?? [])), ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="admin-form-full">
            <label>Summary</label>
            <textarea class="form-control" name="summary" rows="3" required><?php echo htmlspecialchars((string) ($editing['summary'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="admin-checkbox-wrap">
            <label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label>
        </div>
        <div class="admin-form-full">
            <button class="btn btn-primary admin-btn" type="submit">Save Top Property</button>
            <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn" href="top-properties.php">Cancel</a><?php endif; ?>
        </div>
    </form>
    <?php endif; ?>
</section>

<section class="admin-card main-content">
    <h2>Top Property Items</h2>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Highlights</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td>
                            <?php $imageSrc = '../' . ltrim((string) ($item['image_path'] ?? ''), '/'); ?>
                            <img class="admin-table-thumb" src="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        </td>
                        <td>
                            <div class="admin-table-main"><?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </td>
                        <td><?php echo htmlspecialchars(implode(', ', (array) ($item['highlights'] ?? [])), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <span class="admin-badge-status <?php echo (int) $item['is_active'] === 1 ? 'active' : 'inactive'; ?>">
                                <?php echo (int) $item['is_active'] === 1 ? 'Active' : 'Inactive'; ?>
                            </span>
                        </td>
                        <td class="admin-gallery-actions">
                            <a class="btn btn-sm btn-outline-primary" href="top-properties.php?edit=<?php echo (int) $item['id']; ?>">Edit</a>
                            <form method="post" class="inline-form" onsubmit="return confirm('Delete this top property?');">
                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($items) === 0): ?>
                    <tr><td colspan="5">No top properties found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
// Custom implementation for top highlights repeater to ensure it works
document.addEventListener('DOMContentLoaded', function() {
    const listNode = document.getElementById('top-highlights-list');
    const addNode = document.getElementById('top-highlights-add-btn');
    const storeNode = document.getElementById('top-highlights-textarea');
    const textInput = document.getElementById('top-highlights-input');
    
    if (!listNode || !addNode || !storeNode || !textInput) {
        console.error('Top highlights elements not found');
        return;
    }
    
    let items = [];
    
    // Load existing items from textarea
    function hydrateFromStore() {
        const lines = storeNode.value.split('\n').map(line => line.trim()).filter(line => line !== '');
        items = lines.slice(0, 3); // Max 3 items
    }
    
    // Save items to textarea
    function syncStore() {
        storeNode.value = items.join('\n');
    }
    
    // Render items in the list
    function render() {
        listNode.innerHTML = '';
        
        items.forEach(function(item, index) {
            const li = document.createElement('li');
            li.className = 'admin-upload-item';
            
            const span = document.createElement('span');
            span.textContent = item;
            
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-outline-danger';
            removeBtn.textContent = 'Remove';
            removeBtn.onclick = function() {
                items.splice(index, 1);
                render();
            };
            
            li.appendChild(span);
            li.appendChild(removeBtn);
            listNode.appendChild(li);
        });
        
        syncStore();
    }
    
    // Add new item
    function addItem() {
        const value = textInput.value.trim();
        if (value === '') {
            return;
        }
        
        if (items.length >= 3) {
            alert('You can add only up to 3 highlights.');
            textInput.value = '';
            return;
        }
        
        items.push(value);
        textInput.value = '';
        render();
    }
    
    // Initialize
    hydrateFromStore();
    render();
    
    // Event listeners
    addNode.addEventListener('click', addItem);
    
    // Allow Enter key to add item
    textInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addItem();
        }
    });
});
</script>
<?php admin_layout_bottom(); ?>
