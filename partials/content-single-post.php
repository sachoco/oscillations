	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

<article class="media">
	<div class="article-header" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
		<div class="article-header-inner">
		<div class="date"><?php the_date(); ?></div>
		<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="article-body-wrapper">
		<!-- <h1><?php the_title(); ?></h1> -->
		<?php the_content(); ?>
	</div>
  	<?php 
	$images = get_field('gallery');
	$size = 'gallery-crop '; // (thumbnail, medium, large, full or custom size)
	// var_dump($images);
	if( $images ): ?>
	<div class="slider">
		  <div class="project-main-slick">
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
			
		<h1>About Ejtech</h1>
		<p>
Under the label EJTECH, Esteban de la Torre and Judit Eszter Kárpáti combine their know-how. Esteban de la Torre is a media artist, sound artist. Judit Eszter Kárpáti is an interdisciplinary artist, textile artist and material researcher.
</p><p>
EJTECH /’eitech’/ is a polydisciplinary studio working with unstable media, experimental interfaces, electronic textile and augmented materials. Textile, sound, light, and space are paramount elements in their practice. EJTECH works as a tool to investigate liminal states, notions of time, and the state of presence, using technological methods as active, participatory installations or multi-sensorial performances within their self proclaimed technospiritual tradition.
		</p>

	</div>


</article>
