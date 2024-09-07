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
                        <h4 class="mb-0">List of Weekly Groups</h4>

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

                            <h4 class="card-title">Edit Group</h4>
                            <p class="card-title-desc">Manage Groups in the Location</p>
                            <form action="<?php echo site_url('Weeklygroups/update/' . $group->id); ?>" id="saveGroup" method="post">
                                <div id="groupMessage"></div>
                                <div class="form-group">
                                    <label>Name of Group</label>
                                    <input class="form-control" type="text" name="groupName"
                                        placeholder="Name of Group" id="groupName"
                                        value="<?php echo set_value('groupName', isset($group->groupName) ? $group->groupName : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="groupSlug"
                                        placeholder="Slug" id="groupSlug" readonly
                                        value="<?php echo set_value('groupSlug', isset($group->groupSlug) ? $group->groupSlug : ''); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="churchLocation">Location</label>
                                    <select name="groupLocation" id="groupLocation" class="form-control select2">
                                        <option value="">Select Location</option>
                                        <?php if (!empty($locations)): ?>
                                            <?php foreach ($locations as $location): ?>
                                                <option value="<?php echo $location->locationId; ?>"
                                                    <?php echo (isset($group->groupLocation) && $location->locationId == $group->groupLocation) ? 'selected' : ''; ?>>
                                                    <?php echo $location->locationName; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No Locations available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Meeting Place</label>
                                    <input class="form-control" type="text" name="meetingPlace"
                                        placeholder="Meeting Place" id="meetingPlace"
                                        value="<?php echo set_value('meetingPlace', isset($group->meetingPlace) ? $group->meetingPlace : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Type of Group</label>
                                    <select name="groupType" class="form-control select2" id="groupType">
                                        <option value="">Select Type of Group</option>
                                        <option value="Evangelistic Group"
                                            <?php echo (isset($group->groupType) && $group->groupType == 'Evangelistic Group') ? 'selected' : ''; ?>>
                                            Evangelistic Group 1
                                        </option>
                                        <option value="Discipleship Group"
                                            <?php echo (isset($group->groupType) && $group->groupType == 'Discipleship Group') ? 'selected' : ''; ?>>
                                            Discipleship Group
                                        </option>
                                        <option value="Moral Awareness Group"
                                            <?php echo (isset($group->groupType) && $group->groupType == 'Moral Awareness Group') ? 'selected' : ''; ?>>
                                            Moral Awareness Group
                                        </option>
                                        <option value="Student Leaders Group"
                                            <?php echo (isset($group->groupType) && $group->groupType == 'Student Leaders Group') ? 'selected' : ''; ?>>
                                            Student Leaders Group
                                        </option>
                                        <option value="Other Group"
                                            <?php echo (isset($group->groupType) && $group->groupType == 'Other Group') ? 'selected' : ''; ?>>
                                            Other Group
                                        </option>

                                    </select>
                                </div>

                                <input type="hidden" name="groupId" value="<?php echo isset($group->groupId) ? $group->groupId : ''; ?>">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                </div>
                            </form>





                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Weekly Groups</h4>
                            <p class="card-title-desc">Weekly Groups in the Station</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <!--<th>Location</th>-->
                                        <!--<th>Meeting Place</th>-->
                                        <th>Group Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($weekly_groups)) : ?>
                                        <?php foreach ($weekly_groups as $group) : ?>
                                            <tr id="row-<?= $group['groupSlug'] ?>">
                                                <td><?= $group['groupName'] ?></td>
                                                <!--<td><?= $group['locationName'] ?></td>-->
                                                <!--<td><?= $group['meetingPlace'] ?></td>-->
                                                <td><?= $group['groupType'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('Weeklygroups/edit/' . $group['groupSlug']) ?>" class="edit-row" data-id="<?= $group['groupSlug'] ?>"><i class="ri-pencil-line"></i></a>&nbsp;
                                                    <a href="javascript:void(0);" class="delete-row" data-id="<?= $group['groupSlug'] ?>"><i class="ri-delete-bin-line"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5">No groups available.</td>
                                        </tr>
                                    <?php endif; ?>
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

<script>
    $('#groupName').keyup(function() {
        var originalText = $(this).val();
        var filteredText = originalText.replace(/[^a-zA-Z0-9]/g, '');
        $('#groupSlug').val(filteredText.toLowerCase());
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-row').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function() {
                var groupSlug = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this row?')) {
                    fetch('<?= base_url(); ?>Weeklygroups/delete/' + groupSlug, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                _method: 'DELETE'
                            }).toString()
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                var row = document.getElementById('row-' + groupSlug);
                                if (row) {
                                    row.remove();
                                } else {
                                    console.error('Row not found in DOM');
                                }
                            } else {
                                alert('Failed to delete the row.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
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