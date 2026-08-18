<?php 
require_once 'private/initialize.php';
require_login();
$page = "inquiry";
$inquiry_data = Inquiry::find_by_order();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <?php include 'include/head.php' ?>
</head>
<style>
    .modal-content{
        background-color: var(--iq-light-card); 
        border: 1px solid rgb(52 52 52);
    }
    .form-control{
        color: #000
    }
    .close{
        color: #fff;
    }
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 700px;
            margin: 1.75rem auto;
        }
    }
</style>
<body>
    <div class="wrapper">
        <?php include "include/sidebar.php" ?>
        <?php include "include/header.php" ?>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Inquiry List</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Subject</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $s = 1;
                                            foreach ($inquiry_data as $inquiry) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $s; ?>.</td>
                                                    <td><?php echo substr($inquiry->name, 0, 10) ?></td>
                                                    <td><?php echo substr($inquiry->email, 0, 20) ?></td>
                                                    <td><?php echo $inquiry->contact ?></td>
                                                    <td><?php echo substr($inquiry->subject, 0, 30) ?></td>
                                                    <td><?php echo $inquiry->created_at ?></td>
                                                    <td>
                                                        <span class="table-remove">
                                                            <a type="button" href="javascript:void(0);" class="btn iq-bg-dark btn-rounded btn-sm my-0 view-inquiry" data-id="<?php echo $inquiry->id ?>">View</a>
                                                        </span>
                                                        <span class="table-remove">
                                                            <button type="button" id="<?php echo $inquiry->id ?>" class="btn iq-bg-danger btn-rounded btn-sm my-0 inquiry_delete">Delete</button>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php $s++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Inquiry Details -->
        <div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inquiryModalLabel">Inquiry Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include "include/footer.php" ?>

        <!-- JS scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            // View Inquiry Modal
            $(document).on('click', '.view-inquiry', function() {
                var inquiryId = $(this).data('id');
                $.ajax({
                    url: 'ajax/view_inquiry',
                    type: 'GET',
                    data: { id: inquiryId },
                    success: function(response) {
                        $('#inquiryModal .modal-body').html(response);
                        $('#inquiryModal').modal('show');
                    },
                    error: function() {
                        alert('Error loading inquiry details.');
                    }
                });
            });

            // Delete Inquiry
            $(document).on('click', '.inquiry_delete', function() {
                var id = $(this).attr('id');
                var confirmation = confirm('Are you sure you want to delete this inquiry?');
                if (confirmation) {
                    $.ajax({
                        type: "POST",
                        url: "ajax/delete_inquiry",
                        data: { id: id },
                        success: function() {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    </body>
</html>
