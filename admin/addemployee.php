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
            <h1>Add Employee</h1>
        </header>
        
        <section class="form-container">
            <h2>Enter Employee Details</h2>

            <!-- Display Success/Error Message -->
            <?php if (isset($_GET['success'])): ?>
                <p style="color: green; text-align: center;">Employee added successfully.</p>
            <?php elseif (isset($_GET['error'])): ?>
                <p style="color: red; text-align: center;">Failed to add employee. Please try again.</p>
            <?php endif; ?>

            <form action="../php/process.php" method="post">
                <input type="hidden" name="action" value="add_employee"> 
                
                <label for="nama">Name:</label>
                <input type="text" name="nama" required>

                <label for="jabatan">Position:</label>
                <input type="text" name="jabatan" required>

                <label for="departemen">Department:</label>
                <input type="text" name="departemen" required>

                <label for="tanggal_masuk">Date of Joining:</label>
                <input type="date" name="tanggal_masuk" required>

                <button type="submit">Add Employee</button>
            </form>
        </section>
    </div>
</body>
</html>
