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
                        <h4 class="mb-0">STAFF</h4>

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add New Staff</h4>

                            <hr>

                            <form action="" method="post" id="saveStaff" enctype="multipart/form-data">
                                <div id="staffMessage"></div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffName">Name of the Staff</label>
                                            <input class="form-control" type="text" name="staffName" placeholder="Name of the Staff" id="staffName" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffName">Slug</label>
                                            <input class="form-control" type="text" name="staffSlug" placeholder="Slug" id="staffSlug" readonly>
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="station">Station</label>
                                            <select name="station" class="form-control select2" id="station" required>
                                                <?php if (!empty($stations)): ?>
                                                    <option value="">Select Station</option>
                                                    <?php foreach ($stations as $st):  ?>
                                                        <option value="<?= $st->stationId; ?>"><?= $st->stationName; ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">No Stations Available</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="familyRegion">Region</label>
                                            <select name="region" id="region" class="form-control select2" required>
                                                <option value="">Select Region</option>
                                                <?php if (!empty($regions)): ?>
                                                    <?php foreach ($regions as $region): ?>
                                                        <option value="<?php echo $region->regionId; ?>"><?php echo $region->regionName; ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">No regions available</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <!-- Additional Information -->
                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffType">Staff Type</label>
                                            <select name="staffType" class="form-control select2" id="staffType" required>
                                                <option value="" selected>Select Staff Type</option>
                                                <option value="Station Staff">Station Staff</option>
                                                <option value="Regional Staff">Regional Staff</option>
                                                <option value="Office Staff">Office Staff</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="officeLocation">Office Location</label>
                                            <select name="officeLocation" id="officeLocation" class="form-control select2" required>
                                                <option value="" selected>Select Location</option>
                                                <option value="Head Office">Head Office</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6"></div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="joiningDate">Date of Joining</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="joiningDate" name="joiningDate" data-date-format="dd M, yyyy">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exitingDate">Date of Exiting</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="exitingDate" data-date-format="dd M, yyyy" name="exitingDate">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="joiningDate">Date of Birth</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" data-date-format="dd M, yyyy" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exitingDate">Date of Anniversary</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="dateofAnniversary" data-date-format="dd M, yyyy" name="dateofAnniversary">

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <hr>
                                <h6>Authentication Details</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input class="form-control" type="text" name="username" placeholder="Username" id="username" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="Password" id="password" required>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h6>Contact Details</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="whatsappNumber">Whatsapp Number</label>
                                            <input class="form-control" type="text" name="whatsappNumber" placeholder="Whatsapp Number" id="whatsappNumber" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="alternateWhatsappNumber">Alternate Whatsapp Number</label>
                                            <input class="form-control" type="text" name="alternateWhatsappNumber" placeholder="Alternate Whatsapp Number" id="alternateWhatsappNumber">
                                        </div>
                                    </div>
                                </div>





                                <h6>Family Details</h6>
                                <hr>
                                <div id="familyDetailsContainer">
                                    <div class="row family-detail">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="familyName">Name</label>
                                                <input class="form-control" type="text" name="familyName[]" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="familyRelation">Relation</label>
                                                <select name="familyRelation[]" class="form-control select2">
                                                    <option selected>Select Relation</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Daughter">Daughter</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="FamDOB">Date of Birth</label>
                                                <input type="date" class="form-control" id="FamDOB[]" name="FamDOB[]" data-date-format="dd M, yyyy">

                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="familyOccupation">Occupation</label>
                                                <input class="form-control" type="text" name="familyOccupation[]" placeholder="Occupation">
                                            </div>
                                        </div>

                                        <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#0545f5;">
                                            <i class="mdi mdi-alarm-plus add-family" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                        </div>
                                    </div>
                                </div>


                                <h6>Transfer Details</h6>
                                <hr>
                                <div id="transferDetailsContainer">
                                    <div class="row transfer-detail">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="transferDate">Effective Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="transferDate[]" data-date-format="dd M, yyyy">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="fromStation">From</label>
                                                <select name="fromStation[]" class="form-control select2">
                                                    <?php if (!empty($stations)): ?>
                                                        <option selected>Select Station</option>
                                                        <?php foreach ($stations as $st):  ?>
                                                            <option value="<?= $st->stationId; ?>"><?= $st->stationName; ?></option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option value="">No Stations Available</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="toStation">To</label>
                                                <select name="toStation[]" class="form-control select2">
                                                    <?php if (!empty($stations)): ?>
                                                        <option selected>Select Station</option>
                                                        <?php foreach ($stations as $st):  ?>
                                                            <option value="<?= $st->stationId; ?>"><?= $st->stationName; ?></option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option value="">No Stations Available</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#0545f5;">
                                            <i class="mdi mdi-alarm-plus add-transfer" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                        </div>
                                    </div>
                                </div>



                                <hr>




                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                        <!-- <button type="button" class="btn btn-secondary waves-effect m-l-5">Cancel</button> -->
                                    </div>
                                </div>

                            </form>


                        </div>



                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>



