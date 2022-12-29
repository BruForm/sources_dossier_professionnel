<?php get_header('other'); ?>

<?php get_template_part('parts/top'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- <h1><?php the_title(); ?></h1> -->

        <h2> Hello page ! </h2>

        <?php the_content(); ?>

        <?php the_post_thumbnail(); ?>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>