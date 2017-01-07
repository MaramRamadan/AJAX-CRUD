<?php 
	require 'employee.php';
	$emp = new Emp;
	$employees= $emp-> employees();
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>mindset task..</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/remodal.css" />
	    <link rel="stylesheet" href="css/remodal-default-theme.css" />


	</head>
	<body>
		<div class="container">
			<div class="table-responsive">          
	  			<table class="table">
				 
					<thead>
						<tr>
							<td>Name</td>
							<td>Email</td>
							<td>Salary</td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($employees as $key=>$value) {
								foreach ($value as $key1 =>$item) {
									if($key1!='id')
										echo "<td>{$item}</td>";
								}
								echo '<td><a data-remodal-target="update_up"><span class="glyphicon glyphicon-pencil getdata" id="'.$value['id'].'" aria-hidden="true"></span></a></td>';
								echo '<td><a><span class="glyphicon glyphicon-remove delete" id="'.$value['id'].'" aria-hidden="true"></span></a></td>';
								echo '</tr>';
	
							}
						?>
					</tbody>
				</table>
			</div>
			<div class="remodal pin-code-modal" data-remodal-id="update_up">
				<button data-remodal-action="close" class="glyphicon glyphicon-remove"></button>
				<form class="form-inline" id="collapseOne">
					<div class="form-group">
						<input type="text" class="form-control" id="up_name" placeholder="Name">
						<input type="email" class="form-control" id="up_email" placeholder="email@example.com">
						<input type="number" class="form-control" id='up_sal' placeholder="Salary">
					</div>
				  <button type="submit" class="btn btn-primary" data-remodal-action="close" id="update" value="">Update</button>
				</form>
			</div>

			<a data-remodal-target="verify">insert new employee</a>
			<div class="remodal pin-code-modal" data-remodal-id="verify">
				<button data-remodal-action="close" class="glyphicon glyphicon-remove"></button>
				<form class="form-inline" id="collapseOne">
					<div class="form-group">
						<input type="text" class="form-control" id="name" placeholder="Name">
						<input type="email" class="form-control" id="email" placeholder="email@example.com">
						<input type="number" class="form-control" id='sal' placeholder="Salary">
					</div>
				  <button type="submit" class="btn btn-primary" data-remodal-action="close" id="add">Insert</button>
				</form>
			</div>
		</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/remodal.js"></script>
    <script src="js/main.js" type="text/javascript" ></script>
		

 
	</body>
	</html>
