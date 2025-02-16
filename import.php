<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['xml_file'])) {
    $xmlFile = $_FILES['xml_file']['tmp_name'];
    $xml = simplexml_load_file($xmlFile);

    foreach ($xml->contact as $contact) {
        $name = (string) $contact->name;
        $lastName = (string) $contact->lastName;
        $phone = (string) $contact->phone;

        $stmt = $conn->prepare("INSERT INTO contacts (name, last_name, phone) VALUES (?, ?, ?)");
        $stmt->execute([$name, $lastName, $phone]);
    }
    header("Location: index.php?import=success");
}
?>
