<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<?php include "dist/includes/shop-head.php";?>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    <!-- BEGIN TOP BAR -->
    <?php 
      include "dist/includes/shop-topbar.php";
    ?>

    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <?php 
      include "dist/includes/shop-header.php";
    ?>


    <!-- Header END -->

    <!-- BEGIN SLIDER -->
    <?php //include "dist/includes/shop-slider.php";?>
    
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <?php //include "dist/includes/shop-sale.php";?>
        
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT --> 
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
        <?php include "dist/includes/shop-sidebar.php";?>
          
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>Items</h2>
            <div class="row product-list">
<?php 
      $queryp=mysqli_query($con,"SELECT * FROM product order by prod_name")or die(mysqli_error($con));
                 while ($rowp=mysqli_fetch_array($queryp))
                 {
                  $qty=$rowp['prod_qty'];
?>              
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../images/<?php echo $rowp['prod_pic'];?>" class="img-responsive" alt="<?php echo $rowp['prod_name'];?>" style="width:250px;height: 300px">
                    <div>
                      <a href="../images/<?php echo $rowp['prod_pic'];?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up<?php echo $rowp['prod_id'];?>" class="btn btn-default fancybox-fast-view" data-target="#update<?php echo $rowp['prod_id'];?>">View</a>
                    </div>
                  </div>
                  <h3><a href=""><?php echo $rowp['prod_name'];?></a></h3>
                  <div class="pi-price">P<?php echo $rowp['prod_price'];?></div>
                  <?php 
                  if ($qty<=0)
                  {
                    echo "<a href='' class='btn btn-danger pull-right disabled'>Out of Stock</a>";
                  }
                  else
                  {
                    echo "<a href='add_cart.php?prod_id=$rowp[prod_id]' class='btn btn-primary add2cart'>Add to cart</a>";
                  }
                 
                  ?>
                </div>
              </div>
              
              <!-- BEGIN fast view of a product -->
    <div id="product-pop-up<?php echo $rowp['prod_id'];?>" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="../images/<?php echo $rowp['prod_pic'];?>" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2><?php echo $rowp['prod_name'];?></h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>P</span><?php echo $rowp['prod_price'];?></strong>
                    </div>
                    <div class="availability">
                      Available: <strong><?php echo $rowp['prod_qty'];?></strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $rowp['prod_desc'];?></p>
                  </div>
                  </div>
                  <div class="product-page-cart">
                  <?php 
                  if ($qty<=0)
                  {
                    echo "<a href='' class='btn btn-danger add2cart'>Out of Stock</a>";
                  }
                  else
                  {
                    echo "<a href='add_cart.php?prod_id=$rowp[prod_id]' class='btn btn-primary add2cart'>Add to cart</a>";
                  }
                 
                  ?>
                  </div>
                </div>
              </div>
            </div>
    
    <!-- END fast view of a product -->
    <!-- END fast view of a product -->
<?php }?></div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        
      </div>
    </div>


  
    <!-- BEGIN BRANDS -->
    <?php //include "dist/includes/shop-brands.php";?>
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <?php //include "dist/includes/shop-steps.php";?>
    
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <?php include "dist/includes/shop-footer.php";?>

    <!-- END FOOTER -->

    

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <?php include "dist/includes/shop-script.php";?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('hide');
    });
</script>
</body>
<!-- END BODY -->
</html>