<script>
    $(document).ready(function() {

        $(document).on('click', '.add-family', function() {
            var familyDetailHTML = `
            <div class="row family-detail">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="familyName">Name</label>
                        <input class="form-control" type="text" name="familyName[]" placeholder="Name">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="familyRelation">Relation</label>
                        <select name="familyRelation[]" class="form-control select2">
                            <option selected>Select Relation</option>
                            <option value="Spouse">Spouse</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="FamDOB">Date of Birth</label>
                         <input type="date" class="form-control" id="FamDOB[]" name="FamDOB[]"  data-date-format="dd M, yyyy">
                                               
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="familyOccupation">Occupation</label>
                        <input class="form-control" type="text" name="familyOccupation[]" placeholder="Occupation">
                    </div>
                </div>
                <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                    <i class="mdi mdi-close-thick remove-family" style="font-style: normal;cursor: pointer">&nbsp;</i>
                </div>
            </div>`;

            $('#familyDetailsContainer').append(familyDetailHTML);

            $('.select2').select2();
        });


        $(document).on('click', '.remove-family', function() {
            $(this).closest('.family-detail').remove();
        });


        $(document).on('click', '.add-transfer', function() {
            var transferDetailHTML = `
            <div class="row transfer-detail">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="transferDate">Effective Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="transferDate[]"  data-date-format="dd M, yyyy">
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="fromStation">From</label>
                        <select name="fromStation[]" class="form-control select2">
                               <?php if (!empty($stations)): ?>
                                                    <option selected>Select Station</option>
                                                    <?php foreach ($stations as $st):  ?>
                                                        <option value="<?= $st->stationId; ?>"><?= $st->stationName; ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">No Stations Available</option>
                                                <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="toStation">To</label>
                        <select name="toStation[]" class="form-control select2">
                             <?php if (!empty($stations)): ?>
                                                    <option selected>Select Station</option>
                                                    <?php foreach ($stations as $st):  ?>
                                                        <option value="<?= $st->stationId; ?>"><?= $st->stationName; ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">No Stations Available</option>
                                                <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                    <i class="mdi mdi-close-thick remove-transfer" style="font-style: normal; cursor: pointer">&nbsp;</i>
                </div>
            </div>`;

            $('#transferDetailsContainer').append(transferDetailHTML);

            $('.select2').select2();

            // $('[data-provide="datepicker"]').datepicker();
        });


        $(document).on('click', '.remove-transfer', function() {
            $(this).closest('.transfer-detail').remove();
        });
    });
</script>


<!-- <script>
    $(document).ready(function() {
        $('#saveStaff').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url("Staff/insertStaffDetails"); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#staffMessage').html('<div class="alert alert-success">Staff details saved successfully!</div>');
                    } else {
                        $('#staffMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Response Text:', jqXHR.responseText);
                    console.log('Status:', textStatus);
                    console.log('Error Thrown:', errorThrown);
                    $('#staffMessage').html('<div class="alert alert-danger">Error occurred: ' + textStatus + '</div>');
                }
            });
        });
    });





    $('#staffName').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#staffSlug').val(filteredText.toLowerCase());
        $('#username').val(filteredText.toLowerCase());

    });
</script> -->

<script>
    $(document).ready(function() {
        $('#saveStaff').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url("Staff/insertStaffDetails"); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    var message = response.message;
                    var status = response.success ? 'success' : 'error';


                    localStorage.setItem('staffMessage', JSON.stringify({
                        status: status,
                        message: message
                    }));


                    window.location.href = '<?php echo base_url("staff/manage"); ?>';
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Response Text:', jqXHR.responseText);
                    console.log('Status:', textStatus);
                    console.log('Error Thrown:', errorThrown);
                    localStorage.setItem('staffMessage', JSON.stringify({
                        status: 'error',
                        message: 'Error occurred: ' + textStatus
                    }));
                    window.location.href = '<?php echo base_url("staff/manage"); ?>';
                }
            });
        });

        $('#staffName').keyup(function() {
            var originalText = $(this).val();
            var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
            $('#staffSlug').val(filteredText.toLowerCase());
            $('#username').val(filteredText.toLowerCase());
        });
    });
</script>



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