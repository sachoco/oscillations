@layout('layout.master')

	<?php
	    $args = array(
	        'post_type' => 'artist',
	        'post_state' => 'publish',
	        'posts_per_page' => -1,
        );
    	$the_query = new WP_Query( $args );
    ?>
	@section('before_main')
	<section class="intro panel" data-color="#FDF4EF">
		<div class="intro-item " >
			<div class="item-content">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-text.svg">
			</div>
		</div>
		<div class="social-media">
			<a href="https://www.instagram.com/oscillations_eu/" target="_blank"><span class="icon-instagram-home"></span></a>
		</div>
	</section>
	@endsection
	@section('content')
		@if (!$the_query->have_posts())
			<div class="alert alert-warning">
				<?php _e( 'Sorry, no results were found.', 'oscillations' ); ?>
			</div>
		@else

		  @section('before_content')
			<div class="view-switcher <?php if($_COOKIE["listview"]){ echo 'on';} ?>">
				<button class="listview-toggle" >View as list</button>
				<button class="close" ><span class="cross-icon"></span>Close list</button>
			</div>
			@endsection


			@while ($the_query->have_posts())
			<?php $the_query->the_post(); ?>
				@include('partials.content-'.get_post_type())
			@endwhile

		@endif
	@endsection
