$('#storeMainCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#storeMainCat').find("input").filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.insert_Maincategory,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{	
				// console.log(response);
				$("#storeMainCat")[0].reset();
				$('#closeInsrtModal').trigger('click');
				$('.existingItems').html(response);
				$("#InsertSuccessAlert").addClass('show');
				setTimeout(function() { 
					$("#InsertSuccessAlert").removeClass('show');
				}, 3000);
			},
			error: function(res) {
				// console.log(res);
			}
		});
	}
});



function getThisMainCat(id,tr){
	$.ajax({
		url: window.edit_Maincategory,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'), 
			id: id
		},
		success: function(response) {
			$('#trNumber').val(tr);
			$('#MainCatEditId').val(response._id);
			$('#mainCat_name').val(response.category_name);
			$('#editicon1').attr('src', window.img_path+'/'+ response.icon1);
			$('#editicon2').attr('src', window.img_path+'/'+ response.icon2);
		}
	});
}
$('#updateMainCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#updateMainCat').find('#mainCat_name').filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.update_Maincategory,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{
				$("#updateMainCat")[0].reset();
				$('#closeeditModal').trigger('click');
				$('.tr-'+response.tr).find("td:eq(1)").text(response.items.category_name);
				$('.tr-'+response.tr).find("td:eq(0)").find('img').attr('src', window.img_path+'/'+ response.items.icon1);
				$("#UpdateSuccessAlertPop").addClass('show');
				setTimeout(function() { 
					$("#UpdateSuccessAlertPop").removeClass('show');
				}, 3000);
			}
		});
	}
});

function deleteMainCat(id){
	swal({
		title: 'Are you sure?',
		text: "You want to delete is item!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.delete_Maincategory,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal(
						'Deleted!',
						'This Item Has Been Delete SuccessFully.',
						'success'
						)
					$('.existingItems').html(response);
				}
			});
		}
	})
}


$('#storeSubCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#storeSubCat').find("input,select").filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.insert_Subcategory,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{	
				console.log(response);
				$("#storeSubCat")[0].reset();
				$('#closeInsrtModal').trigger('click');
				$('.existingItems').html(response);
				$("#InsertSuccessAlert").addClass('show');
				setTimeout(function() { 
					$("#InsertSuccessAlert").removeClass('show');
				}, 3000);
			},
			error: function(res) {
				// console.log(res);
			}
		});
	}
});

function getThisSubCat(id,tr){
	$.ajax({
		url: window.edit_Subcategory,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'), 
			id: id
		},
		success: function(response) {
			$('#trNumber').val(tr);
			$('#SubCatEditId').val(response._id);
			$('#subCat_name').val(response.category_name);
			$('#editicon').attr('src', window.img_path+'/'+ response.icon);
			$("#MainCategory option[value='" + response.main_cat_id + "']").attr('selected', 'selected');
		}
	});
}
$('#updateSubCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#updateSubCat').find('input[type=text]').filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.update_Subcategory,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{
				console.log(response);
				$("#updateSubCat")[0].reset();
				$('#closeeditModal').trigger('click');
				$('.tr-'+response.tr).find("td:eq(1)").text(response.items.category_name);
				$('.tr-'+response.tr).find("td:eq(2)").text(response.items.main_category.category_name);
				$('.tr-'+response.tr).find("td:eq(0)").find('img').attr('src', window.img_path+'/'+ response.items.icon);
				$("#UpdateSuccessAlertPop").addClass('show');
				setTimeout(function() { 
					$("#UpdateSuccessAlertPop").removeClass('show');
				}, 3000);
			}
		});
	}
});


function deleteSubCat(id){
	swal({
		title: 'Are you sure?',
		text: "You want to delete is item!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.delete_Subcategory,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal(
						'Deleted!',
						'This Item Has Been Delete SuccessFully.',
						'success'
						)
					$('.existingItems').html(response);
				}
			});
		}
	})
}


function GetAllSubCat(id,type){
	$.ajax({
		url: window.get_Subcategories,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			id: id
		},
		success: function(response) {
			if (type == 1) {
				$('#SubCats').html(response);
			}else{
				$('#subcategoryeditedid').html(response);
			}
		}
	});
}


$('#storeInnerCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#storeInnerCat').find("input,select").filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.insert_Innercategory,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{	
				console.log(response);
				$("#storeInnerCat")[0].reset();
				$('#closeInsrtModal').trigger('click');
				$('.existingItems').html(response);
				$("#InsertSuccessAlert").addClass('show');
				setTimeout(function() { 
					$("#InsertSuccessAlert").removeClass('show');
				}, 3000);
			},
			error: function(res) {
				// console.log(res);
			}
		});
	}
});



