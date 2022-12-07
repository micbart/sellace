<?php
/**
 * Template Name: Flexible content
 *
 * @package sellace
 */

use Sellace\App\AcfOptions;

get_header();
?>

	<main id="primary" class="site-main">
        <?php AcfOptions::flexibleContent(); ?>
	</main><!-- #main -->

<?php
get_footer();
