<?php /* Template Name: ShopPageTemplate */ ?>

<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sequential
 */

get_header(); ?>

<div class="cat-wrapper">
    <h1 class="heading_primary"> Proizvodi </h1>
        <div class="categories grid-container">
        
        <?php

$taxonomy     = 'product_cat';
$orderby      = 'name';  
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 0;

$args = array(
       'taxonomy'     => $taxonomy,
       'orderby'      => $orderby,
       'show_count'   => $show_count,
       'pad_counts'   => $pad_counts,
       'hierarchical' => $hierarchical,
       'title_li'     => $title,
       'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
foreach ($all_categories as $cat) {
  if($cat->category_parent == 0) {
      $category_id = $cat->term_id;   
      $thumbnail_id = get_woocommerce_term_meta( $category_id, 'thumbnail_id', true );   
      $image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
      ?>
     
       <div class="category grid-item">
            <h2 class="category_title">
                <?php echo '<a href="/mbi/kategorija?category='.$cat->name.'">'. $cat->name .'</a>'; ?>
            </h2>
            <div class="category_image" style="background-image: url(<?php echo  $image[0] ?> )">
            <?php echo '<a href="/mbi/kategorija?category='.$cat->name.'">' .'</a>'; ?>
            </div>
       </div>



<?php
      $args2 = array(
              'taxonomy'     => $taxonomy,
              'child_of'     => 0,
              'parent'       => $category_id,
              'orderby'      => $orderby,
              'show_count'   => $show_count,
              'pad_counts'   => $pad_counts,
              'hierarchical' => $hierarchical,
              'title_li'     => $title,
              'hide_empty'   => $empty
      );
      $sub_cats = get_categories( $args2 );
      if($sub_cats) {
          foreach($sub_cats as $sub_category) {
              echo  $sub_category->name ;
          }   
      }
  }       
}?>
        
        </div>
</div>

<?php get_footer(); ?>