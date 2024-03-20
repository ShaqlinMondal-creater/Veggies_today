<?php include("../inc_files/dbconnect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Admin
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <!-- Start sidenavv -->
  <?php include("../inc_files/sidebar_header.php"); ?>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <?php include("../inc_files/side_bar.php"); ?>
    </div>
    <?php include("../inc_files/sidebar_footer.php"); ?>
    <!-- End sidenavv -->
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Offer List</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Offer By Seller</h6>
        </nav>
        <?php include("../inc_files/navbar.php"); ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <!-- Product Table -->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Sellers offer Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Offer</th>
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Offer Name</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Offer Percentage</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Massage</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seller Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Date</th>
                      <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Update</th>
                      <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $c=1;    
                        $sel="SELECT veg_offer.*,categories.category_name FROM veg_offer INNER JOIN categories ON categories.category_id=veg_offer.category_name ";
                        $result=mysqli_query($con,$sel);
                        while($rs=$result->fetch_assoc()){                          
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="color:red;"><?php echo $c;?></h6>
                          </div>
                          <div>
                            <img src="../pll/cat.png" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo $rs['offer_name'];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo $rs['percentage'];?> % </p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $rs['category_name'];?></span>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo $rs['massage'];?></p>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">
                            <!-- <a href="view_seller.php?sid=<?php echo $row['s_id']; ?>"> -->
                              <?php echo $rs['seller_name'];?>
                            <!-- </a> -->
                          </span>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold"><?php echo $rs['date_time'];?></span>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <a href="update_offer.php?offid=<?php echo $rs['offer_id']; ?>" class="text-secondary font-weight-bold text-xs btn btn-info">
                        <span style="color:white;">UPDATE</span>
                        </a>
                      </td>
                      <td class="align-middle text-center">
                        <a href="delete_offer.php?offid=<?php echo $rs['offer_id']; ?>" onclick="return confirm('Are you want to delete ?')" class="text-secondary font-weight-bold text-xs btn btn-danger">
                        <span style="color:white;">DELETE</span>
                        </a>
                      </td>
                    </tr>
                    <?php
                        $c++;
                        }
                    ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <br>
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2" align="center">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3" >
                <span style="color:white;">Exit 🫡</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Start Footer Row -->
       <?php include("../inc_files/footer.php"); ?>
      <!-- End Footer Row -->
    </div>
  </main>

  <!-- Toggle sidebar -->
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <?php include("../inc_files/settings_sidebar.php"); ?>
  </div>
  <!-- Toggle sidebar -->
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>