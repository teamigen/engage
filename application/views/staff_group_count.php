<!DOCTYPE html>
<html>
<head>
    <title>Staff Group Count</title>
</head>
<body>

<h1>Staff Group Count</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Staff Name</th>
            <th>Number of Groups</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($staffGroups)): ?>
            <?php foreach ($staffGroups as $staff): ?>
                <tr>
                    <td><?php echo $staff->staffName; ?></td>
                    <td><?php echo $staff->groupCount; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">No staff found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
