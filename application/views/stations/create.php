<link href="<?= base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
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
                        <h4 class="mb-0">Stations Management</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="" style="margin-right:20px;"><button onclick='location.href="<?= base_url(); ?>stations/manage"' class="btn-primary">Manage Stations</button></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Stations</a></li>
                                <li class="breadcrumb-item active">Create Station</li>
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

                            <h4 class="card-title">Create Station</h4>
                            <p class="card-title-desc">Create a Station if you have region, district & state already
                                set!</p>
                            <p><span id="savedistrict_message"></span></p>

                            <div class="form-group">
                                <label>Name of Station</label>
                                <input class="form-control" type="text" name="stationName" placeholder="Enter Station"
                                    id="stationName">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Country</label>
                                <select class="form-control select2" name="sn_country" id="sn_country">
                                    <option selected>Select Country</option>
                                    <?php
                                    foreach ($countries as $cnt) {
                                    ?>
                                        <option value="<?= $cnt->countryId; ?>"><?= $cnt->countryName; ?></option>
                                    <?php } ?>


                                </select>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Select State</label>
                                <select class="form-control select2" name="sn_state" id="sn_state">
                                    <option>Select State</option>
                                    <option value="">Kerala</option>


                                </select>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Select District</label>
                                <select class="form-control select2" id="sn_district" name="sn_district">
                                    <option>Select District</option>
                                    <option value="">Trivandrum</option>


                                </select>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Region</label>
                                <select class="form-control select2" id="sn_region" name="sn_region">
                                    <option>Select Region</option>
                                    <?php
                                    foreach ($regions as $rgn) {
                                    ?>
                                        <option value="<?= $rgn->regionId; ?>"><?= $rgn->regionName; ?></option>
                                    <?php } ?>

                                </select>

                            </div>

                            <div class="form-group m-0" style="text-align:right;">
                                <button id="savestation_button" class="btn btn-success waves-effect waves-light pull-right">Create</button>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#sn_country').change(function() {
                                        var countryId = $(this).val();
                                        if (countryId) {
                                            $.ajax({
                                                url: "<?php echo base_url('stations/getstates'); ?>/" + countryId,
                                                dataType: 'json',
                                                success: function(data) {
                                                    var options = [];
                                                    for (var i = 0; i < data.length; i++) {
                                                        options.push({
                                                            id: data[i].stateId,
                                                            text: data[i].stateName
                                                        });
                                                    }
                                                    $('#sn_state').empty().select2({
                                                        data: options
                                                    }).prop('disabled', false);
                                                }
                                            });
                                        } else {
                                            $('#sn_state').empty().select2('destroy').prop('disabled', true);
                                        }
                                    });
                                });
                            </script>
                            <script>
                                $(document).ready(function() {
                                    $('#sn_state').change(function() {
                                        var stateId = $(this).val();
                                        if (stateId) {
                                            $.ajax({
                                                url: "<?php echo base_url('stations/getdistricts'); ?>/" + stateId,
                                                dataType: 'json',
                                                success: function(data) {
                                                    var options = [];
                                                    for (var i = 0; i < data.length; i++) {
                                                        options.push({
                                                            id: data[i].districtId,
                                                            text: data[i].districtName
                                                        });
                                                    }
                                                    $('#sn_district').empty().select2({
                                                        data: options
                                                    }).prop('disabled', false);
                                                }
                                            });
                                        } else {
                                            $('#sn_district').empty().select2('destroy').prop('disabled', true);
                                        }
                                    });
                                });
                            </script>
                            <script>
                                $(document).ready(function() {
                                    $('#savestation_button').click(function() {
                                        // alert("Hele");
                                        var stationName = $('#stationName').val();
                                        var districtId = $('#sn_district').val();
                                        var regionId = $('#sn_region').val();
                                        $.ajax({
                                            url: '<?php echo base_url('stations/savestation'); ?>',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {
                                                stationName: stationName,
                                                districtId: districtId
                                                regionId: regionId
                                            },
                                            success: function(response) {

                                                if (response.success) {
                                                    $('#save_stationmessage').html("<span class='greentxt'>Successfully Created Station!</span>");
                                                    $('#stationName').val(''); // Clear input field after successful save
                                                } else {
                                                    $('#save_stationmessage').html(response.message);
                                                    console.error(response.message); // Log any errors for troubleshooting
                                                }
                                                // alert('success');
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {

                                                console.error('AJAX Error:', textStatus, errorThrown);
                                            }
                                        });
                                    });
                                });
                            </script>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create District</h4>
                            <p class="card-title-desc">Create a District if you have region & state already
                                set!</p>
                            <p><span id="savedistrict_message"></span></p>


                            <div class="form-group">
                                <label>Name of Distict</label>
                                <input class="form-control" type="text" name="d_districtName"
                                    placeholder="Enter District" id="d_districtName">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Country</label>
                                <select class="form-control select2" id="d_country">
                                    <option selected>Select Country</option>
                                    <?php
                                    foreach ($countries as $cnt) {
                                    ?>
                                        <option value="<?= $cnt->countryId; ?>"><?= $cnt->countryName; ?></option>
                                    <?php } ?>


                                </select>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Select State</label>
                                <select class="form-control select2" id="d_state">
                                    <option>Select State</option>



                                </select>

                            </div>


                            <div class="form-group m-0" style="text-align:right;">
                                <button id="savedistrict_button" class="btn btn-success waves-effect waves-light pull-right">Create</button>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#d_country').change(function() {
                                        var countryId = $(this).val();
                                        if (countryId) {
                                            $.ajax({
                                                url: "<?php echo base_url('stations/getstates'); ?>/" + countryId,
                                                dataType: 'json',
                                                success: function(data) {
                                                    var options = [];
                                                    for (var i = 0; i < data.length; i++) {
                                                        options.push({
                                                            id: data[i].stateId,
                                                            text: data[i].stateName
                                                        });
                                                    }
                                                    $('#d_state').empty().select2({
                                                        data: options
                                                    }).prop('disabled', false);
                                                }
                                            });
                                        } else {
                                            $('#state').empty().select2('destroy').prop('disabled', true);
                                        }
                                    });
                                });
                            </script>
                            <script>
                                $(document).ready(function() {
                                    $('#savedistrict_button').click(function() {
                                        // alert("Hele");
                                        var districtName = $('#d_districtName').val();
                                        var stateId = $('#d_state').val();
                                        $.ajax({
                                            url: '<?php echo base_url('stations/savedistrict'); ?>',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {
                                                districtName: districtName,
                                                stateId: stateId
                                            },
                                            success: function(response) {

                                                if (response.success) {
                                                    $('#savedistrict_message').html("<span class='greentxt'>Successfully Created District!</span>");
                                                    $('#d_districtName').val(''); // Clear input field after successful save
                                                } else {
                                                    $('#savedistrict_message').html(response.message);
                                                    console.error(response.message); // Log any errors for troubleshooting
                                                }
                                                // alert('success');
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {

                                                console.error('AJAX Error:', textStatus, errorThrown);
                                            }
                                        });
                                    });
                                });
                            </script>

                        </div>
                    </div>

                </div>


            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create State</h4>
                            <p class="card-title-desc">Create State if you have country already
                                set!</p>
                            <p><span id="savestate_message"></span></p>


                            <div class="form-group">
                                <label>Name of State</label>
                                <input class="form-control" type="text" name="s_stateName" placeholder="Enter State"
                                    id="s_stateName">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Country</label>
                                <select class="form-control select2" id="s_countryId">
                                    <option value="1" selected>India</option>
                                    <?php
                                    foreach ($countries as $cnt) {
                                    ?>
                                        <option value="<?= $cnt->countryId; ?>"><?= $cnt->countryName; ?></option>
                                    <?php } ?>


                                </select>

                            </div>



                            <div class="form-group m-0" style="text-align:right;">
                                <button id="savestate_button" class="btn btn-success waves-effect waves-light pull-right">Create</button>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#savestate_button').click(function() {
                                        // alert("Hele");
                                        var s_stateName = $('#s_stateName').val();
                                        var s_countryId = $('#s_countryId').val();

                                        $.ajax({
                                            url: '<?php echo base_url('stations/savestate'); ?>',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {
                                                stateName: s_stateName,
                                                countryId: s_countryId
                                            },
                                            success: function(response) {

                                                if (response.success) {
                                                    $('#savestate_message').html("<span class='greentxt'>Successfully Created State!</span>");
                                                    $('#s_stateName').val(''); // Clear input field after successful save
                                                } else {
                                                    $('#savestate_message').html(response.message);
                                                    console.error(response.message); // Log any errors for troubleshooting
                                                }
                                                // alert('success');
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {

                                                console.error('AJAX Error:', textStatus, errorThrown);
                                            }
                                        });
                                    });
                                });
                            </script>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create Country</h4>
                            <p class="card-title-desc">Create Country if Region is already set!</p>
                            <p><span id="savecountry_message"></span></p>

                            <div class="form-group">
                                <label>Name of Country</label>
                                <input class="form-control" type="text" name="countryName"
                                    placeholder="Enter Country" id="countryName">
                            </div>




                            <div class="form-group m-0" style="text-align:right;">
                                <button id="savecountry_button" class="btn btn-success waves-effect waves-light pull-right">Create</button>
                            </div>



                            <script>
                                $(document).ready(function() {
                                    $('#savecountry_button').click(function() {
                                        // alert("Hele");
                                        var countryName = $('#countryName').val();

                                        $.ajax({
                                            url: '<?php echo base_url('stations/savecountry'); ?>',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {
                                                countryName: countryName
                                            },
                                            success: function(response) {

                                                if (response.success) {
                                                    $('#savecountry_message').html("<span class='greentxt'>Successfully Created Country!</span>");
                                                    $('#countryName').val(''); // Clear input field after successful save
                                                } else {
                                                    $('#savecountry_message').html(response.message);
                                                    console.error(response.message); // Log any errors for troubleshooting
                                                }
                                                // alert('success');
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {

                                                console.error('AJAX Error:', textStatus, errorThrown);
                                            }
                                        });
                                    });
                                });
                                document.addEventListener("click", function(event) {
                                    if (event.target.classList.contains("clickme")) {
                                        // Get the element to hide
                                        var hideElement = document.getElementById("hideme");
                                        // Hide the element using style property
                                        hideElement.style.display = "none";
                                    }
                                });
                            </script>

                        </div>
                    </div>

                </div>
            </div>


            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create Region</h4>
                            <p class="card-title-desc">Region is created Independent of Country, State and District</p>
                            <p><span id="saveregion_message"></span></p>

                            <div class="form-group">
                                <label>Name of Region</label>
                                <input class="form-control" type="text" name="regionName" placeholder="Enter Region"
                                    id="regionName">
                            </div>



                            <div class="form-group m-0" style="text-align:right;">
                                <button id="saveregion_button" class="btn btn-success waves-effect waves-light pull-right">Create</button>
                            </div>



                        </div>
                    </div>

                </div>


            </div>


        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<script>
    $(document).ready(function() {
        $('#saveregion_button').click(function() {
            // alert("Hele");
            var regionName = $('#regionName').val();

            $.ajax({
                url: '<?php echo base_url('stations/saveregion'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    regionName: regionName
                },
                success: function(response) {

                    if (response.success) {
                        $('#saveregion_message').html("<span class='greentxt'>Successfully Created Region!</span>");
                        $('#regionName').val(''); // Clear input field after successful save
                    } else {
                        $('#saveregion_message').html(response.message);
                        console.error(response.message); // Log any errors for troubleshooting
                    }
                    // alert('success');
                },
                error: function(jqXHR, textStatus, errorThrown) {

                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        });
    });
    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("clickme")) {
            // Get the element to hide
            var hideElement = document.getElementById("hideme");
            // Hide the element using style property
            hideElement.style.display = "none";
        }
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

<script src="<?= base_url(); ?>assets/js/app.js"></script>