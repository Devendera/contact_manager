<?php
include 'db.php';

// Check for success messages
$successMessage = '';
if (isset($_GET['import']) && $_GET['import'] == 'success') {
    $successMessage = "Contacts imported successfully!";
} elseif (isset($_GET['edit']) && $_GET['edit'] == 'success') {
    $successMessage = "Contact updated successfully!";
} elseif (isset($_GET['delete']) && $_GET['delete'] == 'success') {
    $successMessage = "Contact deleted successfully!";
} elseif (isset($_GET['bulk_delete']) && $_GET['bulk_delete'] == 'success') {
    $successMessage = "Selected contacts deleted successfully!";
}

// Pagination variables
$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

// Fetch contacts with pagination
$stmt = $conn->prepare("SELECT * FROM contacts ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get total contacts count for pagination
$totalStmt = $conn->query("SELECT COUNT(*) FROM contacts");
$totalContacts = $totalStmt->fetchColumn();
$totalPages = ceil($totalContacts / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function toggleCheckboxes(source) {
            checkboxes = document.getElementsByName('contact_ids[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function confirmDelete(url) {
            if (confirm("Are you sure you want to delete this contact?")) {
                window.location.href = url;
            }
        }

        function confirmBulkDelete() {
            let checkedBoxes = document.querySelectorAll('input[name="contact_ids[]"]:checked');
            if (checkedBoxes.length === 0) {
                alert("Please select at least one contact to delete.");
                return false;
            }
            return confirm("Are you sure you want to delete the selected contacts?");
        }

        setTimeout(() => {
            let alert = document.getElementById("success-alert");
            if (alert) {
                alert.style.display = "none";
            }
        }, 4000);
    </script>
</head>
<body class="container mt-4">
    <h2>Contact Manager</h2>

    <!-- Display success messages -->
    <?php if ($successMessage): ?>
        <div id="success-alert" class="alert alert-success"><?= $successMessage ?></div>
    <?php endif; ?>

    <!-- Import XML Form -->
    <form action="import.php" method="post" enctype="multipart/form-data" class="mb-3">
        <input type="file" name="xml_file" required>
        <button type="submit" class="btn btn-primary">Import XML</button>
    </form>

    <!-- Bulk Delete Form -->
    <form action="bulk_delete.php" method="post" onsubmit="return confirmBulkDelete();">
        <button type="submit" class="btn btn-danger mb-2">Delete Selected</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><input type="checkbox" onclick="toggleCheckboxes(this)"></th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><input type="checkbox" name="contact_ids[]" value="<?= $contact['id'] ?>"></td>
                        <td><?= htmlspecialchars($contact['name']) ?></td>
                        <td><?= htmlspecialchars($contact['last_name']) ?></td>
                        <td><?= htmlspecialchars($contact['phone']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $contact['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="javascript:void(0);" onclick="confirmDelete('delete.php?id=<?= $contact['id'] ?>')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</body>
</html>
