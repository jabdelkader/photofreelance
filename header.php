<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    


    <?php wp_head() ?>
    <script>
        $(document).ready(function () {
            var maref = "<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>";
            $("#refphoto").val(maref);
        });
    </script>
</head>

<body>
    <header>
        <div class="headermenu">
            <div class="menu_header">

                <a href="<?php echo site_url() ?>"><img
                        src="<?php echo get_template_directory_uri(); ?> '/assets/images/logo.png' " alt="logo"> </a>
                <div class="buttonmenu">
                    <span></span>
                </div>
                <?php wp_nav_menu(['theme_location' => 'header', 'container' => false, 'menu_class' => 'header']) ?>

            </div>

        </div>
        <?php include_once "templates_parts/menuburger.php"; ?>
        <?php include_once "templates_parts/formulaire.php"; ?>
        <?php include_once "templates_parts/lightbox.php"; ?>
    </header>
    <div class="container">