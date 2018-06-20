<?php
global $wp_query;
$total_posts = $wp_query->found_posts;
$posts_per_page = get_option( 'posts_per_page' );
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$nb_pages = $wp_query->max_num_pages;
$querystring = '';
if (is_category())
    $base_url = get_category_link(get_queried_object_id());
elseif (is_search()) {
    $base_url = get_site_url() . '/';
    $querystring = '?s=' . get_query_var( 's' );
}
$max_pages_to_display = 4;
$start_page = max(1, min(floor($paged - $max_pages_to_display / 2), $nb_pages - $max_pages_to_display + 1));
$end_page = min($nb_pages, $start_page + $max_pages_to_display - 1);

if ($nb_pages > 1): ?>
    <div class="pagination">
        <?php if ($paged > 1): ?>
            <a href="<?= $base_url ?>page/<?= $paged - 1 ?>/<?= $querystring ?>" class="prev">
                <?= __('Page précédente', 'base-theme') ?>
            </a>
        <?php endif; ?>
        <?php for ($page = $start_page; $page <= $end_page ; $page++): ?>
            <a href="<?= $base_url ?>page/<?= $page ?>/<?= $querystring ?>" class="page <?= $page == $paged ? 'active' : '' ?>">
                <?= $page ?>
            </a>
        <?php endfor; ?>
        <?php if ($paged < $nb_pages): ?>
            <a href="<?= $base_url ?>page/<?= $paged + 1 ?>/<?= $querystring ?>" class="next">
                <?= __('Page suivante', 'base-theme') ?>
            </a>
        <?php endif; ?>
    </div>
<?php endif;