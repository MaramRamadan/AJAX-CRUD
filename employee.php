<?php
class Emp{
	var $id;
	var $name;
	var $email;
	var $salary;

	private static $conn = Null;

	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','root','mindset');
		}

		if($id!=-1) {
			$query = "select * from employees where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$emp = mysqli_fetch_assoc($result);
			$this->id = $emp['id'];
			$this->name = $emp['name'];
			$this->salary = $emp['salary'];
			$this->email = $emp['email'];
		}
	}


	function createEmp() {
		$query = "insert into employees(name,email,salary) values('$this->name','$this->email','$this->salary')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function updateEmp() {
		$query = "update employees set name='$this->name', email='$this->email' , salary='$this->salary' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	function deleteEmp() {
		$query = "delete from employees where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}


	function employees() {
		$query = "select * from employees";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}
}

?>