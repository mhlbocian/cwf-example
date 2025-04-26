<?php use CwfPhp\CwfPhp\Url; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= Url::Resource("/images/favicon.png"); ?>" />
    <link rel="stylesheet" href="<?= Url::Resource("/css/style.css") ?>" />
    <title>CWF-PHP: <?= $type ?? "unknown error" ?></title>
</head>

<body>
    <div id="page-container">
        <header style="text-align: center;">
            <h1><?= $type ?? "Unknown error" ?></h1>
        </header>
        <hr />
        <section>
            <p style="text-align: center;">
                It seems that something went wrong. You'd better return to the
                <a href="<?= Url::Site("") ?>">main page</a>.
            </p>
            <hr /><br />
            <p>Message for the nerds:</p>
            <pre><?= $error ?? "null. i'm sorry :(" ?></pre><br />
        </section>
    </div>
</body>

</html>