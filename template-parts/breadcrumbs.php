<?php if ( !is_home() && !is_front_page() && !is_404() ) : ?>
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <div class="container">
      <?php if( function_exists('bcn_display') ) {
        bcn_display();
      }?>
    </div>
  </div>
<?php endif; ?>
