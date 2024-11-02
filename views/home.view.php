<?php include "./views/layout/head.php"?>

<link rel="stylesheet" href="./views/css/custom.css">

<body id="body">
<div class="hbuttons">
    <button id="darkbutton" onclick="darkmode()" class="headerbuttons">
        <img src="/views/css/assets/lightmode.png" class="bimg"/>
    </button>
    <a href="/admin">
        <button class="headerbuttons">
            <img src="/views/css/assets/login.png" class="bimg"/>
        </button>
    </a>
</div>
    <main>
        <div class="menu">
        <img src="./views/css/assets/flip.png" class="title">
        <p class="hometext">
            STUDENT SOFTWARE DEVELOPMENT WINDESHEIM FLEVOLAND
        </p>
            <a href="/projects">
                <img src="./views/css/assets/projectswh.png" class="menulinks" id="projectswh">
            </a>
            <a href="/about">
                <img src="./views/css/assets/ABOUTwh.png" class="menulinks" id="aboutwh">
            </a>
            <a href="/contact">
                <img src="./views/css/assets/contactwh.png" class="menulinks" id="contactwh">
            </a>
        </div>
    </main>

<?php include "./views/layout/foot.php"?>