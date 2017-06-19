		<footer class="bottom-footer">
			<div class="container">
				<div class="col-lg-12 col-md-12">
					<div class="footer-text">
						<div class="footer-logo" style="background: url('<?php echo esc_url(AfterSetupTheme::mi_return_theme_option('footerlogopic','url'));?>'); background-repeat: no-repeat; background-position: center;"></div>
						<p><?php echo esc_attr(AfterSetupTheme::mi_return_theme_option('footercopyright'));?> <a href="<?php echo esc_attr(AfterSetupTheme::mi_return_theme_option('footercopyrightaulink'));?>"><?php echo esc_attr(AfterSetupTheme::mi_return_theme_option('footercopyrightau'));?></a></p>
					</div>
				</div>
			</div>
		</footer>
		<div id="backtotop">
			<ul>
				<li><a id="toTop" href="#home" onClick="return false"><?php esc_html_e('Back to Top','reversal')?></a></li>
			</ul>
		</div>
<?php wp_footer(); ?>

</body>
</html>
