<?php include "./views/layout/head.php"?>
<?php include "./views/layout/adminheader.php"?>

<main class="admabt">
    <h1>About</h1>
    <?php if (!empty($about)):?>
            <?php foreach ($about as $ab):?>
                    <p>
                        Language: <?=htmlspecialchars($ab['language'] ?? '')?>
                    </p>
                    <p>
                        Bio: <?=htmlspecialchars($ab['bio'] ?? '')?>
                    </p>
                    <button class="edit-button" onclick="toggleEditForm(<?=htmlspecialchars($ab['aboutid'])?>)">
                        Edit
                    </button>
                    <form action="/admin/about/update" method="POST" class="editform" id="edit-form-<?=htmlspecialchars($ab['aboutid'])?>">
                        <input type="hidden" name="aboutid" value="<?=htmlspecialchars($ab['aboutid'])?>">
                        <input type="hidden" name="language" value="<?=htmlspecialchars($ab['language'])?>">
                        <textarea name="bio" class="editabout"><?=htmlspecialchars($ab['bio'])?></textarea>
                        <button type="submit">
                            Update
                        </button>
                    </form>
                <hr>
            <?php endforeach;?>
    <?php else:?>
        <p>404</p>
    <?php endif;?>
    <form action="/admin/about/uploadCV" method="POST" enctype="multipart/form-data" class="uploadform">
        <label for="cv">
            Upload CV (PDF only):
        </label>
        <input type="file" name="cv" id="cv" accept=".pdf" required>
        <button type="submit">Upload</button>
    </form>
</main>

<?php include "./views/layout/foot.php"?>
