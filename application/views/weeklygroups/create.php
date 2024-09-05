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
                        <h4 class="mb-0">List of Weekly Groups</h4>

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

                            <h4 class="card-title">Create Group</h4>
                            <p class="card-title-desc">Manage Groups in the Location</p>

                            <form action="#" id="saveGroup" method="post">
                                <div id="groupMessage"></div>
                                <div class="form-group">
                                    <label>Name of Group</label>
                                    <input class="form-control" type="text" name="groupName"
                                        placeholder="Name of Group" id="groupName">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="groupSlug"
                                        placeholder="Name of Group" id="groupSlug">
                                </div>

                                <div class="form-group">
                                    <label for="churchLocation">Location</label>
                                    <select name="groupLocation" id="groupLocation" class="form-control select2">
                                        <option selected>Select Location</option>
                                        <?php if (!empty($locations)): ?>
                                            <?php foreach ($locations as $location): ?>
                                                <option value="<?php echo $location->locationId; ?>"><?php echo $location->locationName; ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No Locations available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Meeting Place</label>
                                    <input class="form-control" type="text" name="meetingPlace"
                                        placeholder="Meeting Place" id="meetingPlace">
                                </div>
                                <div class="form-group">
                                    <label>Type of Group</label>
                                    <select name="groupType" class="form-control select2" id="groupType" placeholder="Type of Group">
                                        <option selected>Select Type of Group</option>
                                        <option value="Evangelistic Group 1">Evangelistic Group 1</option>
                                        <option value="Evangelistic Group 2">Evangelistic Group 2</option>
                                    </select>
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

                            <h4 class="card-title">Weekly Groups</h4>
                            <p class="card-title-desc">Weekly Groups in the Station</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Nalamchira Group</td>
                                        <td>Nalamchira</td>
                                        <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>

                                    </tr>
                                    <tr>
                                        <td>CET Group</td>
                                        <td>Sreekariyam</td>
                                        <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>

                                    </tr>





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
        $('#saveGroup').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?php echo base_url("Weeklygroups/insertGroup"); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#groupMessage').html('<div class="alert alert-success">Group details saved successfully!</div>');
                    } else {
                        $('#groupMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#groupMessage').html('<div class="alert alert-danger">Error occurred: ' + textStatus + '</div>');
                }
            });
        });
    });




    $('#groupName').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#groupSlug').val(filteredText.toLowerCase());
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