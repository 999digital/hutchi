<?php
$filters = get_field('filters');
$category = get_field('category');

$cats = array();
if ($filters) {
    $sectors_id = get_term_by('slug', 'sector', 'category');
    $sectors_id = $sectors_id ? $sectors_id->term_id : 0;
    $sectors = get_categories(['child_of' => $sectors_id, 'hide_empty' => false]);
    $solutions_id = get_term_by('slug', 'solution', 'category');
    $solutions_id = $solutions_id ? $solutions_id->term_id : 0;
    $solutions = get_categories(['child_of' => $solutions_id, 'hide_empty' => false]);

    $src = $_GET;
    if (!empty($_POST['sector']) || !empty($_POST['solution'])) {
        $src = $_POST;
    }

    if (!empty($src['sector'])) {
        array_push($cats, intval($src['sector']));
    } else {
        //all
        array_push($cats, $sectors_id);
    }

    if (!empty($src['solution'])) {
        array_push($cats, intval($src['solution']));
    } else {
        //all
        array_push($cats, $solutions_id);
    }
} else {
    $cats = array($category);
}

$query = new WP_query(array('category__in' => $cats));
?>

<!--BEGIN BLOCK POSTS-->
<div class="link-img-panel theme-black post-listing">
    <div class="container link-image grid">
        <?php
        if ($filters):
            ?>
            <div class="row">
                <div class="col">
                    <form class="post-filters" method="post">
                        <div class="form-group">
                            <label for="sector">Sector</label>
                            <select id="sector" name="sector">
                                <option>All</option>
                                <?php foreach ($sectors as $sector): ?>
                                    <option value="<?php echo $sector->term_id; ?>" <?php echo $sector->term_id == intval($src['sector']) ? 'selected' : ''; ?>><?php echo $sector->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="solution">Solution</label>
                            <select id="solution" name="solution">
                                <option>All</option>
                                <?php foreach ($solutions as $solution): ?>
                                    <option value="<?php echo $solution->term_id; ?>" <?php echo $solution->term_id == intval($src['solution']) ? 'selected' : ''; ?>><?php echo $solution->name; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group d-flex">
                            <input type="submit" class="btn btn-primary"
                                   value="Filter"/>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        endif;
        ?>

        <div class="row">
            <?php foreach ($query->posts as $post): ?>

                <div class="col-12 col-md-6 col-lg-4 p-0"
                     style="background: url('<?php echo get_the_post_thumbnail_url($post, 'medium'); ?>') 50% no-repeat; background-size:cover;">

                    <a href="<?php echo get_permalink($post->ID); ?>">
                        <div class="bg-filter"></div>
                        <div class="link-text-wrapper">
                            <div class="header-wrapper">
                                <h4>
                                    <?php echo $post->post_title; ?>
                                </h4>
                            </div>
                            <div class="text-wrapper">
                                <p class="panel-text">
                                    <?php echo $post->post_excerpt; ?>
                                </p>
                                <p class="link-text"><span>Explore</span></p>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>