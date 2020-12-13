 <?php
 	$today = date( 'Ymd' );
    $args = array(
        'post_type' => 'event',
        'post_state' => 'publish',
        'meta_key' => 'date_start',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'meta_query' => array(
        	'relation' => 'OR',
        	array(
                 'relation' => 'AND',
                array(
                    'key' => 'date_start',
                    'value' => $today,
                    'type' => 'NUMERIC',
                    'compare' => '='
                ),
                array(
                    'key' => 'date_end',
                    'value'   => false,
                    'type' => 'BOOLEAN'
                )                   	
        	),
			array(
                'relation' => 'AND',
                array(
                    'key' => 'date_start',
                    'value' => $today,
                    'type' => 'NUMERIC',
                    'compare' => '<='
                ),
                array(
                    'key' => 'date_end',
                    'value' => $today,
                    'type' => 'NUMERIC',
                    'compare' => '>='
                )
            )
        )
    );

    $the_query = new WP_Query( $args );
    ?>
	
	<?php if ($the_query->have_posts()) : ?>
	<div class="section-header">Current events</div>
	<div class="section-wrapper sticky">
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			@include('partials.content-'.get_post_type())
	<?php endwhile; ?>
	</div>
	<?php endif; wp_reset_query();?>
	<?php
    	$args["meta_query"] = array(
        		'key' => 'date_start',
				'value' => $today,
				'type' => 'NUMERIC',
				'compare' => '>'
			);

    	$the_query = new WP_Query( $args );
    ?>

	<?php if ($the_query->have_posts()) : ?>
	<div class="section-header">Upcoming events</div>
	<div class="section-wrapper">
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			@include('partials.content-'.get_post_type())
	<?php endwhile; ?>
	</div>
	<?php endif; wp_reset_query();?>

	<div class="section-header">Past events</div>
	<div class="section-wrapper">
	@while (have_posts()) 
	<?php the_post(); ?>
		@include('partials.content-'.get_post_type())
	@endwhile
	</div>