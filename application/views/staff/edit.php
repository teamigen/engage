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

                            <h4 class="card-title">Edit Staff</h4>

                            <hr>

                            <form action="<?= base_url('staff/updateStaffDetails') ?>" method="post" id="saveStaff" enctype="multipart/form-data">
                                <div id="staffMessage"></div>

                                <input type="hidden" name="staffId" value="<?= htmlspecialchars($staff['staffId'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffName">Name of the Staff</label>
                                            <input class="form-control" type="text" name="staffName" id="staffName" value="<?= htmlspecialchars($staff['staffName'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffName">Slug</label>
                                            <input class="form-control" type="text" name="staffSlug" id="staffSlug" value="<?= htmlspecialchars($staff['staffSlug'] ?? '', ENT_QUOTES, 'UTF-8') ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            
                                            <label for="station">Station</label>

                                            <div class="input-group">
                                                <select name="station" class="form-control select2" id="station" required>
                                                    <?php if (!empty($stations)): ?>
                                                        <option value="">Select Station</option >
                                                        <?php foreach ($stations as $st): ?>
                                                            <option value="<?= $st->stationId; ?>" <?= ($st->stationId == $staff['station']) ? 'selected' : ''; ?>>
                                                                <?= $st->stationName; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option value="">No Stations Available</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="familyRegion">Region</label>
                                            <div class="input-group">
                                                <select name="region" id="region" class="form-control select2" required>
                                                    <option value="">Select Region</option>
                                                    <?php if (!empty($regions)): ?>
                                                        <?php foreach ($regions as $region): ?>
                                                            <option value="<?= $region->regionId; ?>" <?= ($region->regionId == $staff['region']) ? 'selected' : ''; ?>>
                                                                <?= $region->regionName; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option value="">No regions available</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffType">Staff Type</label>
                                            <div class="input-group">
                                                <select name="staffType" class="form-control select2" id="staffType" required>
                                                    <option value="">Select Staff Type</option>
                                                    <option value="Station Staff" <?= ($staff['staffType'] == 'Station Staff') ? 'selected' : ''; ?>>Station Staff</option>
                                                    <option value="Regional Staff" <?= ($staff['staffType'] == 'Regional Staff') ? 'selected' : ''; ?>>Regional Staff</option>
                                                    <option value="Office Staff" <?= ($staff['staffType'] == 'Office Staff') ? 'selected' : ''; ?>>Office Staff</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="officeLocation">Office Location</label>


                                            <select name="officeLocation" id="officeLocation" class="form-control select2" required>
                                                <option value="">Select Office</option>
                                                <option value="Head Office" <?= ($staff['officeLocation'] == 'Head Office') ? 'selected' : ''; ?>>Head Office</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="joiningDate">Date of Joining</label>
                                            <div class="input-group">

                                                <input type="date" class="form-control" id="joiningDate" name="joiningDate" value="<?= htmlspecialchars($staff['joiningDate'] ?? '', ENT_QUOTES, 'UTF-8') ?>"  data-date-format="dd M, yyyy">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exitingDate">Date of Exiting</label>
                                            <div class="input-group">

                                                <input type="date" class="form-control" id="exitingDate" name="exitingDate" value="<?= htmlspecialchars($staff['exitingDate'] ?? '', ENT_QUOTES, 'UTF-8') ?>"  data-date-format="dd M, yyyy">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dateofbirth">Date of Birth</label>
                                            <div class="input-group">

                                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="<?= htmlspecialchars($staff['dateofbirth'] ?? '', ENT_QUOTES, 'UTF-8') ?>"  data-date-format="dd M, yyyy" required>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dateofAnniversary">Date of Anniversary</label>
                                            <div class="input-group">

                                                <input type="date" class="form-control" id="dateofAnniversary" name="dateofAnniversary" value="<?= htmlspecialchars($staff['dateofAnniversary'] ?? '', ENT_QUOTES, 'UTF-8') ?>"  data-date-format="dd M, yyyy">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <h6>Authentication Details</h6>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" value="<?= htmlspecialchars($staff['username'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password if you want to change it">

                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <h6>Contact Details</h6>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="whatsappNumber">WhatsApp Number</label>
                                            <input class="form-control" type="text" name="whatsappNumber" id="whatsappNumber" value="<?= htmlspecialchars($staff['whatsappNumber'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="alternateWhatsappNumber">Alternate WhatsApp Number</label>
                                            <input class="form-control" type="text" name="alternateWhatsappNumber" id="alternateWhatsappNumber" value="<?= htmlspecialchars($staff['alternateWhatsappNumber'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                        </div>
                                    </div>
                                </div>



                                <h6>Family Details</h6>
                                <hr>
                                <div id="familyDetailsContainer">
                                    <?php foreach ($family_details as $family): ?>
                                        <div class="row family-detail">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="familyName">Name</label>
                                                    <input class="form-control" type="text" name="familyName[]" value="<?= htmlspecialchars($family->familyName ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="familyRelation">Relation</label>
                                                    <select name="familyRelation[]" class="form-control select2">
                                                        <option selected>Select Relation</option>
                                                        <option value="Spouse" <?= ($family->familyRelation ?? '') == 'Spouse' ? 'selected' : ''; ?>>Spouse</option>
                                                        <option value="Son" <?= ($family->familyRelation ?? '') == 'Son' ? 'selected' : ''; ?>>Son</option>
                                                        <option value="Daughter" <?= ($family->familyRelation ?? '') == 'Daughter' ? 'selected' : ''; ?>>Daughter</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="FamDOB">Date Of Birth</label>
                                                    <input class="form-control" type="date" name="FamDOB[]" value="<?= htmlspecialchars($family->FamDOB ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Date of birth">
                                                  

                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="familyOccupation">Occupation</label>
                                                    <input class="form-control" type="text" name="familyOccupation[]" value="<?= htmlspecialchars($family->familyOccupation ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Occupation">
                                                </div>
                                            </div>
                                            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#0545f5;">
                                                <i class="mdi mdi-alarm-plus" id="addFamilyRow" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                            </div>
                                            <div class="form-group" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                                                <i class="mdi mdi-close-thick remove-family" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>


                                <h6>Transfer Details</h6>
                                <hr>
                                <div id="transferDetailsContainer">
                                    <?php foreach ($transfer_details as $transfer): ?>
                                        <div class="row transfer-detail">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="transferDate">Transfer Date</label>
                                                    <input class="form-control" type="date" name="transferDate[]" value="<?= htmlspecialchars($transfer->transferDate ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Transfer Date">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="fromStation">From Station</label>
                                                    <select name="fromStation[]" class="form-control select2">
                                                        <option value="" <?= empty($transfer->fromStation) ? 'selected' : ''; ?>>Select Station</option>
                                                        <?php foreach ($stations as $station): ?>
                                                            <option value="<?= $station->stationId ?>" <?= ($transfer->fromStation ?? '') == $station->stationId ? 'selected' : ''; ?>>
                                                                <?= htmlspecialchars($station->stationName, ENT_QUOTES, 'UTF-8'); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="toStation">To Station</label>
                                                    <select name="toStation[]" class="form-control select2">
                                                        <option value="" <?= empty($transfer->toStation) ? 'selected' : ''; ?>>Select Station</option>
                                                        <?php foreach ($stations as $station): ?>
                                                            <option value="<?= $station->stationId ?>" <?= ($transfer->toStation ?? '') == $station->stationId ? 'selected' : ''; ?>>
                                                                <?= htmlspecialchars($station->stationName, ENT_QUOTES, 'UTF-8'); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#0545f5;">
                                                <i class="mdi mdi-alarm-plus" id="addTransferRow" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                            </div>
                                            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                                                <i class="mdi mdi-close-thick remove-transfer" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>







                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </form>






                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.select2').select2();

        function initializeSelect2() {
            $('.select2').select2();
        }

        $(document).on('click', '#addFamilyRow', function() {
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
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="familyAge">Date Of Birth</label>
                    <div class="input-group-append">
                                                       <input type="date" class="form-control" id="FamDOB[]" name="FamDOB[]"  data-date-format="dd M, yyyy">
                                                </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="familyOccupation">Occupation</label>
                    <input class="form-control" type="text" name="familyOccupation[]" placeholder="Occupation">
                </div>
            </div>
            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                <i class="mdi mdi-close-thick remove-family" style="font-style: normal; cursor: pointer;">&nbsp;</i>
            </div>
        </div>`;
            $('#familyDetailsContainer').append(familyDetailHTML);
            initializeSelect2();
        });

        $(document).on('click', '.remove-family', function() {
            $(this).closest('.family-detail').remove();
        });

        $(document).on('click', '#addTransferRow', function() {
            var transferDetailHTML = `
        <div class="row transfer-detail">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="fromStation">From Station</label>
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
                    <label for="toStation">To Station</label>
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
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="transferDate">Transfer Date</label>
                    <input class="form-control" type="date" name="transferDate[]" placeholder="Transfer Date">
                </div>
            </div>
            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                <i class="mdi mdi-close-thick remove-transfer" style="font-style: normal; cursor: pointer;">&nbsp;</i>
            </div>
        </div>`;
            $('#transferDetailsContainer').append(transferDetailHTML);
            initializeSelect2();
        });

        $(document).on('click', '.remove-transfer', function() {
            $(this).closest('.transfer-detail').remove();
        });
    });


    $('#staffName').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#staffSlug').val(filteredText.toLowerCase());
        $('#username').val(filteredText.toLowerCase());

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