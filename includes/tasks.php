<?php
require "config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_task"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $priority = $_POST["priority"];

    $stmt = $db->prepare("INSERT INTO tasks (user_id, title, description, category, priority) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $title, $description, $category, $priority]);
    header("Location: index.php");
    exit();
}

//Получение задач
$stmt = $db->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->execute([$user_id]);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>