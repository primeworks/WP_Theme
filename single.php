<?php get_header(); global $zbench_options; ?>
&nbsp;
<section id="content">
&nbsp;
	<?php the_post(); ?>
    <article <?php post_class('post-single'); ?> id="post-<?php the_ID(); ?>">
	&nbsp;
        <header class="meta">
            <div class="post-info">
                <span class="by">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( __( 'View all posts by %s', 'zbench' ), get_the_author() ) ?>" rel="author"><?php the_author(); ?></a> on <?php the_time(get_option( 'date_format' )); ?>
                <?php edit_post_link(__('Edit','zbench'), '[', ']'); ?></span>
                <a href="<?php comments_link(); ?>" class="comment-link">Comments<?php if(function_exists('the_views')) { echo " | ";the_views(); } ?></a>
            </div>
        </header>
		&nbsp;
        <div class="content">
            <h2 class="title"><?php the_title(); ?></h2>
            <div class="entry">
				<?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page_link"><strong>' . __( 'Pages:', 'zbench' ) . '</strong>' , 'after' => '</div>' ) ); ?>
            </div>
            <div class="add-info">
                <?php if(function_exists('st_related_posts')) { st_related_posts('title=<h3>'._e('Related Posts','zbench').'</h3>'); } ?>
            </div>
        </div>
        <div id="post-prev-next">
            <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
            <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
        </div><!-- #nav-below -->
		&nbsp;
        <footer>
            <div class="category">Filed under: <?php the_category(', '); ?></div>
            <div class="tags"><?php the_tags('Tagged with: ', ', ', ''); ?></div>
        </footer>
		&nbsp;
    </article>
	
    <section id="comments-list">
		<?php comments_template( '', true ); ?>
    </section>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
