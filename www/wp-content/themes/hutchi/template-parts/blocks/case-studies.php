<?php
$case_studies = get_field('case_studies');
$no_hover = get_field('no_hover');
?>

<!--BEGIN CASE STUDIES PANEL-->

<div class="container-fluid link-image landscape g-0 <?php echo $no_hover ? 'no-hover' : ''; ?> <?php echo $block['className']; ?>">
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

<!--END CASE STUDIES PANEL-->