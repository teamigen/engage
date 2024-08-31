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
                                            
                                            $currentTimestamp = time();

                                            
                                            $twoYearsAgoTimestamp = strtotime('-2 years', $currentTimestamp);

                                            
                                            echo '<select name="month" class="form-control select2" id="monthSelect">';

                            
                                            while ($currentTimestamp >= $twoYearsAgoTimestamp) {
                                                
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
                                            $(document).ready(function() {
                                                // Get current month and year
                                                var currentMonthYear = new Date().toLocaleString('en-US', {
                                                    month: 'long',
                                                    year: 'numeric'
                                                });
                                                $('.dispmnth').text(currentMonthYear);

                                                $('#monthSelect').change(function() {
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
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Accepted Christ <span style="float:right;">2</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Decision for Baptism <span style="float:right;">2</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Baptisms <span style="float:right;">2</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Holy Spirit Received by <span style="float:right;">6</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Ministry Committments <span style="float:right; ">1</span>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Existing Student Councils<span style="float:right;">4</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        New Student Councils <span style="float:right;">2</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Existing CGPF <span style="float:right;">2</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        New CGPF <span style="float:right;">1</span>
                                    </div>
                                </div>


                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        First Sunday: AG Church, Kulathur
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Second Sunday: IPC Sreekariyam
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Third Sunday: IPC Tabor
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Fourth Sunday: Sharon Fellowship Church, Pattom
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="background-color: #f1f1f1; color:black; border-radius: 3px; height:40px; padding:10px; margin-bottom:15px;">
                                        Fifth Sunday: Life Fellowship, Mannanthala
                                    </div>
                                </div>

                            </div>
                            <form action="#">


                                <hr>
                                <div class="row">
                                    <div class="col-lg-6" style="font-weight: bold; font-size:18px;">Special Programs</div>
                                    <!-- <div class="col-lg-6" style="text-align: right; font-weight: bold; font-size:18px;"><i class="mdi mdi-alarm-plus" style="font-style: normal;">&nbsp;Add</i></div> -->
                                </div>
                                <hr>
                                <div class="event1 events">
                                    <div class="row">
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Date of Program</strong><br />
                                            1 August 2024
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Event Name</strong><br />
                                            One Day Retreat
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Event Location</strong><br />
                                            Marthoma Retreat Centre
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Resource Person</strong><br />
                                            Dr. K. Muralidhar
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Attendance</strong><br />
                                            340
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
                                <hr>
                                <div class="event1 events">
                                    <div class="row">
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Date of Program</strong><br />
                                            1 August 2024
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Event Name</strong><br />
                                            One Day Retreat
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Event Location</strong><br />
                                            Marthoma Retreat Centre
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Resource Person</strong><br />
                                            Dr. K. Muralidhar
                                        </div>
                                        <div class="col-lg-2" style="margin-bottom:20px;">
                                            <strong style="font-size: 18px;"> Attendance</strong><br />
                                            340
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
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Week</th>
                                                        <th>Date of Event</th>
                                                        <th>Name of Group</th>
                                                        <th>Leader</th>
                                                        <th>Attendance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2 Aug 2024</td>
                                                        <td>Nalamchira Group</td>
                                                        <td>Ebenezer Varghese</td>
                                                        <td>14</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" style="text-align: right;">
                                        <button type="button" class="btn btn-success waves-effect waves-light">Approve</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light">Reject</button>
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