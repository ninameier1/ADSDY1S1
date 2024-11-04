<?php include "./views/layout/head.php"?>
<?php include "./views/layout/header.php"?>

<main class="mainabout">
    <div class="left aboutsection">
        <div class="abttitle">
            <h1 class="ptitle">
                About me
            </h1>
            <div class="buttons">
                <a href="/about/nl">
                    <button class="butt">
                        Nederlands
                    </button>
                </a>
                <a href="/about">
                    <button class="butt">
                        English
                    </button>
                </a>
            </div>
        </div>
            <?php if (!empty($about)):?>
                <?php foreach ($about as $ab):?>
                    <p class="text"><?=htmlspecialchars($ab['bio'] ?? '')?></p>
                <?php endforeach;?>
            <?php else:?>
                <p>404</p>
            <?php endif;?>
    </div>
    <div class="right aboutsection">
        <div class="abttitle">
            <h1 class="ptitle">
                CURRICULUM VITAE
            </h1>
            <a href="/about/downloadCV">
                <button class="butt">
                    Download CV
                </button>
            </a>
        </div>
        <h2 class="subtitle">
            Work Experience
        </h2>
        <p class="text">
            Currently I'm lacking in relevant work experience for Software Development, but I am looking for an internship position.
        </p>
        <br>
        <h2 class="subtitle">
            Ongoing Education
        </h2>
        <p class="text">
            AD Software Development <br>
            At Windesheim Flevoland in Almere <br>
        </p>
        <br>
        <h2 class="subtitle">
            Previous Education
        </h2>
        <p class="text">
            BA Architecture & Interior Design <br>
            At Hogeschool Zuyd in Maastricht <br>
        </p>
        <br>
        <p class="text">
            BSc of Nursing <br>
            At Windesheim Flevoland in Almere <br>
        </p>
        <br>
        <p class="text">
            High School - Pre-University Education (Dutch VWO level) <br>
            Culture & Society specialisation (Dutch C&M) <br>
            At De Werkplaats Kindergemeenschap located in Bilthoven
        </p>
        <br>
    </div>
</main>

<?php include "./views/layout/foot.php"?>