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

<style>
    #imagePreviewContainer {
        display: flex;
        flex-wrap: wrap;
    }

    #imagePreviewContainer .col-lg-2 {
        padding: 5px;
    }

    #imagePreviewContainer img {
        width: 100%;
        height: auto;
        border: 1px solid #ddd;
    }

    .custom-file-label::after {
        content: "Browse";
    }

    .remove-family {
        color: red;
    }
</style>

<!-- ============================================================== -->

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Report for the Month of <span class="dispmnth" id="selectedMonth"></span></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="mr-2">
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
                            <p class="card-title-desc">Ministry Report in Detail
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6" style="font-weight: bold;">Staff Name: <?= $_COOKIE['staffName']; ?></div>
                                <div class="col-lg-6" style="text-align: right; font-weight: bold;">Station Name: <?= $_COOKIE['stationName']; ?>
                                </div>
                            </div>
                            <hr>


                            <form action="#" id="saveReport" enctype="multipart/form-data" method="post">
                                <div id="reportMessage"></div>

                                <div class="row">


                                </div>


                                <div class="row">
                                    <div class="col-lg-6">


                                        <input type="hidden" id="reportMonth" name="reportMonth">
                                        <!-- <span class="dispmnth" id="selectedMonth"></span> -->
                                        <div class="form-group">
                                            <label>Number of CGPF Meetings</label>
                                            <input class="form-control" type="text" name="CGPF_Number"
                                                placeholder="No of CGPF Meetings" id="CGPF_Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of House Visits</label>
                                            <input class="form-control" type="text" name="House_Visit_Number"
                                                placeholder="No of House Visits" id="House_Visit_Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of Hostel Visits</label>
                                            <input class="form-control" type="text" name="Hostel_Visit_Number"
                                                placeholder="No of Hostel Visits" id="Hostel_Visit_Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of Personal Evangelisms</label>
                                            <input class="form-control" type="text" name="Evangelisms_Number"
                                                placeholder="No of Personal Evangelisms" id="Evangelisms_Number">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Accepted Christ</label>
                                            <input class="form-control" type="text" name="Accepted_Christ"
                                                placeholder="Accepted Christ" id="Accepted_Christ">
                                        </div>
                                        <div class="form-group">
                                            <label>Decision for Baptism</label>
                                            <input class="form-control" type="text" name="Baptism_Decision"
                                                placeholder="Baptism Decisions" id="Baptism_Decision">
                                        </div>
                                        <div class="form-group">
                                            <label>No of Baptisms</label>
                                            <input class="form-control" type="text" name="Baptism_Number"
                                                placeholder="No. of Baptisms" id="Baptism_Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Holyspirt Received</label>
                                            <input class="form-control" type="text" name="Holyspirit_Received"
                                                placeholder="Holyspirit Received" id="Holyspirit_Received">
                                        </div>
                                        <div class="form-group">
                                            <label>Ministry Commitments</label>
                                            <input class="form-control" type="text" name="Ministry_Commitments"
                                                placeholder="Ministry Commitments" id="Ministry_Commitments">
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Existing Student Councils</label>
                                            <input class="form-control" type="text" name="Existing_Student_Councils"
                                                placeholder="Existing Student Councils" id="Existing_Student_Councils">
                                        </div>

                                        <div class="form-group">
                                            <label>New Student Councils</label>
                                            <input class="form-control" type="text" name="New_Student_Councils"
                                                placeholder="New Student Councils" id="New_Student_Councils">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Existing CGPF</label>
                                            <input class="form-control" type="text" name="Existing_CGPF"
                                                placeholder="Existing CGPF" id="Existing_CGPF">
                                        </div>

                                        <div class="form-group">
                                            <label>New CGPF</label>
                                            <input class="form-control" type="text" name="New_CGPF"
                                                placeholder="New CGPF" id="New_CGPF">
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
                                            <select name="first_sunday_church" class="form-control select2" id="firstSundaySelect" placeholder="First Sunday">
                                                <option value="" selected>Select Church</option>
                                                <?php foreach ($churches as $church): ?>
                                                    <option value="<?= $church->churchId ?>">
                                                        <?= $church->churchName ?>, <?= $church->locationName ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Second Sunday</label>
                                            <select name="second_sunday_church" class="form-control select2" id="secondSundaySelect" placeholder="Second Sunday">
                                                <option value="" selected>Select Church</option>
                                                <?php foreach ($churches as $church): ?>
                                                    <option value="<?= $church->churchId ?>">
                                                        <?= $church->churchName ?>, <?= $church->locationName ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Third Sunday</label>
                                            <select name="third_sunday_church" class="form-control select2" id="thirdSundaySelect" placeholder="Third Sunday">
                                                <option value="" selected>Select Church</option>
                                                <?php foreach ($churches as $church): ?>
                                                    <option value="<?= $church->churchId ?>">
                                                        <?= $church->churchName ?>, <?= $church->locationName ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Fourth Sunday</label>
                                            <select name="fourth_sunday_church" class="form-control select2" id="fourthSundaySelect" placeholder="Fourth Sunday">
                                                <option value="" selected>Select Church</option>
                                                <?php foreach ($churches as $church): ?>
                                                    <option value="<?= $church->churchId ?>">
                                                        <?= $church->churchName ?>, <?= $church->locationName ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Fifth Sunday</label>
                                            <select name="fifth_sunday_church" class="form-control select2" id="fifthSundaySelect" placeholder="Fifth Sunday">
                                                <option value="" selected>Select Church</option>
                                                <?php foreach ($churches as $church): ?>
                                                    <option value="<?= $church->churchId ?>">
                                                        <?= $church->churchName ?>, <?= $church->locationName ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="row">
                                    <div class="col-lg-6" style="font-weight: bold; font-size:18px;">Special Programs</div>
                                    <div class="col-lg-6" style="text-align: right;">
                                        <div class="row">
                                            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#0545f5;">
                                                <i class="mdi mdi-alarm-plus" id="addFamilyRow" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                            </div>
                                            <div class="col-lg-1" style="font-weight: bold; font-size:18px; padding-top:30px; color:#f54b42;">
                                                <!-- <i class="mdi mdi-close-thick remove-family" id="removeFamilyRow" style="font-style: normal; cursor: pointer;">&nbsp;</i> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <div id="eventsContainer">
                                    <div class="event1 events default">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label>Date of Program</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="events[0][program_date]">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Event Name</label>
                                                    <input class="form-control" type="text" name="events[0][event_name]" placeholder="Event Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Event Location</label>
                                                    <input class="form-control" type="text" name="events[0][event_location]" placeholder="Event Location">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Resource Person</label>
                                                    <input class="form-control" type="text" name="events[0][resource_person]" placeholder="Resource Person">
                                                </div>
                                                <div class="form-group">
                                                    <label>Attendance</label>
                                                    <input class="form-control" type="text" name="events[0][attendance]" placeholder="Attendance">
                                                </div>
                                                <div class="form-group">
                                                    <label>Event Photos</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="events[0][eventPhotos][]" multiple onchange="displayImages(this)">
                                                        <label class="custom-file-label">Choose files</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row" id="imagePreviewContainer_0">

                                                </div>
                                                <i class="mdi mdi-close-thick remove-event" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-12" style="text-align: right;">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function clearFields() {
            console.log('Clearing fields');

            $('#CGPF_Number').val('');
            $('#House_Visit_Number').val('');
            $('#Hostel_Visit_Number').val('');
            $('#Evangelisms_Number').val('');
            $('#Accepted_Christ').val('');
            $('#Baptism_Decision').val('');
            $('#Baptism_Number').val('');
            $('#Holyspirit_Received').val('');
            $('#Ministry_Commitments').val('');
            $('#Existing_Student_Councils').val('');
            $('#New_Student_Councils').val('');
            $('#Existing_CGPF').val('');
            $('#New_CGPF').val('');


            $('#firstSundaySelect').val('').trigger('change');
            $('#secondSundaySelect').val('').trigger('change');
            $('#thirdSundaySelect').val('').trigger('change');
            $('#fourthSundaySelect').val('').trigger('change');
            $('#fifthSundaySelect').val('').trigger('change');


            $('#eventsContainer .event').each(function() {
                $(this).find('input[type="date"]').val('');
                $(this).find('input[type="text"]').val('');
                $(this).find('input[type="file"]').val('');
                $(this).find('#imagePreviewContainer_').empty();
            });
        }

        function populateFields(data) {
            console.log('Data received for population:', data);
            if (!data || $.isEmptyObject(data)) {
                console.log('No data or empty object, clearing fields');
                clearFields();

                $('#eventsContainer').append(`
            <div class="event1 events default">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label>Date of Program</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="events[0][program_date]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Event Name</label>
                            <input class="form-control" type="text" name="events[0][event_name]" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <label>Event Location</label>
                            <input class="form-control" type="text" name="events[0][event_location]" placeholder="Event Location">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Resource Person</label>
                            <input class="form-control" type="text" name="events[0][resource_person]" placeholder="Resource Person">
                        </div>
                        <div class="form-group">
                            <label>Attendance</label>
                            <input class="form-control" type="text" name="events[0][attendance]" placeholder="Attendance">
                        </div>
                        <div class="form-group">
                            <label>Event Photos</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="events[0][eventPhotos][]" multiple onchange="displayImages(this)">
                                <label class="custom-file-label">Choose files</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row" id="imagePreviewContainer_0">
                            <!-- Image previews will go here -->
                        </div>
                        <i class="mdi mdi-close-thick remove-event" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                    </div>
                </div>
                <hr>
            </div>
        `);
                return;
            }


            $('#CGPF_Number').val(data.CGPF_Number || '');
            $('#House_Visit_Number').val(data.House_Visit_Number || '');
            $('#Hostel_Visit_Number').val(data.Hostel_Visit_Number || '');
            $('#Evangelisms_Number').val(data.Evangelisms_Number || '');
            $('#Accepted_Christ').val(data.Accepted_Christ || '');
            $('#Baptism_Decision').val(data.Baptism_Decision || '');
            $('#Baptism_Number').val(data.Baptism_Number || '');
            $('#Holyspirit_Received').val(data.Holyspirit_Received || '');
            $('#Ministry_Commitments').val(data.Ministry_Commitments || '');
            $('#Existing_Student_Councils').val(data.Existing_Student_Councils || '');
            $('#New_Student_Councils').val(data.New_Student_Councils || '');
            $('#Existing_CGPF').val(data.Existing_CGPF || '');
            $('#New_CGPF').val(data.New_CGPF || '');
            $('#firstSundaySelect').val(data.first_sunday_church || '').trigger('change');
            $('#secondSundaySelect').val(data.second_sunday_church || '').trigger('change');
            $('#thirdSundaySelect').val(data.third_sunday_church || '').trigger('change');
            $('#fourthSundaySelect').val(data.fourth_sunday_church || '').trigger('change');
            $('#fifthSundaySelect').val(data.fifth_sunday_church || '').trigger('change');

            $('#eventsContainer').empty();
            if (data.events && data.events.length) {
                data.events.forEach(function(event, index) {
                    $('#eventsContainer').append(`
                <div class="event${index + 1} events default">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label>Date of Program</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="events[${index}][program_date]" value="${event.program_date}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Event Name</label>
                                <input class="form-control" type="text" name="events[${index}][event_name]" placeholder="Event Name" value="${event.event_name}">
                            </div>
                            <div class="form-group">
                                <label>Event Location</label>
                                <input class="form-control" type="text" name="events[${index}][event_location]" placeholder="Event Location" value="${event.event_location}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Resource Person</label>
                                <input class="form-control" type="text" name="events[${index}][resource_person]" placeholder="Resource Person" value="${event.resource_person}">
                            </div>
                            <div class="form-group">
                                <label>Attendance</label>
                                <input class="form-control" type="text" name="events[${index}][attendance]" placeholder="Attendance" value="${event.attendance}">
                            </div>
                            <div class="form-group">
                                <label>Event Photos</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="events[${index}][eventPhotos][]" multiple onchange="displayImages(this)">
                                    <label class="custom-file-label">Choose files</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row" id="imagePreviewContainer_${index}">
                                ${event.eventPhotos ? JSON.parse(event.eventPhotos).map(photo => `
                                    <div class="col-lg-3">
                                        <img src="${baseUrl('uploads/images/reports/') + encodeURIComponent(photo)}" class="img-thumbnail">
                                    </div>
                                `).join('') : ''}
                            </div>
                            <i class="mdi mdi-close-thick remove-event" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                        </div>
                    </div>
                    <hr>
                </div>
            `);
                });
            } else {

                $('#eventsContainer').append(`
            <div class="event1 events default">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label>Date of Program</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="events[0][program_date]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Event Name</label>
                            <input class="form-control" type="text" name="events[0][event_name]" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <label>Event Location</label>
                            <input class="form-control" type="text" name="events[0][event_location]" placeholder="Event Location">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Resource Person</label>
                            <input class="form-control" type="text" name="events[0][resource_person]" placeholder="Resource Person">
                        </div>
                        <div class="form-group">
                            <label>Attendance</label>
                            <input class="form-control" type="text" name="events[0][attendance]" placeholder="Attendance">
                        </div>
                        <div class="form-group">
                            <label>Event Photos</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="events[0][eventPhotos][]" multiple onchange="displayImages(this)">
                                <label class="custom-file-label">Choose files</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row" id="imagePreviewContainer_0">
                            <!-- Image previews will go here -->
                        </div>
                        <i class="mdi mdi-close-thick remove-event" style="font-style: normal; cursor: pointer;">&nbsp;</i>
                    </div>
                </div>
                <hr>
            </div>
        `);
            }
        }


        function baseUrl(path) {
            return '<?php echo base_url(); ?>' + path;
        }

        function fetchData(monthYear) {
            $.ajax({
                url: '<?php echo base_url('ReportController/getDatabyYearandMonth'); ?>',
                type: 'POST',
                data: {
                    monthYear: monthYear
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    populateFields(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    clearFields();
                }
            });
        }

        var currentMonthYear = $('#monthSelect').val();
        if (currentMonthYear) {
            fetchData(currentMonthYear);
        }

        $('#monthSelect').on('change', function() {
            var selectedMonthYear = $(this).val();
            fetchData(selectedMonthYear);
        });
    });
