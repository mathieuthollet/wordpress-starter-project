<?php if (!is_front_page() && function_exists('yoast_breadcrumb')): ?>
    <div class="container">
        <?php yoast_breadcrumb('<p id="breadcrumb">', '</p>') ?>
    </div>
<?php endif; ?>
