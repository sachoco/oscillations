<div class="related-items-inner">
	
<?php $related_artists = get_field('artist');
	if( $related_artists ): ?>
	<div class="section-title">related artists</div>
	<div class="slider">
		<div class="slick left-align-slick">
		<?php foreach( $related_artists as $item ):
			echo format_related_item($item);
		endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

<?php $related_projects = get_field('project');
	if( $related_projects ): ?>
	<div class="section-title">related projects</div>
	<div class="slider">
		<div class="slick left-align-slick">
		<?php foreach( $related_projects as $item ):
			echo format_related_item($item);
		endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php $related_events = get_posts(array(
		'post_type' => 'event',
		'meta_query' => array(
			array(
				'key' => 'media', // name of custom field
				'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	));
	if( $related_events ): ?>
	<div class="section-title">related events</div>
	<div class="slider">
		<div class="slick left-align-slick">
		<?php foreach( $related_events as $item ):
			echo format_related_item($item);
		endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

<?php	$related_media_posts = get_field('media');
	if( $related_media_posts ): ?>
	<div class="section-title">related media posts</div>
	<div class="slider">
		<div class="slick left-align-slick">
		<?php foreach( $related_media_posts as $item ):
			echo format_related_item($item);
		endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

</div>
