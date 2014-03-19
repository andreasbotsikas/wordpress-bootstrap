<?php 
    $specificCategory = get_post_meta(get_the_ID(), 'product_category', true);
    $rootCat = get_term_by('slug', $specificCategory, 'category'); 
    $cCats = get_terms( 'category', array('parent' => $rootCat->term_id ));
        if (count($cCats) >0) { ?>
            <article id="productCategories">
<!--                <header>
                    <div class="page-header">
                        <h2><?php echo $rootCat->name ?></h2>
                    </div>
                </header>-->
                <?php $pInRow = 0; ?>
    <?php foreach ($cCats as $cCat){  
          $catPage = get_posts( array( 'meta_key' => 'product_category', 'meta_value' => $cCat->slug, 'post_type' => 'page' ) );
    if (count($catPage)>0){
        $catPage = $catPage[0];
                  if ($pInRow==0){?>
                    <div class="productCategory row">
                    <?php } ?>
                        <div class="category col-sm-4">
                            <h3 class="page-header"><a href="<?php echo get_permalink($catPage->ID); ?>" title="<?php echo $cCat->name ?>"><?php echo $cCat->name ?><span class="badge pull-right"><?php echo $cCat->count; ?></span></a></h3>
                            <?php echo get_the_post_thumbnail($catPage->ID, 'lgreco-product-list-item');?>
                            <?php echo $cCat->description ?>
                        </div>
                        <?php $pInRow++;
                              if ($pInRow==3){
                                  $pInRow=0;?></div><?php }
              }
          }
             if ($pInRow>0 && $pInRow<3){ ?></div><?php } ?>
            </article>
    <?php } ?>