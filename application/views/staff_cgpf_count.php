<!DOCTYPE html>
<html>
<head>
    <title>Staff CGPF Count</title>
</head>
<body>

<h1>Staff CGPF Count</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Staff Name</th>
            <th>Number of CGPF</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($staffCgpf)): ?>
            <?php foreach ($staffCgpf as $staff): ?>
                <tr>
                    <td><?php echo $staff->staffName; ?></td>
                    <td><?php echo $staff->cgpfCount; ?></td>
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
