<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sellace
 */

use Sellace\App\Helpers\Footer;

$footer = Footer::footer();

if(!empty($footer)) {
	?>
		<footer id="colophon" class="site-footer">
			<div class="container">
				<div class="footer__top flex flex-wrap flex-justify-between flex-alings-end">
					<div class="footer__block flex-12 flex-sm-6">
						<?php 
							if(isset($footer['footerFields']['display_logo'])) {
								?>
									<div class="site-branding-footer">
										<a href="<?php esc_url(get_site_url()); ?>" rel="home" aria-current="page">
											<?php echo get_custom_logo() ?>
										</a>
									</div>
								<?php
							}

							if(isset($footer['footerFields']['footer_content'])) {
								?>
									<p class="footer--text top"><?php echo $footer['footerFields']['footer_content']; ?></p>
								<?php
							}
						?>
					</div>

					<div class="footer__block flex-12 flex-sm-6">
						<?php echo $footer['footerMenu']; ?>
					</div>
				</div>

				<div class="footer__bottom flex flex-wrap flex-justify-between flex-alings-end">
					<div class="footer__block flex-12 flex-sm-5">
						<span class="footer--text d-block d-sm-inline-block"><?php echo $footer['copyrights']; ?></span>
						<?php 
							if(get_privacy_policy_url()) {
								?> <a href="<?php get_privacy_policy_url(); ?>" title="<?php echo __('Privacy policy', 'sellace'); ?>" class="footer-policy"> 
									<?php echo __('Privacy policy', 'sellace'); ?>
								</a> <?php 
							}
						?>
					</div>

					<div class="footer__block flex-12 flex-sm-7">
						<?php if (isset($footer['footerFields']['copyrights_content'])) { ?>
							<p class="footer--text bottom"><?php echo $footer['footerFields']['copyrights_content']; ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	<?php
}

?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
