<?php
$style = get_field('style');
$link = get_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
?>
<!--BEGIN BLOCK CTA-->
<div class="cta-bar theme theme-<?php echo $style; ?> <?php echo $block['className']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="link-btn" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>">
                    <span class="text"><?php echo esc_html($link_title); ?></span>
                    <span class="link-btn__icon"><?php include realpath(dirname(__DIR__)) . '../../img/arrow-right.svg'; ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!--END BLOCK CTA-->