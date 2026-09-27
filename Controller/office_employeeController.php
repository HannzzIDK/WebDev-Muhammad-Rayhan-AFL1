<?php
include_once "../Model/officeModel.php";
include_once "../Model/employeeModel.php";
session_start();

if(!isset($_SESSION['officeList'])) {
    $_SESSION['officeList'] = array();
}

if(!isset($_SESSION['employeeList'])) {
    $_SESSION['employeeList'] = array();
}

if(!isset($_SESSION['officeEmployeeList'])) {
    $_SESSION['officeEmployeeList'] = array();
}

function assignEmployeeToOffice(){
    if(empty($_POST['namaKaryawan']) || empty($_POST['namaKantor'])) {
        return false;
    }
    
    $assignment = array(
        'namaKaryawan' => $_POST['namaKaryawan'],
        'namaKantor' => $_POST['namaKantor']
    );
    
    array_push($_SESSION['officeEmployeeList'], $assignment);
    return true;
}

if (isset($_POST['submit'])) {
    if(assignEmployeeToOffice()) {
        header("Location: office_employeeView.php");
        exit();
    } else {
        echo "Please select both employee and office!";
    }
}

// DELETE ASSIGNMENT
function deleteAssignment($index) {
    if(isset($_SESSION['officeEmployeeList'][$index])) {
        array_splice($_SESSION['officeEmployeeList'], $index, 1);
        return true;
    }
    return false;
}

if(isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if(deleteAssignment($index)) {
        header("Location: office_employeeView.php");
        exit();
    }
}

function viewOfficeEmployees() {
    if(empty($_SESSION['officeEmployeeList'])) {
        echo "<tr><td colspan='2' class='text-center'>No assignments yet</td></tr>";
        return;
    }
    
    foreach($_SESSION['officeEmployeeList'] as $index => $assignment) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($assignment['namaKaryawan']) . "</td>";
        echo "<td>" . htmlspecialchars($assignment['namaKantor']) . "</td>";
        echo "<td><a href='office_employeeView.php?delete=" . $index . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
        echo "</tr>";
    }
}

function getEmployeesDropdown() {
    if(empty($_SESSION['employeeList'])) {
        return;
    }
    
    foreach($_SESSION['employeeList'] as $emp) {
        echo "<option value='" . htmlspecialchars($emp->namaKaryawan) . "'>" . htmlspecialchars($emp->namaKaryawan) . "</option>";
    }
}

function getOfficesDropdown() {
    if(empty($_SESSION['officeList'])) {
        return;
    }
    
    foreach($_SESSION['officeList'] as $off) {
        echo "<option value='" . htmlspecialchars($off->namaKantor) . "'>" . htmlspecialchars($off->namaKantor) . "</option>";
    }
}
?>