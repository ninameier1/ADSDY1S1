<?php include "./views/layout/head.php"?>
<?php include "./views/layout/header.php"?>


<main class="projectgrid">
    <?php if (!empty($projects)):?>
        <ul class="plistitem">
            <?php foreach ($projects as $project):?>
                <li class="project-item">
                    <p>Title: <?=htmlspecialchars($project['title'] ?? '')?></p>
                    <p>Description: <?=htmlspecialchars($project['description'] ?? '')?></p>
                </li>
            <?php endforeach;?>
        </ul>
    <?php else:?>
        <p>No projects found.</p>
    <?php endif;?>
</main>


<?php include "./views/layout/foot.php"?>