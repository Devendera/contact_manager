<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact_ids'])) {
    $ids = implode(',', array_map('intval', $_POST['contact_ids']));
    
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id IN ($ids)");
    $stmt->execute();
}

header("Location: index.php?delete=success");
exit;
?>
