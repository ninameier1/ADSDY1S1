<?php include "./views/layout/head.php"?>
<?php include "./views/layout/header.php"?>


<main class="projectgrid">
    <?php if (!empty($projects)):?>
        <ul class="plistitem">
            <?php foreach ($projects as $project):?>
                <li class="project-item">
                    <p class="ptitle">
                        <?=htmlspecialchars($project['title'] ?? '')?>
                        <a href="<?= htmlspecialchars($project['github_link'] ?? '#') ?>" target="_blank">
                            <button class="butt">
                                <?= !empty($project['github_link']) ? 'GitHub' : 'No link available' ?>
                            </button>
                        </a>
                    </p>
                    <?php if (!empty($project['image_path'])): ?>
                        <div>
                            <img src="/views/uploads/<?= htmlspecialchars($project['image_path']) ?>" alt="Project Image" class="pimage">
                        </div>
                    <?php else: ?>
                        <p>No image available for this project.</p>
                    <?php endif; ?>
                    <p class="pdesc">
                        <?=htmlspecialchars($project['description'] ?? '')?>
                    </p>
                </li>
            <?php endforeach;?>
        </ul>
    <?php else:?>
        <p>No projects found.</p>
    <?php endif;?>
</main>


<?php include "./views/layout/foot.php"?>