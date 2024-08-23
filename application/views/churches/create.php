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
                        <h4 class="mb-0">List of Churches</h4>

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

                            <h4 class="card-title">Create Church</h4>
                            <p class="card-title-desc">Manage Churches in the Location</p>

                            <form action="#" id="saveChurch" method="post">
                                <div class="form-group">
                                    <label for="churchName">Name of Church</label>
                                    <input class="form-control" type="text" name="churchName" placeholder="Name of Church" id="churchName" required>
                                </div>

                                <div class="form-group">
                                    <label for="churchSlug">Slug</label>
                                    <input class="form-control" type="text" name="churchSlug" placeholder="Slug" id="churchSlug" required>
                                </div>

                                <div class="form-group">
                                    <label for="churchLocation">Church Location</label>
                                    <select name="churchLocation" id="churchLocation" class="form-control select2">
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
                                    <label for="pastorName">Name of Pastor</label>
                                    <input class="form-control" type="text" name="pastorName" placeholder="Name of Pastor" id="pastorName" required>
                                </div>

                                <div class="form-group">
                                    <label for="mobileNumber">Mobile Number</label>
                                    <input class="form-control" type="text" name="mobileNumber" placeholder="Mobile Number" id="mobileNumber" required>
                                </div>

                                <hr>

                                <div id="contactPersonsContainer">
                                    <div class="row contact-person">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Person</label>
                                                <input class="form-control" type="text" name="contactName[]" placeholder="Contact Person Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input class="form-control" type="text" name="contactPhone[]" placeholder="Phone of Contact Person" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <button type="button" class="remove-contact-person"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-success waves-effect waves-light add-contact-person">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Churches</h4>
                            <p class="card-title-desc">Churches in the Station</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Church Name</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Shalom AG Church</td>
                                        <td>Nalamchira</td>
                                        <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>

                                    </tr>
                                    <tr>
                                        <td>IPC Peniel</td>
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

        $('.select2').select2();


        function addContactPerson() {
            const contactHtml = `
                    <div class="row contact-person">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input class="form-control" type="text" name="contactName[]" placeholder="Contact Person Name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input class="form-control" type="text" name="contactPhone[]" placeholder="Phone of Contact Person" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="button" class="remove-contact-person"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>`;
            $('#contactPersonsContainer').append(contactHtml);
        }


        $(document).on('click', '.add-contact-person', function() {
            addContactPerson();
        });


        $(document).on('click', '.remove-contact-person', function() {
            $(this).closest('.contact-person').remove();
        });


        $('#saveChurch').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?php echo base_url("Church/insertChurch"); ?>',
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
                    $('#staffMessage').html('<div class="alert alert-danger">Error occurred: ' + textStatus + '</div>');
                }
            });
        });
    });




    $('#churchName').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#churchSlug').val(filteredText.toLowerCase());
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