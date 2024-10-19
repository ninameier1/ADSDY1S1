<?php include "./views/layout/head.php"?>
<?php include "./views/layout/adminheader.php"?>

<h1>CREATE NEW PROJECT</h1>
<form class="form" method="post">
    <input type="text" placeholder="Project Title" class="title" name="title">
    <input type="text" placeholder="Project Description" class="description" name="description">
    <button type="submit" class="button">SEND</button>
</form>

<h1>All Projects</h1>
<?php if (!empty($projects)):?>
    <ul>
        <?php foreach ($projects as $project):?>
            <li>
                <p>Title: <?=htmlspecialchars($project['title'] ?? '')?></p>
                <p>Description: <?=htmlspecialchars($project['description'] ?? '')?></p>
                <button class="edit-button" onclick="toggleEditForm(<?=htmlspecialchars($project['projectid'])?>)">Edit</button>
                <form action="/adminprojects/update" method="POST" style="display:none;" id="edit-form-<?=htmlspecialchars($project['projectid'])?>">
                    <input type="hidden" name="projectid" value="<?=htmlspecialchars($project['projectid'])?>">
                    <input type="text" name="title" value="<?=htmlspecialchars($project['title'])?>">
                    <input type="text" name="description" value="<?=htmlspecialchars($project['description'])?>">
                    <button type="submit">Update</button>
                </form>
                <form action="/adminprojects/delete" method="POST" style="display:inline;">
                    <input type="hidden" name="projectid" value="<?=htmlspecialchars($project['projectid'])?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
            <hr>
        <?php endforeach;?>
    </ul>
<?php else:?>
    <p>No projects found.</p>
<?php endif;?>

<?php include "./views/layout/foot.php"?>