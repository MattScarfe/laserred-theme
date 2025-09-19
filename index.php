<?php
get_header();
?>
<main id="main" class="container mx-auto px-3 py-8">
    <!-- Page Header -->
    <header class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Laser Red</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">Discover our latest insights, news, and updates</p>
    </header>

    <!-- Blog Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
            ?>
            <!-- Blog Post Card -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="aspect-w-16 aspect-h-9">
                        <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="p-6">
                    <!-- Post Category -->
                    <?php
                    $categories = get_the_category();
                    if ($categories) :
                        $category = $categories[0];
                    ?>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full mb-4">
                            <?php echo esc_html($category->name); ?>
                        </span>
                    <?php endif; ?>

                    <!-- Post Title -->
                    <h2 class="the-title text-xxl font-bold text-gray-900 mb-3 hover:text-blue-600">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <!-- Post Excerpt -->
                    <div class="text-gray-600 mb-4 line-clamp-3">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- Post Meta -->
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                            </svg>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                            </svg>
                            <?php echo get_comments_number(); ?> Comments
                        </span>
                    </div>
                </div>
            </article>
            <?php
            endwhile;
        else :
            ?>
            <div class="col-span-full text-center py-12">
                <div class="bg-gray-50 rounded-lg p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Posts Found</h3>
                    <p class="text-gray-600">Check back later for new content.</p>
                </div>
            </div>
        <?php
        endif;
        ?>
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center gap-2">
        <?php
        $prev_link = get_previous_posts_link();
        $next_link = get_next_posts_link();
        
        if ($prev_link || $next_link) :
        ?>
            <div class="inline-flex rounded-md shadow-sm">
                <?php if ($prev_link) : ?>
                    <?php
                    previous_posts_link(
                        '<button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                            Previous
                        </button>'
                    );
                    ?>
                <?php endif; ?>
                
                <?php if ($next_link) : ?>
                    <?php
                    next_posts_link(
                        '<button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                            Next
                        </button>'
                    );
                    ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
