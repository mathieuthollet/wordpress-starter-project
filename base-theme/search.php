<?php get_header(); ?>
<div id="content">
    <div class="posts-list">
        <?php if (have_posts()):
            while (have_posts()):
                the_post();
                get_template_part('partials/content/posts-list-item');
            endwhile;
        endif; ?>
    </div>
    <?php get_template_part( 'partials/common/pagination' ); ?>
</div>
<?php get_footer(); ?>