<?php
$layout = get_field('layout');//grid/slider/grid-border
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$panels = get_field('panels');

$layout_class = $layout;
$container = "container-fluid";
$wrapper_class = '';
if ($layout == 'grid-border' || $layout == 'slider') {
    $container = "container";
}
if ($layout == 'grid-border') {
    $layout_class = 'grid';
    $wrapper_class = "theme-black";
}
if ($layout == 'slider') {
    $wrapper_class = "theme-black " . $layout;
}

?>

<!--BEGIN LINK IMAGE PANEL-->
<div class="link-img-panel <?php echo $wrapper_class; ?> <?php echo $block['className']; ?>">
    <div class="<?php echo $container; ?> link-image <?php echo $layout_class; ?>">
        <div class="row">
            <?php if ($eyebrow || $title): ?>
                <div class="col-12 col-content">
                    <?php if ($eyebrow): ?>
                        <p class="eyebrow"><?php echo esc_html($eyebrow); ?></p>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($layout == 'slider'): ?>
            <div class="slider-wrapper">
                <?php endif; ?>
                <?php
                foreach ($panels

                         as $panel):
                $link = $panel['link'];
                if ($link) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }
                $icon_image = $panel['icon_image'];
                $icon_image = $icon_image ? wp_get_attachment_image($icon_image['ID'], 'small', false, ['class' => 'img-fluid']) : '';
                if ($layout != 'slider'):
                ?>
                <div class="col-12 col-md-6 col-lg-4 p-0"
                     style="background: url('<?php echo $panel['image']['url']; ?>') 50% no-repeat; background-size:cover;">
                    <?php else: ?>
                    <div class="slide-wrapper"
                         style="background: url('<?php echo $panel['image']['url']; ?>') 50% no-repeat; background-size:cover;">
                        <?php endif; ?>
                        <?php if ($link): ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php endif; ?>
                            <div class="bg-filter"></div>
                            <div class="link-text-wrapper">
                                <div class="header-wrapper">
                                    <h4>
                                        <div class="icon"><?php echo $icon_image; ?></div>
                                        <?php echo esc_html($panel['title']); ?>
                                    </h4>
                                </div>
                                <div class="text-wrapper">
                                    <p class="panel-text">
                                        <?php echo esc_html($panel['text']); ?>
                                    </p>
                                </div>
                                <p class="link-text"><span>Explore</span></p>
                            </div>
                            <?php if ($link): ?>
                        </a>
                    <?php endif; ?>
                    </div>

                    <?php
                    endforeach;
                    ?>
                    <?php if ($layout == 'slider'): ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <!--END LINK IMAGE PANEL-->