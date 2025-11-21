<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Mahotsav Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Mahotsav Event Registration</h2>

<form action="register.php" method="POST">
    <label>Full Name:</label>
    <input type="text" name="fullname" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Phone:</label>
    <input type="text" name="phone" required>

    <label>Event:</label>
    <select name="event_name">
        <option>Dance Competition</option>
        <option>Singing Competition</option>
        <option>Coding Hackathon</option>
        <option>Tech Quiz</option>
    </select>

    <button type="submit">Register</button>
</form>
</body>
</html>
