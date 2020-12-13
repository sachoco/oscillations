	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
	<div class="item project" data-bg="<?php echo esc_url($featured_img_url); ?>" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
		<div class="item-content-wrapper">
			<div class="bg" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');"></div>
			<div class="item-content">
				<div class="thumbnail"><?php the_post_thumbnail("thumbnail-crop"); ?></div>
					<div class="title"><?php the_title( ); ?></div>
					<div class="description">Jonathan Reus 2009</div>
				<a href="<?php the_permalink(); ?>"><button class="view">view</button></a>			
			</div>
		</div>
	</div>