<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <nav>
            <div class="nav-bar">
                <div class="logo"><img src="<?= get_template_directory_uri() . '/assets/images/cta-bg.jpg'; ?>"></div>
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'main',
                        'container' => 'ul',
                        'menu_class' => 'header_menu',
                    )
                );
                ?>
            </div>
            <div class="phone">
                <span></span>
                <span> Phone number </span>
                <span> 987-978-978-98 </span>
            </div>
        </nav>
    </header>