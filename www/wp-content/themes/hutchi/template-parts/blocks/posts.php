<?php
$PAGE_SIZE = 9;

$filters = get_field('filters');
$category = get_field('category');

$cats = array();

if ($category) {
    array_push($cats, $category);
}

$sector_id;
$solution_id;

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
        $sector_id = intval($src['sector']);
        array_push($cats, $sector_id);
    } 

    if (!empty($src['solution'])) {
        $solution_id = intval($src['solution']);
        array_push($cats, $solution_id);
    } 
    
} 

$query = new WP_query(array(
    'category__and' => $cats,
    'posts_per_page' => $PAGE_SIZE,
    'paged' => get_query_var('paged')
));

//reset on submit filter form by striping out page/querystring
$current_url =  get_pagenum_link(); 
$submit_url = strtok($current_url, '?');
?>

<!--BEGIN BLOCK POSTS-->
<div class="link-img-panel theme-black post-listing <?php echo $block['className']; ?>">
    <div class="container link-image grid">
        <?php
        if ($filters):
            ?>
            <div class="row">
                <div class="col">
                    <form class="post-filters" method="post" action="<?php echo $submit_url; ?>">
                        <div class="form-group">
                            <label for="sector">Sector</label>
                            <select id="sector" name="sector">
                                <option value="">All</option>
                                <?php foreach ($sectors as $sector): ?>
                                    <option value="<?php echo $sector->term_id; ?>" <?php echo $sector->term_id == intval($src['sector']) ? 'selected' : ''; ?>><?php echo $sector->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="solution">Solution</label>
                            <select id="solution" name="solution">
                                <option value="">All</option>
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

        <?php if (count($query->posts) > 0): ?>
        <div class="row">
            <?php foreach ($query->posts as $post): ?>

                <div class="col-12 col-md-6 col-lg-4 p-0"
                     style="background: url('<?php echo get_the_post_thumbnail_url($post, 'large'); ?>') 50% no-repeat; background-size:cover;">

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


        <div class="row pagination">
            <div class="col-12">
                <?php 
                    echo paginate_links( array(
                        'base'         => strtok(str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ), '?'), //strip querystring
                        'total'        => $query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => false,
                        'add_args'     => array(
                            'solution' => $solution_id,
                            'sector' => $sector_id
                        ),
                        'add_fragment' => '',
                    ) );
                ?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-12 no-posts">
                <p>No posts to show.</p>
            </div>
        </div>
    <?php endif; ?>

    </div>
</div>