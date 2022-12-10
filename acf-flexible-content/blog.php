<?php 

use Sellace\App\Acf\Blocks\Blog;

$blog = new Blog;

$fields = $blog->getFields();
$query = $blog->getQuery();

?>

<section class="latest-blog">
    <div class="container">
        <div class="flex flex-wrap flex-alings-center">
            <div class="flex-12 flex-sm-8">
                <?php
                    if(isset($fields['title']['titleContent'])) {
                        echo '<' . $fields['title']['style'] . ' class="latest-blog--title">' . $fields['title']['titleContent'] . '</' . $fields['title']['style'] . '>';
                    }
                ?>
            </div>

            <div class="flex-12 flex flex-sm-4 flex-sm-justify-end">
                <?php 
                    if($fields['archiveButton'] && get_post_type_archive_link('post')) {
                        echo '<a href="' . get_post_type_archive_link('post') . '" class="btn btn-primary">' . __('Go to blog', 'sellace') . '</a>';
                    }
                ?>
            </div>

            <div class="flex-12">
                <?php
                    if($query->have_posts()) {
                        ?>
                            <div class="latest-blog__posts">
                                <div class="flex flex-wrap flex-lg-wrap flex-justify-between">
                                    <?php
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            require get_template_directory() . '/template-parts/content.php';
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>

        </div>
    </div>
</section>