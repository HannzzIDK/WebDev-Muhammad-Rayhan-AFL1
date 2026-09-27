<?php
require_once "../Controller/employeeController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Employee Management</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="employee_formView.php">Employee Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="office_formView.php">Office Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="office_employeeView.php">Office-Employees</a>
        </li>
      </ul>
    </div>

    <h1 class="mt-4">Employee List</h1>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Usia</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if(function_exists('viewEmployee')) {
            viewEmployee(); 
          } else {
            echo '<tr><td colspan="5">Function not found</td></tr>';
          }
        ?>
      </tbody>
    </table>

    <h1 class="mt-4">Add Employee</h1>
    <div class="card-body">
      <form method="post" action="" class="form">
        <div class="form-row">
          <div class="form-group">
            <label for="namaKaryawan">Nama</label>
            <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
          </div>
        </div>
        <div class="form-group">
          <label for="usia">Usia</label>
          <input type="text" class="form-control" id="usia" name="usia" placeholder="Usia" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>