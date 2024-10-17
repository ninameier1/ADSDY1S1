<?php include "./views/layout/head.php"?>
<?php include "./views/layout/header.php"?>


<main>
    <h1>All Projects</h1>
    <?php if (!empty($projects)):?>
        <ul>
            <?php foreach ($projects as $project):?>
                <li>
                    <p>Name: <?=htmlspecialchars($project['title'] ?? '')?></p>
                    <p>Email: <?=htmlspecialchars($project['description'] ?? '')?></p>
                </li>
                <hr>
            <?php endforeach;?>
        </ul>
    <?php else:?>
        <p>No projects found.</p>
    <?php endif;?>
</main>


<?php include "./views/layout/foot.php"?>