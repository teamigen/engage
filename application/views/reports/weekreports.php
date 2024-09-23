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
                                <div id="reportContainer"></div>
                                <input type="hidden" id="reportMonth" name="reportMonth">
                                    <div class="row reportRow align-items-center mb-3 preserve" data-index="0">
                                        <input type="hidden" name="rowId[]" value="0" class="rowId">
                                    <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Date of Event</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="dateOfEvent[]" value="<?php echo date("Y-m-d") ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Name of Group</label>
                                                <select name="groupName[]" class="form-control select2" placeholder="Name of Group">
                                                    <option value="">Select Group</option>
                                                    <?php foreach ($weeklyGroups as $group): ?>
                                                        <option value="<?php echo $group['id']; ?>"><?php echo htmlspecialchars($group['groupName']); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Leader</label>
                                                <select name="groupLeader[]" class="form-control select2" placeholder="Leader of Group">
                                                    <option selected>Select Leader</option>
                                                    <?php foreach ($leaders as $leader): ?>
                                                        <option value="<?php echo $leader['leaderId']; ?>"><?php echo htmlspecialchars($leader['name_of_leader']); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Attendance</label>
                                                <input class="form-control" type="text" name="groupAttendance[]" placeholder="No of CGPF Meetings">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 d-flex justify-content-center align-items-center">
                                            <i class="mdi mdi-alarm-plus addRow" style="font-weight: bold; font-size:18px; cursor:pointer;"></i>
                                        </div>

                                    
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light me-2" id="saveButton">Save</button>
                                        <button type="button" onclick="reviewSubmit()" class="btn btn-primary waves-effect waves-light" id="submitButton">Submit for Review</button>
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
<script>

