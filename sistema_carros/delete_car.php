<?php
require 'config/db.php';
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM carros WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id, $_SESSION["usuario_id"]);
    $stmt->execute();
}

header("Location: dashboard.php");
exit();
