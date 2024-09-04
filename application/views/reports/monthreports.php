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
                        <h4 class="mb-0">Report for the Month of <span class="dispmnth"></span></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="" style="margin-right:20px;">
                                    <div class="form-group">



                                        <?php
                                        function generateMonthSelectBox()
                                        {

                                            $currentTimestamp = time();


                                            $twoYearsAgoTimestamp = strtotime('-2 years', $currentTimestamp);


                                            echo '<select name="month" class="form-control select2" id="monthSelect">';


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
                                        <script>
                                            document.getElementById("monthSelect").addEventListener("change", function() {
                                            var selectedValue = this.value;
                                            document.getElementById("reportMonth").value = selectedValue;
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
                                <div class="col-lg-6" style="font-weight: bold;">Staff Name: <?= $_COOKIE['staffName']; ?></div>
                                <div class="col-lg-6" style="text-align: right; font-weight: bold;">Station Name: <?= $_COOKIE['stationName']; ?>
                                </div>
                            </div>
                            <hr>


                            <form action="#" id="saveReport" enctype="multipart/form-data">
                                <div id="reportMessage"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                       <span style="color:red;">@Jishnu - The selected month should load here as hidden value and pass to the database.  Field already created!</span>
                                    <input class="form-control" type="text" id="reportMonth" name="reportMonth"
                                    >
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


<script>
    document.getElementById('addFamilyRow').addEventListener('click', addEvent);

    function addEvent() {
        const container = document.getElementById('eventsContainer');
        const eventSection = document.createElement('div');
        eventSection.className = 'event1 events';

        let eventIndex = 1;
        

        eventSection.innerHTML = `
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label>Date of Program</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="events[${eventIndex}][program_date]">
                </div>
            </div>
            <div class="form-group">
                <label>Event Name</label>
                <input class="form-control" type="text" name="events[${eventIndex}][event_name]" placeholder="Event Name">
            </div>
            <div class="form-group">
                <label>Event Location</label>
                <input class="form-control" type="text" name="events[${eventIndex}][event_location]" placeholder="Event Location">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Resource Person</label>
                <input class="form-control" type="text" name="events[${eventIndex}][resource_person]" placeholder="Resource Person">
            </div>
            <div class="form-group">
                <label>Attendance</label>
                <input class="form-control" type="text" name="events[${eventIndex}][attendance]" placeholder="Attendance">
            </div>
            <div class="form-group">
                <label>Event Photos</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="events[${eventIndex}][eventPhotos][]" multiple onchange="displayImages(this)">
                    <label class="custom-file-label">Choose files</label>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row" id="imagePreviewContainer_${eventIndex}">
                <!-- Image previews will be added here -->
            </div>
            <i class="mdi mdi-close-thick remove-family" style="font-style: normal; cursor: pointer;">&nbsp;</i>
        </div>
    </div>
    <hr>
`;

        container.appendChild(eventSection);
        eventIndex++

        eventSection.querySelector('.remove-family').addEventListener('click', () => {
            if (confirm("Are you sure you want to remove this event?")) {
                container.removeChild(eventSection);
            }
        });
    }

    function reindexEvents() {
        let newIndex = 0;
        $('#eventsContainer .events').each(function() {
            $(this).attr('class', `event${newIndex} events`);
            $(this).find('input, select, textarea').each(function() {
                let nameAttr = $(this).attr('name');
                if (nameAttr) {
                    let updatedName = nameAttr.replace(/\[.*?\]/, `[${newIndex}]`);
                    $(this).attr('name', updatedName);
                }
            });
            $(this).find('.remove-event').attr('onclick', `removeEvent(${newIndex})`);
            $(this).find('#imagePreviewContainer_0').attr('id', `imagePreviewContainer_${newIndex}`);
            newIndex++;
        });
        eventIndex = newIndex;
    }

    function displayImages(input) {
        const containerId = input.closest('.event1').querySelector('[id^="imagePreviewContainer"]').id;
        const container = document.getElementById(containerId);

        if (!container) return;

        container.innerHTML = '';

        const files = input.files;
        const maxFiles = 6;

        if (files.length > maxFiles) {
            alert(`You can upload a maximum of ${maxFiles} images.`);
            return;
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';

                const div = document.createElement('div');
                div.className = 'col-lg-2';
                div.appendChild(img);

                container.appendChild(div);
            };

            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    document.getElementById('saveReport').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        document.querySelectorAll('.event1').forEach(eventSection => {
            const uniqueId = eventSection.querySelector('input[name^="events["]').name.match(/\[(.*?)\]/)[1];
            const fileInputs = eventSection.querySelectorAll('input[type="file"]');

            fileInputs.forEach(input => {
                const files = input.files;
                for (let i = 0; i < files.length; i++) {
                    formData.append(`events[${uniqueId}][eventPhotos][]`, files[i]);
                }
            });
        });

        $.ajax({
            url: '<?php echo base_url('ReportController/saveReport'); ?>',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                try {
                    var response = JSON.parse(response);

                    if (response.success) {
                        $('#reportMessage').html('<div class="alert alert-success"><p>Month Report Successfully Created!</p></div>');
                        $('#saveReport').trigger("reset");
                    } else {
                        var errorMessage = "<div class='alert alert-danger'>";
                        for (var key in response.error) {
                            if (response.error.hasOwnProperty(key)) {
                                errorMessage += "<p>" + response.error[key] + "</p>";
                            }
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
                $('#reportMessage').html('<div class="alert alert-danger">There was an error processing your request. Please try again later.</div>');
            }
        });
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