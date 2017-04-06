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
                        <th>Domain</th>
                        <th>Times shortened</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($domains as $domain) : ?>
                        <tr>
                            <td><?= $domain->name ?></td>
                            <td><?= $domain->number_of_records ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Domain</th>
                        <th>Times shortened</th>
                    </tr>
                </tfoot>
            </table>
        </main>
    </body>
</html>
