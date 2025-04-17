<?php
include __DIR__ . '/../php/process.php'; // Include the functions file
$employees = getEmployees($conn); // Call the function to get employees
?>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admincss.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin_page.php">Employee</a></li>
            <li><a href="addemployee.php">Add Employee</a></li>
            <li><a href="managers.php">Managers</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </div>
    
    <div class="main-content">
        <header>
            <h1>Dashboard</h1>
        </header>

        <section class="user-table">
        <?php if (isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>
    <p style="color: green; text-align: center;">Employee deleted successfully.</p>
<?php elseif (isset($_GET['error']) && $_GET['error'] == 'failed'): ?>
    <p style="color: red; text-align: center;">Failed to delete employee.</p>
<?php endif; ?>

            <h2>Employee List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Date of Joining</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    <?php if (!empty($employees)): ?>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= htmlspecialchars($employee['ID_Karyawan']) ?></td>
                <td><?= htmlspecialchars($employee['Nama']) ?></td>
                <td><?= htmlspecialchars($employee['Jabatan']) ?></td>
                <td><?= htmlspecialchars($employee['Departemen']) ?></td>
                <td><?= htmlspecialchars($employee['Tanggal_Masuk']) ?></td>
                <td>
                    <form action="../php/process.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                        <input type="hidden" name="employee_id" value="<?= htmlspecialchars($employee['ID_Karyawan']) ?>">
                        <button type="submit" name="delete_employee" style="background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No employees found.</td></tr>
    <?php endif; ?>
</tbody>

            </table>
        </section>
    </div>
</body>
</html>
