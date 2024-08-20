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
                        <h4 class="mb-0">STAFF</h4>

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
        
                                    <h4 class="card-title">Add New Staff </h4>
                            <p class="card-title-desc">Add New Staff Member
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Name of the Staff</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="Name of the Staff" id="na_of_cgpf_meetings">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Date of Joining</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Station</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Region">
                                            <option selected>Select Station</option>       
                                            <option value="">Trivandrum</option>
                                            <option value="">Kollam</option>
                                            <option value="">Erode</option>
                                                </select>
                                            </div>
                                            </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Staff Type</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Region">
                                            <option selected>Select Staff Type</option>       
                                            <option value="">Station Staff</option>
                                            <option value="">Regional Staff</option>
                                            <option value="">Office Staff</option>
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Region</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Region">
                                            <option selected>Select Region</option>       
                                            <option value="">South Kerala</option>
                                            <option value="">North Kerala</option>
                                            <option value="">Tamil Nadu</option>
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Office Location</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Region">
                                            <option selected>Select Office</option>       
                                            <option value="">Head Office</option>
                                            <option value="">Malabar Camp Centre</option>
                                            
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Date of Exiting</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>ID Card Number</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="ID Card Number" id="na_of_cgpf_meetings">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Anniversary</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Station</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Region">
                                            <option selected>Select Station</option>       
                                            <option value="">Trivandrum</option>
                                            <option value="">Kollam</option>
                                            <option value="">Erode</option>
                                                </select>
                                            </div>
                                            </div>
                                
                               
                            </div>
                            <hr>
                            <h6>Family Details</h6>
                            <hr>
                                            <form action="#">
                                            <div class="row">
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name_of_member"
                                                placeholder="Name" id="name_of_member">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Relation</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Name of Group">
                                            <option selected>Select Relation</option>       
                                            <option value="">Spouse</option>
                                            <option value="">Son</option>
                                            <option value="">Daughter</option>
                                                </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="phone_cgpf_member"
                                                placeholder="Age" id="phone_cgpf_member">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <input class="form-control" type="text" name="email_of_cgpf_member"
                                                placeholder="Occupation" id="email_of_cgpf_member">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px;"><i class="mdi mdi-alarm-plus" style="font-style: normal;">&nbsp;Add</i></div>


                                    
                                </div>
                                <hr>
                            <h6>Transfer Details</h6>
                            <hr>
                                            <form action="#">
                                            <div class="row">
                                            <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Effective Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>From</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Name of Group">
                                            <option selected>From Station</option>       
                                            <option value="">Trivandrum</option>
                                            <option value="">Kollam</option>
                                                </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-2">
                                    <div class="form-group">
                                            <label>To</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Name of Group">
                                            <option selected>To Station</option>       
                                            <option value="">Mumbai</option>
                                            <option value="">Delhi</option>
                                                </select>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px;"><i class="mdi mdi-alarm-plus" style="font-style: normal;">&nbsp;Add</i></div>


                                    
                                </div>
                                <hr>
                            <h6>Authentication Details</h6>
                            <hr>
                                            <form action="#">
                                            <div class="row">
                                            <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="Name of the Staff" id="na_of_cgpf_meetings">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="Name of the Staff" id="na_of_cgpf_meetings">
                                        </div>
                                </div>
                                </div>
                                <hr>
                            <h6>Authentication Details</h6>
                            <hr>
                                            <form action="#">
                                            <div class="row">
                                            <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Whatsapp Number</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="Whatsapp Number" id="na_of_cgpf_meetings">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Alternate Whatsapp Number</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="Alternate Whatsapp Number" id="na_of_cgpf_meetings">
                                        </div>
                                </div>
                                </div>
                                <hr>
                                
                                
                                
                                
                                        <div class="row">
                                            <div class="col-lg-12" style="text-align: right;">
                                                <button type="button" class="btn btn-success waves-effect waves-light">Save</button>
                                                <!-- <button type="button" class="btn btn-primary waves-effect waves-light">Submit for Review</button> -->
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