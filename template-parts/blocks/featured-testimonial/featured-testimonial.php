<?php
/**
 * Featured Testimonial Block
 *
 * ACF fields:
 * - testimonial (Post Object, CPT = testimonial)
 * - featured_image (ACF Image Array)
 * - job_title (ACF field)
 * - testimonial_text (ACF field)
 */

$testimonial = get_field('testimonial');

if( $testimonial ):
    // Setup post data so template tags work
    $post = $testimonial;
    setup_postdata($post);

    $client_name      = get_the_title($testimonial->ID); // now post title
    $job_title        = get_field('job_title', $testimonial->ID);
    $testimonial_text = get_field('testimonial_text', $testimonial->ID);
    $featured_image   = get_field('featured_image', $testimonial->ID); // ACF image array

    ?>

    <div class="featured-testimonial bg-white p-6 rounded-lg shadow-md">
        <?php if ($featured_image && isset($featured_image['url'])): ?>
            <div class="mb-4">
                <img
                    src="<?php echo esc_url($featured_image['url']); ?>"
                    alt="<?php echo esc_attr($featured_image['alt'] ?? ''); ?>"
                    class="w-16 h-16 rounded-full object-cover"
                />
            </div>
        <?php endif; ?>

        <?php if ($testimonial_text): ?>
            <blockquote class="text-lg italic mb-4">&ldquo;<?php echo esc_html($testimonial_text); ?>&rdquo;</blockquote>
        <?php endif; ?>

        <div>
            <?php if ($client_name): ?>
                <p class="font-semibold"><?php echo esc_html($client_name); ?></p>
            <?php endif; ?>
            <?php if ($job_title): ?>
                <p class="text-sm text-gray-500"><?php echo esc_html($job_title); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <p><?php esc_html_e('Please select a testimonial to feature.', 'your-textdomain'); ?></p>
<?php endif; ?>
