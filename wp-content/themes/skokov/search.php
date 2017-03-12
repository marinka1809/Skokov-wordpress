<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Skokov
 */

get_header(); ?>

    <section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') no-repeat;">
        <?php  ?>
        <div class="container">
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'skokov' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', 'preview' );

                            endwhile; ?>
                        </ul>
                        <?php the_posts_navigation(); ?>

                    <?php else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif; ?>

            </main><!-- #main -->
            <?php get_sidebar(); ?>
    </div><!-- #row -->
    </div><!-- #container-fluid -->

<?php
get_footer();
