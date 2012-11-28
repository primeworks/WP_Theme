<?php 
echo "What goin on?";



// Add new post type for Photos
add_action('init', 'chataway_photos_init');
function chataway_Photos_init() 
{
	$photo_labels = array(
		'name' => _x('Photos', 'post type general name'),
		'singular_name' => _x('Photo', 'post type singular name'),
		'all_items' => __('All Photos'),
		'add_new' => _x('Add new photo', 'photos'),
		'add_new_item' => __('Add new photo'),
		'edit_item' => __('Edit photo'),
		'new_item' => __('New photo'),
		'view_item' => __('View photo'),
		'search_items' => __('Search in photos'),
		'not_found' =>  __('No photos found'),
		'not_found_in_trash' => __('No photos found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $photo_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'photos'
	); 
	register_post_type('photos',$args);
}

// Add new post type for Videos
add_action('init', 'chataway_videos_init');
function chataway_videos_init() 
{
	$video_labels = array(
		'name' => _x('Videos', 'post type general name'),
		'singular_name' => _x('Video', 'post type singular name'),
		'all_items' => __('All Videos'),
		'add_new' => _x('Add new video', 'videos'),
		'add_new_item' => __('Add new video'),
		'edit_item' => __('Edit video'),
		'new_item' => __('New video'),
		'view_item' => __('View video'),
		'search_items' => __('Search in videos'),
		'not_found' =>  __('No videos found'),
		'not_found_in_trash' => __('No videos found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $video_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'videos'
	); 
	register_post_type('videos',$args);
}
// Add new Custom Post Type icons
add_action( 'admin_head', 'chataway_icons' );
function chataway_icons() {
?>
	<style type="text/css" media="screen">
		
		#menu-posts-photos .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/photosmall.png) no-repeat 6px !important;
		}
		.icon32-posts-photos {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/photo.png) no-repeat !important;
		}
		#menu-posts-videos .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/videosmall.png) no-repeat 6px !important;
		}
		.icon32-posts-videos {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/video.png) no-repeat !important;
		}

    </style>
<?php } 

?>