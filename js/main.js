
function Draw() {
	var htmltxt='';	
	var emp_data={};
	emp_data.action='draw';
		$.ajax({
			url: 'Server.php',
			type: 'GET',
			data:emp_data,
			success: function (response) {
				var resp = JSON.parse(response);
				for(var i in resp)
					{
						htmltxt += "<tr><td>"+resp[i].name+"</td>";	
						htmltxt +="<td>"+resp[i].email+"</td>";
						htmltxt +="<td>"+resp[i].salary+"</td>";
						htmltxt +='<td><a data-remodal-target="update_up"><span class="glyphicon glyphicon-pencil getdata" id="'+resp[i].id+'" aria-hidden="true"></span></a></td>';
						htmltxt +='<td><a><span class="glyphicon glyphicon-remove delete" id="'+resp[i].id+'" aria-hidden="true"></span></a></td>';

						htmltxt += "</tr>";
					}
					$('.container tbody').html(htmltxt);
				},
				error: function (error) 
				{
					console.log(error);
				}
		});
};


	$('.delete').click(function(event){
			event.preventDefault();
			var id = $(this).attr("id");
			var emp_data={};
			emp_data.id = id;
			emp_data.action = 'delete';
			$.ajax({
				url: './Server.php',
				type: 'GET',
				data : emp_data,
				success: function (response) {
					console.log(response);
					
				},
				error: function (error) 
				{
					console.log(error);
				}
			});
			Draw();
	});

	$('#add').click(function(){
		event.preventDefault();
			var sal = $("#sal").val();
			var name = $("#name").val();
			var email = $("#email").val();
			var emp_data = {};
			emp_data.sal = sal;
			emp_data.name = name;
			emp_data.email = email;
			$.ajax({
				url: './Server.php',
				type: 'POST',
				data : emp_data,
			    success: function(response)
			    {
			       console.log(response);
			    },
				error: function (error) 
				{
					console.log(error);
				}
			   
			});
		
		});

	$('.getdata').click(function(){
		event.preventDefault();
			var id = $(this).attr("id");
			var emp_data={};
			emp_data.id = id;
			emp_data.action = 'select';
			$.ajax({
				url: './Server.php',
				type: 'GET',
				data : emp_data,
				success: function (response) {
					var data = JSON.parse(response);
					$('#up_name').val(data.name);
					$('#up_sal').val(data.salary);
					$('#up_email').val(data.email);
					$('#update').val(data.id);
			},
				error: function (error) 
				{
					console.log(error);
				}
			});

		});

	$('#update').click(function(){
		event.preventDefault();
			var id = $(this).attr("value");
			var sal = $("#up_sal").val();
			var name = $("#up_name").val();
			var email = $("#up_email").val();
			var emp_data = {};
			emp_data.sal = sal;
			emp_data.name = name;
			emp_data.email = email;
			emp_data.id= id;
			$.ajax({
				url: './Server.php',
				type: 'POST',
				data : emp_data,
			    success: function(response)
			    {
			       console.log(response);
			    },
				error: function (error) 
				{
					console.log(error);
				}
			   
			});
		
		});
			

