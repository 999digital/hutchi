<?php
$style = get_field('style'); //blue/white/black/green
$text = get_field('text');
$title = get_field('title');
$subtitle = get_field('subtitle');

$theme = '';
if (isset($style)) {
    $theme = 'theme theme-' . $style;
}
?>

<!--BEGIN BLOCK TWO COLUMN CONTENT-->
<div class="container-fluid two-col-content <?php echo $theme; ?> <?php echo $block['className']; ?>">
    <div class="row">
        <div class="col-12 col-md-5 order-last order-md-first">
            <div class="col-content-wrapper left-padded">
                <?php echo $text; //wysiwyg ?>
            </div>
        </div>

        <div class="col-12 col-md-7 pe-0 order-first order-md-last">
            <p class="standout">
                <?php echo esc_html($title); ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="strapline left-padded">
                <!-- This is the text at the bottom -->
                <?php echo esc_html($subtitle); ?>
            </div>
        </div>
    </div>
</div>
<!--END BLOCK TWO COLUMN CONTENT-->