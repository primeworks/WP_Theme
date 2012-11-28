<?php get_header(); global $zbench_options; ?>
<section id="content">
	<?php the_post(); $nocomment_class=''; if ('open' != $post->comment_status) $nocomment_class=' post-page-nocomment'; ?>
    <article <?php post_class('post post-page'.$nocomment_class); ?> id="page-<?php the_ID(); ?>">
        <div class="content">
            <h2 class="title<?php if(is_sticky()) {echo " sticky-h2";} ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry">
	        	<?php if ( $zbench_options['excerpt_check']=='true' ) { the_excerpt(__('Read more &raquo;','zbench')); } else { the_content(__('Read more &raquo;','zbench')); } ?>
            </div>
        </div>
        <footer>
            <span class="by">Posted on <?php the_time(get_option( 'date_format' )); ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( __( 'View all posts by %s', 'zbench' ), get_the_author() ) ?>" rel="author"><?php the_author(); ?></a>
			<?php edit_post_link(__('Edit','zbench'), '[', ']'); ?></span>
        </footer>
    </article>
    <section id="comments-list">
		<?php comments_template( '', true ); ?>
    </section>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
