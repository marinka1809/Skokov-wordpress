<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skokov
 */

?>

	<footer id="footer" class="site-footer" role="contentinfo">
        <div class="container">
            <ul class="row">
                <?php if (is_active_sidebar('footer1')): ?>
                    <li class="col-sm-4 footer-col">
                    <?php dynamic_sidebar('footer1'); ?>

                    </li>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer2')): ?>
                    <li class="col-sm-4 footer-col">
                        <?php dynamic_sidebar('footer2'); ?>
                    </li>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer3')): ?>
                    <li class="col-sm-4 footer-col">
                        <?php dynamic_sidebar('footer3'); ?>
                    </li>
                <?php endif; ?>
            </ul>

		</div><!-- .container -->

        <div class="footer-bottom-block">
            <div class="container">
                <div class="wrapper">
                    <p>Copyright <?php echo date('Y'); ?> - <?php echo get_theme_mod('copyright_textbox', 'FreeForWebDesign.com'); ?> </p>
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'bottom-menu', 'menu_class' => 'bottom-nav') ); ?>
                </div>
            </div>
        </div>
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
