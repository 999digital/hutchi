<?php
/*
 * Template Name: Default Post
 * Template Post Type: post
 */

$cta = get_field('cta');
if ($cta) {
    $cta_url = $cta['url'];
    $cta_title = $cta['title'];
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
} else {
    $cta_url = '/case-studies';
    $cta_title = 'See all the case studies';
    $cta_target = '_self';
}

$related_posts_heading = get_field('related_posts_heading');
$related_post_1 = get_field('related_post_1');
$related_post_2 = get_field('related_post_2');

$image = get_post_thumbnail_id(get_the_id());

$css = '';
if ($image) {
    $info = wp_get_attachment_image_src($image, 'large');
    $css = "background: url('{$info[0]}') 50% 50% no-repeat;background-size: cover;";
}

$excerpt = '';
if (!empty($post->post_excerpt)) {
    $excerpt = "<p>{$post->post_excerpt}</p>";
}
?>
<?php get_header(); ?>
<?php if (have_posts()):
    $categories = wp_get_post_categories(get_the_ID(), [
        'parent' => 0,
        'fields' => 'all'
    ]);
    $main_cat = $categories[0];
    $categories = wp_get_post_categories(get_the_ID(), [
        'childless' => true,
        'fields' => 'all'
    ]);
    ?>
    <div class="block-header container-fluid">
        <div class="row">
            <div class="col plain blog" style="<?php echo $css; ?>">
                <div class="border-frame"><div class="top-left"></div><div class="top-right"></div></div>
                <div class="bg-filter"></div>
                <div class="header-text">
                    <p class="eyebrow"><?php echo $main_cat->name ?></p>
                    <h1><?php the_title(); ?></h1>
                    <?php  echo $excerpt; ?>
                    <div class="header-links">
                        <a class="link-btn" href="#blog-content">
                            <span class="text">Read more</span>
                            <span class="link-btn__icon yellow"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/arrow-right.svg'; ?></span>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php urlencode(the_permalink()) ?>"
                           title="Share on Facebook" class="social-link sm-icon"
                           target="_blank"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/facebook.svg'; ?></a>
                        <a href="https://twitter.com/intent/tweet?url=<?php urlencode(the_permalink()) ?>&text="
                           title="Share on X" class="social-link sm-icon"
                           target="_blank"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/x.svg'; ?></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php urlencode(the_permalink()) ?>&title=<?php urlencode(the_title()); ?>"
                           class="social-link sm-icon"
                           target="_blank"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/linkedin.svg'; ?></a>
                        <!--a href="mailto:someone@email.com?&subject=&body=<?php urlencode(the_permalink()) ?>"
              title="Share via Email"  class="social-link sm-icon" target="_blank">Email</a-->
                    </div>
                    <?php if ($categories): ?>
                        <div class="cats">
                            <?php foreach ($categories as $cat): ?>
                                <div class="cat"><?php echo $cat->name; ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-2">
        <div class="row">
            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 pt-5">
                <a id="blog-content"></a>
                <?php the_content() ?>
            </div>
        </div>
    </div>

    <?php //Should be using templates but don't know how to pass vals...
    ?>
    <?php
    if ($related_post_1 && $related_post_2):
        $case_studies = [$related_post_1, $related_post_2];
        ?>
        <div class="highlight-text theme theme-blue mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="color-alt h4-alt">
                            <?php echo esc_html($related_posts_heading); ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid link-image landscape no-hover g-0">
            <div class="row g-0">
                <?php foreach ($case_studies as $case_study):
                    $url = get_post_permalink($case_study);
                    $cats = get_the_category($case_study->ID);
                    if (count($cats)) {
                        $cat = $cats[0]->name;
                    }
                    $img = get_the_post_thumbnail_url($case_study, 'large');
                    ?>

                    <div class="col-12 col-md-6 p-0" style="background-image: url('<?php echo $img; ?>');"><a
                                href="<?php echo esc_attr($url); ?>">
                            <div class="bg-filter"></div>
                            <div class="link-text-wrapper">
                                <p class="small">
                                    <?php echo esc_html($cat); ?>
                                </p>
                                <h3>
                                    <?php echo esc_html($case_study->post_title); ?>
                                </h3>

                                <p class="link-text"><span>Read more</span></p>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>

    <!--BEGIN BLOCK CTA-->
    <div class="cta-bar theme theme-blue">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="link-btn" href="<?php echo esc_url($cta_url); ?>"
                       target="<?php echo esc_attr($cta_target); ?>">
                        <span class="text"><?php echo esc_html($cta_title); ?></span>
                        <span class="link-btn__icon"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/arrow-right.svg'; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--END BLOCK CTA-->

    </div>

<?php endif; ?>
<?php get_footer(); ?>