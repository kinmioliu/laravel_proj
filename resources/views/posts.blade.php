<!DOCTYPE html>
<html>
    <title>aooof blog</title>
    <!--<script src="/app.js"></script>-->
    <link rel="stylesheet" href="/app.css">
    <body>
        <?php foreach ($posts as $post) : ?>
            <article>
                <p><?= "date:". $post->date ." author:". $post->author; ?></p>
                <?= $post->body; ?>
            </article>
        <?php endforeach ?>        
    </body>
</html>