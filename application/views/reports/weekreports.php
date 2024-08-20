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
                        <h4 class="mb-0">Report for the Month of <span class="dispmnth"></span></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="" style="margin-right:20px;">
                                    <div class="form-group">



                                        <?php
                                        function generateMonthSelectBox()
                                        {
                                            // Get current timestamp
                                            $currentTimestamp = time();

                                            // Calculate timestamp for two years ago
                                            $twoYearsAgoTimestamp = strtotime('-2 years', $currentTimestamp);

                                            // Create select box
                                            echo '<select name="month" class="form-control select2" id="monthSelect">';

                                            // Iterate through months from current month to two years ago
                                            while ($currentTimestamp >= $twoYearsAgoTimestamp) {
                                                // Get month and year
                                                $month = date('F', $currentTimestamp);
                                                $year = date('Y', $currentTimestamp);

                                                // Check if current month
                                                $selected = ($currentTimestamp == time()) ? 'selected' : '';

                                                // Create option element
                                                echo '<option value="' . $month . ' ' . $year . '" ' . $selected . '>' . $month . ' ' . $year . '</option>';

                                                // Move to previous month
                                                $currentTimestamp = strtotime('-1 month', $currentTimestamp);
                                            }

                                            echo '</select>';
                                        }

                                        generateMonthSelectBox();
                                        ?>



                                        <script>
                                            $(document).ready(function () {
                                                // Get current month and year
                                                var currentMonthYear = new Date().toLocaleString('en-US', { month: 'long', year: 'numeric' });
                                                $('.dispmnth').text(currentMonthYear);

                                                $('#monthSelect').change(function () {
                                                    var selectedMonth = $(this).val();
                                                    $('.dispmnth').text(selectedMonth);
                                                });
                                            });
                                        </script>

                                    </div>

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
        
                                    <h4 class="card-title">ACTIVITY REPORT FOR THE MONTH OF <span class="dispmnth"
                                    style="text-transform: uppercase;"></span></h4>
                            <p class="card-title-desc">Weekly Activity Report
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6" style="font-weight: bold;">Staff Name: Samuel Daniel</div>
                                <div class="col-lg-6" style="text-align: right; font-weight: bold;">Station Name: Kollam
                                </div>
                            </div>
                            <hr>
                                            <form action="#">
                                            <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Date of Event</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker"
                                                    data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Name of Group</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Name of Group">
                                            <option selected>Select Group</option>       
                                            <option value="">Mar Ivanios College Group</option>
                                                </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Leader</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Leader of Group">
                                            <option selected>Select Leader</option>       
                                            <option value="">Benjamin George</option>
                                                </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Attendance</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="No of CGPF Meetings" id="no_of_cgpf_meetings">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px;"><i class="mdi mdi-alarm-plus" style="font-style: normal;">&nbsp;Add</i></div>


                                    
                                </div>
                                <hr>
                                
                                
                                
                                
                                        <div class="row">
                                            <div class="col-lg-12" style="text-align: right;">
                                                <button type="button" class="btn btn-success waves-effect waves-light">Save</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light">Submit for Review</button>
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