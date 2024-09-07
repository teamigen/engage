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


                                <form action="#" id="saveCGPF">
                                    <div id="staffMessage"></div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Name of CGPF</label>
                                                <input class="form-control" type="text" name="cgpf_name" placeholder="Name of CGPF" id="cgpf_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input class="form-control" type="text" name="cgpf_slug" placeholder="Name of CGPF" id="cgpf_slug" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <select name="location_id" class="form-control select2" id="location_id">
                                                    <option selected>Select Location</option>
                                                    <?php if (!empty($locations)): ?>
                                                        <?php foreach ($locations as $locns): ?>
                                                            <option value="<?= $locns->locationId ?>"><?= $locns->locationName ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Period Name</label>
                                                <input class="form-control" type="text" name="period_name" placeholder="Period Name" id="period_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <div class="input-daterange input-group">
                                                    <input type="date" class="form-control" name="start_date" placeholder="Start Date">
                                                    <input type="date" class="form-control" name="end_date" placeholder="End Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="memberContainer">
                                        <div class="row member-row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Member Name</label>
                                                    <input class="form-control" type="text" name="members[0][name]" placeholder="Name of the Member">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <select name="members[0][designation]" class="form-control select2">
                                                        <option selected>Select Designation</option>
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
                                                    <input class="form-control" type="text" name="members[0][phone]" placeholder="Mobile / Whatsapp Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" name="members[0][email]" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-1" style="padding-top:30px;">
                                                <i class="mdi mdi-alarm-plus add-member" style="cursor: pointer;">&nbsp;</i>
                                                <i class="ri-delete-bin-6-line remove-member" style="cursor: pointer;">&nbsp;</i>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: right;">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
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
        let memberIndex = 0;

        function addMemberRow() {
            memberIndex++;
            var memberRow = `
        <div class="row member-row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Member Name</label>
                    <input class="form-control" type="text" name="members[${memberIndex}][name]" placeholder="Name of the Member">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Designation</label>
                    <select name="members[${memberIndex}][designation]" class="form-control select2">
                        <option selected>Select Designation</option>
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
                    <input class="form-control" type="text" name="members[${memberIndex}][phone]" placeholder="Mobile / Whatsapp Number">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="members[${memberIndex}][email]" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-1" style="padding-top:35px;">
                <i class="mdi mdi-alarm-plus add-member" style="cursor: pointer;"></i>
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

        $('#saveCGPF').submit(function(event) {
            event.preventDefault();

            var isValid = true;
            $('#memberContainer .member-row').each(function() {
                var memberName = $(this).find('input[name$="[name]"]').val();
                var designation = $(this).find('select[name$="[designation]"]').val();
                var phone = $(this).find('input[name$="[phone]"]').val();
                var email = $(this).find('input[name$="[email]"]').val();

                if (!memberName || !designation || !phone || !email) {
                    isValid = false;
                    alert('All fields are required for each member.');
                    return false;
                }
            });

            if (!isValid) return;

            var formData = $(this).serialize();

            $.ajax({
                url: '<?php echo base_url("cgpf/save"); ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#staffMessage').html('<div class="alert alert-success">CGPF created successfully!</div>');
                    } else {
                        $('#staffMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#staffMessage').html('<div class="alert alert-danger">Error occurred: ' + textStatus + '</div>');
                }
            });
        });
    });

    $('#cgpf_name').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#cgpf_slug').val(filteredText.toLowerCase());
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