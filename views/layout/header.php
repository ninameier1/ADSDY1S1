<body id="body">
<header id="header">
    <button>
        Toggle Dark Mode
    </button>
    <nav class="nav1" id="nav">
        <a href="/">
            <img src="./views/CSS/assets/homewh.png" class="navlinks">
        </a>
        <a href="/projects">
            <img src="<?php echo ($title == 'Projects')?'./views/css/assets/projectsbl.png':'./views/css/assets/projectswh.png';?>" class="navlinks">
        </a>
        <a href="/about">
            <img src="<?php echo ($title == 'About')?'./views/css/assets/ABOUTbl.png':'./views/css/assets/ABOUTwh.png';?>" class="navlinks">
        </a>
        <a href="/contact">
            <img src="<?php echo ($title == 'Contact')?'./views/css/assets/contactbl.png':'./views/css/assets/contactwh.png';?>" class="navlinks">
        </a>
    </nav>
</header>