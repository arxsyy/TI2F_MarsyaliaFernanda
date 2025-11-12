<?php
include 'views/header.php';
?>

<h2>Statistik Gaji per Departemen</h2>

<?php
$query = "
    SELECT department,
            AVG(salary) AS avg_salary,
            MAX(salary) AS max_salary,
            MIN(salary) AS min_salary
    FROM employees
    GROUP BY department
    ORDER BY department;
";
$result = $db->query($query);
?>

<table class='data-table'>
    <thead>
        <tr>
            <th>Departemen</th>
            <th>Rata-rata Gaji</th>
            <th>Gaji Tertinggi</th>
            <th>Gaji Terendah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['department']); ?></td>
            <td>Rp <?php echo number_format($row['avg_salary'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['max_salary'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['min_salary'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/footer.php'; ?>
