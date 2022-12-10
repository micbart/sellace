<?php

use Sellace\App\Acf\Blocks\Hero;

$fields = (new Hero())->getFields();

?>

<section class="hero<?php if($fields['sectionOffset']) echo ' offset'; ?>">
    <div class="container">
        <div class="flex flex-wrap flex-alings-center">
            <div class="flex-12 flex-sm-6 <?php if($fields['image']['position'] == 'left') echo 'order-2'; ?>">
                <?php 
                    if(isset($fields['title']['titleContent'])) {
                        echo '<' . $fields['title']['style'] . ' class="hero--title">' . $fields['title']['titleContent'] . '</' . $fields['title']['style'] . '>';
                    }

                    if(isset($fields['content'])) {
                        echo '<p class="hero--content">' . $fields['content'] . '</p>';
                    }

                    if(!empty($fields['buttons'])) {
                        echo '<div class="hero__buttons">';
                            foreach ($fields['buttons'] as $button) {
                                require get_template_directory() . '/acf-flexible-content/elements/button.php';
                            }
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="flex-12 flex-sm-6 <?php if($fields['image']['position'] == 'left') echo 'order-1'; ?>">
                <div class="hero__image">
                    <?php 
                        if(isset($fields['image']['id'])) {
                            echo wp_get_attachment_image($fields['image']['id'], 'full');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>