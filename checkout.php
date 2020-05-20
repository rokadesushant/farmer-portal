<?php
  include('sessionbuyer.php');
  include('database.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">


        
</head>



<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="db.php">
        <img src="icon.png">
        <div class="sidebar-brand-text mx-3">Cropify</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="bdb.php">
          <i class="fas fa-fw fa-th-large"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="products.php">
          <i class="fas fa-fw fa-inbox"></i>
          <span>Products</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="orders.php">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Orders</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnalytics" aria-expanded="true" aria-controls="collapseAnalytics">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Analytics</span>
        </a>
        <div id="collapseAnalytics" class="collapse" aria-labelledby="headingAnalytics" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="bcharts.php">Charts</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Add-ons
      </div>

      <li class="nav-item">
        <a class="nav-link" href="bprofile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
      
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php
                    echo $login_session;
                  ?>
                </span>
                <i class="fas fa-fw fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              

                <a class="dropdown-item" href="about.php">
                  <i class="fas fa-file fa-sm fa-fw mr-2 text-gray-400"></i>
                  About
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Checkout</h1>
          </div>
      <?php 
      include("inc/config.inc.php");
      setlocale(LC_MONETARY,"en_US");
      include("inc/header.php"); 
      ?>
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <script type="text/javascript" src="script/cart.js"></script>
      <?php include('inc/container.php');?>
      <div class="container"> 
      <div class="text-center"> 
      <?php
      if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
        $total = 0;
        $list_tax = '';
        ?> 
        <form action="success.php" method="POST"> 
        <table class="table table-bordered" id="shopping-cart-results" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>   
        </tr>
        </thead>
        <tbody>       
        <?php     
        $cart_box = '';
        foreach($_SESSION["products"] as $product){
          $productname = $product["productname"];
          $product_qty = $product["product_qty"];
          $price = $product["price"];
          $productid = $product["productid"];
          $farmerid = $product["farmerid"];
          //$product_color = $product["product_color"];     
          $item_price = sprintf("%01.2f",($price * $product_qty));    
          ?>
          <tr>
          <td><?php echo $productname; ?></td>
          <td><?php echo $price; ?></td>
          <td><?php echo $product_qty; ?></td>
          <td><?php echo $currency; echo sprintf("%01.2f", ($price * $product_qty)); ?> </td>
          </tr>       
          <?php   
          $subtotal = ($price * $product_qty);
          $total = ($total + $subtotal);
        } 
        $grand_total = $total + $shipping_cost;
        foreach($taxes as $key => $value){
            $tax_amount = round($total * ($value / 100));
            $tax_item[$key] = $tax_amount;
            $grand_total = $grand_total + $tax_amount; 
        } 
        foreach($tax_item as $key => $value){
          $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
        } 
        $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';  
        $cart_box .= "<span>$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</span>"; 
        ?>

        
        <tr><td></td><td></td><td></td><td></td></tr>

       


    <thead>
        <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>   
        </tr>
        </thead>
        <tbody>   

        <?php
                                     
                       $sql_query = "SELECT t.transportid, t.firstname,t.phoneno,t.cost FROM transport t";
                        $resultset = mysqli_query($link, $sql_query) or die("database error:". mysqli_error($link));
                      
                       // print_r(mysqli_fetch_assoc($resultset));

                      while($row = mysqli_fetch_assoc($resultset)){
                                  

                        //print_r ($row);


                        $transportname = $row["firstname"];
                        $phoneno=$row['phoneno'];
                        $cost=$row['cost'];
                        $transportid=$row['transportid'];
                        
                ?>

          <tr>
           <td><?php echo $transportname;?></td>
            <td><?php  echo $phoneno; ?></td>
          <td><?php echo $cost; ?> 
   <input type="radio"  name="trans" value ="<?php echo $transportid ; ?> " id="trans"></td>
          </tr>

          <?php
        }
        ?>
      </tbody>
       
        <tfoot>

        <tr>
        <td><br><br><br><br><br><br><br><br><a href="products.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="text-center view-cart-total"><strong><?php echo $cart_box; ?></strong><br><br>
          <button type="submit">Place order</button>
        </td>
        </tr>
        </tfoot>  
        <?php 
      } else {
        echo "Your Cart is empty";
      }
      ?>
      </tbody>
      </table>
      </form>

      </div></div></div></div></div>
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto"id="google_translate_element">
            Copyright &copy; Cropify 2020

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages:'hi,mr,kn,gu,ta,te,pn,bn,pa,ur,en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          </div></div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>

</body>
</html>