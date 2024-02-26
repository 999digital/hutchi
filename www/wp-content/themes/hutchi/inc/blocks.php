<?php

/**
* BLOCKS ********************************************
* */

/* Our very own block category */
function our_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'hutchi-blocks',
                'title' => 'Hutchi Blocks'
            ),
        )
    );
}
add_filter('block_categories', 'our_block_category', 10, 2);


/* ACF now helps with creating custom block types */

//show styled in admin
add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);
function add_block_editor_assets(){
  wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/style.css');
}

function register_acf_block_types()
{
    // Header
    acf_register_block_type(array(
        'name' => 'header',
        'title' => __('Header'),
        'description' => __('Hutchi Header block.'),
        'render_template' => 'template-parts/blocks/header.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('header', 'hero', 'banner', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Accordion
    acf_register_block_type(array(
        'name' => 'accordion',
        'title' => __('Accordion'),
        'description' => __('Hutchi accordion block.'),
        'render_template' => 'template-parts/blocks/accordion.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('content', 'simple', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Interactive list
    acf_register_block_type(array(
        'name' => 'interactive-list',
        'title' => __('Interactive list'),
        'description' => __('Hutchi interactive list block.'),
        'render_template' => 'template-parts/blocks/interactive-list.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('interactive', 'list', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Panel
    acf_register_block_type(array(
        'name' => 'panel',
        'title' => __('Panel'),
        'description' => __('Hutchi panel block.'),
        'render_template' => 'template-parts/blocks/panel.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('panel', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Panel Nav (in-page)
    acf_register_block_type(array(
        'name' => 'panel-nav',
        'title' => __('Panel Nav'),
        'description' => __('Hutchi panel nav block.'),
        'render_template' => 'template-parts/blocks/panel-nav.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('panel', 'navigation', 'menu', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Blog panel
    acf_register_block_type(array(
        'name' => 'blog-panel',
        'title' => __('Blog panel'),
        'description' => __('Hutchi blog panel block.'),
        'render_template' => 'template-parts/blocks/blog-panel.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('blog', 'insights', 'panel', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // 2 column content
    acf_register_block_type(array(
        'name' => 'two-column-content',
        'title' => __('2 column content'),
        'description' => __('Hutchi 2 column content block.'),
        'render_template' => 'template-parts/blocks/two-column-content.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('2 column', 'content', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // 2 column content + media
    acf_register_block_type(array(
        'name' => 'two-column-content-media',
        'title' => __('2 column content + media'),
        'description' => __('Hutchi 2 column content + media block.'),
        'render_template' => 'template-parts/blocks/two-column-content-media.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('2 column', 'content', 'image', 'media', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // CTA
    acf_register_block_type(array(
        'name' => 'cta',
        'title' => __('CTA'),
        'description' => __('Hutchi CTA block.'),
        'render_template' => 'template-parts/blocks/cta.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('cta', 'call to action', 'banner', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // CTA
    acf_register_block_type(array(
        'name' => 'highlight-text',
        'title' => __('Highlight text'),
        'description' => __('Hutchi highlight text block.'),
        'render_template' => 'template-parts/blocks/highlight-text.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('blue', 'highlight', 'text', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Link image panel
    acf_register_block_type(array(
        'name' => 'link-image-panel',
        'title' => __('Link image panel'),
        'description' => __('Hutchi link image panel block.'),
        'render_template' => 'template-parts/blocks/link-image-panel.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('link', 'images', 'panel', 'slider', 'scrolling', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Case Studies
    acf_register_block_type(array(
        'name' => 'case-studies',
        'title' => __('Case studies'),
        'description' => __('Hutchi case studies block.'),
        'render_template' => 'template-parts/blocks/case-studies.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('case studies', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Partners
    acf_register_block_type(array(
        'name' => 'partners',
        'title' => __('Partners'),
        'description' => __('Hutchi Partners block.'),
        'render_template' => 'template-parts/blocks/partners.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('partners', 'logos', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Posts
    acf_register_block_type(array(
        'name' => 'posts',
        'title' => __('Posts'),
        'description' => __('Hutchi posts block.'),
        'render_template' => 'template-parts/blocks/posts.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('posts', 'insights', 'careers', 'news', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Posts
    acf_register_block_type(array(
        'name' => 'slideshow',
        'title' => __('Slideshow'),
        'description' => __('Hutchi slideshow block.'),
        'render_template' => 'template-parts/blocks/slideshow.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('slideshow', 'slider', 'gallery', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

    // Fixed background content
    acf_register_block_type(array(
        'name' => 'fixed-bg-content',
        'title' => __('Fixed background content'),
        'description' => __('Hutchi fixed background 2 column content block.'),
        'render_template' => 'template-parts/blocks/fixed-bg-content.php',
        'category' => 'hutchi-blocks',
        'icon' => 'screenoptions',
        'keywords' => array('2 column', 'content', 'fixed', 'background', 'hutchi')
        //'enqueue_style' => get_template_directory_uri() . '/style.css'
    ));

}
add_action('acf/init', 'register_acf_block_types');