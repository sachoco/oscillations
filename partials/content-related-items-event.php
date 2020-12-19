<div class="related-items-inner">
<?php $related_artists = get_field('artists');
	if( $related_artists ): ?>
	<div class="section-title">related artist</div>
	<div class="slider">
		<div class="slick left-align-slick">
		<?php foreach( $related_artists as $item ):
			echo format_related_item($item);
		endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

<?php $related_projects = get_field('projects');
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
