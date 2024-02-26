<?php
$icon_image = get_field('icon_image');
$icon_image = $icon_image ? wp_get_attachment_image($icon_image['ID'], 'small', false, ['class' => 'img-fluid']) : '';
//or get the url:
// $icon_image['url']
$title = get_field('title');
$footnote = get_field('footnote');
$text = get_field('text');

$colour = 'yellow'; //want to parameterise
?>

<!--BEGIN BLOCK FIXED BG CONTENT-->

<div class="fixed-bg <?php echo $colour; ?>">
    <div class="container">
        <div class="row main">
            <div class="col-12 col-md-9">
                <div class="bar"></div>
                <div class="text-wrap">
                    <h4><?php if ($icon_image): ?>
                            <div class="icon"><?php echo $icon_image; ?></div><?php endif; ?>
                        <?php echo esc_html($title); ?>
                    </h4>
                
                    <p>
                        <?php echo $text;//wysiwyg ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="footnote">
                    <?php echo esc_html($footnote); ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!--END BLOCK FIXED BG CONTENT-->