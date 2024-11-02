<?php include "./views/layout/head.php"?>

<body class="mainadminlogin">
    <img src="views/css/assets/auth.png" class="auth">
    <form method="POST" action="/admin" class="login">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
    <a href="/">
        <img src="./views/css/assets/goback.png" class="adml">
    </a>

<?php include "./views/layout/foot.php"?>
