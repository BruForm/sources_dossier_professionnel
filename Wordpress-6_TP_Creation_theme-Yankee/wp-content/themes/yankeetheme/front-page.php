<?php get_header('accueil'); ?>

<div class="container_1">

    

    <div class="page-body">
        <div class="list">
            <span>digital product</span>
            <div class="separ"></div>
            <span>uix solutions</span>
            <div class="separ"></div>
            <span>consultancy</span>
        </div>

        <h1> DIGITAL AGENCY </h1>
        <h1>SOLUTIONS</h1>

        <div class="buttons">
            <button class="ourServices">Our Services</button>
            <button class="play">play</button>
        </div>
    </div>

</div>

<div class="container_2">
    <aside>
        <div class="aside_img" style="background-image: url('<?= the_field('image_main') ?>);">
            <!-- <img src="<?php the_field('image_main') ?>" alt="image principal"> -->
        </div>
        <div class="inner_box">
            <div class="content">
                <div>
                    <span><?php the_field('year_nb') ?></span>
                    +
                </div>
                <div>
                    <!-- <span>years</span>
                    <span>experience</span> -->
                    years experience
                </div>
            </div>
        </div>
    </aside>
    <main>
        <div class="titre_0">
            <span><?php the_field('titre_0') ?></span>
        </div>
        <h2 class="titre_main">
            <span><?php the_field('titre_main') ?></span>
        </h2>
        <p class="paragraphe_bold">
            <span><?php the_field('paragraphe_bold') ?></span>
        </p>
        <p class="paragraphe">
            <span><?php the_field('paragraphe') ?></span>
        </p>
        <div class="caracteristics">
            <div class="caracteristique_1">
                <span><?php the_field('caracteristique_1') ?></span>
            </div>
            <div class="caracteristique_2">
                <span><?php the_field('caracteristique_2') ?></span>
            </div>
            <div class="caracteristique_3">
                <span><?php the_field('caracteristique_3') ?></span>
            </div>
            <div class="caracteristique_4">
                <span><?php the_field('caracteristique_4') ?></span>
            </div>
        </div>
        <button>learn more +</button>
    </main>
</div>

<div class="container_3">
</div>

<?php get_footer(); ?>