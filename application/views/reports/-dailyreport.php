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
            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Report for the Month of <span class="dispmnth" id="selectedMonth"></span></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
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
            <!-- End Page Title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Report for the Month of <span class="dispmnth" id="selectedMonth"></span></h4>
                            <p class="card-title-desc">Ministry Report in Detail</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6" style="font-weight: bold;">Staff Name: <?= $_COOKIE['staffName']; ?></div>
                                <div class="col-lg-6 text-end" style="font-weight: bold;">Station Name: <?= $_COOKIE['stationName']; ?></div>
                            </div>
                            <hr>

                            <form action="#" id="saveReport" method="post">
                                <div id="reportMessage"></div>
                                <input type="hidden" id="reportMonth" name="reportMonth">
                                <div id="reportContainer">
                                    <div class="row reportRow align-items-center mb-3 preserve" data-index="0">
                                        <input type="hidden" name="rowIndex[]" value="0">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Date of Event</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="dateOfEvent[0]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Events</label>
                                                <input type="text" class="form-control" name="event[0]" placeholder="Events">
                                             
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <select name="groupLocation[0]" class="form-control select2" placeholder="Location">
                                                    <option selected>Select Location</option>
                                                    <?php foreach ($locations as $location): ?>
                                                        <option value="<?php echo $location['locationId']; ?>"><?php echo htmlspecialchars($location['locationName']); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Resource</label>
                                                <input class="form-control" type="text" name="resource[0]" placeholder="Resource">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 d-flex justify-content-center align-items-center">
                                            <i class="mdi mdi-alarm-plus addRow" style="font-weight: bold; font-size:18px; cursor:pointer;"></i>
                                        </div>
                                        <div class="col-lg-1 d-flex justify-content-center align-items-center">
                                            <i class="ri-delete-bin-6-line removeRow" style="font-weight: bold; font-size:18px; color:red; cursor:pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light me-2" id="saveButton">Save</button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" id="submitButton">Submit for Review</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Container Fluid -->
    </div> <!-- End Page Content -->
</div> <!-- End Main Content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        let rowIndex = 0;

        function clearFields() {
            // Only clear the rows that should be replaced
            $('#reportContainer .reportRow').each(function() {
                if (!$(this).hasClass('preserve')) {
                    $(this).remove();
                }
            });
        }


        function populateFields(data) {
            if (!data || $.isEmptyObject(data)) {
                clearFields();
                return;
            }

            clearFields(); 

            data.forEach((row, index) => {
                let newRow = `
            <div class="row reportRow align-items-center mb-3" data-index="${index}">
                <input type="hidden" name="rowIndex[]" value="${index}">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Date of Event</label>
                        <div class="input-group">
                            <input type="date" class="form-control"  name="dateOfEvent[${index}]" value="${row.dateOfEvent || ''}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Events</label>
                          <input type="text" class="form-control" placeholder="Events" name="event[${index}]" value="${row.event || ''}">
                     
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Location</label>
                        <select name="groupLocation[${index}]" class="form-control select2">
                            <option selected>Select Location</option>
                            <?php foreach ($locations as $location): ?>
                                <option value="<?php echo $location['locationId']; ?>" ${row.groupLocation == <?php echo $location['locationId']; ?> ? 'selected' : ''}>
                                    <?php echo htmlspecialchars($location['locationName']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Resource</label>
                        <input class="form-control" type="text" name="resource[${index}]" placeholder="Resource" value="${row.resource || ''}">
                    </div>
                </div>
                <div class="col-lg-1 d-flex justify-content-center align-items-center">
                    <i class="mdi mdi-alarm-plus addRow" style="font-weight: bold; font-size:18px; cursor:pointer;"></i>
                </div>
                <div class="col-lg-1 d-flex justify-content-center align-items-center">
                    <i class="ri-delete-bin-6-line removeRow" style="font-weight: bold; font-size:18px; color:red; cursor:pointer;"></i>
                </div>
            </div>
        `;
                $('#reportContainer').append(newRow);
            });

            updateRowIndex();
        }


        function fetchData(monthYear) {
            console.log('Month and Year:', monthYear);
            $.ajax({
                url: '<?php echo base_url('ReportController/getDailyDatabyYearandMonth'); ?>',
                type: 'POST',
                data: {
                    monthYear: monthYear
                },
                success: function(response) {
                    try {
                        var data = JSON.parse(response);
                        populateFields(data);
                    } catch (e) {
                        console.error('JSON Parsing Error:', e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    clearFields();
                }
            });
        }


        $('#monthSelect').on('change', function() {
            var selectedMonthYear = $(this).val();
            $('#reportMonth').val(selectedMonthYear);
            $('.dispmnth').text(selectedMonthYear);
            fetchData(selectedMonthYear);
        });

        var currentMonthYear = $('#monthSelect').val();
        if (currentMonthYear) {
            $('#reportMonth').val(currentMonthYear);
            $('.dispmnth').text(currentMonthYear);
            fetchData(currentMonthYear);
        }
    });
