<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastName = $_POST['last_name'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE contacts SET name = ?, last_name = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $lastName, $phone, $id]);

    header("Location: index.php?edit=success");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Edit Contact</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?= $contact['name'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= $contact['last_name'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="<?= $contact['phone'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
