	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>

<article class="event">
	<div class="article-header" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
		<div class="article-header-inner"><div class="date"><?php echo oscillations_date_format($post); ?></div><h1><?php the_title( ); ?></h1></div>
	</div>
	<div class="article-body-wrapper">
		<div class="slider">
			  <div class="main-slick">
			    <div>
			    	<div>
			    		<div class="thumbnail"><?php the_post_thumbnail("thumbnail-crop"); ?></div>
			    	</div>
			    </div>
			  </div>
		</div>	
		<div class="flex-wrapper">
			<div class="primary">
					
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>

			</div>
			<div class="secondary">
				<div class="secondary-inner">
					<div class="date"><label>date:</label></label><?php echo oscillations_date_format($post); ?></div>
					<div class="venue"><label>venue:</label><?php echo the_field("venue"); ?></div>
					<div class="city"><label>city:</label><?php echo the_field("city"); ?></div>
					<!-- <button>More info</button> -->
				</div>
			</div>
		</div>
	  	<?php 
		$images = get_field('gallery');
		$size = 'gallery-crop '; // (thumbnail, medium, large, full or custom size)
		// var_dump($images);
		if( $images ): ?>
		<div class="slider">
			  <div class="gallery-slick">
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

		<div class="flex-wrapper">
			<div class="primary">
					
				<h1>About Ejtech</h1>
				<p>
Under the label EJTECH, Esteban de la Torre and Judit Eszter Kárpáti combine their know-how. Esteban de la Torre is a media artist, sound artist. Judit Eszter Kárpáti is an interdisciplinary artist, textile artist and material researcher.
</p><p>
EJTECH /’eitech’/ is a polydisciplinary studio working with unstable media, experimental interfaces, electronic textile and augmented materials. Textile, sound, light, and space are paramount elements in their practice. EJTECH works as a tool to investigate liminal states, notions of time, and the state of presence, using technological methods as active, participatory installations or multi-sensorial performances within their self proclaimed technospiritual tradition.
				</p>

			</div>
			<div class="secondary">
				<div class="secondary-inner">
				</div>
			</div>
		</div>
	</div>
</article>