</script>


<script>
  $(document).ready(function() {
    let rowIndex = 0;

     function updateRowIndex() {
        $('#reportContainer .reportRow').each(function(index) {
            $(this).attr('data-index', index);
            $(this).find('input[name^="dateOfEvent"]').attr('name', 'dateOfEvent[' + index + ']');
            $(this).find('input[name^="event"]').attr('name', 'event[' + index + ']');
            $(this).find('select[name^="groupLocation"]').attr('name', 'groupLocation[' + index + ']');
            $(this).find('input[name^="resource"]').attr('name', 'resource[' + index + ']');
            $(this).find('input[name="rowIndex[]"]').val(index);
        });
    }


    $(document).on('click', '.addRow', function() {
        // console.log('Add Row button clicked!');
        let newRow = `
        <div class="row reportRow align-items-center mb-3" data-index="${rowIndex}">
            <input type="hidden" name="rowIndex[]" value="${rowIndex}">
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Date of Event</label>
                    <div class="input-group">
                        <input type="date" class="form-control" name="dateOfEvent[${rowIndex}]">
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Event</label>
                    <input type="text" class="form-control" placeholder="Events" name="event[${rowIndex}]"> 
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Location</label>
                    <select name="groupLocation[${rowIndex}]" class="form-control select2" placeholder="">
                        <option selected>Select Location</option>
                        <?php foreach ($locations as $location): ?>
                            <option value="<?php echo $location['locationId']; ?>"><?php echo htmlspecialchars($location['locationName']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Resource</label>
                    <input class="form-control" type="text" name="resource[${rowIndex}]" placeholder="Resource">
                </div>
            </div>
            <div class="col-lg-1 d-flex justify-content-center align-items-center">
                <i class="mdi mdi-alarm-plus addRow" style="font-weight: bold; font-size:18px; cursor:pointer;"></i>
            </div>
            <div class="col-lg-1 d-flex justify-content-center align-items-center">
                <i class="ri-delete-bin-6-line removeRow" style="font-weight: bold; font-size:18px; color:red; cursor:pointer;"></i>
            </div>
        </div>
        `;
        $('#reportContainer').append(newRow);
        updateRowIndex();
        $('.select2').select2(); 
    });

    $(document).on('click', '.removeRow', function() {
        $(this).closest('.reportRow').remove();
        updateRowIndex();
    });
});

</script>

<script>
    $('#saveReport').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            url: '<?php echo base_url('ReportController/saveDailyReport'); ?>',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                try {
                    if (response.status === 'success') {
                        $('#reportMessage').html('<div class="alert alert-success">Daily Report Successfully Created!</div>');
                        $('#saveReport')[0].reset();
                    } else {
                        var errorMessage = "<div class='alert alert-danger'>";
                        if (response.message) {
                            errorMessage += "<p>" + response.message + "</p>";
                        }
                        errorMessage += "</div>";
                        $('#reportMessage').html(errorMessage);
                    }
                } catch (e) {
                    console.error('Failed to process response', e);
                    $('#reportMessage').html('<div class="alert alert-danger">Failed to process response.</div>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX request failed:', textStatus, errorThrown);
                $('#reportMessage').html('<div class="alert alert-danger">There was an error processing your request. Please try again later.</div>');
            }
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