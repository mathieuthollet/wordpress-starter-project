<?php the_post(); ?>
<article>
    <?php if (has_post_thumbnail()): ?>
        <div class="featured-image">
            <?php the_post_thumbnail() ?>
        </div>
    <?php endif; ?>
    <h1><?php the_title() ?></h1>
    <?php the_content() ?>
</article>