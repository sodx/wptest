<?php
function register_theme_sidebars() {
    register_sidebar(
        array(
            'id' => 'sidebar_right',
            'name' => 'Сайдбар справа',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', 
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', 
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'id' => 'sidebar_footer',
            'name' => 'Сайдбар футер',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
	
};
add_action( 'widgets_init', 'register_theme_sidebars' );
?>