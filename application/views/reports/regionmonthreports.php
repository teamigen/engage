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
                                <li style="margin-right:20px;">
                                    <div class="form-group">
                                        <select name="staff" class="form-control select2" id="staff">
                                            <option value="">Select Staff</option>
                                            <?php foreach ($staff as $s): ?>
                                                <option value="<?= $s['staffId']; ?>"><?= $s['staffName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </li>

                                <li style="margin-right:20px;">
                                    <div class="form-group">
                                        <select name="station" class="form-control select2" id="station">
                                            <option value="">Select Station</option>
                                        </select>
                                    </div>
                                </li>

                                <li class="" style="margin-right:20px;">
                                    <div class="form-group">
                                        <?php
                                        function generateMonthSelectBox()
                                        {
                                            $currentMonthYear = date('F Y');
                                            $currentTimestamp = time();
                                            $twoYearsAgoTimestamp = strtotime('-2 years', $currentTimestamp);

                                            echo '<select name="month" class="form-control select2" id="monthSelect">';

                                            while ($currentTimestamp >= $twoYearsAgoTimestamp) {
                                                $month = date('F', $currentTimestamp);
                                                $year = date('Y', $currentTimestamp);
                                                $monthYear = $month . ' ' . $year;
                                                $selected = ($monthYear == $currentMonthYear) ? 'selected' : '';

                                                echo '<option value="' . $monthYear . '" ' . $selected . '>' . $monthYear . '</option>';
                                                $currentTimestamp = strtotime('-1 month', $currentTimestamp);
                                            }

                                            echo '</select>';
                                        }

                                        generateMonthSelectBox();
                                        ?>
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
                            <h4 class="card-title">Report for the Month of <span class="dispmnth" id="selectedMonth"></span></h4>
                            <hr>
                            <div id="reportData"></div>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->

    <script>
        $(document).ready(function() {
            function fetchStationByStaff(staffId) {
                if (staffId) {
                    $.ajax({
                        url: "<?= base_url('Reportcontroller/getStationByStaff'); ?>",
                        type: "POST",
                        data: {
                            staffId: staffId
                        },
                        success: function(response) {
                            $('#station').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            $('#station').html('<option value="">Select Station</option>');
                        }
                    });
                } else {
                    $('#station').html('<option value="">Select Station</option>');
                }
            }

            function updateReportData() {
                var staffId = $('#staff').val();
                var monthYear = $('#monthSelect').val();
                if (staffId && monthYear) {
                    $.ajax({
                        url: '<?php echo base_url('ReportController/monthDatabyYearandMonth'); ?>',
                        type: 'POST',
                        data: {
                            staffId: staffId,
                            monthYear: monthYear
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            populateFields(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            $('#reportData').html('<p>Error loading report data.</p>');
                        }
                    });
                }
            }

            $('#staff').on('change', function() {
                var staffId = $(this).val();
                fetchStationByStaff(staffId);
                updateReportData();
            });

            $('#monthSelect').on('change', function() {
                updateReportData();
            });

            function populateFields(data) {
                if (data.error) {
                    $('#reportData').html('<p>' + data.error + '</p>');
                    return;
                }


                $('#reportData').html(`

                <h4 class="mb-3 card-title-desc">Report Details</h4>
    <div class="row mb-4">
        ${renderStatisticCard('Number of CGPF Meetings', data.CGPF_Number)}
        ${renderStatisticCard('Number of House Visits', data.House_Visit_Number)}
        ${renderStatisticCard('Number of Hostel Visits', data.Hostel_Visit_Number)}
        ${renderStatisticCard('Number of Personal Evangelisms', data.Personal_Evangelisms)}
    </div>

    <div class="row mb-4">
        ${renderStatisticCard('Accepted Christ', data.Accepted_Christ)}
        ${renderStatisticCard('Baptism Decision', data.Baptism_Decision)}
        ${renderStatisticCard('Baptism Number', data.Baptism_Number)}
        ${renderStatisticCard('Holy Spirit Received', data.Holyspirit_Received)}
    </div>

    <h4 class="mb-3 card-title-desc">Church Details</h4>
<div class="row mb-4">
    ${renderStatisticCard('First Sunday Church', data.first_sunday_church_name ?? 'Not selected')}
    ${renderStatisticCard('Second Sunday Church', data.second_sunday_church_name ?? 'Not selected')}
    ${renderStatisticCard('Third Sunday Church', data.third_sunday_church_name ?? 'Not selected')}
    ${renderStatisticCard('Fourth Sunday Church', data.fourth_sunday_church_name ?? 'Not selected')}
    ${renderStatisticCard('Fifth Sunday Church', data.fifth_sunday_church_name ?? 'Not selected')}
</div>


    <h4 class="mb-3 card-title-desc">Event Details</h4>
    <div id="eventDetails"></div>
     <div class="row">
        <div class="col-md-12 text-left" style="margin-top: 20px;">
            <button id="approveBtn" class="btn btn-success" disabled>Approve</button>
            <button id="rejectBtn" class="btn btn-danger" disabled>Reject</button>
        </div>
    </div>
`);

                if (data.events.length > 0) {
                    let eventDetails = '';
                    data.events.forEach(event => {
                        eventDetails += `
<div class="row mb-4 p-3" style="background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <div class="col-md-4">Name: ${event.event_name}<br></div>
    <div class="col-md-4">Date: ${event.program_date}</div>
    <div class="col-md-4">Location: ${event.event_location}</div>
    <div class="col-md-4 mt-3">Resource: ${event.resource_person}</div> <!-- Add margin-top here -->
    <div class="col-md-4 mt-3">Attendance: ${event.attendance}</div>
    <hr>
    <div class="col-md-12 mt-2">
        <strong>Photos:</strong>
        ${event.eventPhotos ? renderEventPhotos(event.eventPhotos) : 'No photos available'}
    </div>
</div>

        `;
                    });

                    $('#eventDetails').html(eventDetails);
                } else {
                    $('#eventDetails').html('<p>No events available</p>');
                }

                if (data.submitReviewt == 1) {
                    $('#approveBtn').prop('disabled', false);
                    $('#rejectBtn').prop('disabled', false);
                } else {
                    $('#approveBtn').prop('disabled', true);
                    $('#rejectBtn').prop('disabled', true);
                }
                
                $('#approveBtn').on('click', function() {
                    if (confirm('Are you sure you want to approve this report?')) {
                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                reportId: data.reportId
                            },
                            success: function(response) {
                                alert('Report approved successfully!');
                            },
                            error: function() {
                                alert('Error in approving report.');
                            }
                        });
                    }
                });


                $('#rejectBtn').on('click', function() {
                    if (confirm('Are you sure you want to reject this report?')) {
                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                reportId: data.reportId
                            },
                            success: function(response) {
                                alert('Report rejected successfully!');
                            },
                            error: function() {
                                alert('Error in rejecting report.');
                            }
                        });
                    }
                });

                function renderStatisticCard(label, value) {
                    return `
        <div class="col-md-3 mb-3">
            <div style="background-color: #f1f1f1; color: #333; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 15px;">
                <span>${label}</span>
                <span style="float: right; font-weight: bold;">${value}</span>
            </div>
        </div>
    `;
                }



                // function renderEventPhotos(eventPhotos) {
                //     const photos = eventPhotos.split(',');
                //     let photoHTML = '';

                //     photos.forEach(photo => {
                //         photoHTML += `<img src="${base_url('uploads/images/reports/')}${photo.trim()}" alt="Event Photo" style="width:100px; margin-right:10px; border-radius: 5px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">`;
                //     });

                //     return photoHTML;
                // }
            }





            var currentMonthYear = $('#monthSelect').val();
            $('.dispmnth').text(currentMonthYear);
        });
    </script>

    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";

        function renderEventPhotos(eventPhotos) {
            const photos = eventPhotos.split(',');
            let photoHTML = '';

            photos.forEach(photo => {
                photoHTML += `<img src="${base_url}uploads/images/reports/${photo.trim()}" alt="Event Photo" style="width:100px; margin-right:10px; border-radius: 5px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">`;
            });

            return photoHTML;
        }
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
    <script src="<?= base_url(); ?>assets/js/app.js"></script>