<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2">
                <?php get_template_part( 'partials/header/logo'); ?>
            </div>
            <div id="menu-header-container" class="col-12 col-lg-8">
                <?php wp_nav_menu(['theme_location' => 'menu-header']); ?>
            </div>
            <div class="col-12 col-lg-2">
                <?= get_search_form() ?>
            </div>
        </div>
    </div>
</header>
<?php get_template_part( 'partials/header/breadcrumb'); ?>