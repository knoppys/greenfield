<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );

echo '<div class="sidebar-block related"><h3 class="sidetitle">Categories</h3>';
	echo '<div>';
		foreach( $categories as $category ) {
            $category_link = sprintf( 
                '<a href="%1$s" alt="%2$s"><i class="fa fa-chevron-right"></i>  %3$s</a>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                esc_html( $category->name )
            );
            echo $category_link;
        }
	echo '</div>';
echo '</div>';

	
?>