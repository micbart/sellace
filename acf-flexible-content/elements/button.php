<?php
/**
 * @param array $button
 * 
 */

 if(empty($button['button'])) {
    return;
 }

 ?>
 <a href="<?php echo esc_url($button['button']['url']); ?>" 
    title="<?php echo esc_attr($button['button']['title']); ?>" 
    target="<?php echo $button['button']['target'] ?: '_self';  ?>"
    class="<?php echo $button['style_button']; ?>">
    <?php echo esc_attr($button['button']['title']); ?>
 </a>