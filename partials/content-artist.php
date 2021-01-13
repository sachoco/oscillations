	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
	<div class="item artist panel" data-bg="<?php echo esc_url($featured_img_url); ?>">
		<a href="<?php the_permalink(); ?>">
		<div class="item-content-wrapper" style='clip-path:<?php echo random_clip_path(); ?>'>
			<div class="bg" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');"></div>
			<div class="item-content">
				<div class="thumbnail"><?php the_post_thumbnail("thumbnail-crop"); ?></div>
				<div class="category">artist</div>
				<div class="title"><?php the_title( ); ?></div>
				<div class="description"><?php the_excerpt(); ?></div>
				<button class="view">view</button>
			</div>
		</div>
	</a>
	</div>
