<?php
 	require 'employee.php';
 	$_method = $_SERVER['REQUEST_METHOD'];
 	if($_method =='GET' ){
		if($_GET['action']=='delete'){
			$emp = new Emp($_GET['id']);
			$emp->deleteEmp();
		}
		elseif($_GET['action'] == 'select'){
			$emp = new Emp($_GET['id']);
			$jsondata = json_encode($emp);
			echo $jsondata;
		}
		elseif($_GET['action'] == 'draw'){
			$emp = new Emp();
			$employees= $emp-> employees();
			$jsondata = json_encode($employees);
			echo $jsondata;
		}
	}
	else{
		if (isset($_POST['id'])){
			$emp_id =  $_POST['id'];
			$emp = new Emp($emp_id);
			$emp->name = $_POST['name'];
			$emp->email = $_POST['email'];
			$emp->salary = $_POST['sal'];
			$emp->id = $emp->updateEmp();
			$jsondata = json_encode($emp);
			echo $jsondata;
		}
		else{
			$emp = new Emp();
			$emp->name = $_POST['name'];
			$emp->email = $_POST['email'];
			$emp->salary = $_POST['sal'];
			$emp->id = $emp->createEmp();
			$employees = new Emp($emp->id);
			$jsondata = json_encode($employees);
			echo $jsondata;
		}
	}
?>