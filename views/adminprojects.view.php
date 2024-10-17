<?php include "./views/layout/head.php"?>

<?php include "./views/layout/header.php"?>
<body>

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
                <p>Name: <?=htmlspecialchars($project['title'] ?? '')?></p>
                <p>Email: <?=htmlspecialchars($project['description'] ?? '')?></p>
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
</body>


<?php include "./views/layout/foot.php"?>