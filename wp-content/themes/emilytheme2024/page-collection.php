<?php
/*
Template Name: Collection Page
*/
get_header();
?>

<main class="py-12">
    <div class="container mx-auto px-4">
        <?php
        while (have_posts()) : the_post();
            $gallery_images = get_field('gallery_images'); // Retrieve gallery images field
        ?>
            <h1 class="text-4xl font-bold mb-8"><?php the_title(); ?></h1>
            
            <?php if ($gallery_images): ?>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery_images as $image) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-auto object-cover">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</main>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

<?php get_footer(); ?>
