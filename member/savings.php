<?php

  session_start();
  include "dbConn.php";

  
  $system_address=$system_email=$system_logo=$system_phone=$system_name="";

  $user_email=$_SESSION['mail'];
  $user_logo=$_SESSION['logo'];
  $user_phone=$_SESSION['phone'];

  $query="select * from system_info";
  $res=mysqli_query($conn,$query);

  $ret=mysqli_fetch_array($res);
    if($ret>0){
      $system_name=$ret['shortName'];
      $system_logo=$ret['logoURL'];
      $system_phone=$ret['phone'];
      $system_address=$ret['address'];
      $system_email=$ret['systemEmail'];
    }
    else{
    echo "<script>alert('Querying system info encountered a problem!');</script>";          
    }

  ?>

<?php
  //Validating Session
  if(strlen($_SESSION['user_name'])==0)
    { 
  header('location:login.php');
  }
  else{ ?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo  $system_name; ?> | <?php echo $_SESSION['user_name']; ?> Savings Info</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo  $system_logo ?>' />
</head>
      
<?php include 'inc/sideNav.php';?>


<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include 'inc/topNav.php'; ?>

      <?php include 'inc/sideNav.php';?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Savings Table</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>Savings Ammount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                                $query = mysqli_query($conn, "select * from savings where email='$user_email' ");
                                $qr=mysqli_num_rows($query);
                                if ($qr<1){
                                  echo "<td>No records</td>";

                                }   
                                
                                $count = 1;
                                $saveCount = 0;

                                  while ($resu = mysqli_fetch_array($query)) {
                                    $saveCount+=$resu['saveAmmount'];
                                  ?>
                                      
                                  <td> <?php echo $resu['email'] ?></td>
                                  <td>Ksh. <?php echo $resu['saveAmmount'] ?></td>

                                
                              
                                  </tr> 
                                  <?php $count++;
                              }
                                            
                            
                              
                            ?>



                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Total Savings</th>
                            <th>Ksh. <?php echo $saveCount ?></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php include 'inc/settings.php'; ?> 

        
      </div>
            <!-- footer section -->      
            <?php include 'inc/footer.php';?> 

    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


</html>

<?php } ?>