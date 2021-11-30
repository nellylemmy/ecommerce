$(document).ready(function(){

	getUnits();
	
	function getUnits(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : {GET_UNIT:1},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);

				var unitHTML = '';

				$.each(resp.message, function(index, value){
					unitHTML += '<tr>'+
									'<td></td>'+
									'<td>'+ value.unit_title +'</td>'+
									'<td><a class="btn btn-sm btn-info edit-unit"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a bid="'+value.unit_id+'" class="btn btn-sm btn-danger delete-unit"><i class="fas fa-trash-alt"></i></a></td>'+
								'</tr>';
				});

				$("#unit_list").html(unitHTML);

			}
		})
		
	}

	$(".add-unit").on("click", function(){

		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : $("#add-unit-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getUnits();
					$("#add_unit_modal").modal('hide');
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				
			}
		})

	});

	$(document.body).on('click', '.delete-unit', function(){

		var bid = $(this).attr('bid');

		if (confirm("Are you sure to delete this Unit")) {
			$.ajax({
				url : '../admin/classes/Products.php',
				method : 'POST',
				data : {DELETE_UNIT:1, bid:bid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						alert(resp.message);
						getUnits();
					}else if(resp.status == 303){
						alert(resp.message);
					}
				}
			});
		}else{
			alert('Cancelled');
		}

		

	});

	$(document.body).on("click", ".edit-unit", function(){

		var unit = $.parseJSON($.trim($(this).children("span").html()));
		console.log(unit);
		$("input[name='e_unit_title']").val(unit.unit_title);
		$("input[name='unit_id']").val(unit.unit_id);

		$("#edit_unit_modal").modal('show');

		

	});

	$(".edit-unit-btn").on("click", function(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : $("#edit-unit-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getUnits();
					$("#edit_unit_modal").modal('hide');
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				
			}
		});
	});

});