<link href="<?= base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<!-- Plugins css -->
<link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                        <h4 class="mb-0">Student Councils</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="" style="margin-right:20px;">
                                    <div class="form-group">

                                    <label>Period</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Name of Group">
                                            <option selected>2023-2024</option>       
                                            <option value="">2022-2023</option>
                                                </select>

                                    </div>

                                </li> -->


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

                            <h4 class="card-title">LIST OF STUDENT COUNCILS</h4>
                            <p class="card-title-desc">List of all Student Councils
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6" style="font-weight: bold;">Staff Name: Samuel Daniel</div>
                                <div class="col-lg-6" style="text-align: right; font-weight: bold;">Station Name: Kollam
                                </div>
                            </div>
                            <hr>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Council Name</th>
                                        <th>Location</th>
                                        <!-- <th>Institute</th> -->
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php if (!empty($councils)) : ?>
                                        <?php foreach ($councils as $coucil) : ?>
                                            <tr id="row-<?= ($coucil['councilId']) ?>">
                                                <td><?= ($coucil['councilName']) ?></td>
                                                <td><?= ($coucil['locationName']) ?></td>
                                                <!-- <td><?= ($coucil["instituteName"]) ?></td> -->
                                                <td><?= ($coucil["endDate"]) ?></td>
                                                
                                                <td>
                                                    <a href="<?= base_url('Council/edit/' . ($coucil['councilSlug'])) ?>" class="edit-row" data-id="<?= ($coucil['councilSlug']) ?>"><i class="ri-pencil-line"></i></a>&nbsp;
                                                    <a href="javascript:void(0);" class="delete-row" data-id="<?= ($coucil['councilId']) ?>"><i class="ri-delete-bin-line"></i></a>&nbsp;

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5">No Council data available.</td>
                                        </tr>
                                    <?php endif; ?>
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
    
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {

            deleteButton.addEventListener('click', function() {

                var councilId  = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this row?')) {

                    fetch('<?= base_url(); ?>Council/delete/' + councilId , {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {

                                document.getElementById('row-' + councilId ).remove();
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

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url(); ?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>