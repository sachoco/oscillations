<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
<div class="item" >
	<div class="item-inner" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
		<div class="item-content-wrapper" >
			<div class="item-content">
				<div class="info-container">
					<div class="date"><span class="stdview"><?php the_date(); ?></span><span class="listview"><?php echo oscillations_date_format($post, "list"); ?></span></div>
					<div class="title">
						<?php the_title(); ?>
					</div>
					<div class="media-type">Media type</div>
					<div class="more-info">
						<a href="<?php the_permalink(); ?>"><button class="view">view</button></a>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>


