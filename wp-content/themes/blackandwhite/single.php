<?php get_header(); ?>
	<div class="main">
		<?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		<?php } /* конец while */ 
		
		
		} // конец if
		else 
		echo "<h2>Записей нет.</h2>"; ?>
		<h2>Related posts</h2>
		<?php 
			$category = get_the_category(); 
			$args = array('category' => $category[0]->cat_ID);
				$myposts = get_posts( $args );
				foreach( $myposts as $post ){ setup_postdata($post); ?>
					<div class="post">
						<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?> <br>
						<a href="<?php echo get_permalink(); ?>" class="post__title"><?php echo the_title(); ?></a>

						<div class="post__desc"><?php echo get_the_excerpt($post); ?></div>
						
					</div>
				<?php }
				wp_reset_postdata();
		?>
		
		<?php comments_template(); ?>
	</div>
<?php get_footer(); ?>
