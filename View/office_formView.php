<?php
require_once "../Controller/officeController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Office Management</title>
</head>
<body>

  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="employee_formView.php">Employee Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="office_formView.php">Office Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="office_employeeView.php">Office-Employees</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <h2>Add Office</h2>
      <form method="post" action="">
        <div class="form-group mb-3">
          <label for="namaKantor">Nama Kantor</label>
          <input type="text" class="form-control" id="namaKantor" name="namaKantor" placeholder="Nama Kantor" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>
      </form>

      <h2 class="mt-5">Office List</h2>
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kantor</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              require_once "../Controller/officeController.php";
              viewOffice(); 
            
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>