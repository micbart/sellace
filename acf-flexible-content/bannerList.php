<?php

use Sellace\App\Acf\Blocks\BannerList;

$fields = (new BannerList())->getFields();
?>

<section class="banner-list">
    <div class="container">
        <div class="flex flex-wrap flex-alings-center">
            <div class="flex-12 flex-sm-6 <?php if($fields['image']['position'] == 'left') echo 'order-sm-2'; ?>">
                <?php 
                    if(isset($fields['title']['titleContent'])) {
                        echo '<' . $fields['title']['style'] . ' class="banner-list--title">' . $fields['title']['titleContent'] . '</' . $fields['title']['style'] . '>';
                    }

                    if(!empty($fields['list'])) {
                        echo '<ul class="check-list">';
                            foreach ($fields['list'] as $item) {
                                if(isset($item['list_item'])) {
                                    echo '<li>' . $item['list_item'] . '</li>';
                                }
                            }
                        echo '</ul>';
                    }

                    if(!empty($fields['buttons'])) {
                        echo '<div class="banner-list__buttons">';
                            foreach ($fields['buttons'] as $button) {
                                require get_template_directory() . '/acf-flexible-content/elements/button.php';
                            }
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="flex-12 flex-sm-6 <?php if($fields['image']['position'] == 'left') echo 'order-sm-1'; ?>">
                <div class="banner-list__image">
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