<?php
include_once "../Model/officeModel.php";
session_start();

if(!isset($_SESSION['officeList'])) {
    $_SESSION['officeList'] = array();
}

function createOffice(){
    if(empty($_POST['namaKantor'])) {
        return false;
    }
    
    $office = new officeModel();
    $office->namaKantor = $_POST['namaKantor'];
    array_push($_SESSION['officeList'], $office);
    return true;
}

if (isset($_POST['submit'])) {
    if(createOffice()) {
        header("Location: office_formView.php");
        exit();
    } else {
        echo "Please fill in the office name!";
    }
}

// DELETE OFFICE
function deleteOffice($index) {
    if(isset($_SESSION['officeList'][$index])) {
        array_splice($_SESSION['officeList'], $index, 1);
        return true;
    }
    return false;
}

if(isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if(deleteOffice($index)) {
        header("Location: office_formView.php");
        exit();
    }
}

function viewOffice() {
    if(empty($_SESSION['officeList'])) {
        echo "<tr><td colspan='3' class='text-center'>No offices yet</td></tr>";
        return;
    }
    
    $officeList = $_SESSION['officeList'];
    $no = 1;
    foreach($officeList as $index => $office) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . htmlspecialchars($office->namaKantor) . "</td>";
        echo "<td><a href='office_formView.php?delete=" . $index . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
        echo "</tr>";
        $no++;
    }
}
?>