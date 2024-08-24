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

                            <form action="<?= site_url('staff/updateStaff/' . $staff->staffId) ?>" method="post" id="saveStaff">
                                <div id="staffMessage"></div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffName">Name of the Staff</label>
                                            <input class="form-control" type="text" name="staffName" placeholder="Name of the Staff" id="staffName" value="<?= $staff->staffName ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="staffSlug">Slug</label>
                                            <input class="form-control" type="text" name="staffSlug" placeholder="Slug" id="staffSlug" value="<?= $staff->staffSlug ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="station">Station</label>
                                            <select name="station" class="form-control select2" id="station">
                                                <?php if (!empty($stations)): ?>
                                                    <option value="">Select Station</option>
                                                    <?php foreach ($stations as $st): ?>
                                                        <option value="<?= $st->stationId; ?>" <?= ($st->stationId == $staff->stationId) ? 'selected' : ''; ?>><?= $st->stationName; ?></option>
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
                                                        <option value="<?= $region->regionId; ?>" <?= ($region->regionId == $staff->regionId) ? 'selected' : ''; ?>><?= $region->regionName; ?></option>
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
                                            <select name="staffType" class="form-control select2" id="staffType">
                                                <option value="Station Staff" <?= ($staff->staffType == 'Station Staff') ? 'selected' : ''; ?>>Station Staff</option>
                                                <option value="Regional Staff" <?= ($staff->staffType == 'Regional Staff') ? 'selected' : ''; ?>>Regional Staff</option>
                                                <option value="Office Staff" <?= ($staff->staffType == 'Office Staff') ? 'selected' : ''; ?>>Office Staff</option>
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
                                                        <option value="<?= $off->officeId; ?>" <?= ($off->officeId == $staff->officeId) ? 'selected' : ''; ?>><?= $off->officeLocation; ?></option>
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
                                                <input type="text" class="form-control" id="joiningDate" name="joiningDate" value="<?= date('d M, Y', strtotime($staff->joiningDate)) ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
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
                                                <input type="text" class="form-control" id="exitingDate" name="exitingDate" value="<?= !empty($staff->exitingDate) ? date('d M, Y', strtotime($staff->exitingDate)) : '' ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dateofbirth">Date of Birth</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="<?= date('d M, Y', strtotime($staff->dateofbirth)) ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dateofAnniversary">Date of Anniversary</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dateofAnniversary" name="dateofAnniversary" value="<?= !empty($staff->dateofAnniversary) ? date('d M, Y', strtotime($staff->dateofAnniversary)) : '' ?>" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
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
                                            <input class="form-control" type="text" name="username" placeholder="Username" id="username" value="<?= $staff->username ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control select2">
                                                <option value="1" <?= ($staff->status == 1) ? 'selected' : ''; ?>>Active</option>
                                                <option value="0" <?= ($staff->status == 0) ? 'selected' : ''; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="<?= site_url('staff') ?>" class="btn btn-secondary">Cancel</a>
                                </div>
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