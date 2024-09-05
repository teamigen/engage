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
                        <h4 class="mb-0">Edit Student council</h4>

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

                            <form action="<?= base_url('Council/updateCouncil') ?>" id="saveStudentCouncil" method="post">
                                <div id="staffMessage"></div>


                                <input type="hidden" name="councilId" value="<?= htmlspecialchars($council['councilId'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <h4 class="card-title">Student Council</h4>
                                <p class="card-title-desc">Edit Student Council</p>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Name of Council</label>
                                            <input class="form-control" type="text" name="councilName" id="councilName" value="<?= $council['councilName']; ?>" placeholder="Name of Council">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input class="form-control" type="text" name="councilSlug" id="councilSlug" value="<?= $council['councilSlug']; ?>" placeholder="Council Slug">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select name="councilLocation" class="form-control select2" id="councilLocation" required>
                                                <option>Select Location</option>
                                                <?php if (!empty($locations)): ?>
                                                    <?php foreach ($locations as $locns): ?>
                                                        <option value="<?= $locns->locationId; ?>" <?= $council['councilLocation'] == $locns->locationId ? 'selected' : ''; ?>><?= $locns->locationName; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Institute</label>
                                            <select name="councilInstitute" class="form-control select2" id="councilInstitute">
                                                <option>Select Institute</option>
                                                <option value="Mar Ivanios College" <?= $council['councilInstitute'] == 'Mar Ivanios College' ? 'selected' : ''; ?>>Mar Ivanios College</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Date Range</label>
                                            <div class="input-daterange input-group">
                                                <input type="date" class="form-control" name="startDate" value="<?= $council['startDate']; ?>">
                                                <input type="date" class="form-control" name="endDate" value="<?= $council['endDate']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div id="memberContainer">
                                    <?php if (!empty($eg_council_member)): ?>
                                        <?php foreach ($eg_council_member as $member): ?>
                                            <div class="row member-row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Member Name</label>
                                                        <input class="form-control" type="text" name="memberName[]" value="<?= $member['memberName']; ?>" placeholder="Name of the Member">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <select name="designation[]" class="form-control select2">
                                                            <option>Select Designation</option>
                                                            <option value="Coordinator" <?= $member['designation'] == 'Coordinator' ? 'selected' : ''; ?>>Coordinator</option>
                                                            <option value="Co-Coordinator" <?= $member['designation'] == 'Co-Coordinator' ? 'selected' : ''; ?>>Co-Coordinator</option>
                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Mobile / Whatsapp Number</label>
                                                        <input class="form-control" type="text" name="cgpfNumber[]" value="<?= $member['cgpfNumber']; ?>" placeholder="Mobile / Whatsapp Number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="email" name="memberEmail[]" value="<?= $member['memberEmail']; ?>" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1" style="padding-top:35px;">
                                                    <i class="mdi mdi-alarm-plus add-member" style="cursor: pointer;"></i>&nbsp;
                                                    <i class="ri-delete-bin-6-line remove-member" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="row member-row">

                                        </div>
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
        $('#councilName').keyup(function() {
            var originalText = $(this).val();
            var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
            $('#councilSlug').val(filteredText.toLowerCase());
        });

        function addMemberRow() {
            var memberRow = `
        <div class="row member-row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Member Name</label>
                    <input class="form-control" type="text" name="memberName[]" placeholder="Name of the Member">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Designation</label>
                    <select name="designation[]" class="form-control select2">
                        <option selected>Select Designation</option>
                        <option value="Coordinator">Coordinator</option>
                            <option value="Co-Coordinator">Co-Coordinator</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Mobile / Whatsapp Number</label>
                    <input class="form-control" type="text" name="cgpfNumber[]" placeholder="Mobile / Whatsapp Number">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="memberEmail[]" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-1" style="padding-top:35px;">
                <i class="mdi mdi-alarm-plus add-member" style="cursor: pointer;"></i>&nbsp;
                <i class="ri-delete-bin-6-line remove-member" style="cursor: pointer;"></i>
            </div>
        </div>`;
            $('#memberContainer').append(memberRow);
        }

        $('#memberContainer').on('click', '.add-member', function() {
            addMemberRow();
        });

        $('#memberContainer').on('click', '.remove-member', function() {
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