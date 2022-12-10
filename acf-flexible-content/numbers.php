<?php

use Sellace\App\Acf\Blocks\Numbers;

$fields = (new Numbers())->getFields();
$button = $fields['button'];
?>

<section class="numbers">
    <div class="container">
        <div class="flex flex-wrap">
            <?php 
                if(!empty($fields['numbers'])) { 
                    foreach ($fields['numbers'] as $number) {
                        ?>
                            <div class="flex-12 <?php echo $fields['grid']; ?>">
                                <div class="numbers__item">
                                    <?php 
                                        if(isset($number['number'])) {
                                            echo '<h4 class="numbers__item--number">' . $number['number'] . '</h4>';
                                        }

                                        if(isset($number['description'])) {
                                            echo '<p class="numbers__item--desc">' . $number['description'] . '</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>

            <div class="flex-12">
                <?php
                    if(!empty($button)) {
                        echo '<div class="numbers__button">';
                            require get_template_directory() . '/acf-flexible-content/elements/button.php';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>