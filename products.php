<?php
  include_once("database.php");
  include("inc/config.inc.php"); 
  include("inc/header.php"); 
  include('sessionbuyer.php');
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
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">




  






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

      <li class="nav-item active">
        <a class="nav-link" href="products1.php">
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
                <a class="dropdown-item" href="bprofile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              

                <a class="dropdown-item" href="babout.php">
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
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
          </div>
        </div>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
        <script type="text/javascript" src="script/cart.js"></script>
        </style>
        <?php 
          include('inc/container.php');
        ?>
        <div class="container"> 
        <h2>
          <?php
          $sql="SELECT buyerid FROM buyer WHERE username = '$login_session'";
          $result = mysqli_query($link,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          ?>
        </h2>



         










        <div class="text-center"> 
        <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <div>
                  <form method="post" action="products1.php">
                    <label>Area around You</label>
                    <select id="radius" name="radius"class="form-group">
                      <option value="999999999">ALL</option>
                      <option value="50">50km</option>
                      <option value="100">100km</option>
                      <option value="200">200km</option>
                      <option value="500">500km</option>
                    </select>
                    <input type="submit" name="submit" value="filter">
                  </form>
                </div>



                <table class="table table-bordered" id="shopping-cart-results" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Available Quantity</th>
                      <th>Quantity</th>
                      <th>Farmer Name</th>
                      <th>Farmer Phone</th>
                      <th class="cart-counter"><a href="viewcart.php" class="btn btn-primary">
                        <span class="cart-item" id="cart-container"> 
                            <?php 
                              if(isset($_SESSION["products"])){
                                echo "View Cart:".count($_SESSION["products"]); 
                                } else {
                                    echo "View Cart:";
                                    echo 0; 
                              }
                            ?> Products
                        </span><i class="glyphicon glyphicon-menu-right"></i></a></th>
                    </tr>
                  </thead>
                  <?php     
                

                    $sql_query = "SELECT u.firstname,u.phoneno,p.productid, p.productname, p.quantity, p.type, p.price, p.farmerid,p.latitude as plat,p.longitude as plong ,b.latitude as blat,b.longitude as blong FROM product p,user u,buyer b WHERE p.farmerid=u.id and p.quantity>0 and b.buyerid=$rowid GROUP BY p.productid";  
                      $resultset = mysqli_query($link, $sql_query) or die("database error:". mysqli_error($link));
                    while( $row = mysqli_fetch_assoc($resultset) ) {
     

                  ?>
                          <tbody>
                          <tr>
                            <form class="product-form">
                            <td><?php echo $row["productname"]; ?></td>
                            <td><?php echo $currency; echo $row["price"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><input type="number" name="product_qty" min="1" value="1"max="<?php echo $row["quantity"];?>"></td>
                            <td><?php echo $row["firstname"]; ?></td>
                            <td><?php echo $row["phoneno"]; ?></td> 

                            <input name="productid" type="hidden" value="<?php echo $row["productid"]; ?>">
                            <input name="farmerid" type="hidden" value="<?php echo $row["farmerid"]; ?>">
                            <input name="quantity" type="hidden" value="<?php echo $row["quantity"]; ?>">
                            <input name="latitude" type="hidden" value="<?php echo $row["plat"]; ?>">
                            <input name="longitude" type="hidden" value="<?php echo $row["plong"]; ?>">
                            <td><button type="submit">Add to Cart</button></td>
                           </form>
                          </tr>
                          </tbody>
        <?php 
                        }
                  //    }
                   // } 
            
        ?>
      </table></div>
          </div>
        </div>
      </div>
    </div>
  </div>
     
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto"id="google_translate_element">
            Copyright &copy; Cropify 2020

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
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
  



</body>
</html>