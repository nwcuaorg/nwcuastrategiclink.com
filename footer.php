<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>	
	
		</div>

	</section>
	
	<footer class="footer">
		<div class="wrap">
			<div class="column first">
				<h3>Connect With Us</h3>
				<?php print do_shortcode( '[snippet slug="footer-address" /]' ); ?>
			</div>
			<div class="column">
				<h3>Links</h3>
				<nav role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer-links', 
						'menu_class' => 'nav-menu' ) 
					); ?>
				</nav>
			</div>
			<div class="column">
				<h3>Resources</h3>
				<nav role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer-resources', 
						'menu_class' => 'nav-menu' ) 
					); ?>
				</nav>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
(function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
vgo('setAccount', '252687469');
vgo('setTrackByDefault', true);
vgo('process');
</script>

</body>
</html>