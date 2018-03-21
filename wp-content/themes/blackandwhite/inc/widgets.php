<?php
class trueTopPostsWidget extends WP_Widget {
    /*
     * создание виджета
     */
    function __construct() {
        parent::__construct(
            'true_top_widget', 
            'Последние 3 поста', // заголовок виджета
            array( 'description' => 'Позволяет вывести 3 последних поста' ) // описание
        );
    } 
    /*
     * фронтэнд виджета
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
        echo $args['before_widget'];
         if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        $q = new WP_Query("posts_per_page=3");
        if( $q->have_posts() ):
            ?>
	<ul>
		<?php
            while( $q->have_posts() ): $q->the_post();
                ?>
			<li>
				<a href="<?php the_permalink() ?>">
					<?php the_title() ?>
				</a>
			</li>
			<?php
            endwhile;
            ?>
	</ul>
	<?php
        endif;
        wp_reset_postdata();
 
        echo $args['after_widget'];
    } 
    /*
     * бэкэнд виджета
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
    }
    /*
     * сохранение настроек виджета
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} 
/*
 * регистрация виджета
 */
function true_top_posts_widget_load() {
    register_widget( 'trueTopPostsWidget' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );


class authorWidget extends WP_Widget {
    /*
     * создание виджета
     */
    function __construct() {
        parent::__construct(
            'true_footer_widget', 
            'Авторы книг', // заголовок виджета
            array( 'description' => 'Позволяет вывести авторов книг со ссылками' ) // описание
        );
    } 
    /*
     * фронтэнд виджета
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
        echo $args['before_widget'];
         if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
			global $wpdb;
			$querystr = "
				SELECT DISTINCT meta_value 
				FROM $wpdb->postmeta 
				WHERE meta_key LIKE 'authors_meta_name' 
				ORDER BY meta_value ASC
			";
			$authors = $wpdb->get_results( $querystr, OBJECT );
			if ( ! $authors ) {
				$wpdb->print_error();
			}
			else {
			foreach($authors as $author ){ ?>
				<a href="<?php echo get_site_url() ."/?authormeta=". $author->meta_value; ?>" class=""><?php echo $author->meta_value; ?></a>
				<br>
				<?php }
			}
			echo $args['after_widget'];
		} 
    /*
     * бэкэнд виджета
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
    }
    /*
     * сохранение настроек виджета
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} 
/*
 * регистрация виджета
 */
function author_widget_load() {
    register_widget( 'authorWidget' );
}
add_action( 'widgets_init', 'author_widget_load' );


class authorAjaxWidget extends WP_Widget {
    /*
     * создание виджета
     */
    function __construct() {
        parent::__construct(
            'true_footer_widget_ajax', 
            'Авторы книг Подгрузка AJAX', // заголовок виджета
            array( 'description' => 'Позволяет вывести авторов книг со ссылками, при помощи AJAX' ) // описание
        );
    } 
    /*
     * фронтэнд виджета
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
        echo $args['before_widget'];
         if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
			global $wpdb;
			$querystr = "
				SELECT DISTINCT meta_value 
				FROM $wpdb->postmeta 
				WHERE meta_key LIKE 'authors_meta_name' 
				ORDER BY meta_value ASC
			";
			$authors = $wpdb->get_results( $querystr, OBJECT );
			if ( ! $authors ) {
				$wpdb->print_error();
			}
			else { ?>
				 <div class="ajax"> <?php
			foreach($authors as $author ){ ?>
			
				<a href="#" data-author="<?php echo $author->meta_value; ?>" class=""><?php echo $author->meta_value; ?></a>
				<br>
				<?php } ?>
				</div>
				<?php
			}
			echo $args['after_widget'];
		} 
    /*
     * бэкэнд виджета
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
    }
    /*
     * сохранение настроек виджета
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} 
/*
 * регистрация виджета
 */
function author_ajax_widget_load() {
    register_widget( 'authorAjaxWidget' );
}
add_action( 'widgets_init', 'author_ajax_widget_load' );
?>