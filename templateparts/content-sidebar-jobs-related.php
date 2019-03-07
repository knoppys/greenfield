<?php $title = get_the_title($post->ID);
global $post;
$args = array(
	'post_type' => 'bullhornjoblisting',
	'post__not_in' => $post->ID,
	'meta_key' => 'city'			,
	'meta_value' => $meta['city'][0]
);
$relateds = get_posts( $args );
if ($relateds) {
	echo '<div class="sidebar-block related"><h3 class="sidetitle">Related Jobs</h3>';
		echo '<div>';
			foreach ( $relateds as $related ) : setup_postdata( $post );
				echo '<a href="'.get_the_permalink().'"><i class="fa fa-chevron-right"></i>  '.get_the_title().'</a>';
			endforeach; 
		echo '</div>';
	echo '</div>';
	wp_reset_postdata();
} 	
?>