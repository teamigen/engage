<link href="<?= base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<!-- Plugins css -->
<link href="<?= base_url(); ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Student Leaders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="" style="margin-right:20px;">

                                </li>


                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create Student Leader</h4>
                            <p class="card-title-desc">Provide the details of your Student Leader</p>

                            <form action="#" id="saveLeader">
                                <div id="leaderMessage"></div>
                                <div class="form-group">
                                    <label>Name of Student Leader</label>
                                    <input class="form-control" type="text" name="name_of_leader"
                                        placeholder="Name of Student Leader" id="name_of_leader">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="leaderSlug"
                                        placeholder="leaderSlug" id="leaderSlug" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Course & Class</label>
                                    <input class="form-control" type="text" name="courseclass_of_leader"
                                        placeholder="Course & Class" id="courseclass_of_leader">
                                </div>
                                <div class="form-group">
                                    <label>Institute/College</label>
                                    <select name="Institute" class="form-control select2" id="Institute" placeholder="Select Institute/College">
                                        <option selected>Select Institute/College</option>
                                        <?php if (!empty($institutes)): ?>
                                            <?php foreach ($institutes as $inst): ?>
                                                <option value="<?= $inst->instituteId; ?>"><?= $inst->instituteName; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Leaders Home Location</label>
                                    <input class="form-control" type="text" name="home_location"
                                        placeholder="Home Location" id="home_location">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Phone</label>
                                    <input class="form-control" type="text" name="phone_of_leader"
                                        placeholder="Mobile Phone" id="phone_of_leader">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="email_of_leader"
                                        placeholder="Email" id="email_of_leader">
                                </div>

                                <div class="form-group">
                                    <label>Year of Joining ICPF</label>
                                    <input class="form-control" type="text" name="joining_as_leader"
                                        placeholder="Year of Joining ICPF" id="joining_as_leader">
                                </div>
                                <div class="form-group">
                                    <label>Year of Graduation</label>
                                    <input class="form-control" type="text" name="year_of_graduation"
                                        placeholder="Year of Graduation" id="year_of_graduation">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                </div>


                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Student Leaders</h4>
                            <p class="card-title-desc">Student Leaders in the Station</p>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Leader Name</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($leaders as $lead) { ?>
                                        <tr>
                                            <td><?= $lead->name_of_leader; ?></td>
                                            <td><?= $lead->home_location; ?></td>

                                            <td>
                                                <a href="<?= base_url('Leaders/edit/' . $lead->leaderSlug) ?>" class="edit-row" data-id="<?= $lead->leaderSlug ?>"><i class="ri-pencil-line"></i></a>&nbsp;
                                                <a href="javascript:void(0);" class="delete-row" data-id="<?= $lead->leaderSlug ?>"><i class="ri-delete-bin-line"></i></a>&nbsp;
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>



                        </div>
                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<script>
    $(document).ready(function() {
        $('#name_of_leader').keyup(function() {
            var originalText = $(this).val();
            var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
            $('#leaderSlug').val(filteredText.toLowerCase());
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#saveLeader').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url('Leaders/saveLeader'); ?>',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    //alert(response);
                    var response = JSON.parse(response)
                    if (response.success) {
                        $('#saveLeader').trigger("reset");
                        $('#leaderMessage').html('<p>Leader Successfully Created!</p>').addClass('alert alert-success');
                    } else {
                        var errors = response.error;
                        var errorMessage = "";
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessage += "<p>" + errors[key] + "</p>";
                            }
                        }
                        $('#leaderMessage').html(errorMessage).addClass('alert alert-danger');
                    }
                },


                error: function(jqXHR, textStatus, errorThrown) {

                    console.error('AJAX Error:', textStatus, errorThrown);
                    $('#leaderMessage').html('<hr><h6 style="color:red; margin-top:10px; margin-bottom:10px">There is an error! Please try later!</h6><hr>');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function() {
                var slug = this.getAttribute('data-id');
                var row = this.closest('tr'); 

                if (confirm('Are you sure you want to delete this row?')) {
                    fetch('<?= base_url(); ?>Leaders/delete/' + slug, {
                            method: 'GET', 
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (response.redirected) {
                                window.location.href = response.url;
                            }
                            return response.text(); 
                        })
                        .then(data => {
                            
                            row.remove();
                            alert('Leader deleted successfully!');
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    });
</script>




<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<!-- JAVASCRIPT -->
<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

<script src="<?= base_url(); ?>assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<script src="<?= base_url(); ?>assets/js/pages/form-advanced.init.js"></script>
<!-- Plugins js -->
<script src="<?= base_url(); ?>assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>