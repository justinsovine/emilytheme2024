<?php
/*
Template Name: Gallery Page
*/
get_header();
?>

<main class="py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8">Art Gallery</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $collections = get_posts(array(
                'post_type' => 'collection',
                'posts_per_page' => -1,
            ));
            
            foreach ($collections as $collection) :
                $collection_image = get_the_post_thumbnail_url($collection->ID, 'medium');
                $collection_link = get_permalink($collection->ID);
            ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <a href="<?php echo esc_url($collection_link); ?>">
                        <img src="<?php echo esc_url($collection_image); ?>" alt="<?php echo esc_attr($collection->post_title); ?>" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold"><?php echo esc_html($collection->post_title); ?></h2>
                            <p class="text-gray-600"><?php echo esc_html(wp_trim_words($collection->post_excerpt, 20)); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
