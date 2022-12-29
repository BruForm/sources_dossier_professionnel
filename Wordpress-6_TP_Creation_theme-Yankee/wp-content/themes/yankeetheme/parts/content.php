<?php
if (is_category()) {
    $title = "Catégorie : " . single_tag_title('', false);
} elseif (is_tag()) {
    $title = "Étiquette : " . single_tag_title('', false);
} elseif (is_search()) {
    $title = "Vous avez recherché : " . get_search_query();
} else {
    $title = 'Blog';
}
$single = false;
if (is_single()) {
    $single = true;
}
?>

<!-- <div class="container_top"> -->
<!-- <span>welcome to our company</span> -->
<!-- <h1><?= $title; ?></h1>         -->
<!-- </div> -->
<!-- utilisation du template part -->
<?php get_template_part('parts/top'); ?>

<?php if ($single != true) : ?>
    <div class="article all_articles">
    <?php else : ?>
        <div class="article single_article">
        <?php endif ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="one_article">
                    <div class="thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="content">
                        <div class="title">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="author">
                            De : <?php the_author(); ?>
                        </div>
                        <div class="post_date">
                            Le : <?php the_time(get_option('date_format')) ?>
                        </div>
                        <?php if ($single != true) : ?>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">lire la suite...</a>
                        <?php else : ?>
                            <?php the_content(); ?>
                            <!-- <a onclick="history.go(-1);">retour</a> -->
                            <button onclick="history.go(-1);">Retour</button>
                            <!-- <div class="results-btn"> -->
                                <!-- <button onclick="history.go(-1);"><i class="fas fa-arrow-left"></i> Retour aux résultats</button> -->
                            <!-- </div> -->
                        <?php endif ?>
                        <div class="categories">
                            <span>Catégorie(s) :</span>
                            <?php the_category(); ?>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>

        </div>