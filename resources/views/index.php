<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Short.ly</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css">
    </head>
    <body>
        <?php require_once('partials/header.php') ?>
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-centered">
                        Paste those BIG urls on Twitter... or whatevs...
                    </h1>
                    <?php if (isset($urlNotFound)) : ?>
                        <div class="notification has-text-centered">
                            <h1 class="title">Not found</h1>
                            <span class="subtitle">
                                The url <strong><?= $currentUrl ?></strong> doesn't seem to exist on our system 😕, but you can shorten a new one here 😄.
                            </span>
                        </div>
                    <?php endif ?>
                    <?php if (isset($isNotValidUrl)) : ?>
                        <div class="notification is-warning has-text-centered">
                            The url <?= $invalidUrl?> doens't seem to be a valid url 😕
                        </div>
                    <?php endif ?>
                    <form class="" action="/" method="post">
                        <div class="field has-addons">
                            <p class="control is-expanded">
                                <input
                                    class="input is-large"
                                    type="text"
                                    name="url"
                                    placeholder="Insert a url here"
                                    value="<?= $invalidUrl ?? '' ?>"
                                    autofocus
                                />
                            </p>
                            <p class="control">
                                <button type="submit" class="button is-primary is-large">
                                    Shorten-it!
                                </button>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="new">
                                    Garantee new.
                                </label>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <?php if (isset($url)) : ?>
                    <div class="notification has-text-centered">
                        <h2 class="subtitle">
                            HEY!, here is your new SHORT URL (for
                            <a href="<?= $url->url ?>"><?= $url->url ?></a>
                            ):
                        </h2>
                        <h1 class="title">
                            <a href="/<?= $url->code ?>">short.ly/<?= $url->code ?></a>
                        </h1>
                        <h2 class="subtitle">Awesome, isn't it? 😋</h2>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </body>
</html>
