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
                        <h4 class="mb-0">Student Leaders</h4>

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
        
                                        <h4 class="card-title">Create Student Leader</h4>
                                        <p class="card-title-desc">Provide the details of your Student Leader</p>
        
                                        <form action="#">
                                        <div class="form-group">
                                            <label>Name of Student Leader</label>
                                            <input class="form-control" type="text" name="name_of_leader"
                                                placeholder="Name of Student Leader" id="name_of_leader">
                                        </div>
                                        <div class="form-group">
                                            <label>Course & Class</label>
                                            <input class="form-control" type="text" name="courseclass_of_leader"
                                                placeholder="Course & Class" id="courseclass_of_leader">
                                        </div>
                                        <div class="form-group">
                                            <label>Institute/College</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Select Institute/College">
                                            <option selected>Select Institute/College</option>       
                                            <option value="">Bishop Moore College, Mavelikara</option>
                                            <option value="">St. Alosyius College, Edathua</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Leaders Location</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Location">
                                            <option selected>Select Location</option>       
                                            <option value="">Pathanamthitta Town</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Phone</label>
                                            <input class="form-control" type="text" name="phone_of_leader"
                                                placeholder="Mobile Phone" id="phone_of_leader">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email_of_leader"
                                                placeholder="Email" id="email_of_leader">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Year of Joining ICPF</label>
                                            <input class="form-control" type="text" name="joining_as_leader"
                                                placeholder="Year of Joining ICPF" id="joining_as_leader">
                                        </div>
                                        <div class="form-group">
                                            <label>Year of Exiting as Student</label>
                                            <input class="form-control" type="text" name="exiting_as_leader"
                                                placeholder="Year of Exiting as Student" id="exiting_as_leader">
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
        
                                        <h4 class="card-title">Student Leaders</h4>
                                        <p class="card-title-desc">Student Leaders in the Station</p>
        
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Leader Name</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <tr>
                                                <td>Edward Raymon</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
                                                <td><i class="ri-eye-line"></i>&nbsp;&nbsp;<i class="ri-pencil-line"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>John Mathew</td>
                                                <td>Pattom</td>
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