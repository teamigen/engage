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
                        <h4 class="mb-0">Stations</h4>

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

                            <h4 class="card-title">Edit Station</h4>
                            <p class="card-title-desc">Create a New Station</p>

                            <form action="<?= base_url('Stations/updatestation') ?>" id="saveStation" method="post">
                                <input type="hidden" name="stationId" value="<?= htmlspecialchars($stn['stationId'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <div id="stationMessage"></div>
                                <div class="form-group">
                                    <label>Name of the Station</label>
                                    <input class="form-control" type="text" name="stationName" id="stationName" value="<?= htmlspecialchars($stn['stationName'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="stationSlug" id="stationSlug" value="<?= htmlspecialchars($stn['stationSlug'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Region</label>
                                    <select name="selectedRegion" class="form-control select2" id="selectedRegion" placeholder="Select Region">
                                        <option selected>Select Region</option>
                                        <?php if (!empty($regions)): ?>
                                            <?php foreach ($regions as $region): ?>
                                                <option value="<?= $region->regionId; ?>" <?= ($region->regionId == $stn['selectedRegion']) ? 'selected' : ''; ?>>
                                                    <?= $region->regionName; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No regions available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Stations</h4>
                            <p class="card-title-desc">List of Stations</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                    <tr>
                                        <th>Station Name</th>
                                        <th>Region</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach ($stations as $st) { ?>
                                        <tr>
                                            <td><?= $st["stationName"] ?></td>
                                            <td><?= $st["regionName"]; ?></td>

                                            <td>
                                                <a href="<?= base_url('Stations/editStation/' . ($st['stationSlug'])) ?>" class="edit-row" data-id="<?= ($st['stationSlug']) ?>"><i class="ri-pencil-line"></i></a>&nbsp;
                                                <a href="javascript:void(0);" class="delete-row" data-id="<?= ($st['stationId']) ?>"><i class="ri-delete-bin-line"></i></a>&nbsp;

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
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function() {
                var staffId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this row?')) {

                    fetch('<?= base_url(); ?>Staff/delete/' + staffId, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {

                                document.getElementById('row-' + staffId).remove();
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



<script>
    $(document).ready(function() {

        $('#stationName').keyup(function() {
            var originalText = $(this).val();
            var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
            $('#stationSlug').val(filteredText.toLowerCase());
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