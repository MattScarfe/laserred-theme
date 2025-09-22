<?php
get_header();
?>

<?php
// Get hero options
$hero = get_field('hero', 'option');
if ($hero) :
    $hero_image = $hero['hero_image'];
    $hero_title = $hero['hero_text_title'];
    $hero_text = $hero['hero_text'];
    $hero_cta_text = $hero['hero_cta_button_text'];
    $hero_cta_link = $hero['hero_cta_button_link'];
endif;
?>

<!--HERO SECTION-->
<section class="w-full flex flex-col md:flex-row items-stretch">
    <!-- Hero Text -->
    <div class="min-h-screen flex flex-col justify-center md:w-1/2 md:min-h-full md:justify-end md:items-start bg-dark-default text-white p-8">
        <?php if ($hero_text && $hero_title) : ?>
            <h2 class="text-6xl md:text-5xl font-bold mb-6"><?php echo wp_kses_post($hero_title); ?></h2>
            <p class="text-sm mb-6"><?php echo wp_kses_post($hero_text); ?></p>
        <?php endif; ?>
        <?php if ($hero_cta_text && $hero_cta_link) : ?>
            <a href="<?php echo esc_url($hero_cta_link); ?>" id="heroCTA" class="flex-row items-center content-center bg-blue-theme hover:bg-opacity-80 text-black-theme font-semibold py-2 px-6 rounded-full transition-all duration-300">
                <?php echo esc_html($hero_cta_text); ?>
                <span class="inline-block w-4 h-3 ml-2">
                    <svg id="heroCTA-arrow" xmlns="http://www.w3.org/2000/svg" width="13.218" height="13" viewBox="0 0 13.218 13">
                        <path id="Right_Arrow" data-name="Right Arrow" d="M12.827,9.886,8.469,5.4,9.618,4.222l6.32,6.5-6.32,6.5L8.469,16.04l4.358-4.482H2.72V9.886Z" transform="translate(-2.72 -4.222)" />
                    </svg>
                </span>
            </a>
        <?php endif; ?>
    </div>

    <!-- Hero Image -->
    <div class="md:w-1/2 h-auto overflow-hidden">
        <img src="<?php echo esc_url($hero_image['url']); ?>" aria-label="<?php echo esc_attr($hero_text); ?>" />
    </div>
</section>

<main id="main" class="container mx-auto px-4 py-4">
    <!-- Page Header -->
    <header class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">Welcome</h1>
    </header>


</main>
<?php
get_footer();
