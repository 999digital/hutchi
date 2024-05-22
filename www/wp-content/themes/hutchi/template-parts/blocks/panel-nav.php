<?php
global $post;

$blocks = parse_blocks($post->post_content);
$panels = array_filter($blocks, function ($block) {
    return $block['blockName'] == 'acf/panel';
});
?>

<?php if (count($panels)): ?>
    <!--BEGIN BLOCK PANEL NAV-->
    <div class="block-panel-nav-bg theme theme-black">
    </div>
    <div class="block-panel-nav theme theme-black <?php echo $block['className']; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <?php
                        $n = 1;
                        foreach ($panels as $panel):
                            //titles have <br> is to force layout
                            $title = esc_html(str_ireplace('<br>', ' ', $panel['attrs']['data']['title']));
                            ?>
                            <li>
                                <a href="#panel-<?php echo $n; ?>">
                                    <span class="marker"><?php echo sprintf("%02d", $n); ?></span>
                                    <span class="text"><?php echo $title; ?></span>
                                </a>
                            </li>
                            <?php
                            $n++;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--END BLOCK PANEL NAV-->
<?php endif; ?>