<?php include "./views/layout/head.php"?>
<?php include "./views/layout/adminheader.php"?>

<main class="msgmain">
    <h1>All Messages</h1>
    <?php if (!empty($messages)):?>
            <?php foreach ($messages as $message):?>
                    <p>Name: <?=htmlspecialchars($message['name'] ?? '')?></p>
                    <p>Email: <?=htmlspecialchars($message['email'] ?? '')?></p>
                    <p>Message: <?=htmlspecialchars($message['content'] ?? '')?></p>
                    <p>Sent at: <?=htmlspecialchars($message['sent_at'] ?? '')?></p>
                    <form action="/admin/messages/delete" method="POST" style="display:inline;">
                        <input type="hidden" name="messageid" value="<?=htmlspecialchars($message['messageid'])?>">
                        <button type="submit">Delete</button>
                    </form>
                <hr>
            <?php endforeach;?>
    <?php else:?>
        <p>No messages found.</p>
    <?php endif;?>
</main>

<?php include "./views/layout/foot.php"?>

