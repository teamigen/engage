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
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Name of CGPF</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="Name of CGPF" id="no_of_cgpf_meetings">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Location</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Location">
                                            <option selected>Select Location</option>       
                                            <?php if (!empty($locations)): ?>
                                                    <?php foreach ($locations as $locns): ?>
                                                        <option value="<?= $locns->locationId   ?>"><?= $locns->locationName ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                </select>
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                            <label>Period Name</label>
                                            <input class="form-control" type="text" name="Period Name"
                                                placeholder="Period Name" id="no_of_cgpf_meetings">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                                <label>Date Range</label>
                                                <div>
                                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true">
                                                        <input type="text" class="form-control" name="start">
                                                        <input type="text" class="form-control" name="end">
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                               
                            </div>
                            <hr>
                                            <form action="#">
                                            <div class="row">
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Member Name</label>
                                            <input class="form-control" type="text" name="name_of_member"
                                                placeholder="Name of the Member" id="name_of_member">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Designation</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Name of Group">
                                            <option selected>Select Designation</option>       
                                            <option value="President">President</option>
                                            <option value="Vice-President">Joint Vice-President</option>
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
                                            <input class="form-control" type="text" name="phone_cgpf_member"
                                                placeholder="Mobile / Whatsapp Number" id="phone_cgpf_member">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email_of_cgpf_member"
                                                placeholder="Email" id="email_of_cgpf_member">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px;"><i class="mdi mdi-alarm-plus" style="font-style: normal;">&nbsp;Add</i></div>


                                    
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