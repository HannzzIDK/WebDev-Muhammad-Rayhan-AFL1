<?php
include_once "../Model/employeeModel.php";
session_start();

if(!isset($_SESSION['employeeList'])) {
    $_SESSION['employeeList'] = array();
}

function createEmployee(){
    if(empty($_POST['namaKaryawan']) || empty($_POST['jabatan']) || empty($_POST['usia'])) {
        return false;
    }
    
    $employee = new employeeModel();
    $employee->namaKaryawan = $_POST['namaKaryawan'];
    $employee->jabatan = $_POST['jabatan'];
    $employee->usia = $_POST['usia'];
    array_push($_SESSION['employeeList'], $employee);
    return true;
}

if (isset($_POST['submit'])) {
    if(createEmployee()) {
        header("Location: employee_formView.php");
        exit();
    } else {
        echo "Please fill all fields!";
    }
}

// DELETE EMPLOYEE
function deleteEmployee($index) {
    if(isset($_SESSION['employeeList'][$index])) {
        array_splice($_SESSION['employeeList'], $index, 1);
        return true;
    }
    return false;
}

if(isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if(deleteEmployee($index)) {
        header("Location: employee_formView.php");
        exit();
    }
}

function viewEmployee() {
    if(empty($_SESSION['employeeList'])) {
        echo "<tr><td colspan='5' class='text-center'>No employees yet</td></tr>";
        return;
    }
    
    $employeeList = $_SESSION['employeeList'];
    $no = 1;
    foreach($employeeList as $index => $employee) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . htmlspecialchars($employee->namaKaryawan) . "</td>";
        echo "<td>" . htmlspecialchars($employee->jabatan) . "</td>";
        echo "<td>" . htmlspecialchars($employee->usia) . "</td>";
        echo "<td><button class='btn btn-primary btn-sm'>Edit</button> <a href='employee_formView.php?delete=" . $index . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
        echo "</tr>";
        $no++;
    }
}
?>