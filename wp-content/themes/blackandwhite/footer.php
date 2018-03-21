		<div class="remodal resp" data-remodal-id="modal">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <p>
			Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin with declarative configuration and hash tracking.
		  </p>

		</div>
	  	<?php if( have_rows('locations') ): ?>
		  <div class="acf-map">
		  <?php while ( have_rows('locations') ) : the_row(); 
		  $location = get_sub_field('location');
		  ?>
		  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
		  <h4><?php the_sub_field('title'); ?></h4>
		  <p class="address"><?php echo $location['address']; ?></p>
		  <p><?php the_sub_field('description'); ?></p>
		  </div>
		  <?php endwhile; ?>
		  </div>
		  <?php endif; ?>
		  <?php if ( is_active_sidebar( 'sidebar_footer' ) ) : ?>
				<div id="true-side" class="sidebar">
					<?php dynamic_sidebar( 'sidebar_footer' ); ?>
				</div>
			<?php endif; ?>
		<?php
						if ( has_nav_menu('menubottom') ) wp_nav_menu( array('theme_location' => 'menubottom', 'menu_class' => 'nav'));
						?>
			</div>
			<!--Подвал-->
			<div class="footer">
				<p>&copy; Footer content <a href="http://psd-html-css.ru">Link footer</a></p>
			</div>
			</div>
			<!--Подключение скриптов-->
		<?php wp_footer(); ?>
	</body>
</html>