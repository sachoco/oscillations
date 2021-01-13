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
			<div class="related-events">
				<div class="left-col">
					<?php $today = date( 'Ymd' ); ?>
					<?php $current_events = get_posts(array(
						'post_type' => 'event',
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key' => 'projects',
								'value' => '"' . get_the_ID() . '"',
								'compare' => 'LIKE'
							),
							array(
			        	'relation' => 'OR',
			        	array(
			                 'relation' => 'AND',
			                array(
			                    'key' => 'date_start',
			                    'value' => $today,
			                    'type' => 'NUMERIC',
			                    'compare' => '='
			                ),
			                array(
			                    'key' => 'date_end',
			                    'value'   => false,
			                    'type' => 'BOOLEAN'
			                )
			        	),
								array(
			                'relation' => 'AND',
			                array(
			                    'key' => 'date_start',
			                    'value' => $today,
			                    'type' => 'NUMERIC',
			                    'compare' => '<='
			                ),
			                array(
			                    'key' => 'date_end',
			                    'value' => $today,
			                    'type' => 'NUMERIC',
			                    'compare' => '>='
			                )
			          )
			        )
						)
					));	if( $current_events ): ?>
						<div>Current Events</div>
						<?php foreach( $current_events as $item ):
							echo "<a href='".get_permalink( $item->ID )."'>".get_the_title( $item->ID )."<br>".get_field( "venue", $item->ID ).", ".get_field( "city", $item->ID )."<br>".oscillations_date_format($item)."</a>";
						endforeach; ?>
					<?php endif; ?>
					<?php $upcoming_events = get_posts(array(
						'post_type' => 'event',
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key' => 'projects',
								'value' => '"' . get_the_ID() . '"',
								'compare' => 'LIKE'
							),
							array(
		        		'key' => 'date_start',
								'value' => $today,
								'type' => 'NUMERIC',
								'compare' => '>'
							)
						)
					));	if( $upcoming_events ): ?>
						<div>Upcoming Events</div>
						<?php foreach( $upcoming_events as $item ):
							echo "<a href='".get_permalink( $item->ID )."'>".get_the_title( $item->ID )."<br>".get_field( "venue", $item->ID ).", ".get_field( "city", $item->ID )."<br>".oscillations_date_format($item)."</a>";
						endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="right-col">
					<?php $past_events = get_posts(array(
						'post_type' => 'event',
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key' => 'projects',
								'value' => '"' . get_the_ID() . '"',
								'compare' => 'LIKE'
							),
							array(
			        	'relation' => 'AND',
			        	array(
				            'key' => 'date_start',
				            'value' => $today,
				            'compare' => "<",
				            'type' => 'NUMERIC'
				        ),
				        array(
				            'key' => 'date_end',
				            'value' => $today,
				            'compare' => "<",
				            'type' => 'NUMERIC'
				        )
			        )
						)
					));	if( $past_events ): ?>
						<div>Past Events</div>
						<?php foreach( $past_events as $item ):
							echo "<a href='".get_permalink( $item->ID )."'>".get_the_title( $item->ID )."<br>".get_field( "venue", $item->ID ).", ".get_field( "city", $item->ID )."<br>".oscillations_date_format($item)."</a>";
						endforeach; ?>
					<?php endif; ?>
				</div>

			</div>

		</div>
	</article>
