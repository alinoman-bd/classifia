// filter Category 
var room = 1;

function education_fields(url) {
	$.ajax({
		url: url,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content')
		},
		success: function(response) {
			room++;
			var objTo = document.getElementById('education_fields')
			var divtest = document.createElement("div");
			divtest.setAttribute("class", "row removeclass" + room);
			var rdiv = 'removeclass' + room;
			var html = '<div class="col-md-4 col-sm-3">' +
			'<div class="form-group">' +
			'<select class="form-control" onchange="showValues(event, this.value, \'fltr_value_id\')" name="filterN[' + room + '][]" data-placeholder="Choose a filter" tabindex="1">' +
			'<option value="">Select</option>';
			$.each(response, function(index, item) {
				html += '<option value="' +item.id + '">' + item.filter_name + '</option>';
			});
			html += '</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-md-4 col-sm-3">' +
			'<div class="form-group">' +
			'<select class="form-control select2 fltr_value_id" name="filterV[' + room + '][]" multiple style="height: 36px; width: 100%">' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-md-4 col-sm-3">' +
			'<div class="form-group">' +
			'<button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button>' +
			'</div>' +
			'</div>';
			divtest.innerHTML = html;
			objTo.appendChild(divtest);
			$(".select2").select2();
		}
	});
}

function remove_education_fields(rid) {
	$('.removeclass' + rid).remove();
}



// pro filter category 

var room = 1;

function filter_category(url) {
	$.ajax({
		url: url,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content')
		},
		success: function(response) {
			room++;
			var objTo = document.getElementById('filter_category')
			var divtest = document.createElement("div");
			divtest.setAttribute("class", "row removeclass" + room);
			var rdiv = 'removeclass' + room;
			var html = '<div class="col-md-3 overflow-hidden">'+
			'<div class="form-group">'+
			'<div class="col-md-12">'+
			'<div class="form-group">'+
			'<div class="controls m-b-10">'+
			'<label class="btn btn-primary btn-file">'+
			'<input type="file" name="eq_img[' + room + '][]">'+
			'</label>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'<div class="col-md-2">'+
			'<div class="form-group">'+
			'<input type="text" placeholder="price" class="form-control" name="eq_price[' + room + '][]">'+
			'</div>'+
			'</div>'+
			'<div class="col-md-3">'+
			'<div class="form-group">'+
			'<input type="text" placeholder="color name" class="form-control" name="eq_color_name[' + room + '][]">'+
			'</div>'+
			'</div>'+
			'<div class="col-md-3">'+
			'<div class="form-group">'+
			'<select name="type[' + room + '][]" class="form-control" id="exampleFormControlSelect1">'+
			'<option value="">select Image Type</option>'+
			'<option value="1">General Image</option>'+
			'<option value="2">Color Image</option>'+
			'</select>'+
			'</div>'+
			'</div>'+
			'<div class="col-md-1 col-sm-3">' +
			'<div class="form-group">' +
			'<button class="btn btn-danger" type="button" onclick="remove_filter_category(' + room + ');"> <i class="fa fa-minus"></i> </button>' +
			'</div>' +
			'</div>';
			divtest.innerHTML = html;
			objTo.appendChild(divtest);
			$(".select2").select2();
		}
	});
}

function remove_filter_category(rid) {
	$('.removeclass' + rid).remove();
}


// category for multi 


var room = 1;

function multiCategory(url) {
	$.ajax({
		url: url,
		type: 'post',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content')
		},
		success: function(response) {
			room++;
			var objTo = document.getElementById('multiCategory')
			var divtest = document.createElement("div");
			divtest.setAttribute("class", "row removeclass" + room);
			var rdiv = 'removeclass' + room;
			var html = '<div class="col-md-3 col-sm-3">' +
			'<div class="form-group">' +
			'<select class="form-control" name="pro_cat[' + room + '][]" onchange="showSubCategory(this.value, \'inr_p_sub_c_' + room + '\')" " data-placeholder="Choose a filter" tabindex="1">' +
			'<option value="">Select</option>';
			$.each(response, function(index, item) {
				html += '<option value="' +item.id + '">' + item.cat_name + '</option>';
			});
			html += '</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-md-4 col-sm-3">' +
			'<div class="form-group">' +
			'<select class="form-control fltr_value_id inr_p_sub_c_' + room + '" name="pro_sub_cat[' + room + '][]" onchange="showInnerSubCategory(this.value, \'inr_sub_c_' + room + '\')" name="filterV[' + room + '][]"  style="height: 36px; width: 100%">' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-md-4 col-sm-3">' +
			'<div class="form-group">' +
			'<select class="form-control inr_sub_c_' + room + '" name="pro_inner_sub_cat[' + room + '][]" required>'+
			'option value="0">choose Inner sub category...</option>'+
			
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-md-1 col-sm-3">' +
			'<div class="form-group">' +
			'<button class="btn btn-danger" type="button" onclick="remove_multiCategory(' + room + ');"> <i class="fa fa-minus"></i> </button>' +
			'</div>' +
			'</div>';
			divtest.innerHTML = html;
			objTo.appendChild(divtest);
			$(".select2").select2();
		}
	});
}

function remove_multiCategory(rid) {
	$('.removeclass' + rid).remove();
}
