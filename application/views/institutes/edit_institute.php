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
                        <h4 class="mb-0"> Edit Institutes / Colleges</h4>

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

                            <h4 class="card-title">Create Institue</h4>
                            <p class="card-title-desc">Manage Institutes in the Location</p>

                            <form action="<?= base_url('Institutes/update') ?>" method="post" id="saveInstitute">
                                <input type="hidden" name="instituteId" value="<?= htmlspecialchars($institute['instituteId'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                                <div class="form-group">
                                    <label>Name of Institute</label>
                                    <input class="form-control" type="text" name="instituteName" value="<?= htmlspecialchars($institute['instituteName'] ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="Name of Institute" id="instituteName" required>
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="instituteSlug" value="<?= htmlspecialchars($institute['instituteSlug'] ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="Slug of Institute" id="instituteSlug" required readonly>
                                </div>

                                <div class="form-group">
                                    <label>Institute Location</label>
                                    <select name="instituteLocation" class="form-control select2" id="instituteLocation" required>
                                        <option selected>Select Location</option>
                                        <?php if (!empty($locations)): ?>
                                            <?php foreach ($locations as $locns): ?>
                                                <option value="<?= $locns->locationId ?>" <?= $institute['instituteLocation'] == $locns->locationId ? 'selected' : '' ?>><?= htmlspecialchars($locns->locationName, ENT_QUOTES, 'UTF-8') ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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

                            <h4 class="card-title">Institute Name</h4>
                            <p class="card-title-desc">Institutes in the Station</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Institute</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($institutes as $it) { ?>
                                        <tr>
                                            <td><?= $it->instituteName; ?></td>
                                            <td><?= $it->locationName; ?></td>

                                            <td>
                                                <a href="<?= base_url('Institutes/edit/' . ($it->instituteSlug)) ?>" class="edit-row" data-id="<?= ($it->instituteSlug) ?>"><i class="ri-pencil-line"></i></a>&nbsp;
                                                <a href="javascript:void(0);" class="delete-row" data-id="<?= ($it->instituteId) ?>"><i class="ri-delete-bin-line"></i></a>&nbsp;

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

<script>
    $(document).ready(function() {
        $('#instituteName').keyup(function() {
            var originalText = $(this).val();
            var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
            $('#instituteSlug').val(filteredText.toLowerCase());
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {

            deleteButton.addEventListener('click', function() {

                var instituteId = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this row?')) {

                    fetch('<?= base_url(); ?>Institutes/delete/' + instituteId, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('row-' + instituteId).remove();
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