function reviewSubmit()
    {
       var result = confirm("Are you sure want to submit this?"); 
       var reportMonth = $("#reportMonth").val();
       if(result==true)
       {
        $.ajax({
            url: '<?php echo base_url('ReportController/reviewSubmit'); ?>',
            type: 'POST',
            data: {"reportMonth":reportMonth},
            dataType: 'json',

            success: function(response) {

                if (response.status === 'success') {
                    var successMessage = "<div class='alert alert-success'>";
                        if (response.message) {
                            successMessage += "<p>" + response.message + "</p>";
                        }
                        successMessage += "</div>";
                        $(".form-control,.btn").attr("disabled",true);
                        $(".addRow,.removeRow").hide();

                        $("#monthSelect").attr("disabled",false);

                        $('#reportMessage').html(successMessage);
                    } else {
                        var errorMessage = "<div class='alert alert-danger'>";
                        if (response.message) {
                            errorMessage += "<p>" + response.message + "</p>";
                        }
                        errorMessage += "</div>";
                        $('#reportMessage').html(errorMessage);
                    }

               
            }
        });
       }
    }



    let rowIndex = 1;
    $(document).on('click', '.addRow', function() {
        rowIndex++;
        var newRow = ' <div class="row reportRow align-items-center mb-3" data-index="'+rowIndex+'">'+
                        '<input type="hidden" name="rowId[]" class="rowId" value="0"><div class="col-lg-2"><div class="form-group"><label>Date of Event</label>'+
                     '<div class="input-group"><input type="date" class="form-control" name="dateOfEvent[]" value="<?php echo date("Y-m-d") ?>">'+
                      '</div></div></div><div class="col-lg-2"><div class="form-group"><label>Name of Group</label>'+
                       '<select name="groupName[]" class="form-control select2" placeholder="Name of Group">'+
                        '<option value="">Select Group</option><?php foreach ($weeklyGroups as $group): ?><option value="<?php echo $group['id']; ?>"><?php echo htmlspecialchars($group['groupName']); ?></option><?php endforeach; ?></select>'+
                         '</div></div><div class="col-lg-2"> <div class="form-group"><label>Leader</label>'+
                        '<select name="groupLeader[]" class="form-control select2" placeholder="Leader of Group">'+
                         '<option value="">Select Leader</option><?php foreach ($leaders as $leader): ?><option value="<?php echo $leader['leaderId']; ?>"><?php echo htmlspecialchars($leader['name_of_leader']); ?></option><?php endforeach; ?></select>'+
                        '</div></div><div class="col-lg-2"><div class="form-group"><label>Attendance</label>'+
                        '<input class="form-control" type="text" name="groupAttendance[]" placeholder="No of CGPF Meetings">'+
                        '</div></div>'+
                        '<div class="col-lg-1 d-flex justify-content-center align-items-center">'+
                        '<i class="ri-delete-bin-6-line removeRow" style="font-weight: bold; font-size:18px; color:red; cursor:pointer;"></i>'+
                        '</div></div>';
        $('#reportContainer').append(newRow);

    });
    $(document).on('click', '.removeRow', function() {
            

            var rowId = $(this).closest(".reportRow").find("input[name='rowId[]']").val();
          if(rowId!=0){
            $.ajax({
            url: '<?php echo base_url('ReportController/deleteWeekReport'); ?>',
            type: 'POST',
            data: {"rowId":rowId},
            success: function(response) {
                $(this).closest('.reportRow').remove();
                var currentMonthYear = $('#monthSelect').val();     
                    fetchData(currentMonthYear);
            }
        });
            
          }
          else
          {
            $(this).closest('.reportRow').remove();
          }
            // updateRowIndex();
        });


        $('#saveReport').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            url: '<?php echo base_url('ReportController/saveWeekReport'); ?>',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                try {
                    if (response.status === 'success') {
                        $('#reportMessage').html('<div class="alert alert-success">Week Report Successfully Saved!</div>');
                        $('#saveReport')[0].reset();
                        location.reload();
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


    $('#monthSelect').on('change', function() {
        var disabled='';
                            var hide ='display:inline';
                            $(".btn").attr("disabled",false);
                            $(".addRow").show();

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


        function fetchData(monthYear) {
            console.log('Month and Year:', monthYear);
            $.ajax({
                url: '<?php echo base_url('ReportController/getWeekDatabyYearandMonth'); ?>',
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

        function clearFields() {
        
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

            var newRow='';
            data.forEach((row, index) => {
                // alert(row.dateOfEvent);
                var leader=groupName='';
                <?php foreach ($leaders as $leader): ?>
                    var selected=''; 
                    if(row.groupLeader==<?php echo $leader['leaderId'] ?>){
                        selected='selected';
                        // alert(selected);
                    }
                        leader =leader+'<option value="<?php echo $leader['leaderId']; ?>" '+selected+'><?php echo htmlspecialchars($leader['name_of_leader']); ?></option>';
                    <?php endforeach; ?>

                    <?php foreach ($weeklyGroups as $group){ ?>
                        var selected1=''; 
                    if(row.groupName==<?php echo $group['id']; ?>){
                        selected1='selected';
                        // alert(selected);
                    }
                        groupName=groupName+'<option value="<?php echo $group['id']; ?>" '+selected1+'><?php echo htmlspecialchars($group['groupName']); ?></option>';
                        <?php } ?>

                        if(row.submitReviewt==1){
                            var disabled='disabled';
                            var hide ='display:none';
                            $(".addRow").hide();
                            $(".btn").attr("disabled",true);
                        }
                        else
                        {
                            var disabled='';
                            var hide ='display:inline';
                            $(".btn").attr("disabled",false);
                            $(".addRow").show();

                        }
                    
                    // {"'+row.groupLeader+' == <?php echo $leader['leaderId']; ?>" ? "selected" : ""} >
                newRow = newRow+' <div class="row reportRow align-items-center mb-3">'+
                        '<input type="hidden" name="rowId[]"  class="rowId" value="'+row.id+'"><div class="col-lg-2"><div class="form-group"><label>Date of Event</label>'+
                     '<div class="input-group"><input '+disabled+' type="date" class="form-control" name="dateOfEvent[]" value="'+row.dateOfEvent+'">'+
                      '</div></div></div><div class="col-lg-2"><div class="form-group"><label>Name of Group</label>'+
                       '<select '+disabled+' name="groupName[]" class="form-control select2" placeholder="Name of Group">'+
                        '<option value="">Select Group</option>'+groupName+'</select>'+
                         '</div></div><div class="col-lg-2"> <div class="form-group"><label>Leader</label>'+
                        '<select '+disabled+' name="groupLeader[]" class="form-control select2" placeholder="Leader of Group">'+
                         '<option value="">Select Leader</option>'+leader+'</select>'+
                        '</div></div><div class="col-lg-2"><div class="form-group"><label>Attendance</label>'+
                        '<input '+disabled+' class="form-control" type="text" name="groupAttendance[]" placeholder="No of CGPF Meetings" value="'+row.groupAttendance+'">'+
                        '</div></div>'+
                        '<div class="col-lg-1 d-flex justify-content-center align-items-center">'+
                        '<i style="'+hide+'" class="ri-delete-bin-6-line removeRow" style="font-weight: bold; font-size:18px; color:red; cursor:pointer;"></i>'+
                        '</div></div>';

                
            });
            $('#reportContainer').append(newRow);

        }

</script>
