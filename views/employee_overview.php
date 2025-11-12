<?php
include 'views/header.php';
?>

<h2>Ringkasan Karyawan</h2>

<?php
$query = "
    SELECT 
        COUNT(*) AS total_employees,
        SUM(salary) AS total_salary,
        AVG(EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date))) AS avg_tenure
    FROM employees;
";
$result = $db->query($query)->fetch(PDO::FETCH_ASSOC);
?>

<div class="dashboard-cards">
    <div class="card">
        <h3>Total Karyawan</h3>
        <div class="number"><?php echo $result['total_employees']; ?></div>
    </div>
    <div class="card">
        <h3>Total Gaji Per Bulan</h3>
        <div class="number">Rp <?php echo number_format($result['total_salary'], 0, ',', '.'); ?></div>
    </div>
    <div class="card">
        <h3>Rata-rata Masa Kerja</h3>
        <div class="number"><?php echo number_format($result['avg_tenure'], 1); ?> tahun</div>
    </div>
</div>

<?php include 'views/footer.php'; ?>
