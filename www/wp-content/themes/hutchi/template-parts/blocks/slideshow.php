<?php
$images = get_field('images');
?>

<!--BEGIN SLIDESHOW PANEL-->
<div class="slider-post-wrapper">
	<?php foreach ($images as $image): ?>
		<div class="slide-wrapper">
            <img src="<?php echo $image['image']['url']; ?>">
			<p class="caption"><?php echo $image['image']['caption']; ?></p>
		</div>
	<?php endforeach; ?>
</div>
<!--END SLIDESHOW PANEL-->