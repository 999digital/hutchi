<?php
$style = get_field('style'); //blue/white/black
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$text = get_field('text');
?>

<!--BEGIN BLOCK HIGHLIGHT TEXT-->
<div class="highlight-text theme theme-<?php echo $style; ?> <?php echo $block['className']; ?>" id="block-<?php echo str_replace(' ', '-', strtolower($title)); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($eyebrow): ?>
                <p class="eyebrow">
                    <?php echo esc_html($eyebrow); ?>
                </p>
                 <?php endif; ?>
                <h2 class="color-alt">
                    <?php echo esc_html($title); ?>
                </h2>

                <p class="sub-txt">
                    <?php echo esc_html($text); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<!--END BLOCK HIGHLIGHT TEXT-->