<!--The header starts here  -->
<?php get_header(); global $zbench_options; ?>
<section id="content">

<!--Header ends here -->

&nbsp;
<?php if(is_archive()) : ?>
	<?php $archive_title=''; if($paged && $paged > 1) $archive_title='<span class="page-title-paged"> - '.sprintf(__('Page %s','zbench'),$paged).'</span>'; ?>
	<div class="info-box">
		<?php if ( is_day() ) : ?>
			<h1><?php printf((__('Daily Archives:', 'zbench').' <span>%s</span>'),get_the_time(get_option('date_format')).$archive_title); ?></h1>
		<?php elseif ( is_month() ) : ?>
			<h1><?php printf((__('Monthly Archives:', 'zbench').' <span>%s</span>'),get_the_time('F Y').$archive_title); ?></h1>
		<?php elseif ( is_year() ) : ?>
			<h1><?php printf((__('Yearly Archives:', 'zbench').' <span>%s</span>'),get_the_time('Y').$archive_title); ?></h1>
		<?php elseif ( is_category() ) : ?>
			<h1><?php printf((__('Category Archives:', 'zbench').' <span>%s</span>'),single_cat_title('',false).$archive_title); ?></h1>
		<?php elseif ( is_tag() ) : ?>
			<h1><?php printf((__('Tag Archives:', 'zbench').' <span>%s</span>'),single_tag_title('',false).$archive_title); ?></h1>
		<?php elseif ( is_author() ) : ?>
			<?php the_post(); ?>
			&nbsp;
			<div class="h1">
			&nbsp;
    			<h1><?php $author_name = get_the_author(); printf((__('Author Archives:', 'zbench').' <span>%s</span>'),$author_name.$archive_title); ?></h1>
				&nbsp;
			    <?php echo get_avatar($post->post_author,$size='100',$default='' ); ?>
				&nbsp;
    			<p><?php $authorInfo = get_the_author_meta('description'); print_r($authorInfo); ?></p>
				&nbsp;
    			<?php $author_url = get_the_author_meta('url'); if($author_url) { ?>
				&nbsp;
    			    <p><?php printf('<a href="%s">Visit %s\'s homepage</a>', $author_url, $author_name); ?></p>
					
    			<?php } ?>
				&nbsp;
    		</div>
			&nbsp;
	    		<?php rewind_posts(); ?>
		<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
			<h1><?php _e('Blog Archives', 'zbench'); ?></h1>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if (have_posts()) : ?>
	<?php if (is_search()) { ?>
	<div class="page-title">
		<h1>
			<?php $archive_title=''; if($paged && $paged > 1) $archive_title='<span class="page-title-paged"> - '.sprintf(__('Page %s','zbench'),$paged).'</span>'; ?>
			<?php _e('Search Results for:','zbench'); ?> <?php echo get_search_query(),$archive_title; ?>
		</h1>
	</div>
	<?php } ?>
	<?php while (have_posts()) : the_post();?>
    <article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
        <header class="meta">
		&nbsp;
            <div class="post-info">
                <span class="by">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( __( 'View all posts by %s', 'zbench' ), get_the_author() ) ?>" rel="author"><?php the_author(); ?></a> on <?php the_time(get_option( 'date_format' )); ?>
                <?php edit_post_link(__('Edit','zbench'), '[', ']'); ?></span>
                <a href="<?php comments_link(); ?>" class="comment-link">Leave a comment<?php if(function_exists('the_views')) { echo " | ";the_views(); } ?></a>
            </div>
        </header>
		&nbsp;
        <div class="content">
            <h2 class="title<?php if(is_sticky()) {echo " sticky-h2";} ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry">
	        	<?php if ( $zbench_options['excerpt_check']=='true' ) { the_excerpt(__('Read more &raquo;','zbench')); } else { the_content(__('Read more &raquo;','zbench')); } ?>
            </div>
			<?php if(is_sticky()) { ?>
                <div class="entry"><p><?php _e('This is a sticky post!', 'zbench'); ?> <a href="<?php the_permalink(); ?>" class="more-links"><?php _e('continue reading?', 'zbench'); ?></a></p></div>
            <?php } ?>
        </div>
        <footer>
            <div class="category">Filed under: <?php the_category(', '); ?></div>
            <div class="tags"><?php the_tags('Tagged with: ', ', ', ''); ?></div>
        </footer>
    </article>
	<?php endwhile; ?>
<?php else: ?>
	<div class="post post-single">
		<h2 class="title title-single">Nothing found!</h2>
		<div class="post-info-top" style="height:1px;"></div>
		<div class="entry">
			<p>No post could be found for your search. Please modify your search terms or filter.</p>
			<h3><?php _e('Random Posts', 'zbench'); ?></h3>
			<ul>
				<?php
					$rand_posts = get_posts('numberposts=5&orderby=rand');
					foreach( $rand_posts as $post ) :
				?>
			
				<li><a href="<?php the_permalink(); ?>" title="Read the rest of <?php the_title(); ?>" class="more-link">Read the rest of this entry »</a></li>
				<?php endforeach; ?>
			</ul>
			<h3><?php _e('Tag Cloud', 'zbench'); ?></h3>
			<?php wp_tag_cloud('smallest=9&largest=22&unit=pt&number=200&format=flat&orderby=name&order=ASC');?>
		</div><!--entry-->
	</div><!--post-->
<?php endif; ?>

<?php
if(function_exists('wp_page_numbers')) {
	wp_page_numbers();
}
elseif(function_exists('wp_pagenavi')) {
	wp_pagenavi();
} else {
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;
	if ( $total_pages > 1 ) {
		echo '<div id="pagination">';
			posts_nav_link(' | ', __('&laquo; Previous page','zbench'), __('Next page &raquo;','zbench'));
		echo '</div>';
	}
}
?>
</section>
<!--Leftside bar starts here -->
<?php get_sidebar(); ?>
<!--Left side bar ends here -->

<!--Footer starts here -->
<?php get_footer(); ?>
<!--Footer Ends here -->
