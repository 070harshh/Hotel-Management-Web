<?php
session_start();
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1); // Display errors
include ('includes/dbconnection.php');

if (strlen($_SESSION['otssaid']) == 0) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $vid = $_GET['viewid'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $tc = $_POST['tc'];

    $sql = "UPDATE guests SET Status=:status, Remark=:remark, TotalCost=:tc WHERE booking_id=:vid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':remark', $remark, PDO::PARAM_STR);
    $query->bindParam(':tc', $tc, PDO::PARAM_STR);
    $query->bindParam(':vid', $vid, PDO::PARAM_STR);

    if($query->execute()) {
      echo '<script>alert("Remark has been updated")</script>';
      echo "<script>window.location.href ='all-order.php'</script>";
    } else {
      echo '<script>alert("Failed to update remark")</script>';
    }
  }
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <title>The Royal Orchid - View Guest Details</title>
  <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="dist/css/style.min.css" rel="stylesheet">
</head>
<body>

<div class="preloader">
  <div class="lds-ripple">
    <div class="lds-pos"></div>
    <div class="lds-pos"></div>
  </div>
</div>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php include_once('includes/header.php'); ?>
  <?php include_once('includes/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">View Guest Details</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Home</a></li>
                <li class="breadcrumb-item text-muted active" aria-current="page">View Guest Details</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                  <?php
                  $vid = $_GET['viewid'];
                  $sql = "SELECT bookings.booking_id, DATEDIFF(bookings.checkout, bookings.checkin) as ddf, guests.name, guests.email, guests.mobile, guests.address1, bookings.checkin, bookings.checkout, guests.booking_id, guests.TotalCost, guests.Remark, guests.Status 
                          FROM guests 
                          JOIN bookings ON bookings.booking_id = guests.booking_id 
                          WHERE guests.booking_id = :vid";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);

                  if ($query->rowCount() > 0) {
                    foreach ($results as $row) { ?>
                      <table border="1" class="table table-bordered">
                        <tr align="center">
                          <td colspan="4" style="font-size:20px;color:blue">Stay Details</td>
                        </tr>
                        <tr align="center">
                          <td colspan="4" style="font-size:20px;color:red">Booking id: <?php echo $row->booking_id; ?></td>
                        </tr>
                        <tr>
                          <th scope>Full Name</th>
                          <td><?php echo $row->name; ?></td>
                          <th scope>Email</th>
                          <td><?php echo $row->email; ?></td>
                        </tr>
                        <tr>
                          <th scope>Mobile Number</th>
                          <td><?php echo $row->mobile; ?></td>
                          <th>Address</th>
                          <td><?php echo $row->address1; ?></td>
                        </tr>
                        <tr>
                          <th>Check-in</th>
                          <td><?php echo $row->checkin; ?></td>
                          <th>Check-out</th>
                          <td><?php echo $row->checkout; ?></td>
                        </tr>
                        <tr>
                          <th>Total Days</th>
                          <td><?php echo $ddf = $row->ddf; ?></td>
                          <th>Stay Price</th>
                          <td><?php echo $tp = $row->Cost; ?></td>
                        </tr>
                        <tr>
                          <th>Total Cost</th>
                          <td><?php echo $tc = $ddf * $tp; ?></td>
                        </tr>
                        <tr>
                          <th>Image</th>
                          <td><img src="images/<?php echo $row->Image; ?>" width="200" height="150" value="<?php echo $row->Image; ?>"></td>
                          <th>Stay Final Status</th>
                          <td style="color: blue"> 
                            <?php 
                            if ($row->Status == "Confirmed") {
                              echo "Your Stay has been Confirmed";
                            } elseif ($row->Status == "Cancelled") {
                              echo "Your stay has been cancelled";
                            } else {
                              echo "Not Response Yet";
                            }
                            ?>
                          </td>
                        </tr>
                      <?php }
                  } ?>
                  </table>
                  <?php if ($row->Status != '') {
                    $ret = "SELECT * FROM guests WHERE guests.booking_id=:vid";
                    $query = $dbh->prepare($ret);
                    $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <tr align="center">
                        <th colspan="5" style="color: blue">Response History</th>
                      </tr>
                      <tr style="color: red">
                        <th>#</th>
                        <th>TotalCost</th>
                        <th>Remark</th>
                        <th>Status</th>
                        <th>Response Time</th>
                      </tr>
                      <?php
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) { ?>
                          <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row->TotalCost; ?></td>
                            <td><?php echo $row->Remark; ?></td>
                            <td class="font-w600">
                              <?php 
                              if ($row->Status == "") { ?>
                                <span class="badge badge-warning"> <?php echo "Not Updated Yet"; ?></span>
                              <?php } elseif ($row->Status == 'Cancelled') { ?>
                                <span class="badge badge-danger"> <?php echo htmlentities($row->Status); ?></span>
                              <?php } else { ?>
                                <span class="badge badge-success"><?php echo htmlentities($row->Status); ?></span>
                              <?php } ?>    
                            </td> 
                            <td><?php echo $row->UpdationDate; ?></td>
                          </tr>
                          <?php $cnt = $cnt + 1;
                        }
                      }
                  } ?>
                  </table>
                  <?php if ($row->Status == "") { ?>
                    <p align="center">
                      <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button>
                    </p>
                  <?php } ?>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="

                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">



                                  <tr>
                                    <th>Remark :</th>
                                    <td>
                                      <textarea name="remark" placeholder="Remark" rows="6" cols="14"
                                        class="form-control wd-450" required="true"></textarea>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Total Cost :</th>
                                    <td>
                                      <input name="tc" value="<?php echo $tc ?>" class="form-control wd-450"
                                        required="true" readonly>
                                    </td>
                                  </tr>

                                  <tr>
                                    <th>Status :</th>
                                    <td>

                                      <select name="status" class="form-control wd-450" required="true">
                                        <option value="Confirmed" selected="true">Confirmed</option>
                                        <option value="Cancelled">cancelled</option>
                                      </select>
                                    </td>
                                  </tr>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-primary">Update</button>

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                </div>

                <?php include_once ('includes/footer.php'); ?>
              </div>

            </div>

            <script src="assets/libs/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- apps -->
            <!-- apps -->
            <script src="dist/js/app-style-switcher.js"></script>
            <script src="dist/js/feather.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="assets/extra-libs/sparkline/sparkline.js"></script>
            <!--Wave Effects -->
            <!-- themejs -->
            <!--Menu sidebar -->
            <script src="dist/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="dist/js/custom.min.js"></script>
            <!--This page plugins -->
            <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
  </body>

  </html>
<?php } ?>