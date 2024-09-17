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
                        <h4 class="mb-0">Locations</h4>

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

                            <h4 class="card-title">Edit Location</h4>
                            <p class="card-title-desc">Edit Location</p>

                            <form id="updateLocation" method="post" action="<?php echo site_url('Masters/updateLocation'); ?>">
                                <div id="locationMessage"></div>


                                <input type="hidden" name="locationId" value="<?php echo htmlspecialchars($location['locationId']); ?>">

                                <div class="form-group">
                                    <label>Name of the Location</label>
                                    <input class="form-control" type="text" name="locationName"
                                        placeholder="Name of the Location" id="locationName"
                                        value="<?php echo htmlspecialchars($location['locationName']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="locationSlug"
                                        placeholder="Name of the Location" id="locationSlug"
                                        value="<?php echo htmlspecialchars($location['locationSlug']); ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Locations</h4>
                            <p class="card-title-desc">List of Locations</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Location Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach ($locations as $loc) { ?>
                                        <tr id="row-<?= $loc->locationSlug; ?>">
                                            <td><?= $loc->locationName; ?></td>
                                            <td>
                                                <a href="<?= base_url('Masters/editLocation/' . $loc->locationSlug) ?>" class="edit-row" data-id="<?= $loc->locationSlug ?>"><i class="ri-pencil-line"></i></a>&nbsp;
                                                <a href="javascript:void(0);" class="delete-row" data-id="<?= $loc->locationSlug ?>"><i class="ri-delete-bin-line"></i></a>
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





<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>




<script>

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function() {
                var locationSlug = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this row?')) {
                    fetch('<?= base_url(); ?>Masters/deletelocation/' + locationSlug, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                _method: 'DELETE'
                            }).toString()
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Church deleted successfully.');
                                window.location.href = '<?= base_url(); ?>Masters/locations';
                            } else if (data.redirect) {
                                window.location.href = '<?= base_url(); ?>Masters/locations';
                            } else {
                                alert('Failed to delete the church.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    });
    $('#locationName').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#locationSlug').val(filteredText.toLowerCase());
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function() {
                var locationSlug = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this row?')) {
                    fetch('<?= base_url(); ?>Masters/deletelocation/' + locationSlug, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                _method: 'DELETE'
                            }).toString()
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                var row = document.getElementById('row-' + locationSlug);
                                if (row) {
                                    row.remove();
                                } else {
                                    console.error('Row not found in DOM');
                                }
                            } else {
                                alert('Failed to delete the row.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    });
</script>
<!-- JAVASCRIPT -->

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