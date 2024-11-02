<?php include "./views/layout/head.php"?>
<?php include "./views/layout/header.php"?>


<main class="projectgrid">
    <?php if (!empty($projects)):?>
        <ul class="plistitem">
            <?php foreach ($projects as $project):?>
                <li class="project-item">
                    <?php if (!empty($project['image_path'])): ?>
                        <div class="project-image">
                            <img src="/views/uploads/<?= htmlspecialchars($project['image_path']) ?>" alt="Project Image" style="max-width: 200px; height: auto;">
                        </div>
                    <?php else: ?>
                        <p>No image available for this project.</p>
                    <?php endif; ?>
                    <p>Title: <?=htmlspecialchars($project['title'] ?? '')?></p>
                    <p>Description: <?=htmlspecialchars($project['description'] ?? '')?></p>
                    <p>GitHub: <a href="<?= htmlspecialchars($project['github_link'] ?? '#') ?>" target="_blank"><?= htmlspecialchars($project['github_link'] ?? 'No link available') ?></a></p>


                </li>
            <?php endforeach;?>
        </ul>
    <?php else:?>
        <p>No projects found.</p>
    <?php endif;?>
</main>


<?php include "./views/layout/foot.php"?>