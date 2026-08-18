<?php 
require_once 'private/initialize.php';
require_login(); 
if(isset($_GET['language'])) {
    $language = $_GET['language'];
    $page="footer-$language"; 
    $footer_data = FooterList::find_by_language_footer($language);
} else {
    $id = $_GET['id'];
    $footer = FooterList::find_by_id($id);
    
    if($footer == false){
        redirect_to(url_for('footer_list/'.$language));
      }  
    if (is_post_request()) {
       
      $name = htmlentities($database->escape_string($_POST['footer']['link_name']));
      $args = $_POST['footer'];
      $footer->merge_attributes($args);
      $footer->link_name = $name;
       $result = $footer->save();
      
      if($result === true) {
      $session->message('The Footer List Updated successfully.');
          redirect_to(url_for('footer_list/'.$language));
    }
    else {
       $session->message(join("<br>", $socials->errors));
    
    }
       
    } else {
       $footer = new FooterList;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo $base_url_admin?>">
    <!-- Required meta tags -->
    <?php include 'include/head.php' ?>
</head>
<style>
    .modal-content{
        background-color: var(--iq-light-card); 
        border: 1px solid rgb(52 52 52);
    }
    .form-control{
        color: #fff
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
                                    <h4 class="card-title">Footer Url List</h4>
                                </div>
                                <button type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#addModal">Add New</button>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>URL</th> 
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $s = 1;
                                            foreach ($footer_data as $footer_list) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $s; ?></td>
                                                    <td><?php echo $footer_list->link_name ?></td>
                                                    <td><?php echo $footer_list->link_value ?></td> 
                                                    <td>
                                                        <span class="table-remove">
                                                            <a type="button" href="javascript:void(0);" class="btn iq-bg-dark btn-rounded btn-sm my-0 view-Url edit-btn" data-id="<?php echo $footer_list->id ?>">Update</a>
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
 
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Footer Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="footerAddForm" method="post">
                        <div class="row">
                            <input type="hidden" name="footer[language]" value="<?php echo $language; ?>">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" id="add_link_name" name="footer[link_name]" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Url</label>
                                <input type="text" class="form-control" id="add_link_value" name="footer[link_value]" value="" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Footer Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="footerForm" method="post">
                        <div class="row">
                        <input type="hidden" id="footer_id" name="footer[id]" value="">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" id="link_name" name="footer[link_name]" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Url</label>
                                <input type="text" class="form-control" id="link_value" name="footer[link_value]" value="">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </form>
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
            $(document).ready(function() { 
                $('.edit-btn').on('click', function() {
                    var id = $(this).data('id'); 
                    $.ajax({
                        url: 'ajax/view_footer_url',
                        type: 'GET',
                        data: { id: id },
                        success: function(response) {
                            var data = JSON.parse(response);

                            if (!data.error) {
                                $('#link_name').val(data.link_name);
                                $('#link_value').val(data.link_value);
                                $('#footer_id').val(id); 
                                $('#editModal').modal('show');
                            } else {
                                alert(data.error);
                            }
                        }
                    });
                }); 
                $('#footerAddForm').on('submit', function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();

                    $.ajax({
                        url: 'ajax/add_footer_url',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            var data = JSON.parse(response);

                            if (!data.error) {
                                alert('Footer List added successfully');
                                $('#addModal').modal('hide');
                                location.reload();
                            } else {
                                alert(data.error);
                            }
                        }
                    });
                });
                $('#footerForm').on('submit', function(event) {
                    event.preventDefault();  
                    var formData = $(this).serialize();  
            
                    $.ajax({
                        url: 'ajax/update_footer_url',  
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            var data = JSON.parse(response);

                            if (!data.error) {
                                alert('Footer List updated successfully');
                                $('#editModal').modal('hide');
                                location.reload();  
                            } else {
                                alert(data.error);
                            }
                        }
                    });
                }); 
            }); 
        </script>
    </body>
</html>
