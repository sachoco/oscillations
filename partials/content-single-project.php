<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>
	<article class="project" data-bg="<?php echo esc_url($featured_img_url); ?>">
		<div class="article-body-wrapper">

			<h1><?php the_title( ); ?></h1>
			<div class="artist"><?php the_field("artist"); ?> <?php the_field("year"); ?></div>

		</div>
	  	<?php 
		$images = get_field('gallery');
		$size = 'gallery-crop'; // (thumbnail, medium, large, full or custom size)
		// var_dump($images);
		if( $images ): ?>
		<div class="slider">
			  <div class="main-slick">
		        <?php foreach( $images as $image ):  ?>
				    <div>
				    	<div>
				    		<?php echo wp_get_attachment_image( $image[id], $size ); ?>
				    	</div>
				    </div>
		        <?php endforeach; ?>
		    </div>
		</div>
		<?php endif; ?>

		<div class="article-body-wrapper">
			<div class="credit"><?php the_field("credit"); ?></div>
			<div class="primary">
				<?php the_content(); ?>
			</div>
			

		</div>
	</article>
