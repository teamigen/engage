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

                                <div class="row">
                                    <input type="hidden" name="staffId" value="<?= htmlspecialchars($staff['staffId'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffName">Name of the Staff</label>
                                            <input type="text" name="staffName" id="staffName" value="<?= htmlspecialchars($staff['staffName'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffSlug">Slug</label>
                                            <input type="text" name="staffSlug" id="staffSlug" value="<?= htmlspecialchars($staff['staffSlug'] ?? '', ENT_QUOTES, 'UTF-8') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="station">Station</label>
                                            <select name="station" class="form-control select2" id="station">
                                                <?php if (!empty($stations)): ?>
                                                    <option value="">Select Station</option>
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
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="region">Region</label>
                                            <select name="region" id="region" class="form-control select2">
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

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffType">Staff Type</label>
                                            <select name="staffType" class="form-control select2" id="staffType">
                                                <option value="">Select Staff Type</option>
                                                <option value="Station Staff" <?= ($staff['staffType'] == 'Station Staff') ? 'selected' : ''; ?>>Station Staff</option>
                                                <option value="Regional Staff" <?= ($staff['staffType'] == 'Regional Staff') ? 'selected' : ''; ?>>Regional Staff</option>
                                                <option value="Office Staff" <?= ($staff['staffType'] == 'Office Staff') ? 'selected' : ''; ?>>Office Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="officeLocation">Office Location</label>
                                            <select name="officeLocation" id="officeLocation" class="form-control select2">
                                                <option value="">Select Office</option>
                                                <?php if (!empty($offices)): ?>
                                                    <?php foreach ($offices as $off): ?>
                                                        <option value="<?= $off->officeId; ?>" <?= ($off->officeId == $staff['officeLocation']) ? 'selected' : ''; ?>>
                                                            <?= $off->officeLocation; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">No Offices available</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="joiningDate">Date of Joining</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="joiningDate" name="joiningDate" value="<?= htmlspecialchars($staff['joiningDate'] ?? '', ENT_QUOTES, 'UTF-8') ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exitingDate">Date of Exiting</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="exitingDate" name="exitingDate" value="<?= htmlspecialchars($staff['exitingDate'] ?? '', ENT_QUOTES, 'UTF-8') ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" value="<?= htmlspecialchars($staff['username'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" value="<?= htmlspecialchars($staff['password'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="whatsappNumber">WhatsApp Number</label>
                                            <input type="text" name="whatsappNumber" id="whatsappNumber" value="<?= htmlspecialchars($staff['whatsappNumber'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="alternateWhatsappNumber">Alternate WhatsApp Number</label>
                                            <input type="text" name="alternateWhatsappNumber" id="alternateWhatsappNumber" value="<?= htmlspecialchars($staff['alternateWhatsappNumber'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="dateofbirth">Date of Birth</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="<?= htmlspecialchars($staff['dateofbirth'] ?? '', ENT_QUOTES, 'UTF-8') ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="dateofAnniversary">Date of Anniversary</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dateofAnniversary" name="dateofAnniversary" value="<?= htmlspecialchars($staff['dateofAnniversary'] ?? '', ENT_QUOTES, 'UTF-8') ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
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
                                                        <option value="Spouse" <?= ($family->familyRelation ?? '') == 'Spouse' ? 'selected' : ''; ?>>Spouse</option>
                                                        <option value="Child" <?= ($family->familyRelation ?? '') == 'Child' ? 'selected' : ''; ?>>Child</option>
                                                        <option value="Parent" <?= ($family->familyRelation ?? '') == 'Parent' ? 'selected' : ''; ?>>Parent</option>
                                                        <option value="Other" <?= ($family->familyRelation ?? '') == 'Other' ? 'selected' : ''; ?>>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="familyAge">Age</label>
                                                    <input class="form-control" type="text" name="familyAge[]" value="<?= htmlspecialchars($family->familyAge ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Age">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="familyOccupation">Occupation</label>
                                                    <input class="form-control" type="text" name="familyOccupation[]" value="<?= htmlspecialchars($family->Occupation ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Occupation">
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
                                                    <label for="fromStation">From Station</label>
                                                    <input class="form-control" type="text" name="fromStation[]" value="<?= htmlspecialchars($transfer->fromStation ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="From Station">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="toStation">To Station</label>
                                                    <input class="form-control" type="text" name="toStation[]" value="<?= htmlspecialchars($transfer->toStation ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="To Station">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="transferDate">Transfer Date</label>
                                                    <input class="form-control" type="date" name="transferDate[]" value="<?= htmlspecialchars($transfer->transferDate ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Transfer Date">
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
        $('[data-provide="datepicker"]').datepicker();

        function initializeSelect2() {
            $('.select2').select2();
        }

     
        $('#addFamilyRow').click(function() {
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
                                <option value="Spouse">Spouse</option>
                                <option value="Child">Child</option>
                                <option value="Parent">Parent</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="familyAge">Age</label>
                            <input class="form-control" type="text" name="familyAge[]" placeholder="Age">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="familyContact">Occupation</label>
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

     
        $('#addTransferRow').click(function() {
            var transferDetailHTML = `
                <div class="row transfer-detail">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="fromStation">From Station</label>
                            <input class="form-control" type="text" name="fromStation[]" placeholder="From Station">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="toStation">To Station</label>
                            <input class="form-control" type="text" name="toStation[]" placeholder="To Station">
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
           
        });

        $(document).on('click', '.remove-transfer', function() {
            $(this).closest('.transfer-detail').remove();
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