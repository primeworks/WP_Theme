<section id="sidebar">
<?php if ( !dynamic_sidebar('primary-widget-area') ) : ?>
    <div id="sidebar-recent-posts" class="widget">
        <h3>Recent Posts</h3>
        <ul>
        	<?php
				$myposts = get_posts('numberposts=5&offset=0&category=0');
				foreach( $myposts as $post ) :
			?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
        </ul>
    </div>
    <div id="sidebar-recent-comments" class="widget">
        <h3>Recent Comments</h3>
        <ul>
        	<?php
				$comments = get_comments('numberposts=5&offset=0&category=0');
				foreach( $comments as $comment ) :
				$tPost = get_post($comment->comment_post_ID);
			?>
            <li><?php print $comment->comment_author; ?> on <a href="<?php print(get_permalink($tPost->ID)); ?>"><strong><?php print $tPost->post_title; ?></strong></a></li>
			<?php endforeach; ?>
        </ul>
    </div>
    <div id="sidebar-categories" class="widget">
        <h3>Categories</h3>
        <ul>
			<?php
                $categories = get_categories();
                
                foreach($categories as $category) {
                    $catLink    = get_category_link($category);
                    ?><li><a href="<?php print $catLink; ?>"><?php print $category->name; ?></a></li><?php
                }
            ?>
        </ul>
    </div>
    <div id="sidebar-newsletter" class="widget">
        <h3>Newsletter subscription</h3>
        <div>
            <form method="post" action="#">
                <div>
                    <input type="email" name="email" required="true" />
                    <input type="submit" value="Subscribe" />
                </div>
            </form>
        </div>
    </div>
    <div id="sidebar-events" class="widget">
        <h3>Events</h3>
        <ul>
            <li>
                <a href="#">
                    <span class="date">
                        <i>Nov</i>
                        <b>13</b>
                    </span>
                    <span class="text">
                        In eget elit. Praesent ante. Mauris est. Quisque porttitor gravinulla. Vivamus massa.
                    </span>
                    <div class="cl"></div>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="date">
                        <i>Nov</i>
                        <b>13</b>
                    </span>
                    <span class="text">
                        In eget elit. Praesent ante. Mauris est. Quisque porttitor gravinulla. Vivamus massa.
                    </span>
                    <div class="cl"></div>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="date">
                        <i>Nov</i>
                        <b>13</b>
                    </span>
                    <span class="text">
                        In eget elit. Praesent ante. Mauris est. Quisque porttitor gravinulla. Vivamus massa.
                    </span>
                    <div class="cl"></div>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="date">
                        <i>Nov</i>
                        <b>13</b>
                    </span>
                    <span class="text">
                        In eget elit. Praesent ante. Mauris est. Quisque porttitor gravinulla. Vivamus massa.
                    </span>
                    <div class="cl"></div>
                </a>
            </li>
        </ul>
        <div class="cl"></div>
    </div>
    <div id="sidebar-archives" class="widget">
        <h3>Archives</h3>
        <ul>
			<?php wp_get_archives( 'type=monthly' ); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ( is_singular() ) { if ( is_active_sidebar('singular-widget-area') ) dynamic_sidebar('singular-widget-area'); } ?>
<?php if (!is_singular()) { if ( is_active_sidebar('not-singular-widget-area') ) dynamic_sidebar('not-singular-widget-area'); } ?>
<?php if ( is_active_sidebar('footer-widget-area') ) dynamic_sidebar('footer-widget-area'); ?>
</section>
