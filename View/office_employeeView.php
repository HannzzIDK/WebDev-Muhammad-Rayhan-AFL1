<?php
require_once "../Controller/office_employeeController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Office Employees</title>
</head>
<body>

  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="employee_formView.php">Employee Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="office_formView.php">Office Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="office_employeeView.php">Office-Employees</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <h2>Office Employees</h2>
      <table class="table table-striped">
        <thead class="table-light">
          <tr>
            <th scope="col">Employee</th>
            <th scope="col">Office</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php viewOfficeEmployees(); ?>
        </tbody>
      </table>

      <h2 class="mt-5">Assign Employee to Office</h2>
      <form method="post" action="">
        <div class="form-group mb-3">
          <label for="namaKaryawan">Employee</label>
          <select class="form-control" id="namaKaryawan" name="namaKaryawan" required>
            <option value="">-- Select Employee --</option>
            <?php getEmployeesDropdown(); ?>
          </select>
        </div>

        <div class="form-group mb-3">
          <label for="namaKantor">Office</label>
          <select class="form-control" id="namaKantor" name="namaKantor" required>
            <option value="">-- Select Office --</option>
            <?php getOfficesDropdown(); ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>