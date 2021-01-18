<div class="related-items-inner">

	<?php $related_projects = get_posts(array(
		'post_type' => 'project',
		'meta_query' => array(
			array(
				'key' => 'related_artist', // name of custom field
				'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	));
	if( $related_projects ): ?>
	<div class="section-title">projects</div>
	<div class="slider">
		<div class="slick left-align-slick">
		<?php foreach( $related_projects as $item ):
			echo format_related_item($item);
		endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php $related_media_posts = get_posts(array(
		'post_type' => 'post',
		'meta_query' => array(
			array(
				'key' => 'artist', // name of custom field
				'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	));
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
