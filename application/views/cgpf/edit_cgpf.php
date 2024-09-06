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
                        <h4 class="mb-0">CGPF</h4>

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

                            <h4 class="card-title">CGPF </h4>
                            <p class="card-title-desc">Create New CGPF Team
                            </p>
                            <hr>
                            <div class="row">


                                <form action="<?= base_url('cgpf/update/' . $cgpf->cgpf_slug) ?>" id="saveCGPF" method="POST">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Name of CGPF</label>
                                                <input class="form-control" type="text" name="cgpf_name" value="<?= $cgpf->cgpf_name ?>" placeholder="Name of CGPF" id="cgpf_name">
                                            </div>

                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input class="form-control" type="text" name="cgpf_slug" value="<?= $cgpf->cgpf_slug ?>" placeholder="Slug" id="cgpf_slug" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <select name="location_id" class="form-control select2" id="location_id">
                                                    <option value="" <?= empty($cgpf->location_id) ? 'selected' : '' ?>>Select Location</option>
                                                    <?php foreach ($locations as $locns): ?>
                                                        <option value="<?= $locns->locationId ?>" <?= $locns->locationId == $cgpf->location_id ? 'selected' : '' ?>><?= $locns->locationName ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Period Name</label>
                                                <input class="form-control" type="text" name="period_name" value="<?= $cgpf->period_name ?>" placeholder="Period Name" id="period_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="start_date" value="<?= $cgpf->start_date ?>" placeholder="Start Date">
                                                    <input type="date" class="form-control" name="end_date" value="<?= $cgpf->end_date ?>" placeholder="End Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="memberContainer">
                                        <?php if (!empty($members)): ?>
                                            <?php foreach ($members as $index => $member): ?>
                                                <div class="row member-row">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Member Name</label>
                                                            <input class="form-control" type="text" name="members[<?= $index ?>][name]" value="<?= $member->name ?>" placeholder="Name of the Member">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Designation</label>
                                                            <select name="members[<?= $index ?>][designation]" class="form-control select2">
                                                                <option value="President" <?= ($member->designation == 'President') ? 'selected' : '' ?>>President</option>
                                                                <option value="Vice-President" <?= ($member->designation == 'Vice-President') ? 'selected' : '' ?>>Vice-President</option>
                                                                <option value="Secretary" <?= ($member->designation == 'Secretary') ? 'selected' : '' ?>>Secretary</option>
                                                                <option value="Joint Secretary" <?= ($member->designation == 'Joint Secretary') ? 'selected' : '' ?>>Joint Secretary</option>
                                                                <option value="Treasurer" <?= ($member->designation == 'Treasurer') ? 'selected' : '' ?>>Treasurer</option>
                                                                <option value="Member" <?= ($member->designation == 'Member') ? 'selected' : '' ?>>Member</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Mobile / Whatsapp Number</label>
                                                            <input class="form-control" type="text" name="members[<?= $index ?>][phone]" value="<?= $member->phone ?>" placeholder="Mobile / Whatsapp Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="members[<?= $index ?>][email]" value="<?= $member->email ?>" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1" style="padding-top:35px;">
                                                        <i class="mdi mdi-alarm-plus add-member" style="cursor: pointer;"></i>
                                                        <i class="ri-delete-bin-6-line remove-member" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: right;">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
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

<script>
    $(document).ready(function() {

        $('.select2').select2();


        $('.input-daterange').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });

        // Add a new member row
        $(document).on('click', '.add-member', function() {
            var index = $('#memberContainer .member-row').length; // Calculate next index based on current members
            var newRow = `
            <div class="row member-row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Member Name</label>
                        <input class="form-control" type="text" name="members[` + index + `][name]" placeholder="Name of the Member">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Designation</label>
                        <select name="members[` + index + `][designation]" class="form-control select2">
                            <option value="President">President</option>
                            <option value="Vice-President">Vice-President</option>
                            <option value="Secretary">Secretary</option>
                            <option value="Joint Secretary">Joint Secretary</option>
                            <option value="Treasurer">Treasurer</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Mobile / Whatsapp Number</label>
                        <input class="form-control" type="text" name="members[` + index + `][phone]" placeholder="Mobile / Whatsapp Number">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="members[` + index + `][email]" placeholder="Email">
                    </div>
                </div>
                <div class="col-lg-1" style="padding-top:35px;">
                    <i class="mdi mdi-alarm-plus add-member" style="cursor: pointer;"></i>
                    <i class="ri-delete-bin-6-line remove-member" style="cursor: pointer;"></i>
                </div>
            </div>
        `;

            $('#memberContainer').append(newRow);
            $('.select2').select2(); // Reinitialize select2 for the new row
        });

        // Remove a member row
        $(document).on('click', '.remove-member', function() {
            $(this).closest('.member-row').remove();
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