<?php
require_once('class-wp-bootstrap-navwalker.php');

//Breadcumb?
$parent_id = wp_get_post_parent_id(get_the_ID());
global $post;
$crumb1 = false;

if ($parent_id) {
    //this assumes only 2 levels
    $parent = get_post($parent_id);
    $crumb1 = $parent->post_title;
    $crumb1_url = get_permalink($parent);
    $crumb2 = $post->post_title;
}

//different breadcrumb for posts...
if (is_single()) {
    $categories = wp_get_post_categories(get_the_ID(), [
        'orderby' => 'parent',
        'fields' => 'all'
    ]);
    $main_cat = array_shift($categories);
    $crumb1 = $main_cat->name;
    //bit of a fudge, use IDs in case change names
    $cat_urls = [
        3 => '/case-studies', 
        30 => '/insight', 
        4 => '/careers'
    ];

    $crumb1_url = $cat_urls[$main_cat->term_id];
    
    $crumb2 = $post->post_title;
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/safari-pinned-tab.svg"
          color="#140D1C">
    <meta name="msapplication-TileColor" content="#140D1C">
    <meta name="theme-color" content="#140D1C">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <nav class="navbar fixed-top navbar-light" role="navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
               rel="home"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/logo.svg'; ?></a>

           <?php if ($crumb1): ?>
                <span class="navbar-text breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $crumb1_url; ?>"><?php echo $crumb1; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $crumb2; ?></li>
                        </ol>
                    </nav>
                </span>
            <?php endif; ?>

            <span class="navbar-text contact-link"><a href="/contact/">Contact Us</a></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarNav" class="collapse navbar-collapse">
                <div class="border-frame"><div class="top-left"></div><div class="top-right"></div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'depth' => 2,
                        'container' => false, //'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'navbarNav',
                        'menu_class' => 'navbar-nav ms-auto',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<a id="main-content"></a>