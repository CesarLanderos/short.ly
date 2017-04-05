<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Saved urls | Short.ly!</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css">
    </head>
    <body>
        <?php require_once('partials/header.php') ?>
        <main class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Original</th>
                        <th>Shortened</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($urls as $url) : ?>
                        <tr>
                            <td><?= $url->url ?></td>
                            <td>
                                <a href="short.ly/<?= $url->code ?>">
                                    short.ly/<?= $url->code ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Original</th>
                        <th>Shortened</th>
                    </tr>
                </tfoot>
            </table>
        </main>
    </body>
</html>
