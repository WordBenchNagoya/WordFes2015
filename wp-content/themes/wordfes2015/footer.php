<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordFes Nagoya 2015
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		/* サイト用のソーシャルボタン */
		get_template_part( 'template-parts/social' ); ?>

		<div class="copyright-wrapper lato">
			<p class="copyright">Copyright &copy; WordFes Nagoya 2015 All Rights Reserved.</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>