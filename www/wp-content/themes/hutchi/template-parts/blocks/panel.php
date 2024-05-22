<?php
$image_placement = get_field('image_placement'); //image-right/image-left

$image = get_field('image');
$image = $image ? wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'img-fluid']) : '';
//or get the url:
// $image['url']

$number = get_field('number');
if ($number) {
    $number = sprintf("%02d", $number);
}

$title = get_field('title');
$text = get_field('text');
$link = get_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}

$colMediaOrder = 'order-1';
$colContentOrder = 'order-5';
$colOffset = ' offset-md-8';

if ($image_placement == 'image-right'){
    $colMediaOrder = 'order-5';
    $colContentOrder = 'order-1';
    $colOffset = '';
}

//block ID not available in parse_blocks for panel nav so need to track our own position, hacky/inefficient!
global $post;
$blocks = parse_blocks($post->post_content);
$pos = 1;
foreach($blocks as $ablock) {
    if ($ablock['blockName'] == 'acf/panel') {
        if ($ablock['attrs']['data']['title'] == $title) {
            //us!
            break;
        }
        else {
            $pos++;
        }
    }
}
?>

<!--BEGIN BLOCK PANEL-->
<div class="link-dest" id="panel-<?php echo $pos; ?>"></div>
<div class="block-panel theme-black <?php echo $image_placement; ?> <?php echo $block['className']; ?> <?php echo $block['className']; ?>">
    <div class="container-fluid">
        <div class="overlay-element"></div>
        <div class="row">
            <div class="col-media col-8 <?php echo $colMediaOrder; ?>">
                <div class="bg-filter"></div>
                <?php echo $image; ?>
            </div>

            <div class="col-content col-4 <?php echo $colContentOrder; ?>">
                <div class="hero">
                    <?php echo esc_html($number); ?>
                </div>

                <div class="fixed-text">
                    <h3 class="standout">
                        <?php echo $title; //have <br>s ?>
                    </h3>

                    <p class="sub-txt d-none d-md-block">
                        <?php echo esc_html($text); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-block d-md-none">
                <p class="sub-txt">
                    <?php echo esc_html($text); ?>
                </p>
            </div>
            <div class="col-content-link col-12 col-md-4 <?php echo $colOffset; ?>">
                <p>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                       class="link-text">
                        <span><?php echo esc_html($link_title); ?></span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<!--END BLOCK PANEL-->