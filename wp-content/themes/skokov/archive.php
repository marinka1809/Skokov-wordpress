<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skokov
 */


get_header(); ?>

<section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') no-repeat;">
    <?php  ?>
    <div class="container">
        <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </div>
</section>

<div class="container-fluid content">
    <div class="row">
        <main class="col-sm-8">

            <?php
            if ( have_posts() ) : ?>
                <ul class="row news-list-section" id="news-list-section" >
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'preview' );

                    endwhile;

                    the_posts_navigation();?>
                </ul>
            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>

        </main><!-- #main -->
        <?php get_sidebar(); ?>

    </div><!-- #row -->
</div><!-- #container-fluid -->

<?php
get_footer();
