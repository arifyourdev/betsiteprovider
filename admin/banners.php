<?php require_once 'private/initialize.php';
require_login();
if(isset($_GET['language'])) {
    $language = $_GET['language'];
    $page="banner-$language";
$banner_data = Banner::find_by_language_banner($language);
}else{
    $page="banner";
}
?>
<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo $base_url_admin ?>">
      <!-- Required meta tags -->
      <?php include 'include/head.php'?>
   </head>
    <body>
        <div class="wrapper">
            <?php include "include/sidebar.php" ?>
            <!-- TOP Nav Bar -->
            <?php include "include/header.php" ?>
            <!-- TOP Nav Bar END -->
            <!-- Page Content  -->
            <div id="content-page" class="content-page">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Banner List</h4>
                            </div>
                            </div>
                            <div class="iq-card-body">
                                <span class="table-add float-right mb-3 mr-2">
                                    <a class="btn btn-sm iq-bg-secondary" href="add-banner/<?php echo $language ?>" style="font-size: 18px;"><i
                                        class="ri-add-fill"><span class="pl-1">Add New</span></i>
                                    </a>
                                </span>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Short Title</th>
                                            <th>Title</th>
                                            <th>Banner Image</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $s = 1;
                                                foreach ($banner_data as $banner) {
                                                ?>
                                            <tr>
                                                <td><?php echo $s; ?></td>
                                                <td><?php echo substr($banner->shor_title,0,50) ?></td>
                                                <td><?php echo substr($banner->title,0,50) ?></td>
                                                <td><img src="<?php echo $banner->picture_path(); ?>" style="width:60px"></td>
                                                <td><?php echo $banner->created_at?></td>
                                                <td>
                                                    <?php if ($banner->status == 1) { ?>
                                                        <a class="btn btn-sm btn-outline-success disable" data-bs-toggle="tooltip" title="Active" id="<?php echo $banner->id ?>"><i class="fa fa-check"></i></a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-sm btn-outline-danger enable" data-bs-toggle="tooltip" title="Inactive" id="<?php echo $banner->id ?>">x</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <span class="table-remove">
                                                        <a type="button" href="edit_banner/<?php echo $banner->id ?>" class="btn iq-bg-dark btn-rounded btn-sm my-0">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <button type="button" id="<?php echo $banner->id ?>" class="btn iq-bg-danger btn-rounded btn-sm my-0 banner_delete">Delete</button>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php $s++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Wrapper END -->
        <!-- Footer -->
        <?php include "include/footer.php" ?>


      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.appear.js"></script>
      <script src="js/countdown.min.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/apexcharts.js"></script>
      <script src="js/slick.min.js"></script>
      <script src="js/select2.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/smooth-scrollbar.js"></script>
      <script src="js/lottie.js"></script>
      <script src="js/core.js"></script>
      <script src="js/charts.js"></script>
      <script src="js/animated.js"></script>
      <script src="js/kelly.js"></script>
      <script src="js/maps.js"></script>
      <script src="js/worldLow.js"></script>
      <script src="js/raphael-min.js"></script>
      <script src="js/morris.js"></script>
      <script src="js/morris.min.js"></script>
      <script src="js/flatpickr.js"></script>
      <script src="js/style-customizer.js"></script>
      <script src="js/chart-custom.js"></script>
      <script src="js/custom.js"></script>
      <script>
             $(document).on('click', '.banner_delete', function() {
                var x = confirm('Are You Sure Want to Delete this?');
                if (x == true) {
                    var id = $(this).attr('id');
                    $.ajax({
                        type: "POST",
                        url: "ajax/delete_banner",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            window.location.reload();
                        }
                    });
                }
            });
         </script>
         <script>
        $(document).on('click','.disable',function() {
        var x = confirm('Are You Sure Want to Disable this?');
        if (x == true) {

            var id = $(this).attr('id');
            $.ajax({

                type: "POST",
                url: "ajax/disable_banner",
                data: {
                    id: id
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        }
    });

    $(document).on('click','.enable',function() {
        var x = confirm('Are You Sure Want to Enable this?');
        if (x == true) {

            var id = $(this).attr('id');
            $.ajax({

                type: "POST",
                url: "ajax/enable_banner",
                data: {
                    id: id
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        }
    });
    </script>
   </body>
</html>
