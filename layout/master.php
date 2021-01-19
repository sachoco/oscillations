<!doctype html>
<html <?php language_attributes(); ?>>
  @include('partials.head')
  <body <?php body_class() ?>>

  	@include('partials.header')

  	@yield('before_main')

  	<section class="main">
		@yield('before_content')
			<section class="content <?php if($_COOKIE["listview"]){ echo 'list-view';} ?>">
			@yield('content')
			</section>
			<section class="related-items">
			@yield('related_items')
			@yield('end_related_items')
			</section>
		@yield('after_content')
	</section>

	@yield('after_main')

    @include('partials.footer')
    <?php wp_footer() ?>
  </body>
</html>
