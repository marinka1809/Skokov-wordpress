<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skokov
 */

get_header();
get_template_part( 'template-parts/page-title' );
?>

<div class="container-fluid content">
    <div class="row">
        <main class="col-sm-8">
            <ul class="row news-list-section" id="news-list-section" >
                <li class="col-md-6 item">
                    <?php dynamic_sidebar('top-quote'); ?>
                </li>
            <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */
                    while ( have_posts() ) : the_post();//get_term_link( $term,
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'preview' );
                    endwhile; ?>
                </ul>
                <div class="blog-nav">
                    <?php
                    echo paginate_links();?>
                </div>

            <?php   else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>

        </main><!-- #main -->
        <?php get_sidebar();?>
    </div><!-- #row -->
</div><!-- #container-fluid -->

<?php

get_footer();