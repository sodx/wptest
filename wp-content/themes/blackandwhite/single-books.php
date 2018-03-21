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
		
		
		<?php comments_template(); ?>
	</div>
<?php get_footer(); ?>
