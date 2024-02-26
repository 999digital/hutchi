<?php
$style = get_field('style'); // plain/fancy
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$text = get_field('text');
$link = get_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}

$background_image = get_field('background_image');
$background_video_url = get_field('background_video_url');

$css = '';
?>

<!--BEGIN BLOCK HEADER-->
<div class="block-header container-fluid">
    <div class="row">
        <div class="col <?php echo $style; ?>" style="<?php echo $css; ?>">
            <?php
            if ($style == 'fancy'):
                $css = '';
                if ($background_image) {
                    $css = "background: url('{$background_image['url']}') 50% 50% no-repeat;background-size: cover;";
                } ?>
                <div class="fancy-bg" style="<?php echo $css; ?>">
                    <div class="border-frame"><div class="top-left"></div><div class="top-right"></div></div>
                    <div class="bg-filter"></div>
                    <?php if ($background_video_url): ?>
                        <video autoplay muted loop <?php if ($background_image) {
                            echo "poster=\"{$background_image['url']}\"";
                        } ?>>
                            <source src="<?php echo $background_video_url; ?>"/>
                        </video>
                    <?php endif; ?>
                    <div class="header-text">
                        <h1 class="hero">
                            <?php echo esc_html($title); ?>
                        </h1>
                        <p>
                            <?php echo esc_html($text); ?>
                        </p>
                        <a class="link-btn" href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <span class="text"><?php echo esc_html($link_title); ?></span>
                            <span class="link-btn__icon yellow"><?php include realpath(dirname(__DIR__)) . '../../img/arrow-right.svg'; ?></span>
                        </a>
                    </div>
                </div>

            <?php
            else:
                ?>
                <div class="header-text">
                    <?php if ($eyebrow): ?>
                    <p class="eyebrow">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                    <?php endif; ?>
                    
                    <h1>
                        <?php echo esc_html($title); ?>
                    </h1>

                    <p>
                        <?php echo esc_html($text); ?>
                    </p>
                </div>

            <?php
            endif;
            ?>
        </div>
    </div>
</div>
<!--END BLOCK HEADER-->