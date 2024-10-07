<?php include "./views/layout/head.php"?>

<body id="body">
    <button>
        Toggle Dark Mode
    </button>
    <main>
        <link rel="stylesheet" href="./views/css/custom.css">
        <div class="menu">
            <a href="/projects">
                <img src="./views/css/assets/projectsbl.png" class="menulinks" id="projectswh">
            </a>
            <a href="/about">
                <img src="./views/css/assets/ABOUTbl.png" class="menulinks" id="aboutwh">
            </a>
            <a href="/contact">
                <img src="./views/css/assets/contactbl.png" class="menulinks" id="contactwh">
            </a>
        </div>
        <div class="section" id="section">
            <p class="text" id="name">
                Nina Meier
            </p>
            <p class="text">
                Student Software Development
            </p>
            <p class="text">
                Windesheim Flevoland
            </p>
        </div>
    </main>

<?php include "./views/layout/foot.php"?>