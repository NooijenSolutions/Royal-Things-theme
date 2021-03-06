<?php 

if ( ! function_exists( 'twi_woo_normal_pagination' ) ) :
function twi_woo_normal_pagination($numpages = '', $pagerange = '', $paged='',$car_pagi_pos,$twi_i,$text1,$text2,$bg1,$twi_bg2,$bor_width1,$bor_col1,$bor_width2,$bor_col2,$bor_rad,$pad) {
 
  if (empty($pagerange)) {
    $pagerange = 2;
  }
 
  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $loop variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $loop;
    $numpages = $loop->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
 
  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
    'format'          => '?paged=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => true,
    'prev_text'   => '<i class="twi-icon-chevron-left"></i>',
    'next_text'   => '<i class="twi-icon-chevron-right"></i>',
    'type'  => 'array',
    'add_args'        => false,
    'add_fragment'    => '',
  );

  $paginate_links = paginate_links($pagination_args);

  if( is_array( $paginate_links ) ) {
      //$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
      //echo "<nav class='uk-grid uk-container-center uk-flex-middle'>";
      ?>
      <ul id="gp<?php echo $twi_i; ?>" class="twi-pagination twi-pagination-<?php echo $car_pagi_pos; ?>" data-text1="<?php echo $text1; ?>" data-text2="<?php echo $text2; ?>" data-bg1="<?php echo $bg1; ?>" data-bg2="<?php echo $twi_bg2; ?>" data-bor1="<?php echo $bor_width1.'px solid '.$bor_col1; ?>" data-bor2="<?php echo $bor_width2.'px solid '.$bor_col2; ?>" data-rad="<?php echo $bor_rad; ?>%" data-pad="<?php echo $pad; ?>px">
  <?php
      foreach ( $paginate_links as $page ) {
              echo $page;
      }
      echo '</ul>';
      //echo "<p class='twi-float-right'>Page " . $paged . " of " . $numpages . "</p> ";
      //echo "</nav>";
    }
 
}
//if( $pagi_type == 'nor_page' ){
    twi_woo_normal_pagination($loop->max_num_pages,"",$paged,$car_pagi_pos,$twi_i,$text1,$text2,$bg1,$twi_bg2,$bor_width1,$bor_col1,$bor_width2,$bor_col2,$bor_rad,$pad);
//}
endif;