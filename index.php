<!DOCTYPE html>
<?php require "includes/tasks.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Task Manager</title>
</head>

<body>
    <div class="container">
        <h1>Task Manager</h1>

        <form action="includes/tasks.php" method="post">
            <input type="text" name="title" placeholder="Title" required>

            <textarea name="description" placeholder="Description"></textarea>

            <select name="category">
                <option value="work">Work</option>
                <option value="study">Study</option>
                <option value="Personal">Personal</option>
            </select>

            <select name="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="High">High</option>
            </select>

            <button type="submit" name="add_task">Add Task</button>
        </form>

        <div class="task-list">
            <?php foreach ($task as $tasks): ?>
            <div class="task<?= $task["is_completed"] ? 'completed' : '' ?>">
                <h3> <?= htmlspecialchars($task["title"]) ?> </h3>

                <p> <?= htmlspecialchars($task["description"]) ?> </p>

                <span class="category<?= $task["category"] ?>"> <?= $task["category"] ?> </span>

                <span class="priority<?= $task["priority"] ?>"> <?= $task["priority"] ?> </span>

                <button onclick="toggleTask(<?= $task['task_id'] ?>)">✓</button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>