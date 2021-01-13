
			<div class="item event" >
				<div class="item-content-wrapper">
					<div class="item-content">
						<div class="info-container">
							<a href="<?php the_permalink(); ?>">
							<div class="thumbnail" onMouseOver="this.style.clipPath='<?php echo random_clip_path("event"); ?>'" onMouseOut="this.style.clipPath='polygon(0% 0, 100% 0%, 100% 100%, 0 100%)'"><?php the_post_thumbnail("medium-crop"); ?></div>
							</a>
							<div class="date">
								<span class="stdview"><?php echo oscillations_date_format($post); ?></span>
								<span class="listview"><?php echo oscillations_date_format($post,"list"); ?></span>
								<span class="listview-mobile">
									<?php echo oscillations_date_format($post,"list"); ?>
									<span><?php if(get_field("venue")) echo " / ".get_field('venue'); ?></span>
									<span><?php if(get_field("city")) echo " / ".get_field('city'); ?></span>
								</span>
							</div>
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
