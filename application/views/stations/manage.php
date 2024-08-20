<link href="<?= base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
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
                        <h4 class="mb-0">Stations Management</h4>

                        <div class="page-title-right">
                            
                            <ol class="breadcrumb m-0">
                                <li class="" style="margin-right:20px;"><button onclick='location.href="<?= base_url(); ?>stations/create"' class="btn-primary">Create Station</button></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Stations</a></li>
                                <li class="breadcrumb-item active">Manage Stations</li>
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

                            <h4 class="card-title">Manage Stations</h4>
                           
                            <p><span id="savedistrict_message"></span></p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>Station Name</th>
                                                        <th>District</th>
                                                        <th>State</th>
                                                        <th>Region</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach($stations as $st) { ?>
                                                    <tr>
                                                        <td><?= $st->stationName ?></td>
                                                        <td><?= $st->districtName ?></td>
                                                        <td><?= $st->stateName ?></td>
                                                        <td><?= $st->regionName ?></td>
                                                        <td><i class="ri-pencil-line"></i> &nbsp;<i class="ri-delete-bin-line"></i></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>

                        </div>
                    </div>

                </div>
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Manage Districts</h4>
                           
                            <p><span id="savedistrict_message"></span></p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>District Name</th>
                                                        <th>State</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach($districts as $dt) { ?>
                                                    <tr>
                                                        <td><?= $dt->districtName ?></td>
                                                        <td><?= $dt->stateName ?></td>
                                                        <td><i class="ri-pencil-line"></i> &nbsp;<i class="ri-delete-bin-line"></i></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>

                        </div>
                    </div>

                </div>



            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Manage State</h4>
                          <span id="savestate_message"></span></p>


                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>State Name</th>
                                                        <th>Country</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach($states as $st) { ?>
                                                    <tr>
                                                        <td><?= $st->stateName ?></td>
                                                        <td><?= $st->countryName ?></td>
                                                        <td><i class="ri-pencil-line"></i> &nbsp;<i class="ri-delete-bin-line"></i></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Manage Countries</h4>
                            <p><span id="savecountry_message"></span></p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>Country Name</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach($countries as $ct) { ?>
                                                    <tr>
                                                        <td><?= $ct->countryName ?></td>
                                                        <td><i class="ri-pencil-line"></i> &nbsp;<i class="ri-delete-bin-line"></i></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>


                        </div>
                    </div>

                </div>
            </div>


            <div class="row">

            <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Manage Regions</h4>
                            <p><span id="savecountry_message"></span></p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>Region Name</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach($regions as $rg) { ?>
                                                    <tr>
                                                        <td><?= $rg->regionName ?></td>
                                                        <td><i class="ri-pencil-line"></i> &nbsp;<i class="ri-delete-bin-line"></i></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>


                        </div>
                    </div>

                </div>


            </div>


        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<script>
    $(document).ready(function () {
        $('#saveregion_button').click(function () {
            // alert("Hele");
            var regionName = $('#regionName').val();

            $.ajax({
                url: '<?php echo base_url('stations/saveregion'); ?>', type: 'POST',
                dataType: 'json',
                data: { regionName: regionName },
                success: function (response) {

                    if (response.success) {
                        $('#saveregion_message').html("<span class='greentxt'>Successfully Created Region!</span>");
                        $('#regionName').val(''); // Clear input field after successful save
                    } else {
                        $('#saveregion_message').html(response.message);
                        console.error(response.message); // Log any errors for troubleshooting
                    }
                    // alert('success');
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        });
    });
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("clickme")) {
            // Get the element to hide
            var hideElement = document.getElementById("hideme");
            // Hide the element using style property
            hideElement.style.display = "none";
        }
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