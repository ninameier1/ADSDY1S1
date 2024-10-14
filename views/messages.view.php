<?php include "./views/layout/head.php"?>

<body>
<h1>All Messages</h1>
<?php if (!empty($messages)):?>
    <ul>
        <?php foreach ($messages as $message):?>
            <li>
                <strong>Name:</strong><?=htmlspecialchars($message['name'])?><br>
                <strong>Email:</strong><?=htmlspecialchars($message['email'])?><br>
                <strong>Message:</strong><?=nl2br(htmlspecialchars($message['message']))?>
            </li>
            <hr>
        <?php endforeach;?>
    </ul>
<?php else:?>
    <p>No messages found.</p>
<?php endif;?>
</body>

<?php include "./views/layout/foot.php"?>

