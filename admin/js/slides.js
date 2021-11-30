$(document).ready(function(){

	var slideList;

	function getSlides(){
		$.ajax({
			url : '../admin/classes/Slides.php',
			method : 'POST',
			data : {GET_SLIDE:1},
			success : function(response){
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var slideHTML = '';

					slideList = resp.message.slides;

					if (slideList) {
						$.each(resp.message.slides, function(index, value){

							slideHTML += '<tr>'+
								              '<td>'+''+'</td>'+
								              '<td>'+ value.slide_title +'</td>'+
								              '<td><img width="60" height="60" src="../product_images/'+value.slide_image+'"></td>'+
								              '<td><a class="btn btn-sm btn-info edit-slide" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.slide_id+'" class="btn btn-sm btn-danger delete-slide" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';

						});

						$("#slide_list").html(slideHTML);
					}

				}
			}

		});
	}

	getSlides();

	$(".add-slide").on("click", function(){

		$.ajax({

			url : '../admin/classes/Slides.php',
			method : 'POST',
			data : new FormData($("#add-slide-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add-slide-form").trigger("reset");
					$("#add_slide_modal").modal('hide');
					getSlides();
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});

	});


	$(document.body).on('click', '.edit-slide', function(){

		console.log($(this).find('span').text());

		var slide = $.parseJSON($.trim($(this).find('span').text()));

		console.log(slide);

		$("input[name='e_slide_name']").val(slide.slide_title);
		$("input[name='e_slide_image']").siblings("img").attr("src", "../product_images/"+slide.slide_image);
		$("input[name='pid']").val(slide.slide_id);
		$("#edit_slide_modal").modal('show');

	});

	$(".submit-edit-slide").on('click', function(){

		$.ajax({

			url : '../admin/classes/Slides.php',
			method : 'POST',
			data : new FormData($("#edit-slide-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-slide-form").trigger("reset");
					$("#edit_slide_modal").modal('hide');
					getSlides();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-slide', function(){

		var pid = $(this).attr('pid');
		if (confirm("Are you sure to delete this item ?")) {
			$.ajax({

				url : '../admin/classes/Slides.php',
				method : 'POST',
				data : {DELETE_SLIDE: 1, pid:pid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getSlides();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});

});