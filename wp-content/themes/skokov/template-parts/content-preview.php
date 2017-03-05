<?php
/** Template part for displaying posts previous ...*/
?>
<li class="col-md-6 item" data-href="<?php the_permalink(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('news'); ?>>

                    <?php the_post_thumbnail(); ?>

        <div class="text-block">
            <?php
                the_title( '<h1>', '</h1>' );
             the_excerpt(); ?>

            <p class="top-info">
                <span class="fa fa-heart" aria-hidden="true"> 0</span>
                <span class="info-news">
                    <a href="<?php echo (get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" ><?php the_author();?></a> /
                    <?php comments_popup_link('No comments', '1 comment', '% comments');?> /
                    <data value="<?php the_time('Y.m.j');?> "> <?php the_time('F j, Y');?>
                </span>
            </p>

        </div><!-- .text-bloc -->
    </article><!-- #post-## -->
</li>
<?php

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skokov' ),
				'after'  => '</div>',
			) );

?>