<?php
$title = get_field('title');
$logos = get_field('logos');
$border = get_field('border'); //true/false
$link = get_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
?>

<!--BEGIN BLOCK PARTNERS-->
<div class="container partners <?php echo $block['className']; ?>">
    <div class="<?php echo $border ? 'border border-5' : ''; ?>">
        <?php if ($title): ?>
            <div class="row">
                <div class="col-12">
                    <h4 class="eyebrow">
                        <?php echo esc_html($title); ?>
                    </h4>
                </div>
            </div>
        <?php endif; ?>
        <div class="row align-items-center">
            <div class="slide-partners-wrapper">
                <?php foreach ($logos as $logo):
                    $img = $logo['image'] ? wp_get_attachment_image($logo['image']['ID'], 'medium', false, ['class' => 'img-fluid']) : '';
                    ?>
                    <div class="slide-wrapper">
                        <?php echo($img); ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <?php if ($link): ?>
        <div class="row">
            <div class="col-12">
                <a class="link-btn" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>">
                    <span class="text"><?php echo esc_html($link_title); ?></span>
                    <span class="link-btn__icon"><?php include realpath(dirname(__DIR__)) . '../../img/arrow-right.svg'; ?></span>
                </a>
            </div>
        </div>
    <?php endif; ?>

</div>
<!--END BLOCK PARTNERS-->