</script>





<script>
    function displayImages(input) {
        var files = input.files;
        var previewContainer = $(input).closest('.event1').find('[id^="imagePreviewContainer_"]');
        previewContainer.empty();

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = (function(file) {
                return function(e) {
                    var img = $('<img>').attr('src', e.target.result).css('width', '100px').css('margin-right', '10px');
                    previewContainer.append(img);
                };
            })(files[i]);
            reader.readAsDataURL(files[i]);
        }
    }

    $(document).ready(function() {
        var eventIndex = 1;
        $('#addFamilyRow').on('click', function() {
            var newEvent = $('.event1').first().clone();
            newEvent.find('input, select').each(function() {
                var nameAttr = $(this).attr('name');
                $(this).val('');
                $(this).attr('name', nameAttr.replace('[0]', '[' + eventIndex + ']'));
            });


            newEvent.find('[id^="imagePreviewContainer_"]').attr('id', 'imagePreviewContainer_' + eventIndex).empty();


            newEvent.find('input[type="file"]').attr('name', 'events[' + eventIndex + '][eventPhotos][]');


            $('#eventsContainer').append(newEvent);

            eventIndex++;
        });

        $(document).on('click', '.remove-event', function() {
            $(this).closest('.event1').remove();
        });


        $('#saveReport').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: '<?php echo base_url('ReportController/saveReport'); ?>',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        var parsedResponse = JSON.parse(response);

                        if (parsedResponse.status === 'success') {
                            $('#reportMessage').html('<div class="alert alert-success">Month Report Successfully Created!</div>');
                            $('#saveReport')[0].reset();

                        } else {
                            var errorMessage = "<div class='alert alert-danger'>";
                            if (parsedResponse.message) {
                                errorMessage += "<p>" + parsedResponse.message + "</p>";
                            }
                            errorMessage += "</div>";
                            $('#reportMessage').html(errorMessage);
                        }
                    } catch (e) {
                        console.error('Failed to parse response', e);
                        $('#reportMessage').html('<div class="alert alert-danger">Failed to process response.</div>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX request failed:', textStatus, errorThrown);
                    $('#reportMessage').html('<div class="alert alert-danger">There was an error processing your request. Please try again later.</div>');
                }
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        var monthSelect = document.getElementById('monthSelect');
        var reportMonthInput = document.getElementById('reportMonth');
        var displayMonths = document.querySelectorAll('.dispmnth');

        function updateMonth() {
            var selectedMonth = monthSelect.value;
            reportMonthInput.value = selectedMonth;
            displayMonths.forEach(function(span) {
                span.textContent = selectedMonth;
            });
        }


        updateMonth();


        monthSelect.addEventListener('change', updateMonth);
    });





    $(document).on('click', '.remove-event', function() {
        if (confirm('Are you sure you want to delete this event?')) {
            $(this).closest('.event1').remove();
        }
    });
    $(document).ready(function() {
        function updateMonth() {
            var selectedMonth = $('#monthSelect').val();
            $('#reportMonth').val(selectedMonth);
            $('.dispmnth').text(selectedMonth);
        }


        updateMonth();


        $('#monthSelect').change(updateMonth);
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
<script src="<?= base_url(); ?>assets/js/app.js"></script>