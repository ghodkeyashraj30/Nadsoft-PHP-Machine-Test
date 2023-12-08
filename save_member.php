<?php
include('inc/db_connection.php');
if (isset($_POST['parent']) && isset($_POST['name'])) {
    $parent = $_POST['parent'];
    $name = $_POST['name'];

    $stmt = $pdo->prepare("INSERT INTO Members (Name, ParentId, CreatedDate) VALUES (?, ?, NOW())");
    $stmt->execute([$name, $parent]);

    $newMemberId = $pdo->lastInsertId();

    echo json_encode(['status' => 'success', 'newMemberId' => $newMemberId]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing data']);
}
?>
