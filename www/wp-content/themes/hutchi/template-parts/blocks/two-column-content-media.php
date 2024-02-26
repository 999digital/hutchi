<?php
$style = get_field('style'); //blue/white/black
$layout = get_field('layout'); //1:1/2:1
$eyebrow = get_field('eyebrow');
$text = get_field('text');
$title = get_field('title');

$link = get_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}

$image = get_field('image');
$image = $image ? wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'img-fluid']) : '';
//or get the url:
// $image['url']

$image_placement = get_field('image_placement'); //image-right/image-left
$offset_image = get_field('offset_image'); //true/false
$layout = get_field('layout'); //true/false

$col1size = ($layout == '1:1') ? 'col-lg-6' : 'col-lg-8';
$col2size = ($layout == '1:1') ? 'col-lg-6' : 'col-lg-4';

$col1Order = ($image_placement == 'image-left') ? 'order-lg-5' : 'order-lg-1';
$col2Order = ($image_placement == 'image-left') ? 'order-lg-1' : 'order-lg-5';

$offset = $offset_image ? 'negOffset ' : '';

$theme = '';
if (isset($style)) {
    $theme = 'theme theme-' . $style;
}
?>
<!--BEGIN BLOCK TWO COLUMN CONTENT + MEDIA-->
<div class="container-fluid two-column-media g-0 <?php echo $offset; ?> <?php echo $theme; ?> <?php echo $image_placement; ?>" id="block-<?php echo str_replace(' ', '-', strtolower($title)); ?>">
    <div class="row g-0">
        <div class="col-content col-12 <?php echo $offset_image ? '' : 'p-0'; ?> <?php echo $col1size; ?> order-5 <?php echo $col1Order; ?>">
            <div class="col-content-wrapper left-padded">
                <?php if ($eyebrow): ?>
                <p class="eyebrow"><?php echo esc_html($eyebrow); ?></p>
                <?php endif; ?>
                <h3 class="hero"><?php echo esc_html($title); ?></h3>
                <div><?php echo $text; //wysiwyg ?></div>
                <?php if ($link): ?>
                    <a class="link-btn" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <span class="text"><?php echo esc_html($link_title); ?></span>
                        <span class="link-btn__icon"><?php include realpath(dirname(__DIR__)) . '../../img/arrow-right.svg'; ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-media col-12 p-0 <?php echo $col2size; ?> order-1 <?php echo $col2Order; ?>"><?php echo $image; ?></div>
    </div>
</div>

<!--END BLOCK TWO COLUMN CONTENT + MEDIA-->