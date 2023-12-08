<?php


include('inc/db_connection.php');

$stmt = $pdo->prepare("SELECT * FROM Members WHERE ParentId IS NULL");
$stmt->execute();
$parentMembers = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($parentMembers);
?>
