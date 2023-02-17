<?php
get_template_part('/template-parts/modal/modal', 'succsess');
get_template_part('/template-parts/modal/modal', 'error');
get_template_part('/template-parts/modal/modal', 'callback');

if ( is_search() || get_post_type() === 'product' ) {
  get_template_part('/template-parts/modal/modal', 'ask-question');
}

if ( is_page( 'partnership' ) ) {
  get_template_part('/template-parts/modal/modal', 'make-partnership');
}
