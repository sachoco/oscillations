
			<div class="item event" >
				<div class="item-content-wrapper">
					<div class="item-content">
						<div class="info-container">
							<div class="thumbnail"><?php the_post_thumbnail("medium-crop"); ?></div>
							<div class="date"><span class="stdview"><?php echo oscillations_date_format($post); ?></span><span class="listview"><?php echo oscillations_date_format($post,"list"); ?></span></div>
							<div class="title">
								<?php the_title(); ?>
							</div>
							<div class="meta">
								<div class="place meta-item"><?php the_field("venue"); ?></div>
								<div class="city meta-item"><?php the_field("city"); ?></div>
							</div>
							<div class="more-info">
								<a href="<?php the_permalink(); ?>"><button class="view-more">More info</button></a>
							</div>	
						</div>
					</div>
				</div>
			</div>
