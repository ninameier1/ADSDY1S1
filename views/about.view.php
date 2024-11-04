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
            <p class="text">
                    FAKE NAME
                    Phone:
                    email
                    ADDRESS
                    I'm a student studying Aerospace Engineering at the University of Manchester. I have work
                    experience in the retail, catering, and commercial transport industry. I am honest, reliable and
                    my past roles have required good timekeeping and a positive attitude in high pressure
                    environments. My aim is to get relevant internship experience whilst I am at university so I
                    can graduate with a greater understanding of the engineering industry and what companies
                    look for in engineering graduates.
                    EDUCATION
                    School (2006-2010) – GCSE
                    English – Grade C Business Studies – Grade B
                    Maths – Grade C Catering – Grade C
                    Additional Science – Grade C Engineering Double Award – Grade B,C
                    College (2010-2012) – Level 2 NVQ
                    Diploma in HGV Vehicle Maintenance & Repair
                    College (2014-2015) – Level 3 Access to HE
                    Engineering Science – 9 Distinctions, 6 Merits
                    Physics – 15 Distinctions
                    Maths – 6 Distinctions, 9 Merits
                    University of Manchester (2015-Current) BEng/MEng
                    Aerospace Engineering with a Foundation Year
                    WORK EXPERIENCE
                    Penventon Park Hotel (May 2009)
                    I had 2 weeks work experience at the Penventon Park Hotel in Redruth, Cornwall. My
                    primary role was an assistant kitchen porter and an assistant to the restaurant manager and
                    the head chef. I carried out jobs including washing up, cleaning/tidying and basic food
                    preparation. My secondary roles at this work placement were assisting the room
                    housekeeping team, the reception, and the functions department.
                    NAME - 1
                    NAME Commercials (June 2010 – June 2013) – Apprentice / Technician
                    NAME Commercials is a commercial workshop that maintain and repair heavy goods
                    vehicles.
                    INTERESTS / OTHER
                    My hobbies include: playing the guitar, martial arts, kayaking, and badminton. I'm interested
                    in the development of the UK Space industry and the progress of technology in renewable
                    energy and bio-technology.
                    I am also on the Residents Association for NAME Student Residences at the University of
                    Manchester. My role is Deputy Chair, this position includes: assisting the Chair oversee and
                    manage the responsibilites of the residents association, organising events for the residents of
                    the halls, ensuring proper procedures are taken with regards to administration and event
                    planning, and assisting the "Raise and Give" branch of the University with charity fund
                    raisers.
            </p>
    </div>
</main>

<?php include "./views/layout/foot.php"?>