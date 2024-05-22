<?php
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$post = get_field('post');
$post_url = get_post_permalink($post);
$cats = get_the_category($post->ID);
if (count($cats)) {
    $cat = $cats[0]->name;
}
$img = get_the_post_thumbnail_url($post, 'large');

$top_link = get_field('top_link');
if ($top_link) {
    $top_link_url = $top_link['url'];
    $top_link_title = $top_link['title'];
    $top_link_target = $top_link['target'] ? $top_link['target'] : '_self';
}

$bottom_link = get_field('bottom_link');
if ($bottom_link) {
    $bottom_link_url = $bottom_link['url'];
    $bottom_link_title = $bottom_link['title'];
    $bottom_link_target = $bottom_link['target'] ? $bottom_link['target'] : '_self';
}
?>

<!--BEGIN BLOCK BLOG PANEL-->

<div class="blog-panel <?php echo $block['className']; ?>" style="background-image: url('<?php echo $img; ?>')">
    <div class="bg-filter"></div>
    <div class="container">
        <div class="row">
            <div class="col border-frame"><div class="top-left"></div><div class="top-right"></div>
                <p class="small fl">
                    <?php echo esc_html($eyebrow); ?>
                </p>

                <?php if ($top_link): ?>
                    <p class="top-link">
                        <a class="link-btn" href="<?php echo esc_url($top_link_url); ?>"
                           target="<?php echo esc_attr($top_link_target); ?>">
                            <span class="text"><?php echo esc_html($top_link_title); ?></span>
                            <span class="link-btn__icon yellow"><?php include realpath(dirname(__DIR__)) . '../../img/arrow-right.svg'; ?></span>
                        </a>
                    </p>
                <?php endif; ?>

                <h2>
                    <?php echo esc_html($title); ?>
                </h2>


                <p class="small">
                    <?php echo esc_html($cat); ?>
                </p>
                <h3>
                    <?php echo esc_html($post->post_title); ?>
                </h3>

                <p>
                    <a href="<?php echo esc_url($post_url); ?>" class="link-text">
                        <span>Read more</span>
                    </a>
                </p>
            </div>
        </div>
        <?php if ($bottom_link): ?>
            <div class="row">
                <div class="col pb-5">
                    <p class="bottom-link">
                        <a class="link-btn" href="<?php echo esc_url($bottom_link_url); ?>"
                           target="<?php echo esc_attr($bottom_link_target); ?>">
                            <span class="text"><?php echo esc_html($bottom_link_title); ?></span>
                            <span class="link-btn__icon yellow"><?php include realpath(dirname(__DIR__)) . '../../img/arrow-right.svg'; ?></span>
                        </a>
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!--END BLOCK BLOG PANEL-->