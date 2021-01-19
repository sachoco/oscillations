@layout('layout.master')

@section('content')
	@if (!have_posts())
		<div class="alert alert-warning">
			<?php _e( 'Sorry, no results were found.', 'oscillations' ); ?>
		</div>
	@else

	  	@section('before_content')
		<div class="view-switcher <?php if($_COOKIE["listview"]){ echo 'on';} ?>">
			<button class="listview-toggle" >View as list</button>
			<button class="close" ><span class="cross-icon"></span>Close list</button>
		</div>
		<section class="header"><h1><?php echo get_plural_name(get_post_type()); ?></h1></section>
		@endsection

		@if (get_post_type()!="event")

			@while (have_posts())
			<?php the_post(); ?>
				@include('partials.content-'.get_post_type())
			@endwhile

		@else
			@include('partials.content-archive-event')

		@endif
	@endif
@endsection
