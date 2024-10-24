<?php include "./views/layout/head.php"?>

<body>
<form method="POST" action="/admin">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Login</button>
</form>

<?php include "./views/layout/foot.php"?>
