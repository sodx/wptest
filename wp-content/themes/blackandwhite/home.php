<?php
/*
Template Name: Page-home
*/
?>
	<?php get_header(); ?>
	<div class="main <?php if ( is_active_sidebar( 'sidebar_right' ) ) { echo 'with-sidebar'; }?>">

		<?php
				if (get_query_var('authormeta')) {
					?>
					<div class="posts loop">
					<?php
					//Method with loop//
					 $loop = new WP_Query( array( 
				    	'post_type' => 'books',
						 'meta_query' => array(
							   array(
								   'key' => 'authors_meta_name',
								   'value' => $authormeta,
								   'compare' => '=',
							   )
						   ),
				    	'posts_per_page' => -1) );
					  if ( $loop->have_posts() ) :
				        while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="post">
							<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
							<a href="<?php echo get_permalink(); ?>" class="post__title">
								<?php echo the_title(); ?>
							</a>

							<div class="post__desc">
								<?php echo get_the_excerpt($post); ?>
							</div>
						</div>
					<br>
					<?php
				         endwhile;
				    endif;
				    wp_reset_postdata();
					
					
					
					
					//Method with wpdb//
					/*
					global $wpdb;
						$querystr = "
							SELECT DISTINCT post_id
							FROM $wpdb->postmeta 
							WHERE meta_value LIKE '$authormeta'
							ORDER BY post_id ASC
						";
						$authors = $wpdb->get_results( $querystr, OBJECT );
						if ( ! $authors ) {
							$wpdb->print_error();
							echo 'error';
						}
						else {
						foreach($authors as $author ){ 
							$post   = get_post( $author->post_id ); 
							$title = $post->post_title; 
							?>
					<?php echo $title ?>
				<?php }
						}
						*/
					?> </div> <?php
				}
					
				   else { ?>

				<div class="posts loop">
					<?php
				$args = array('post_per_page' => 5);
				$myposts = get_posts( $args );
				foreach( $myposts as $post ){ setup_postdata($post); ?>
						<div class="post">
							<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
							<a href="<?php echo get_permalink(); ?>" class="post__title">
								<?php echo the_title(); ?>
							</a>

							<div class="post__desc">
								<?php echo get_the_excerpt($post); ?>
							</div>
						</div>
						<?php }
				wp_reset_postdata();
			?>
						<?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
						<div <?php post_class(); ?> id="post-
							<?php the_ID(); ?>">
							<h1>
								<?php the_title(); ?>
							</h1>
							<?php the_content(); ?>
						</div>
						<?php } /* конец while */ 
		} // конец if
		else 
		echo "<h2>Записей нет.</h2>"; ?>

				</div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'sidebar_right' ) ) : ?>
				<div id="true-side" class="sidebar">
					<?php dynamic_sidebar( 'sidebar_right' ); ?>
				</div>
				<?php endif; ?>
				
	</div>

	<?php get_footer(); ?>