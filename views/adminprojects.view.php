<?php include "./views/layout/head.php"?>
<?php include "./views/layout/adminheader.php"?>

<main class="projectgrid">
    <div class="createproject">
        <h1 class="ptitle">CREATE NEW PROJECT</h1>
        <form action="/admin/projects" method="POST" enctype="multipart/form-data" class="projectform">
            <input type="text" name="title" placeholder="Project Title (max 32 characters)" maxlength="32" required>
            <textarea name="description" placeholder="Project Description (max 150 characters)" maxlength="150" required></textarea>
            <input type="file" name="image">
            <input type="text" name="github_link" placeholder="GitHub Link" maxlength="60">
            <button type="submit">
                Create Project
            </button>
        </form>
    </div>
    <div class="proj">
        <h1>All Projects</h1>
        <?php if (!empty($projects)): ?>
            <ul class="plistitem">
                <?php foreach ($projects as $project): ?>
                    <li class="project-item">
                        <p class="ptitle">
                            <?= htmlspecialchars($project['title'] ?? '') ?>
                        </p>
                        <?php if (!empty($project['image_path'])): ?>
                            <div class="project-image">
                                <img src="/views/uploads/<?= htmlspecialchars($project['image_path']) ?>" alt="Project Image" style="max-width: 200px; height: auto;">
                            </div>
                        <?php else: ?>
                            <p>
                                No image available for this project.
                            </p>
                        <?php endif; ?>
                        <p>
                            <?= htmlspecialchars($project['description'] ?? '') ?>
                        </p>
                        <p>
                            <a href="<?= htmlspecialchars($project['github_link'] ?? '#') ?>" target="_blank">
                                <?= htmlspecialchars($project['github_link'] ?? 'No link available') ?>
                            </a>
                        </p>

                        <button class="edit-button" onclick="toggleEditForm(<?= htmlspecialchars($project['projectid']) ?>)">
                            Edit
                        </button>

                        <form action="/admin/projects/update" method="POST" enctype="multipart/form-data" id="edit-form-<?= htmlspecialchars($project['projectid']) ?>" class="editform">
                            <input type="hidden" name="projectid" value="<?= htmlspecialchars($project['projectid']) ?>">
                            <input type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>" placeholder="Project Title" required>
                            <textarea name="description" placeholder="Project Description" required><?= htmlspecialchars($project['description']) ?></textarea>
                            <input type="file" name="image" placeholder="Upload New Image">
                            <input type="url" name="github_link" value="<?= htmlspecialchars($project['github_link'] ?? '') ?>" placeholder="GitHub Link">
                            <button type="submit">Update</button>
                        </form>

                        <form action="/admin/projects/delete" method="POST" class="delete">
                            <input type="hidden" name="projectid" value="<?= htmlspecialchars($project['projectid']) ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No projects found.</p>
        <?php endif; ?>
    </div>


</main>

<?php include "./views/layout/foot.php"?>