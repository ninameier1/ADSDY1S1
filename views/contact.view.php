<?php include "./views/layout/head.php"?>

<?php include "./views/layout/header.php"?>

<main class="maincontact">
    <div class="contactsection">
        <form class="form" method="post">
            <input type="text" placeholder="Name" class="name" name="name">
            <input type="text" placeholder="E-mail" class="email" name="email">
            <input type="text" placeholder="Message..." class="message" name="message">
            <button type="submit" class="button">SEND</button>
        </form>
    </div>
    <div class="contactsection">
        <a href="https://github.com/" class="text">Github</a>
        <a href="https://linkedin.com" class="text">LinkedIn</a>
    </div>
</main>

<?php include "./views/layout/foot.php"?>