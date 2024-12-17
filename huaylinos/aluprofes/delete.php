<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM docentes WHERE id_docente = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