function getThisInnerCat(id,tr){
	$.ajax({
		url: window.edit_Innercategory,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'), 
			id: id
		},
		success: function(response) {

			// console.log(response);
			$('#trNumber').val(tr);
			$('#InnerCatEditId').val(response['inr_cat_data']._id);
			$('#InnerCat_name').val(response['inr_cat_data'].category_name);
			$('#InnerCat_slug').val(response['inr_cat_data'].slug);
			$('#editicon').attr('src', window.img_path+'/'+ response['inr_cat_data'].icon);
			$("#MainCategory option[value='" + response['inr_cat_data'].main_cat_id + "']").attr('selected', 'selected');
			$("#subcategoryeditedid").html(response['html']);
		},
		error: function(res) {
			console.log(res);
		}
	});
}


$('#updateInnerCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#updateInnerCat').find('input[type=text]').filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.update_Innercategory,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{
				console.log(response);
				$("#updateInnerCat")[0].reset();
				$('#closeeditModal').trigger('click');
				$('.tr-'+response.tr).find("td:eq(1)").text(response.items.category_name);
				$('.tr-'+response.tr).find("td:eq(3)").text(response.items.main_category.category_name);
				$('.tr-'+response.tr).find("td:eq(2)").text(response.items.sub_category.category_name);
				$('.tr-'+response.tr).find("td:eq(0)").find('img').attr('src', window.img_path+'/'+ response.items.icon);
				$("#UpdateSuccessAlertPop").addClass('show');
				setTimeout(function() { 
					$("#UpdateSuccessAlertPop").removeClass('show');
				}, 3000);
			}
		});
	}
});


function deleteInnerCat(id){
	swal({
		title: 'Are you sure?',
		text: "You want to delete is item!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.delete_Innercategory,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal(
						'Deleted!',
						'This Item Has Been Delete SuccessFully.',
						'success'
						)
					$('.existingItems').html(response);
				}
			});
		}
	})
}
// third inner 



function getInnerCats(id,type){
	$.ajax({
		url: window.get_Innercategories,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			id: id
		},
		success: function(response) {
			// if (type == 1) {
			// }else{
			// }
			$('#InnerCats').html(response);
			$('#innerCategoryeditedid').html(response);
		}
	});
}


$('#storeThrdInnerCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#storeThrdInnerCat').find("input,select").filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.insert_thrd_inner,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{	
				// console.log(response);
				$("#storeThrdInnerCat")[0].reset();
				$('#closeInsrtModal').trigger('click');
				$('.existing_item').html('');
				$('.existing_item').html(response);
				$("#InsertSuccessAlert").addClass('show');
				setTimeout(function() { 
					$("#InsertSuccessAlert").removeClass('show');
				}, 3000);
			},
			error: function(res) {
				console.log(res);
			}
		});
	}
});


function getThisThrdInnerCat(id,tr){
	$.ajax({
		url: window.edit_thrd_inner,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'), 
			id: id
		},
		success: function(response) {
			$('#trNumber').val(tr);
			$('#thrdInnerCatEditId').val(response['thrd_cat_data']._id);
			$('#InnerCat_name').val(response['thrd_cat_data'].category_name);
			$('#ThrdInnerCat_slug').val(response['thrd_cat_data'].slug);
			$('#editicon').attr('src', window.img_path+'/'+ response['thrd_cat_data'].icon);
			$("#MainCategory option[value='" + response['thrd_cat_data'].main_cat_id + "']").attr('selected', 'selected');
			$("#subcategoryeditedid").html(response['sub']);
			$("#innerCategoryeditedid").html(response['inner']);
		},
		error: function(res) {
			console.log(res);
		}
	});
}

$('#updateThrdInnerCat').on('submit', function(event){
	event.preventDefault();
	var empty = $('#updateThrdInnerCat').find('input[name=category_name]').filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.update_thrd_inner,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{
				$("#updateThrdInnerCat")[0].reset();
				$('#closeeditModal').trigger('click');
				$('.tr-'+response.tr).find("td:eq(1)").text('EN:'+response.items.category_name);
				$('.tr-'+response.tr).find("td:eq(3)").text(response.items.main_category.category_name);
				$('.tr-'+response.tr).find("td:eq(2)").text(response.items.sub_category.category_name);
				$('.tr-'+response.tr).find("td:eq(0)").find('img').attr('src', window.img_path+'/'+ response.items.icon);
				$("#UpdateSuccessAlertPop").addClass('show');
				setTimeout(function() { 
					$("#UpdateSuccessAlertPop").removeClass('show');
				}, 3000);
				$(".existing_item").load(window.location.href + " .existing_item");
			}
		});
	}
});

function dltTrdInnr(id,tr){
	swal({
		title: 'Are you sure?',
		text: "You want to delete this item!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((click) => {
		if (click.value) {
			$.ajax({
				url: window.delete_thrd_inner,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal('Deleted!','This Item Has Been Removed SuccessFully','success');
					$(".tr-"+tr).hide();
				},error: function(res){
					console.log(res);
				}
			});
		}
	})
}









