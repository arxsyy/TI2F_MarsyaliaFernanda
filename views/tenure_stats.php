<?php
include 'views/header.php';
?>

<h2>Statistik Masa Kerja Karyawan</h2>

<?php
$query = "
    SELECT 
        CASE 
            WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) < 1 THEN 'Junior'
            WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) BETWEEN 1 AND 3 THEN 'Middle'
            ELSE 'Senior'
        END AS level,
        COUNT(*) AS total
    FROM employees
    GROUP BY level
    ORDER BY level;
";
$result = $db->query($query);
?>

<table class='data-table'>
    <thead>
        <tr>
            <th>Kategori Masa Kerja</th>
            <th>Jumlah Karyawan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['level']); ?></td>
            <td><?php echo $row['total']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/footer.php'; ?>
