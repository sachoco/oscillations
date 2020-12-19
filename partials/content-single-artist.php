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
				<?php
					$events = get_posts(array(
						'post_type' => 'event',
						'meta_query' => array(
							array(
								'key' => 'artists', // name of custom field
								'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
								'compare' => 'LIKE'
							)
						)
					));
					?>
					<?php if( $events ): ?>
						<div class="title">
							Events
						</div>
						<ul class="events">
						<?php foreach( $events as $event ): ?>
							<li>
								<a href="<?php echo get_permalink( $event->ID ); ?>">
									<?php echo get_the_title( $event->ID ); ?>
								</a>
								<div class="date">
									<?php echo oscillations_date_format($event); ?>
								</div>
								<div class="meta">
									<?php
										$meta = array();
										if(get_field("venue",$event->ID)) array_push($meta, get_field("venue",$event->ID));
										if(get_field("city",$event->ID)) array_push($meta, get_field("city",$event->ID));
										echo implode(', ', $meta);
									?>
								</div>
							</li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>


					<!-- <div class="section-title">
						Media
					</div> -->

				</div>
			</div>
		</div>
	</article>
