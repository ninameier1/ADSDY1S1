<?php include "./views/layout/head.php"?>
<?php include "./views/layout/adminheader.php"?>

<h1>All Messages</h1>
<?php if (!empty($messages)):?>
    <ul>
        <?php foreach ($messages as $message):?>
            <li>
                <p>Name: <?=htmlspecialchars($message['name'] ?? '')?></p>
                <p>Email: <?=htmlspecialchars($message['email'] ?? '')?></p>
                <p>Message: <?=htmlspecialchars($message['content'] ?? '')?></p>
                <p>Sent at: <?=htmlspecialchars($message['sent_at'] ?? '')?></p>
                <form action="/adminmessages/delete" method="POST" style="display:inline;">
                    <input type="hidden" name="messageid" value="<?=htmlspecialchars($message['messageid'])?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
            <hr>
        <?php endforeach;?>
    </ul>
<?php else:?>
    <p>No messages found.</p>
<?php endif;?>

<?php include "./views/layout/foot.php"?>

