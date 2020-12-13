@layout('layout.master')
<?php add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 ); ?>

@section('content')
	@if (!have_posts())
		<div class="alert alert-warning">
			<?php _e( 'Sorry, no results were found.', 'oscillations' ); ?>
		</div>
	@else
		@while (have_posts()) 
		<?php the_post(); ?>
			@include('partials.content-single-'.get_post_type())
		@endwhile

				<?php 
					$plural_name;
					switch (get_post_type()) {
					    case "artist":
					        $plural_name = "artists";
					        break;
					    case "project":
					        $plural_name = "projects";
					        break;
					    case "event":
					        $plural_name = "events";
					        break;
					    case "post":
					        $plural_name = "media";
					        break;
					}
				?>

		@if (get_post_type()!="event"&&get_post_type()!="post")
			@section('before_content')
			<div class="back-navigation">
				<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
					<button class="back" ><span class="cross-icon"></span>Back to <?php echo $plural_name; ?></button>	
				</a>
			</div>
			@endsection
		@else
			@section('end_related_items')
			<div class="back-navigation">
				<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
					<button class="back" ></span>Back to <?php echo $plural_name; ?></button>	
				</a>
			</div>
			@endsection	
		@endif
		@section('related_items')
			@include('partials.content-related-items-'.get_post_type())
		@endsection
		@section('after_content')
		<div class="footerspacer"></div>
		@endsection		



		@section('after_main')
		<section class="footer-nav">
			<div class="footer-nav-content">
				<?php 
					$meta_info = "";
					$meta_info = '<div class="meta">'.oscillations_date_format($post).'</div>';

					if( get_adjacent_post(false, '', false) ) { 
						next_post_link( '<div class="header">NEXT '.get_post_type().'</div> %link '.$meta_info.'<div class="arrow"><span class="icon-arrow"></span></div>', '%title' );
					} else { 
						$last = new WP_Query('post_type='.get_post_type().'&posts_per_page=1&order=DESC'); $last->the_post();
					    	echo '<div class="header">next '.get_post_type().'</div><a href="' . get_permalink() . '">'.get_the_title().'</a>'.$meta_info.'<div class="arrow"><span class="icon-arrow"></span></div>';
					    wp_reset_query();
					}; 
				?>
			</div>
		</section>
		@endsection

	@endif
@endsection