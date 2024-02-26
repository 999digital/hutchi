<?php
$style = get_field('style'); //white/black
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$text = get_field('text');
$items = get_field('items');

$theme = '';
if (isset($style)) {
    $theme = 'theme theme-' . $style;
}
?>

<!--BEGIN BLOCK INTERACTIVE LIST-->
<div class="interactive-list <?php echo $theme; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="list-wrapper">
                    <p class="eyebrow">
                        <?php echo esc_html($eyebrow); ?>
                    </p>

                    <h1>
                        <?php echo esc_html($title); ?>
                    </h1>

                    <p>
                        <?php echo $text; //wysiwyg  ?>
                    </p>
                    <?php
                    global $wp;
                    $cur_url = '/' . $wp->request . '/';
                    $list_out = '';
                    $detail_out = '';
                    $n = 1;
                    $icon = file_get_contents(realpath(dirname(__DIR__)) . '../../img/arrow-right.svg', FILE_USE_INCLUDE_PATH);
                    foreach ($items as $item):
                        $img = $item['image'] ? wp_get_attachment_image($item['image']['ID'], 'medium', false, ['class' => 'img-fluid']) : '';
                        $link = $item['link'];
                        $link_class = '';
                        if ($link) {
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';

                            //are we on this page?
                            if ($link_url == $cur_url) {
                                $link_class = 'active';
                            }
                        }

                        $list_out .= '<li class="' . $link_class . '">' . esc_html($item['title']) . '</li>';
                        $detail_out .= '<div class="detail-wrapper ' . $link_class . '"><div class="detail-img">' . $img . '</div><div class="detail-text">'
                            . '<p class="eyebrow no-underline">' . sprintf("%02d", $n) . ' ' . esc_html($item['title']) . '</p>'
                            . '<p>' . esc_html($item['text']) . '</p>';
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            $detail_out .= '<a class="link-btn" href="'
                                . esc_url($link_url)
                                . '" target="'
                                . esc_attr($link_target)
                                . '"><span class="text">'
                                . esc_html($link_title)
                                . '</span><span class="link-btn__icon">' . $icon . '</span></a>';

                        endif;
                        $detail_out .= '</div></div>';
                        $n++;
                    endforeach;
                    echo '<ol>' . $list_out . '</ol>';
                    ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 list-details">
                <?php echo $detail_out; ?>
            </div>
        </div>
    </div>
</div>

<!--END BLOCK INTERACTIVE LIST-->