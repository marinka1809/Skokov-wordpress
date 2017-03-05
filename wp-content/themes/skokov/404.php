<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Skokov
 */

get_header(); ?>
    <section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') no-repeat;">
        <?php  ?>
        <div class="container">
            <h1 class="page-title">404</h1>
        </div>
    </section>

    <div class="container content">
       <main>
           <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'skokov' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'skokov' ); ?></p>


                </div><!-- .page-content -->
            </section><!-- .error-404 -->
		</main><!-- #main -->
	</div>

<?php
get_footer();
