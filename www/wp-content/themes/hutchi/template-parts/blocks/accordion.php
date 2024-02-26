<?php
$image = get_field('image');
$image = $image ? wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'img-fluid']) : '';
//or get the url:
// $image['url']
$text = get_field('text');
$items = get_field('items');
?>

<!--BEGIN BLOCK ACCORDION-->
<div class="accordion-wrapper theme theme-black">
    <div class="container-fluid g-0">
        <div class="row align-items-center g-0">
            <div class="col-12 col-lg-6 col-media p-0">
                <?php echo $image; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="col-content">
                    <?php echo $text; //wysiwyg ?>
                    <div class="accordion accordion-flush" id="accordionExample">
                        <?php
                        $i = 1;
                        foreach ($items as $item): ?>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-<?php echo $i; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-<?php echo $i; ?>" aria-expanded="true"
                                            aria-controls="collapse-<?php echo $i; ?>">
                                        <span class="counter"><?php echo sprintf("%02d", $i); ?>&nbsp;</span><?php echo strtoupper(esc_html($item['title'])); ?>
                                    </button>
                                </h2>
                                <div id="collapse-<?php echo $i; ?>" class="accordion-collapse collapse"
                                     aria-labelledby="heading-<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php echo esc_html($item['text']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END BLOCK ACCORDION-->