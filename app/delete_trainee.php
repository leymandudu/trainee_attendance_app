<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute SQL statement to delete trainee
    $stmt = $pdo->prepare('DELETE FROM trainees WHERE id = :id');
    $stmt->execute(['id' => $id]);

    // Redirect to list_trainees.php after deletion
    header('Location: list_trainee.php');
    exit;
} else {
    // Redirect to list_trainees.php if id parameter is not provided
    header('Location: list_trainee.php');
    exit;
}
?>
