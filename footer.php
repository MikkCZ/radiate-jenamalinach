<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

		</div><!-- .inner-wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
<?php /*
			<div class="cf-scheme-switch">
				<?php // CloudFlare HTTP/HTTPS
					if ( isset( $_SERVER['HTTP_CF_VISITOR'] ) ) {
						$http_cf_visitor = json_decode( str_replace( '\\', '', $_SERVER['HTTP_CF_VISITOR'] ), true );
						if ( $http_cf_visitor['scheme'] == 'https' ) {
							$link_scheme = 'http';
						} else {
							$link_scheme = 'https';
						}
						printf( '<a href="%1$s://%2$s%3$s">%4$s</a>', $link_scheme, htmlspecialchars($_SERVER['SERVER_NAME']), htmlspecialchars($_SERVER['REQUEST_URI']), strtoupper($link_scheme) );
					}
				?>
			</div>
*/ ?>
			<div>
				<?php do_action( 'radiate_credits' ); ?>
				&copy; <?php echo date('Y');?> <?php bloginfo('name');?>
				<span class="sep"> | </span>
				<a href="https://wordpress.org/themes/radiate/">Radiate</a> child by <a href="http://www.mikk.cz/">Michal Stanke</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
   <a href="#masthead" id="scroll-up"><span class="genericon genericon-collapse"></span></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
