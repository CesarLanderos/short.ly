<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" action="/" method="post">
            <input type="text" name="url" />
            <button type="submit" name="button">Generar</button>
        </form>
        <?php if (isset($url)) : ?>
            <div class="">
                short.ly/<?= $url->code ?>
            </div>
        <?php endif; ?>
    </body>
</html>
