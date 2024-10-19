<?php include "./views/layout/head.php"?>
<?php include "./views/layout/adminheader.php"?>

<h1>About</h1>
<?php if (!empty($about)):?>
    <ul>
        <?php foreach ($about as $ab):?>
            <li>
                <p>Language: <?=htmlspecialchars($ab['language'] ?? '')?></p>
                <p>Bio: <?=htmlspecialchars($ab['bio'] ?? '')?></p>
                <button class="edit-button" onclick="toggleEditForm(<?=htmlspecialchars($ab['aboutid'])?>)">Edit</button>
                <form action="/adminabout/update" method="POST" style="display:none;" id="edit-form-<?=htmlspecialchars($ab['aboutid'])?>">
                    <input type="hidden" name="aboutid" value="<?=htmlspecialchars($ab['aboutid'])?>">
                    <input type="hidden" name="language" value="<?=htmlspecialchars($ab['language'])?>">
                    <input type="text" name="bio" value="<?=htmlspecialchars($ab['bio'])?>">
                    <button type="submit">Update</button>
                </form>
            </li>
            <hr>
        <?php endforeach;?>
    </ul>
<?php else:?>
    <p>No projects found.</p>
<?php endif;?>

<?php include "./views/layout/foot.php"?>
