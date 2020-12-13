@layout('layout.master')

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

		<?php $slug = get_post_field( 'post_name', get_post() ); ?>
		@if ($slug == "about-us")
			@include('partials.content-about-us-partners')
		@endif

	@endif
@endsection