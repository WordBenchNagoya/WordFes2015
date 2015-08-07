<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordFes Nagoya 2015
 */
?>
	<?php include get_stylesheet_directory() . '/template-parts/suporter.php'; ?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		if ( is_single() ):
		/* シングルページ用のソーシャルボタン */
		get_template_part( 'template-parts/social', 'single' );
		else:
		/* サイト用のソーシャルボタン */
		get_template_part( 'template-parts/social' );
		endif;?>

		<div class="copyright-wrapper lato">
			<p class="copyright">Copyright &copy; WordFes Nagoya 2015 All Rights Reserved.</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>