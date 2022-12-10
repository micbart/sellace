<?php

use Sellace\App\Acf\Blocks\IconBoxes;

$fields = (new IconBoxes())->getFields();

?>

<section class="icon-boxes">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="flex-12">
                <?php
                    if(isset($fields['title']['titleContent'])) {
                        echo '<' . $fields['title']['style'] . ' class="icon-boxes--title">' . $fields['title']['titleContent'] . '</' . $fields['title']['style'] . '>';
                    }
                ?>
            </div>

            <div class="flex-12">
                <?php 
                    if(!empty($fields['icons'])) {
                        echo '<div class="icon-boxes__icons">';
                            echo '<div class="flex flex-wrap">';
                            foreach ($fields['icons'] as $iconField) {
                                ?>
                                    <div class="flex-12 <?php echo $fields['grid']; ?>">
                                        <div class="icon-boxes__item">
                                            <?php
                                                if(isset($iconField['icon'])) {
                                                    echo '<div class="icon-boxes__item--icon">' . wp_get_attachment_image($iconField['icon']) . '</div>';
                                                }

                                                if(isset($iconField['title_icon'])) {
                                                    echo '<h5 class="icon-boxes__item--title">' . $iconField['title_icon'] . '</h5>';
                                                }

                                                if(isset($iconField['desc_icon'])) {
                                                    echo '<p class="icon-boxes__item--desc">' . $iconField['desc_icon'] . '</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                            }
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>