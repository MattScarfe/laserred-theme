<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<?php
$logo = get_field('logo', 'option');
$header_cta = get_field('header_cta', 'option');
if ($header_cta) :
    $header_cta_text = $header_cta['header_cta_text'];
    $header_cta_link = $header_cta['header_cta_link'];
endif;

?>

<body <?php body_class('font-onest bg-dark-lighter text-white'); ?>>
    <header class="absolute w-full top-0 left-0 z-50">
        <div class="mx-auto px-4">
            <nav class="flex justify-between items-center py-6">
                <div class="flex items-center gap-x-10">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="block">
                            <?php
                            if ($logo) : ?>
                                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                            <?php else: ?>
                                <span class="text-2xl font-bold"><?php bloginfo('name'); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>

                    <!-- Desktop menu -->
                    <div class="hidden md:flex md:items-center md:gap-x-8">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => 'flex flex-row gap-x-4',
                            'link_before' => '<span class="text-white text-sm hover:text-purple-theme transition-colors duration-200">',
                            'link_after' => '</span>'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="flex items-center gap-x-4">
                    <!-- Search Icon -->
                    <button id="search-toggle" class="relative w-10 h-10 flex items-center justify-center">
                        <span class="absolute inset-0 rounded-full bg-white hover:bg-gray-200 -z-10"></span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 13.98 14">
                            <path d="M13.82,12.487a.711.711,0,0,0-.178-.189l-2.81-2.821a5.909,5.909,0,0,0,1.111-3.943A5.865,5.865,0,0,0,9.888,1.457,5.971,5.971,0,0,0,0,6.422,5.9,5.9,0,0,0,2.079,10.51a5.932,5.932,0,0,0,7.4.322L12.221,13.6a.933.933,0,0,0,.622.389H13a.922.922,0,0,0,.555-.178.933.933,0,0,0,.389-.622.955.955,0,0,0-.122-.7ZM6.011,10A3.977,3.977,0,0,1,3.179,8.821,4.029,4.029,0,1,1,6.011,10Z"
                                fill="#11111f" />
                        </svg>
                    </button>

                    <!-- Menu CTA  -->
                    <?php if ($header_cta_link && $header_cta_text) : ?>
                        <a href="<?php echo esc_url($header_cta_link); ?>" id="headerCTA" class="rainbow-button hidden md:flex flex-row items-center content-center text-black-theme font-semibold rounded-full transition-all duration-300">
                            <?php echo esc_html($header_cta_text); ?>
                            <span class="inline-block w-4 h-3 ml-2">
                                <svg id="headerCTA-arrow" xmlns="http://www.w3.org/2000/svg" width="13.218" height="13" viewBox="0 0 13.218 13">
                                    <path id="Right_Arrow" data-name="Right Arrow" d="M12.827,9.886,8.469,5.4,9.618,4.222l6.32,6.5-6.32,6.5L8.469,16.04l4.358-4.482H2.72V9.886Z" transform="translate(-2.72 -4.222)" />
                                </svg>
                            </span>
                        </a>

                        <!-- Mobile CTA Icon -->
                        <a href="<?php echo esc_url($header_cta_link); ?>" class="relative w-10 h-10 md:hidden p-2 text-black-theme flex items-center justify-center">
                            <span class="absolute inset-0 rounded-full bg-white hover:bg-gray-200 -z-10"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                <path id="Phone" d="M68.456,64.672a1.111,1.111,0,0,0-1.315-.645l-.15.041a3.732,3.732,0,0,0-2.836,4.277,12.438,12.438,0,0,0,9.565,9.565A3.728,3.728,0,0,0,78,75.074l.041-.15a1.107,1.107,0,0,0-.643-1.315L74.734,72.5a1.109,1.109,0,0,0-1.285.323l-1.056,1.291A9.364,9.364,0,0,1,68.034,69.6l1.209-.984a1.111,1.111,0,0,0,.323-1.285Z" transform="translate(-64.077 -63.988)" fill="#11111f" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <!-- Mobile menu button -->
                    <div class="flex items-center md:hidden">
                        <button id="mobile-menu-toggle" class="text-white hover:text-purple-theme">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19" height="14" viewBox="0 0 19 14">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.5" y1="-1.18" x2="0.5" y2="7.751" gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#30cb98" />
                                        <stop offset="0.199" stop-color="#35cbc1" />
                                        <stop offset="0.527" stop-color="#3bcbec" />
                                        <stop offset="0.946" stop-color="#a27be5" />
                                        <stop offset="1" stop-color="#a27be5" />
                                    </linearGradient>
                                    <linearGradient id="linear-gradient-2" y1="-7.644" y2="2.485" xlink:href="#linear-gradient" />
                                    <linearGradient id="linear-gradient-3" y1="-5.149" y2="3.911" xlink:href="#linear-gradient" />
                                </defs>
                                <g id="Burger" transform="translate(-373.967 -52.368)">
                                    <rect id="Rectangle_2711" data-name="Rectangle 2711" width="19" height="2" rx="1" transform="translate(373.967 52.368)" fill="url(#linear-gradient)" />
                                    <rect id="Rectangle_2712" data-name="Rectangle 2712" width="19" height="2" rx="1" transform="translate(373.967 64.368)" fill="url(#linear-gradient-2)" />
                                    <rect id="Rectangle_2713" data-name="Rectangle 2713" width="19" height="2" rx="1" transform="translate(373.967 58.368)" fill="url(#linear-gradient-3)" />
                                </g>
                            </svg>

                        </button>

                    </div>

                </div>

            </nav>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden">
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'px-2 pt-2 pb-3 gap-y-1 bg-white',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'link_before' => '<span class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">',
                    'link_after' => '</span>'
                ]);
                ?>
                <a href="<?php echo esc_url($header_cta_link); ?>" id="headerCTA" class="rainbow-button flex flex-row items-center content-center text-black-theme font-semibold rounded-full transition-all duration-300">
                    <?php echo esc_html($header_cta_text); ?>
                    <span class="inline-block w-4 h-3 ml-2">
                        <svg id="headerCTA-arrow" xmlns="http://www.w3.org/2000/svg" width="13.218" height="13" viewBox="0 0 13.218 13">
                            <path id="Right_Arrow" data-name="Right Arrow" d="M12.827,9.886,8.469,5.4,9.618,4.222l6.32,6.5-6.32,6.5L8.469,16.04l4.358-4.482H2.72V9.886Z" transform="translate(-2.72 -4.222)" />
                        </svg>
                    </span>
                </a>
            </div>

            <!-- Search Bar  -->
            <div id="search-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-60"></div>
            <div class="absolute inset-x-0 top-0 bg-white p-4 transform transition-transform duration-600 -translate-y-full z-70" id="search-container">
                <form role="search" method="get" class="flex items-center gap-x-4" action="<?php echo home_url('/'); ?>">
                    <div class="flex-grow">
                        <input type="search" name="s" placeholder="Search..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="button" id="search-close" class="text-gray-500 hover:text-gray-700">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            </div>

        </div>
    </header>