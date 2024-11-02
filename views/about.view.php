<?php include "./views/layout/head.php"?>
<?php include "./views/layout/header.php"?>

<main class="mainabout">
    <div class="left aboutsection">
<!--        <div class="">-->
            <a href="/about/nl">
                <button>
                    Nederlands
                </button>
            </a>
            <a href="/about">
                <button>
                    English
                </button>
            </a>
            <?php if (!empty($about)):?>
                <?php foreach ($about as $ab):?>
                    <p><?=htmlspecialchars($ab['bio'] ?? '')?></p>
                <?php endforeach;?>
            <?php else:?>
                <p>404</p>
            <?php endif;?>
    </div>
    <div class="right aboutsection">
            <p class="text">
                <a href="/about/downloadCV">Download CV</a>
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
                    vehicles. As an apprentice, I was tasked to: assist and learn from the senior technicians, to
                    keep the workshop clean and tidy, and to carry out routine servicing and maintenance of
                    customer vehicles. I attended College one day a week and I achieved a Level 2 NVQ
                    certificate after 2 years of my apprenticeship. I was then promoted to a full time technician,
                    my duties in this job were to continue to hone my skills as a vehicle technician and with this
                    role came more responsibilities such as carrying out regular road safety inspections,
                    servicing, maintenance and repair of customer vehicles.
                    NAME Commercials (June 2013 – August 2014) – Parts Manager
                    I was offered and accepted a position in the office and reception as a parts and store manager.
                    This role included everything to do with vehicle parts in the company. My duties were to
                    manage the warehouse stock levels to make sure fast moving items were replaced when used,
                    carry out customer sales/warranty issues, to source and locate parts required within a certain
                    time frame at the best price, and to administrate and keep a record of all the parts coming in
                    and out of the company to ensure an appropriate profit margin.
                    NAME Restaurant (August 2014 – December 2014) – Kitchen Porter
                    Responsibilities included: loading and unloading an industrial dish washer, keeping the
                    kitchen clean and tidy, assisting the head chef wherever required, and vegetable preparation.
                    NAME Spar Shop (November 2014 – September 2015) – Shop Assistant
                    In this role I manned the tills at the front of the shop, handled money, and assisted customers
                    wherever needed. I had to keep the shop clean and the shelves stocked with items from the
                    stores.. For the last 3 months of this job I also assisted the owner of the shop with a morning
                    paper round.
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
                    NAME - 2
            </p>
    </div>
</main>

<?php include "./views/layout/foot.php"?>