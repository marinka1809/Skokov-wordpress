<?php
/** Template part for displaying posts ...*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-header">
        <?php the_post_thumbnail('header-single-post'); ?>
        <div class="text-block">
            <?php
            the_title( '<h1 class="entry-title">', '</h1>' );


            if ( 'post' === get_post_type() ) : ?>
                <p class="top-info">
                    <span class="fa fa-heart" aria-hidden="true"> 15</span>
                    <a href="<?php echo (get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" ><?php the_author();?></a> /
                    <?php comments_popup_link('No comments', '1 comment', '% comments');?> /
                    <data value="<?php the_time('Y.m.j');?> "> <?php the_time('F j, Y');?>
                </p>
                <?php
            endif; ?>
        </div>
    </header><!-- header -->
    <div class="text-wrapper">
        <?php
        the_content( sprintf(
        /* translators: %s: Name of current post. */
            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'skokov' ), array( 'span' => array( 'class' => array() ) ) ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );
        ?>
        <div class="share-post bottom-line"><!-- static -->
            <h2>Share this post</h2>
            <ul class="fa-ul">
                <li>
                    <a href=""><i class="fa fa-li fa-facebook" aria-hidden="true"></i>15</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-li fa-google-plus" aria-hidden="true"></i>34</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-li fa-tumblr" aria-hidden="true"></i> 162</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-li fa-linkedin" aria-hidden="true"></i>7</a>
                </li>
            </ul>
        </div>
    </div>
</article><!-- #post-## -->