function remveUsr(id){
	if (!id){
		id = $("#usId").val();
	}
	swal({
		title: 'Are you sure?',
		text: "You want to delete is user! If you remove any user & if any kinds of advertisement has exists from this user then those ads will also been remove.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			console.log(id);
			$.ajax({
				url: window.delete_user,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					$("#exstData").html('');
					$("#exstData").html(response);
					swal('Deleted!','This User Has Been Removed SuccessFully','success');
				},error: function(res){
					console.log(res);
				}
			});
		}
	})
}



// delete advertisement
function deleteAdvertisement(id){

	swal({
		title: 'Are you sure?',
		text: "You want to delete is item!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.delete_post,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal(
						'Deleted!',
						'This Item Has Been Delete SuccessFully.',
						'success'
						);
					$(".existingItems").html('');
					$(".existingItems").html(response);
					// location.reload();
				}
			});
		}
	})
}

// suspend advertisement
function suspend(id){

	swal({
		title: 'Are you sure?',
		text: "You want to Suspend is item!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Suspend'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.suspend_post,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal(
						'Suspended!',
						'This Item Has Been Suspended.',
						'success'
						);
					location.reload();
				}
			});
		}
	})
}



// user info

function getThisUserInfo(id){
	$.ajax({
		url: window.user_info,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			id: id
		},
		success: function(response) {
			console.log(response);
			// $(".please").show();
			$("#existingDiv").html(response.html);
			$("#usId").val(response.user_id);
		}
	});
}

// user suspend or ban

function userSuspendBan(id,type){
	if (id) {
		var id = id;
	}else{
		var id = $("#usId").val();
	}

	swal({
		title: 'Are you sure?',
		text: "You want to modify is user role!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'yes,'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.suspend_ban_user,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id,
					type:type
				},
				success: function(response) {
					console.log(response);
					swal(
						'Modified!',
						'Action SuccessFull',
						'success'
						);
					// location.reload();
				}
			});
		}
	})
}

// slider 

$('#storeSlider').on('submit', function(event){
	event.preventDefault();
	var empty = $('#storeSlider').find("input").filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.insert_slider_one,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{	
				console.log(response);
				$("#storeSlider")[0].reset();
				$('#closeInsrtModal').trigger('click');
				$('.existingSlider').html(response);
				$("#InsertSuccessAlert").addClass('show');
				setTimeout(function() { 
					$("#InsertSuccessAlert").removeClass('show');
				}, 3000);
			},
			error: function(res) {
				console.log(res);
			}
		});
	}
});


function getThisSlider(id,tr){
	$.ajax({
		url: window.edit_slider_one,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'), 
			id: id
		},
		success: function(response) {
			$('#trNumber').val(tr);
			$('#sliderEditId').val(response._id);
			$('#sliderUrl').val(response.url);
			$('#sliderImg').attr('src', window.img_path+'/'+ response.slider);
			$("#sliderType option[value='" + response.slider_type + "']").attr('selected', 'selected');
		}
	});
}
$('#updateSlider').on('submit', function(event){
	event.preventDefault();
	var empty = $('#updateSlider').find('#sliderType').filter(function() {
		return this.value === "";
	});
	if(empty.length) {
		$("#popupAlert").addClass('show');
		setTimeout(function() { 
			$("#popupAlert").removeClass('show');
		}, 3000);
	}else{
		$.ajax({
			url:window.update_slider_one,
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(response)
			{
				$("#updateSlider")[0].reset();
				$('#closeeditModal').trigger('click');
				$('.tr-'+response.tr).find("td:eq(1)").find('a').attr('href', response.items.url);
				$('.tr-'+response.tr).find("td:eq(0)").find('img').attr('src', window.img_path+'/'+ response.items.slider);
				$("#UpdateSuccessAlertPop").addClass('show');
				setTimeout(function() {
					$("#UpdateSuccessAlertPop").removeClass('show');
				}, 3000);
			}
		});
	}
});

function deleteSlider(id){
	swal({
		title: 'Are you sure?',
		text: "You want to delete is slider!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: window.delete_slider_one,
				type: 'post',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id: id
				},
				success: function(response) {
					swal(
						'Deleted!',
						'This Item Has Been Delete SuccessFully.',
						'success'
						)
					$('.existingSlider').html(response);
				}
			});
		}
	})
}

// Featured advertisement
function makeitFeatured(post_id,status){
	$.ajax({
		url: window.featured_post,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			post_id: post_id,
			status: status
		},
		success: function(response) {
			if (status ==  1) {	
				$("#addedFeatured").addClass('show');
				setTimeout(function() {
					$("#addedFeatured").removeClass('show');
				}, 3000);
			}else{
				$("#removedFeatured").addClass('show');
				setTimeout(function() {
					$("#removedFeatured").removeClass('show');
				}, 3000);
			}
			location.reload();
			// $("#exstData").load(window.location.href + " #exstData");
		}
	});	
}




