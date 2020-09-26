<div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="img/uploads/logo.png" alt="Bike Shop" style="height: 40px"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">
              <?php
                  $count=mysqli_query($con,"SELECT * FROM cart natural join product")or die(mysqli_error($con));
                  $item=0;
                  $total=0;
                  $grand=0;
                    while($rowc=mysqli_fetch_array($count)){
                        $item=$item+$rowc['qty'];
                        $total=$rowc['qty']*$rowc['prod_price'];
                        $grand=$grand+$total;
                    }
              ?>
            <?php echo $item;?> item/s</a>
            <a href="javascript:void(0);" class="top-cart-info-value">P<?php echo number_format($grand,2);?></a>
          </div>
          <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                        
          
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Product
                
              </a>
              <ul class="dropdown-menu">
                <?php
                  $c=mysqli_query($con,"SELECT * FROM category order by cat_name")or die(mysqli_error($con));
                    while ($rowc=mysqli_fetch_array($c)){
                ?> 
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <a href="product-list.php?category=<?php echo $rowc['cat_id'];?>"><?php echo $rowc['cat_name'];?></a>
                      </div>
                    </div>
                  </div>
                </li>
                <?php }?>
              </ul>
            </li>
           
            
            
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="product-search.php">
                  <div class="input-group">
                    <input type="text" placeholder="Search" name="search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
