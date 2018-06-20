<article>
    <div class="row">
        <?php if (has_post_thumbnail()): ?>
            <div class="col-image col-12 col-sm-6">
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail('posts-list') ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="col-content col-12 <?= has_post_thumbnail() ? 'col-sm-6' : '' ?>">
            <h2>
                <a href="<?php the_permalink() ?>">
                    <?php the_title() ?>
                </a>
            </h2>
            <?php if (get_the_excerpt() != ''): ?>
                <div class="excerpt block-with-text">
                    <?= get_the_excerpt() ?>
                </div>
            <?php endif; ?>
            <a class="lien-plus" href="<?php the_permalink() ?>">
                <?= __('Lire plus', 'base-theme') ?>
            </a>
        </div>
    </div>
</article>