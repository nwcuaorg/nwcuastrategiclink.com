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
				<p>800.995.9064 Phone<br>
					877.928.6397 Fax<br>
					<a href="mailto:strategiclink@nwcua.org">strategiclink@nwcua.org</a></p>

				<p><strong>Oregon Office:</strong>
					13221 SW 68th Pkwy,<br>
					Suite 400<br>
					Tigard, OR 97223</p>

				<p><strong>Washington Office:</strong><br>
					18000 International Blvd,<br>
					Suite 350<br>
					Seattle, WA 98188</p>
			</div>
			<div class="column">
				<h3>Links</h3>
				<nav role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer-links', 
						'menu_class' => 'nav-menu' ) 
					); ?>
				</nav>
				<div class="social">
					<a href="https://twitter.com/NWStrategicLink" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-twitter.png"></a>
					<a href="https://www.facebook.com/nwcuastrategiclink" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-facebook.png"></a>
				</div>
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
</body>
</html>