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
                                    <select name="station" class="form-control select2" id="station">
                                        <option value="">Trivandrum</option>
                                        <option value="">Kollam</option>
                                        <option value="">Pathanamthitta</option>
                                    </select>
                                </div>
                            </li>
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
        
                                    <h4 class="card-title">REPORT FOR THE MONTH OF <span class="dispmnth"
                                    style="text-transform: uppercase;"></span></h4>
                            <p class="card-title-desc">Ministry Report in Detail
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6" style="font-weight: bold; ">Staff Name: Samuel Daniel</div>
                                <div class="col-lg-6" style="text-align: right; font-weight: bold;">Station Name: Kollam
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px;">
                                        Number of CGPF Meetings <span style="float:right;">7</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px;">
                                        Number of House Visits <span style="float:right;">6</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px;">
                                        Number of Hostel Visits <span style="float:right;">17</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px;">
                                        Number of Personal Evangelisms <span style="float:right; ">12</span> 
                                    </div>
                                    </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:5px;">
                                        Accepted Christ <span style="float:right;">2</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:5px;">
                                        Decision for Baptism <span style="float:right;">2</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:5px;">
                                        Baptisms <span style="float:right;">2</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:5px;">
                                        Holy Spirit Received by <span style="float:right;">6</span> 
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:5px;">
                                        Ministry Committments <span style="float:right; ">1</span> 
                                    </div>
                                    </div>
                                
                            </div>
                                            <form action="#">
                                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Number of CGPF Meetings</label>
                                            <input class="form-control" type="text" name="no_of_cgpf_meetings"
                                                placeholder="No of CGPF Meetings" id="no_of_cgpf_meetings">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of House Visits</label>
                                            <input class="form-control" type="text" name="no_of_house_visits"
                                                placeholder="No of House Visits" id="no_of_house_visits">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of Hostel Visits</label>
                                            <input class="form-control" type="text" name="no_of_hostel_visits"
                                                placeholder="No of Hostel Visits" id="no_of_hostel_visits">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of Personal Evangelisms</label>
                                            <input class="form-control" type="text" name="no_of_personal_evangelism"
                                                placeholder="No of Personal Evangelisms" id="no_of_personal_evangelism">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Accepted Christ</label>
                                            <input class="form-control" type="text" name="no_of_accepted_christ"
                                                placeholder="Accepted Christ" id="no_of_accepted_christ">
                                        </div>
                                        <div class="form-group">
                                            <label>Decision for Baptism</label>
                                            <input class="form-control" type="text" name="no_of_baptism_decision"
                                                placeholder="Baptism Decisions" id="no_of_baptism_decision">
                                        </div>
                                        <div class="form-group">
                                            <label>No of Baptisms</label>
                                            <input class="form-control" type="text" name="no_of_baptisms"
                                                placeholder="No. of Baptisms" id="no_of_baptisms">
                                        </div>
                                        <div class="form-group">
                                            <label>Holyspirt Received</label>
                                            <input class="form-control" type="text" name="no_of_holyspirit_received"
                                                placeholder="Holyspirit Received" id="no_of_holyspirit_received">
                                        </div>
                                        <div class="form-group">
                                            <label>Ministry Commitments</label>
                                            <input class="form-control" type="text" name="no_of_ministry_commitments"
                                                placeholder="Ministry Commitments" id="no_of_ministry_commitments">
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Existing Student Councils</label>
                                            <input class="form-control" type="text" name="existing_student_councils"
                                                placeholder="Existing Student Councils" id="existing_student_councils">
                                        </div>

                                        <div class="form-group">
                                            <label>New Student Councils</label>
                                            <input class="form-control" type="text" name="new_student_councils"
                                                placeholder="New Student Councils" id="new_student_councils">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Existing CGPF</label>
                                            <input class="form-control" type="text" name="existing_cgpf"
                                                placeholder="Existing CGPF" id="existing_cgpf">
                                        </div>

                                        <div class="form-group">
                                            <label>New CGPF</label>
                                            <input class="form-control" type="text" name="new_cgpf"
                                                placeholder="New CGPF" id="new_cgpf">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom:30px; padding-top:30px;">
                                    <hr>
                                    <div class="col-lg-6" style="font-weight: bold; font-size:18px;">Church Visits</div>
                                    <div class="col-lg-6" style="text-align: right; font-weight: bold; font-size:18px;"></div>
                                    <hr>
                                </div>
                                <div class="row">
                                
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group mb-4">
                                            <label>First Sunday</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="First Sunday">
                                            <option selected>Select Church</option>   
                                            <option value="">Shalom AG Church, Vadasserikkara</option>
                                                </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Second Sunday</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Second Sunday">
                                            <option selected>Select Church</option>       
                                            <option value="">Shalom AG Church, Vadasserikkara</option>
                                                </select>
                                        </div>

                                    
                                    </div>
                                    <div class="col-lg-6">
                                       

                                    <div class="form-group mb-4">
                                            <label>Third Sunday</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Third Sunday">
                                            <option selected>Select Church</option>       
                                            <option value="">Shalom AG Church, Vadasserikkara</option>
                                                </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Fourth Sunday</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Fourth Sunday">
                                            <option selected>Select Church</option>      
                                            <option value="">Shalom AG Church, Vadasserikkara</option>
                                                </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Fifth Sunday</label>
                                            <select name="month" class="form-control select2" id="monthSelect" placeholder="Fifth Sunday">
                                            <option selected>Select Church</option>       
                                            <option value="">Shalom AG Church, Vadasserikkara</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6" style="font-weight: bold; font-size:18px;">Special Programs</div>
                                    <div class="col-lg-6" style="text-align: right; font-weight: bold; font-size:18px;"><i class="mdi mdi-alarm-plus" style="font-style: normal;">&nbsp;Add</i></div>
                                </div>
                                <hr>
                                <div class="event1 events">
                                <div class="row">
                                
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group mb-4">
                                            <label>Date of Program</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-provide="datepicker"
                                                    data-date-format="dd M, yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input class="form-control" type="text" name="new_cgpf"
                                                placeholder="Event Name" id="new_cgpf">
                                        </div>
                                        <div class="form-group">
                                            <label>Event Location</label>
                                            <input class="form-control" type="text" name="new_cgpf"
                                                placeholder="Event Location" id="new_cgpf">
                                        </div>
                                    
                                    </div>
                                    <div class="col-lg-6">
                                       

                                        <div class="form-group">
                                            <label>Resource Person</label>
                                            <input class="form-control" type="text" name="resource_person"
                                                placeholder="Resource Person" id="resource_person">
                                        </div>
                                        <div class="form-group">
                                            <label>Attendance</label>
                                            <input class="form-control" type="text" name="event_attendance"
                                                placeholder="Attendance" id="event_attendance">
                                        </div>
                                         <div class="form-group">
                                            <label>Event Photos</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile" multiple>Choose file</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-2"><img src="<?= base_url(); ?>assets/images/authentication-bg.jpg" style="width:100%;"></div>
                                            <div class="col-lg-2"><img src="<?= base_url(); ?>assets/images/authentication-bg.jpg" style="width:100%;"></div>
                                            <div class="col-lg-2"><img src="<?= base_url(); ?>assets/images/authentication-bg.jpg" style="width:100%;"></div>
                                            <div class="col-lg-2"><img src="<?= base_url(); ?>assets/images/authentication-bg.jpg" style="width:100%;"></div>
                                            <div class="col-lg-2"><img src="<?= base_url(); ?>assets/images/authentication-bg.jpg" style="width:100%;"></div>
                                            <div class="col-lg-2"><img src="<?= base_url(); ?>assets/images/authentication-bg.jpg" style="width:100%;"></div>
                                        </div>
                                    </div>
                                </div>
                                                
                                        <hr>
                                        </div>
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