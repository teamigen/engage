<!DOCTYPE html>
<html>
<head>
    <title>Staff Without Location</title>
</head>
<body>

<h1>Staff Without Location</h1>

<?php if (!empty($staffWithoutLocation)): ?>
    <ul>
        <?php foreach ($staffWithoutLocation as $staff): ?>
            <li><?php echo $staff->staffName; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No staff found without a location.</p>
<?php endif; ?>

</body>
</html>
