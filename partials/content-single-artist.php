	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
	<article class="artist" data-bg="<?php echo esc_url($featured_img_url); ?>">
		<div class="article-header" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
			<div class="article-header-inner"><h1><?php the_title( ); ?></h1></div>
		</div>
		<div class="article-body-wrapper">
			<div class="flex-wrapper">
				<div class="primary">
					<h1>About <?php the_title( ); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="secondary">
					<div>
						Events
					</div>
					<div>
						Media
					</div>

				</div>
			</div>
		</div>
	</article>
