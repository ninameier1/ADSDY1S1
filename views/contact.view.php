<?php include "./views/layout/head.php"?>

<?php include "./views/layout/header.php"?>

<main class="maincontact">
    <div class="contactsection">
        <h2 class="contacttitle">
            Contact Me
        </h2>
        <form class="form" method="post">
            <input type="text" placeholder="Name" class="name" name="name">
            <input type="text" placeholder="E-mail" class="email" name="email">
            <input type="text" placeholder="Message..." class="content" name="content">
            <button type="submit" class="butt">SEND</button>
        </form>
    </div>
    <div class="contactlinks">
        <a href="https://github.com/ninameier1">
            <img src="./views/css/assets/github.png" class="socials" alt="Github Logo">
        </a>
        <a href="https://linkedin.com">
            <img src="./views/css/assets/linkedin.png" class="socials" alt="LinkedIn Logo">
        </a>
    </div>
</main>

<?php include "./views/layout/foot.php"?>