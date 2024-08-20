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
        
                                        <h4 class="card-title">Create Station</h4>
                                        <p class="card-title-desc">Create a New Station</p>
        
                                        <form action="#">
                                        <div class="form-group">
                                            <label>Name of the Station</label>
                                            <input class="form-control" type="text" name="name_of_church"
                                                placeholder="Name of the Region" id="name_of_church">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Region</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Region">
                                            <option selected>Select Region</option>       
                                            <option value="">South Kerala</option>
                                            <option value="">North Kerala</option>
                                            <option value="">Tamil Nadu</option>
                                                </select>
                                        </div>
                                        
                                        
                                            <div class="form-group">
                                            <button type="button" class="btn btn-success waves-effect waves-light">Save</button>
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
                                            <tr>
                                                <td>Trivandrum</td>
                                                <td>South Kerala</td>

                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Kozhikode</td>
                                                <td>North Kerala</td>

                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Erode</td>
                                                <td>Tamil Nadu</td>

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