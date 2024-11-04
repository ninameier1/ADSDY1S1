<body id="body">
    <header id="header">
        <div class="hbuttons">
            <button id="darkbutton" onclick="darkmode()" class="headerbuttons">
                <img src="/views/css/assets/lightmode.png" class="bimg" alt="Darkmode toggle"/>
            </button>
            <a href="/" class="headername">
                NINA MEIER
            </a>
            <a href="/admin">
                <button class="headerbuttons">
                    <img src="/views/css/assets/login.png" class="bimg" alt="Admin Login"/>
                </button>
            </a>
        </div>
        <nav class="nav1" id="nav">
            <a href="/projects">
                <img src="<?php echo ($title == 'Projects')?'/views/css/assets/projectsbl.png':'/views/css/assets/projectswh.png';?>" class="navlinks" alt="Projects">
            </a>
            <a href="/about">
                <img src="<?php echo ($title == 'About')?'/views/css/assets/ABOUTbl.png':'/views/css/assets/ABOUTwh.png';?>" class="navlinks" alt="About">
            </a>
            <a href="/contact">
                <img src="<?php echo ($title == 'Contact')?'/views/css/assets/contactbl.png':'/views/css/assets/contactwh.png';?>" class="navlinks" alt="Contact">
            </a>
        </nav>
    </header>
