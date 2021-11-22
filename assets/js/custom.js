$.ajaxSetup({
	headers: {
		"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
	},
});

$(document).on("click", function (e) {
	if (
		!$(e.target).hasClass("ctm-select-txt") &&
		$(e.target).parents(".ctm-select-txt").length === 0 &&
		$(e.target).parents(".ctm-option-box").length === 0
		) {
		$(".ctm-option-box").hide();
	$(".ctm-select-txt").removeClass("ctm-slct-hide");
};
if (
	!$(e.target).hasClass("st-m-s") &&
	$(e.target).parents(".st-m-s").length === 0 &&
	$(e.target).parents(".st-menu").length === 0
	) {
	$(".st-menu").hide();
};
if (
	!$(e.target).hasClass("search-item-a") &&
	$(e.target).parents(".search-item-a").length === 0 &&
	$(e.target).parents(".search-cnt-show").length === 0
	) {
	$(".search-item-a").removeClass('active');
$(".search-cnt-show").slideUp();
};
// if (
// 	!$(e.target).hasClass("item-list") &&
// 	!$(e.target).hasClass("show-nav-con") &&
// 	!$(e.target).hasClass("show-h-nav") &&
// 	$(e.target).parents(".item-list").length === 0 &&
// 	$(e.target).parents(".show-h-nav").length === 0 &&
// 	$(e.target).parents(".show-nav-con").length === 0 &&
// 	$(e.target).parents(".inner-cat").length === 0
// 	) {
// 	$(".inner-cat").addClass("d-none");
// };
});

$(function () {
	$(document).on("click", ".search-item-a", function () {
		$(".search-cnt-show").slideToggle();
		if ($(this).hasClass("active")) {
			$(this).removeClass('active');
		}else{
			$(this).addClass('active');
		}

	});
	$(document).on("click", ".st-m-s", function () {
		$(".st-menu").hide();
		$(this).siblings(".st-menu").toggle();
	});
	$(document).on("click", ".ctm-select-txt", function () {
		$(".ctm-select-txt").removeClass("active-ctm-s");
		$(this).addClass("active-ctm-s");
		$(".ctm-select-txt").each(function () {
			if ($(this).hasClass("active-ctm-s")) {
				if ($(this).hasClass("ctm-slct-hide")) {
					$(this).removeClass("ctm-slct-hide");
					$(this).parent().find(".ctm-option-box").hide();
				} else {
					$(this).addClass("ctm-slct-hide");
					$(this).parent().find(".ctm-option-box").show();
				}
			} else {
				$(this).removeClass("ctm-slct-hide");
				$(this).parent().find(".ctm-option-box").hide();
			}
		});
	});
	$(document).on("click", ".all-img-show", function () {
		$(".js-img-viwer").click();
    // console.log(option_val);
});
	$(document).on("click", ".ctm-option", function () {
		var option_val = $(this).text();
		$(this).parents().find(".active-ctm-s .select-txt").text(option_val);
		$(".ctm-option-box").hide();
		$(".ctm-select-txt").removeClass("ctm-slct-hide");
    // console.log(option_val);
});
	$(document).on("click", ".basic-plane .slct-btn", function () {
		$(".plane").removeClass("selected");
		$(".basic-plane").addClass("selected");
    // console.log(option_val);
});
	$(document).on("click", ".best-plane .slct-btn", function () {
		$(".plane").removeClass("selected");
		$(".best-plane").addClass("selected");
    // console.log(option_val);
});
	$(document).on("click", ".populer-plane .slct-btn", function () {
		$(".plane").removeClass("selected");
		$(".populer-plane").addClass("selected");
    // console.log(option_val);
});
	$(document).on("click", ".pay-acc", function () {
		$(".payment-option .pay-acc").removeClass("pay-selected");
		$(".payment-option .pay-acc")
		.find('input[type="radio"]')
		.removeAttr("checked");
		$(this).addClass("pay-selected");
		$(this).find('input[type="radio"]').prop("checked", true);
    // console.log(option_val);
});
	$(".sh-extra .extra").click(function () {
		$(this).hide();
		$(".hide").show();
		$(".sh-extra").addClass("line-sh");
		$(".extra-box").slideDown(300);
	});
	$(".sh-extra .hide").click(function () {
		$(this).hide();
		$(".extra").show();
		$(".sh-extra").removeClass("line-sh");
		$(".extra-box").slideUp(300);
	});

	$(".extra-info .extra").click(function () {
		$(this).hide();
		$(".extra-info .hide").show();
		$(".extra-info .extra-box").slideDown(300);
	});
	$(".extra-info .hide").click(function () {
		$(this).hide();
		$(".extra-info .extra").show();
		$(".extra-info .extra-box").slideUp(300);
	});
	$(".extra-info1 .extra").click(function () {
		$(this).hide();
		$(".extra-info1 .hide").show();
		$(".extra-info1 .extra-box").slideDown(300);
	});
	$(".extra-info1 .hide").click(function () {
		$(this).hide();
		$(".extra-info1 .extra").show();
		$(".extra-info1 .extra-box").slideUp(300);
	});

	$(".extra-info1 textarea").focus(function () {
		$(this).parents().find(".des-tips").show();
	});
	$(".extra-info1 textarea").blur(function () {
		$(this).parents().find(".des-tips").hide();
	});
	$(".extra-info1 textarea").keypress(function () {
		$(this).parents().find(".des-tips").hide();
	});

	$(".rs-tab .item-list").click(function () {
		let selector = $(this).find('input');
		if(selector.is(":checked")) {
			selector.prop('checked', false);
			$(this).removeClass('active');
			if(selector.val()) {
				$(".form-type-filter-all").prop('checked', false);
				$(".form-type-filter-all").parent().removeClass('active');
			}else {
				$(".form-type-filter").prop('checked', false);
				$(".form-type-filter").parent().removeClass('active');
			}
		}else {
			selector.prop('checked', true);
			$(this).addClass('active');
			if(selector.val()) {
				if($('.form-type-filter:checked').length == $('.form-type-filter').length) {
					$(".form-type-filter-all").prop('checked', true);
					$(".form-type-filter-all").parent().addClass('active');
				}else {
					$(".form-type-filter-all").prop('checked', false);
					$(".form-type-filter-all").parent().removeClass('active');
				}
			}else {
				$(".form-type-filter").prop('checked', true);
				$(".form-type-filter").parent().addClass('active');
			}
		}
	});
	$(".services .cat-m-li").click(function () {
		$(".services .cat-m-li").removeClass("active");
		$(this).addClass("active");
	});
	$(".ctm-cat-ul .cat-li").click(function () {
		$(".ctm-cat-ul .cat-li").removeClass("active");
		$(this).addClass("active");
	});
	// $(".search-service .item-list-p").click(function () {
	// 	$(".search-service .item-list-p").removeClass("active");
	// 	$(this).addClass("active");
	// });
	$(".inner-c-l").click(function () {
		$(".inner-c-l").removeClass("active");
		$(this).addClass("active");
	});

	$(".my-post-li").on("click", function () {
		$(".user-s-ul").slideToggle(400);
		if ($(this).find("i").hasClass("rotate-ar")) {
			$(this).find("i").removeClass("rotate-ar");
		} else {
			$(this).find("i").addClass("rotate-ar");
		}
	});
	$(".services .cat-m-li").click(function () {
		tabShow(event, 1);
	});
	$(".ctm-cat-ul .cat-li").click(function () {
		tabShow(event, 2);
		$(".in-cat-tab").addClass("d-none");
	});
	$(".reg-menu .reg-li").click(function () {
		$(".reg-menu .reg-li").removeClass("active");
		$(this).addClass("active");
		tabShow(event, 3);
	});
	$(".car-b-search .show-h-nav").click(function () {
    // console.log(98);
    tabShow(event, 4);
});
// 	$(".search-tab .show-side-nav").click(function () {
//     // console.log(98);
//     $(".car-s-rslt .show-side-nav").removeClass("active");
//     $(this).addClass("active");
//     tabShow(event, 5);
// });

// 	$(document).on("click", ".show-car-inner-cat", function () {
// 		$(".show-side-nav").removeClass('active');
// 		if ($(this).hasClass("active")) {
// 			$(this).removeClass('active');
// 		}else{
// 			$(".show-car-inner-cat").removeClass('active');
// 			$(this).addClass('active');
// 		}
// 		tabShow(event, 6);
//     // $('.slug-cat-buy-sale').removeClass('active');
//     var inn_nav;
//     $(".show-car-inner-cat").each(function (k, p) {
//     	if ($(this).hasClass("active")) {
//     		u = k;
//     	}
//     });
//     inn_nav = $(".inner-cat-car .car-inner-cat-nav").eq(u).width();
//     // console.log(inn_nav);

//     var relX = event.pageX - (event.pageX - $(this).offset().left);
//     var win_w = $(window).width();
//     var this_w = $(this).width();
//     var sub_w = $(".inner-cat-car").width();
//     var lr_w = (win_w - sub_w) / 2;
//     var o_w = relX - lr_w - this_w;
//     var r_w = win_w - relX;
//     var om_w = inn_nav - r_w;
//     if (r_w < inn_nav && r_w < relX) {
//     	$(".car-inner-cat-nav").css("left", o_w - om_w + "px");

//     	if (win_w > 575) {
//     		$(".car-inner-cat-nav")
//     		.eq(u)
//     		.find(".arrow-up")
//     		.css("left", 37 + om_w + "px");
//     	} else {
//     		$(".car-inner-cat-nav")
//     		.eq(u)
//     		.find(".arrow-up")
//     		.css("left", 80 + om_w + "px");
//     	}
//     } else {
//     	if (o_w < 0) {
//     		$(".car-inner-cat-nav").css("left", "0px");
//     	} else {
//     		$(".car-inner-cat-nav").css("left", o_w + "px");
//     	}

//     	if (win_w > 575) {
//     		$(".car-inner-cat-nav").eq(u).find(".arrow-up").css("left", "37px");
//     	} else {
//     		if (relX > 112) {
//     			$(".car-inner-cat-nav .arrow-up").css("left", "90px");
//     		} else {
//     			$(".car-inner-cat-nav .arrow-up").css("left", relX + "px");
//     		}
//     	}
//     }
//     // console.log(r_w);
//     console.log(relX);
// });

$(document).on("click", ".show-nav-con", function () {
	$(this).find(".inner-cat").removeClass("d-none");
	var relX = event.pageX - (event.pageX - $(this).offset().left);
	var win_w = $(window).width();
	var this_i_w = $(this).find(".inner-cat").width();
	var o_w = win_w - relX;
	var r_w = win_w - relX;
	var om_w = this_i_w - r_w;
	if (r_w < this_i_w) { 
		if (relX > 61) {
			if (win_w > 350) {
				$(this)
				.find(".inner-cat")
				.css("left", -(45 + om_w) + "px");
				$(this)
				.find(".arrow-up")
				.css("left", 80 + om_w + "px");
			} else {
				$(this)
				.find(".arrow-up")
				.css("left", 80 + om_w + "px");
				$(this)
				.find(".inner-cat")
				.css("left", -(15 + om_w) + "px");
			}
		} else {
			$(this)
			.find(".arrow-up")
			.css("left", relX + "px");
			$(this).find(".inner-cat").css("left", "0px");
		}
	}
	// console.log(this_i_w);
	// console.log(relX);
});

$(document).on("click", ".hide-car-inner-cat", function () {
	$(".inner-cat-car .car-inner-cat-nav").addClass("d-none");
	$(".inner-cat-car .car-inner-cat-nav .inner-c-l").removeClass("active");
	$(".show-car-inner-cat").removeClass("active");
    // console.log(555);
});
$(document).on("click", ".single-item-select", function () {
	if ($(this).hasClass("active")) {
		$(this).removeClass('active');
		$(this).find(".cat-name").removeAttr("checked");
	}else{
		$(".single-item-select").removeClass('active');
		$(this).addClass('active');
		$(".single-item-select").find(".cat-name").removeAttr("checked");
		$(this).find(".cat-name").attr('checked','checked');
	}

});

$(document).on("click", ".buy-cat .multiple-item-select-all", function () {
	if ($(this).hasClass("active")) {
		console.log(45);
		$(".form-dynamic-text").text(" ");
		$(this).removeClass('active');
		$('.buy-cat .multiple-item-select').removeClass('active');
		$(".buy-cat .cat-name").removeAttr("checked");
	}else{
		$(this).addClass('active');
		$(".buy-cat .cat-name").attr('checked','checked');
		$('.buy-cat .multiple-item-select').addClass('active');
	}
	var v = $(this).parent().parent().find(".item-txt").each(function(){
		$(".form-dynamic-text").find('span').text($(this).parent().parent().parent().find(".active .item-txt").text().split(","));
	});
});



$(document).on("click", ".buy-cat .multiple-item-select", function () {
	console.log('single');
	if ($(this).hasClass("active")) {
		$(this).removeClass('active');
		$(this).find(".cat-name").removeAttr("checked");
	}else{
		$(this).addClass('active');
		$(this).find(".cat-name").attr('checked','checked');
	}
	var v = $(this).parent().parent().find(".item-txt").each(function(){
		$(".form-dynamic-text").find('span').text($(this).parent().parent().parent().find(".active .item-txt").text().split(","));
	});
	if ($(".buy-cat .multiple-item-select").length == $(".buy-cat .multiple-item-select.active").length) {
		$('.buy-cat .multiple-item-select-all').addClass('active');
		$(".buy-cat .all-cat-name").attr('checked','checked');
	} else {
		$('.buy-cat .multiple-item-select-all').removeClass('active');
		$(".buy-cat .all-cat-name").removeAttr("checked");
	}

});

// function setDynamicValue(){
// 	var v = $(this).parent().parent().find(".item-txt").each(function(){
// 		$(".form-dynamic-text").find('span').text($(this).parent().parent().parent().find(".active .item-txt").text().split(","));
// 	});
// }



$(document).on("click", ".rent-cat .multiple-item-select-all", function () {
	if ($(this).hasClass("active")) {
		$(this).removeClass('active');
		$('.rent-cat .multiple-item-select').removeClass('active');
		$(".rent-cat .cat-name").removeAttr("checked");
	}else{
		$(this).addClass('active');
		$(".rent-cat .cat-name").attr('checked','checked');
		$('.rent-cat .multiple-item-select').addClass('active');
	}
});

$(document).on("click", ".rent-cat .multiple-item-select", function () {
	if ($(this).hasClass("active")) {
		$(this).removeClass('active');
		$(this).find(".cat-name").removeAttr("checked");
	}else{
		$(this).addClass('active');
		$(this).find(".cat-name").attr('checked','checked');
	}
	if ($(".rent-cat .multiple-item-select").length == $(".rent-cat .multiple-item-select.active").length) {
		$('.rent-cat .multiple-item-select-all').addClass('active');
		$(".rent-cat .all-cat-name").attr('checked','checked');
	} else {
		$('.rent-cat .multiple-item-select-all').removeClass('active');
		$(".rent-cat .all-cat-name").removeAttr("checked");
	}

});






$('[data-fancybox="gallery"]').fancybox({
	thumbs: {
		autoStart: true,
	},
});
var galleryThumbs = new Swiper(".gallery-thumbs", {
	spaceBetween: 20,
	slidesPerView: 6,
	freeMode: true,
	touchRatio: 0,
	watchSlidesVisibility: true,
	watchSlidesProgress: true,
	breakpoints: {
		1300: {
			slidesPerView: 5,
		},
		1200: {
			slidesPerView: 4,
		},
		991: {
			slidesPerView: 6,
		},
		767: {
			slidesPerView: 4,
		},
		575: {
			slidesPerView: 3,
		},
		450: {
			slidesPerView: 2,
		},
	},
});
var galleryTop = new Swiper(".gallery-top", {
	touchRatio: 0,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	thumbs: {
		swiper: galleryThumbs,
	},
});

$(".gallery-nav .all-img-show")
.width($(".gallery-nav .slider-img").width())
.css({ display: "flex" });
$(window).resize(function () {
	$(".gallery-nav .all-img-show").width(
		$(".gallery-nav .slider-img").width()
		);
});
});
$(document).on("click", ".buy-sale-in-tab .in-cat-show", function () {
     // console.log(98);
     $(".buy-sale-in-tab .in-cat-show").removeClass("active");
     $(this).addClass("active");
     tabShow(event, 7);
 });
$(document).on("click", ".services-in-tab .in-cat-show", function () {
     // console.log(98);
     $(".services-in-tab .in-cat-show").removeClass("active");
     $(this).addClass("active");
     tabShow(event, 8);
 });
function tabShow(e, n) {
	if (n == 1) {
		$(".services .cat-m-li").each(function (i, v) {
			if ($(this).hasClass("active")) {
				x = i;
			}
		});
    // $(e.target).addClass('active');
    console.log(x);
    $(".category-menu").addClass("d-none");
    $(".category-menu").eq(x).removeClass("d-none");
} else if (n == 2) {
	$(".category-menu .ctm-cat-ul .cat-li").each(function (j, u) {
		if ($(this).hasClass("active")) {
			y = j;
		}
	});
    // console.log(y);
    $(".category-menu .sub-cat-tab").addClass("d-none");
    $(".category-menu .sub-cat-tab").eq(y).removeClass("d-none");
} else if (n == 3) {
	$(".reg-menu .reg-li").each(function (k, p) {
		if ($(this).hasClass("active")) {
			z = k;
		}
	});
    // console.log(k);
    $(".menu-nav-cnt .menu-cnt").addClass("d-none");
    $(".menu-nav-cnt .menu-cnt").eq(z).removeClass("d-none");
} else if (n == 4) {
	$(".car-b-search .show-h-nav").each(function (k, p) {
		if ($(this).hasClass("active")) {
			w = k;
		}
	});
    // console.log(w);
    $(".car-extra .car-hide-nav").addClass("d-none");
    $(".car-extra .car-hide-nav").eq(w).removeClass("d-none");
} else if (n == 5) {
	$(".search-tab .show-side-nav").each(function (k, p) {
		if ($(this).hasClass("active")) {
			v = k;
		}
	});
    // console.log(v);
    $(".sidebar-s-n .extra-sidebar-nav").addClass("d-none");
    $(".sidebar-s-n .extra-sidebar-nav").eq(v).removeClass("d-none");
} else if (n == 6) {
	$(".show-car-inner-cat").each(function (k, p) {
		if ($(this).hasClass("active")) {
			u = k;
		}
	});
    // console.log(u);
    $(".inner-cat-car .car-inner-cat-nav").addClass("d-none");
    $(".inner-cat-car .car-inner-cat-nav").eq(u).removeClass("d-none");
} else if (n == 7) {
	$(".buy-sale-in-tab .in-cat-show").each(function (k, p) {
		if ($(this).hasClass("active")) {
			u = k;
		}
	});
    // console.log(u);
    $(".buy-sale-in-tab .in-cat-tab").addClass("d-none");
    $(".buy-sale-in-tab .in-cat-tab").eq(u).removeClass("d-none");
} else if (n == 8) {
	$(".services-in-tab .in-cat-show").each(function (k, p) {
		if ($(this).hasClass("active")) {
			u = k;
		}
	});
    // console.log(u);
    $(".services-in-tab .in-cat-tab").addClass("d-none");
    $(".services-in-tab .in-cat-tab").eq(u).removeClass("d-none");
}
}

function changePViewImg(n) {
	$('.g-v [data-g-itm="' + n + '"]').click();
  // console.log(n);
}
function chanZId(n) {
	$(".z-btn i").attr("onclick", "zoomProductImg(" + n + ")");
	$(".all-img-show").attr("onclick", "zoomProductImg(" + n + ")");
}
function nextM() {
  // var vis_c;
  var count_n_active;
  $(".gallery-nav .swiper-slide").each(function (i, v) {
  	if ($(this).hasClass("swiper-slide-thumb-active")) {
  		count_n_active = i;
  	}
  });
  $(".z-btn i").attr("onclick", "zoomProductImg(" + (count_n_active + 1) + ")");
  $(".all-img-show").attr(
  	"onclick",
  	"zoomProductImg(" + (count_n_active + 1) + ")"
  	);
  // $('.all-img-show').css({'right' : '0'});
}
function zoomProductImg(n) {
	$('.g-v [data-g-itm="' + n + '"]').click();
  // console.log(n);
}

// developent related js
function changeTypeTotext(tp) {
	if (tp == "pass") {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	} else if (tp == "repass") {
		var x = document.getElementById("password-confirm");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	} else {
		var x = document.getElementById("lpass");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
}

// used car model get
function getThisMrkModels(id, type, make_name) {
	$.ajax({
		url: window.get_this_mark_models,
		method: "post",
		data: {
			id: id,
			type: type,
		},
		success: function (response) {
			if (!response == 0) {
				$("#mdl-parnt").text("--choose--");
				$("#mdls").html(response);
				$("input[name*='make']").val(make_name);
				$("input[name*='model']").val("");
			} else {
				$("#mdl-parnt").text("--");
				$("#mdls").html("");
			}
		},
	});
}
// used car gamybos period get

function getUsedCarGamyPeriods(id) {
	$("#model").val("34324234adasdas");
	$.ajax({
		url: window.get_this_gamybos_periods,
		method: "post",
		data: {
			id: id,
		},
		success: function (response) {
			if (!response == 0) {
				$("#period-parnt").text("--choose--");
				$("#periods").html(response);
			} else {
				$("#period-parnt").text("--");
				$("input[name*='model']").val("");
			}
		},
	});
}

$(document).ready(function () {
	$(".yearselect").yearselect({
		start: 1950,
		end: 2019,
    order: "desc", // or desc
});
});

$("#formForm").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$(".please").show();
	$.ajax({
		url: window.insert_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$("#formForm").load(window.location.href + " #formForm");
			$("#formForm").hide();
			$(".step_one").removeClass("active");
			$(".step_two").addClass("active");
			$("#paymentForm").removeClass("d-none");
		},
		error: function (res) {
			console.log(res);
		},
	});
}
});

$("#uPdateCarForm").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.update_car_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			window.location = window.goto_profile;
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

        // $("#formForm").load(window.location.href + " #formForm");
        // $("#formForm").hide();
        // $(".step_one").removeClass('active');
        // $(".step_two").addClass('active');
        // $("#paymentForm").removeClass('d-none');
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});

$(".formForBuySellAd").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	}).prev().find(".asterisk").show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.insert_buysale_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			console.log(response);
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$(".formForBuySellAd").load(
				window.location.href + " .formForBuySellAd"
				);
			$(".formForBuySellAd").hide();
			$(".step_one").removeClass("active");
			$(".step_two").addClass("active");
			$("#paymentForm").removeClass("d-none");
		},
		error: function (res) {
			console.log(res);
		},
	});
}
});

$(".formForBuySellAdUpdate").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.update_buysale_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			window.location = window.goto_profile;
			console.log(response);
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$(".formForBuySellAd").load(
				window.location.href + " .formForBuySellAd"
				);
		},
		error: function (res) {
			console.log(res);
		},
	});
}
});

$(".formForServicesAd").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.insert_services_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$(".formForServicesAd").load(
				window.location.href + " .formForServicesAd"
				);
			$(".formForServicesAd").hide();
			$(".step_one").removeClass("active");
			$(".step_two").addClass("active");
			$("#paymentForm").removeClass("d-none");
        // console.log(response);
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});

$(".formForServicesAdUpdate").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.update_services_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			window.location = window.goto_profile;
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$(".formForServicesAd").load(
				window.location.href + " .formForServicesAd"
				);
        // console.log(response);
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});

$(".formForHouse").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if ($('input[name="features_eq1[]"]').hasClass("checkbox-required")) {
		var ck_box = $('input[name="features_eq1[]"]:checked').length;
		if (ck_box == 0) {
			$(".extra").trigger("click");
			$(".check-req").show();
		} else {
			$(".check-req").hide();
		}
	}
	if (empty.length || ck_box == 0) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.insert_house_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {

			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$(".formForHouse").load(window.location.href + " .formForHouse");
			$(".formForHouse").hide();
			$(".step_one").removeClass("active");
			$(".step_two").addClass("active");
			$("#paymentForm").removeClass("d-none");
        // console.log(response);
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});
function showPlease(){

}
$(".formForHouseUpdate").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if ($('input[name="features_eq1[]"]').hasClass("checkbox-required")) {
		var ck_box = $('input[name="features_eq1[]"]:checked').length;
		if (ck_box == 0) {
			$(".extra").trigger("click");
			$(".check-req").show();
		} else {
			$(".check-req").hide();
		}
	}
	if (empty.length || ck_box == 0) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.update_house_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			console.log(response);
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			window.location = window.goto_profile;
			$(".formForHouse").load(window.location.href + " .formForHouse");
			$(".formForHouse").hide();
			$(".step_one").removeClass("active");
			$(".step_two").addClass("active");
			$("#paymentForm").removeClass("d-none");
        // console.log(response);
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});

// search house

$(".formForHouseSearch").on("submit", function (event) {
  // event.preventDefault();
  if ($(".item-list-p").hasClass("active")) {
  	var activeElement = document.getElementsByClassName("item-list-p active");
  	var activeElementValue = activeElement[0].querySelector(".this_cat").value;
	  $(".formType").val(activeElementValue);
	  
  }
});

$(".formForCarSearch").on("submit", function (event) {
  // event.preventDefault();

  if ($(".item-list-p").hasClass("active")) {
  	var activeElement = document.getElementsByClassName("item-list-p active");
  	var activeElementValue = activeElement[0].querySelector(".this_cat").value;

  	if (activeElementValue == "") {
  		var activeElement = document.getElementsByClassName(
  			"inner-c-l show-h-nav active"
  			);
  		var activeElementValue = activeElement[0].querySelector(".this_inner_cat")
  		.value;
  		$(".formType").val(activeElementValue);
  	} else {
  		$(".formType").val(activeElementValue);
  	}
  }
});

$(".formForBuySaleSearch").on("submit", function (event) {
  // event.preventDefault();

  if ($(".item-list-p").hasClass("active")) {
    // var activeElement = document.getElementsByClassName('item-list-p active');
    var activeElementValue = $(".show-h-nav.active  input").val();
    if (activeElementValue == "") {
      // var activeElement = document.getElementsByClassName('inner-c-l show-h-nav active');
      var activeElementValue = $(".show-h-nav.active  input").val();
      $(".formType").val(activeElementValue);
  } else {
  	$(".formType").val(activeElementValue);
  }
}
});
$(".formForServicesSearch").on("submit", function (event) {
  // event.preventDefault();

  if ($(".item-list-p").hasClass("active")) {
    // var activeElement = document.getElementsByClassName('item-list-p active');
    var activeElementValue = $(".show-h-nav.active  input").val();
    if (activeElementValue == "") {
      // var activeElement = document.getElementsByClassName('inner-c-l show-h-nav active');
      var activeElementValue = $(".show-h-nav.active  input").val();
      $(".formType").val(activeElementValue);
  } else {
  	$(".formType").val(activeElementValue);
  }
}
});

// filter house
$("#filterHouse").on("submit", function (event) {
	event.preventDefault();
	if ($(".act-cat").hasClass("active")) {
		var activeElementValue = $(".item-list.active input").val();
		$("#formType").val(activeElementValue);
	}
	$.ajax({
		url: window.filter_house_by_all_value,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			$("#loaddata").html('');
			$("#loaddata").html(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
});


$("#filterHouseTopBar").on("submit", function (event) {
	event.preventDefault();
	if ($(".act-cat").hasClass("active")) {
		var activeElementValue = $(".item-list.active input").val();
		$(".formType").val(activeElementValue);
	}
	// var address = $("input[name='address']").val();
	// var distance = $("input[name='distance']").val();
	$.ajax({
		url: window.filter_house_by_top_bar,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			$("#loaddata").html(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
});

// function searchHouseByAddress(address) {
// 	var activeElementValue = $(".item-list.active input").val();
// 	var sale_rent = $("#saleRent").val();

// 	$.ajax({
// 		url: window.sear_house_by_address,
// 		method: "post",
// 		data: {
// 			form_type: activeElementValue,
// 			address: address,
// 			sale_rent: sale_rent,
// 		},
// 		success: function (response) {
// 			$("#loaddata").html('');
// 			$("#loaddata").html(response);
// 		},
// 		error: function (res) {
// 			console.log(res);
// 		},
// 	});
// }

// filterJob
$("#filterJob").on("submit", function (event) {
	event.preventDefault();
	// if ($(".act-cat").hasClass("active")) {
	// 	var activeElement = document.getElementsByClassName("act-cat active");
	// 	var activeElementValue = activeElement[0].querySelector(".this_cat").value;
	// 	console.log(activeElementValue);
	// 	$("#formType").val(activeElementValue);
	// }
	$.ajax({
		url: window.filter_job,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			$("#loaddata").html('');
			$("#loaddata").html(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
});

// filterJob
$("#filterJobByTopBar").on("submit", function (event) {
	event.preventDefault();
	if ($(".act-cat").hasClass("active")) {
		var activeElement = document.getElementsByClassName("act-cat active");
		var activeElementValue = activeElement[0].querySelector(".this_cat").value;
    // console.log(activeElementValue);
    $(".formType").val(activeElementValue);
}
$.ajax({
	url: window.filter_job_by_top_val,
	method: "POST",
	data: new FormData(this),
	dataType: "JSON",
	contentType: false,
	cache: false,
	processData: false,
	success: function (response) {
      // console.log(response);
      $("#loaddata").html(response);
  },
  error: function (res) {
  	console.log(res);
  },
});
});

// filter Car
$("#filterCar").on("submit", function (event) {
	event.preventDefault();
	// if ($(".act-cat").hasClass("active")) {
	// 	var activeElementValue = $(".act-cat.active input").val();
	// }

	// if ($(".inner-c-l").hasClass("active")) {
	// 	var activeElementValue = $(".inner-c-l.active input").val();
	// }
	// $(".formType").val(activeElementValue);

	$.ajax({
		url: window.filter_car,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			console.log(response);
			$("#loaddata").html('');
			$("#loaddata").html(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
});

// filter Buy Sale
$("#filterBuySale").on("submit", function (event) {
	event.preventDefault();
	// if ($(".item-list").hasClass("active")) {
	// 	var activeElementValue = $(".item-list.active input").val();
	// }
	// if ($(".slug-cat-buy-sale").hasClass("active")) {
	// 	var activeElementValue = $(".slug-cat-buy-sale.active input").val();
	// }

	// $("#formType").val(activeElementValue);
  // console.log(activeElementValue);
  $.ajax({
  	url: window.filter_buy_sale_by,
  	method: "POST",
  	data: new FormData(this),
  	dataType: "JSON",
  	contentType: false,
  	cache: false,
  	processData: false,
  	success: function (response) {
  		$("#loaddata").html('');
  		$("#loaddata").html(response);
  	},
  	error: function (res) {
  		console.log(res);
  	},
  });
});

// filter Services
$("#filterServices").on("submit", function (event) {
	event.preventDefault();
	if ($(".item-list").hasClass("active")) {
		var activeElementValue = $(".item-list.active input").val();
	}
	if ($(".slug-cat-services").hasClass("active")) {
		var activeElementValue = $(".slug-cat-services.active input").val();
	}
	$("#formType").val(activeElementValue);

	$.ajax({
		url: window.filter_services_by_values,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			console.log(response);
			$("#loaddata").html('');
			$("#loaddata").html(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
});

// function filterHFild(val,type){
//     if ($('.act-cat').hasClass('active')){
// 		var activeElement = document.getElementsByClassName('act-cat active');
// 		var activeElementValue = activeElement[0].querySelector('.this_cat').value;
// 		// console.log(activeElementValue);
// 		$("#formType").val(activeElementValue);
// 	}
// 	$.ajax({
// 		url: window.filter_house_by_filed_value,
// 		method: 'post',
// 		data: {
// 			form_type: activeElementValue,
// 			value: val,
// 			field: type
// 		},
// 		success:function(response)
// 		{
// 			$('#loaddata').html(response);
// 		},
// 		error: function(res) {
// 			console.log(res);
// 		}
// 	});
// }

function loginInformPage() {
	var email = $("#lgEmail").val();
	var password = $("#lgPass").val();
	$.ajax({
		url: window.check_login,
		method: "post",
		data: {
			email: email,
			password: password,
		},
		success: function (response) {
			if (response == 1) {
				$(".please").show();
				$("#user-info-section-for-form").load(
					window.location.href + " #user-info-section-for-form"
					);
				$("#navbarSupportedContent").load(
					window.location.href + " #navbarSupportedContent"
					);
			} else {
				$("#loginFromForm").find("input").css({ border: "1px solid red" });
				$(".try-again").fadeIn();
			}
		},
		error: function (res) {},
	});
}

function registerFromForm() {
	$("label .rgForm-asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".rgForm-asterisk")
	.show();
	var accountType = $("#accountType").val();
	var email = $(".r-mail").val();
	var password = $(".r-pass").val();
	var confirm_pass = $(".r-pass-re").val();
	$.ajax({
		url: window.register_from_page,
		method: "post",
		data: {
			accountType: accountType,
			email: email,
			password: password,
			confirm_pass: confirm_pass,
		},
		success: function (response) {
			console.log(response);
			if (response == 1) {
				$(".please").show();
				$("#user-info-section-for-form").load(
					window.location.href + " #user-info-section-for-form"
					);
				$("#navbarSupportedContent").load(
					window.location.href + " #navbarSupportedContent"
					);
			} else if (response == 3) {
				console.log("password not match");
			} else {
				$("#loginFromForm").find("input").css({ border: "1px solid red" });
				$(".try-again").fadeIn();
			}
		},
		error: function (res) {
			console.log(res);
		},
	});
}
$(document).on("click", ".slug-cat", function () {
	var activeElementValue = $(this).find(".this_cat").val();
	$(".formType").val(activeElementValue);
// 	$.ajax({
// 		url: window.check_actve_match_menu_cars,
// 		method: "post",
// 		data: {
// 			form_type: activeElementValue,
// 		},
// 		success: function (response) {
//       // console.log(response);
//       $("#loaddata").html(response);
//   },
//   error: function (res) {
//   	console.log(res);
//   },
// });
  // console.log(555);
});

$(document).on("click", ".slug-cat-buy-sale", function () {
	var cat = $(this).find(".this_cat").val();
	if (cat) {
		var val = cat;
	}else{
		var in_cat = $(".slug-cat-buy-sale.active input").val();
		var val = in_cat;
	}
	$("#formType").val(val);
// 	$.ajax({
// 		url: window.check_actve_match_menu_buysale,
// 		method: "post",
// 		data: {
// 			form_type: activeElementValue,
// 		},
// 		success: function (response) {
//       // console.log(response);
//       $("#loaddata").html(response);
//   },
//   error: function (res) {
//   	console.log(res);
//   },
// });
  // console.log(555);
});

$(document).on("click", ".slug-cat-services", function () {
	var activeElementValue = $(this).find(".this_cat").val();
	$("#formType").val(activeElementValue);

  // console.log(activeElementValue);
  // $.ajax({
  // 	url: window.check_actve_match_menu_service,
  // 	method: "post",
  // 	data: {
  // 		form_type: activeElementValue,
  // 	},
  // 	success: function (response) {
  // 		console.log(response);
  // 		$("#loaddata").html(response);
  // 	},
  // 	error: function (res) {
  // 		console.log(res);
  // 	},
  // });
});

function activeSubMenuForCar(e) {
  // if ($('.act-cat').hasClass('active')){
  // 	var activeElement = document.getElementsByClassName('act-cat active');
  // 	var activeElementValue = activeElement[0].querySelector('.this_cat').value;

  // 	if (activeElementValue == '') {
  // 		activeSubMenuForCarInner(e);
  // 	}else{
  // 		console.log(activeElementValue);
  // 	}
  // }
  // else{
  // 	console.log(2);
  // }

  var activeElementValue = $(e.target).find(".this_cat").val();
  $.ajax({
  	url: window.check_actve_match_menu_cars,
  	method: "post",
  	data: {
  		form_type: activeElementValue,
  	},
  	success: function (response) {
      // console.log(response);
      $("#loaddata").html(response);
  },
  error: function (res) {
  	console.log(res);
  },
});
}

function activeSubMenuForCarInner(e) {
	console.log($(e.target).find(".this_inner_cat").val());
  // if ($('.act-innr').hasClass('active')) {
  // 	var activeElement = document.getElementsByClassName('act-innr active');
  // 	var activeElementValue = activeElement[0].querySelector('.this_inner_cat').value;
  // 	console.log(activeElementValue);
  // }
}

function setThisContactInfoVal(filed, item) {
	if (filed == "contact_country") {
		$("#contact_country").val(item);
	} else if (filed == "contact_city") {
		$("#contact_city").val(item);
	}
}

function findorGetjob(type) {
	$.ajax({
		url: window.get_actve_menu_data_job,
		type: "post",
		data: {
			form_type: type,
		},
		success: function (response) {
			$("#loaddata").html(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
}

// function getThisCountryCities(id, country_name) {
// 	$.ajax({
// 		url: window.get_this_country_cities,
// 		method: "post",
// 		data: {
// 			id: id,
// 		},
// 		success: function (response) {
// 			if (!response == 0) {
// 				$("#city-parnt").text("--choose--");
// 				$("#cts").html(response);
// 				$("input[name*='contact_country']").val(country_name);
// 				$("input[name*='contact_city']").val("");
// 			} else {
// 				$("#city-parnt").text("--");
// 				$("#cts").html("");
// 			}
// 		},
// 	});
// }

// function getThisRegionCities(id, country_name) {
// 	$.ajax({
// 		url: window.get_this_region_cities,
// 		method: "post",
// 		data: {
// 			id: id,
// 		},
// 		success: function (response) {
// 			if (!response == 0) {
// 				$("#region-parent").text("--choose--");
// 				$("#municipalities").html(response);
// 				$("input[name*='region']").val(country_name);
// 				$("input[name*='municipalities']").val("");
// 			} else {
// 				$("#region-parent").text("--");
// 				$("#municipalities").html("");
// 			}
// 		},
// 	});
// }

$("#storeJobAd").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.insert_job_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$("#storeJobAd").load(window.location.href + " #jobform");
			$("#storeJobAd").hide();
			$(".step_one").removeClass("active");
			$(".step_two").addClass("active");
			$("#paymentForm").removeClass("d-none");
        // console.log(response);
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});
$("#jobformUpdate").on("submit", function (event) {
	event.preventDefault();
	$("label .asterisk").hide();
	var empty = $(".required")
	.filter(function () {
		return !this.value;
	})
	.prev()
	.find(".asterisk")
	.show();
	if (empty.length) {
		$(".right")
		.stop()
		.animate({ scrollTop: 0 }, { duration: 1500, easing: "easeOutQuart" });
		$("#popupAlert").addClass("show");
		setTimeout(function () {
			$("#popupAlert").removeClass("show");
		}, 3000);
    return false; //uh oh, one was empty!
} else {
	$.ajax({
		url: window.update_job_form,
		method: "POST",
		data: new FormData(this),
		dataType: "JSON",
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			console.log(response);
			window.location = window.goto_profile;
			$("#popupAlertSuccess").addClass("show");
			setTimeout(function () {
				$("#popupAlertSuccess").removeClass("show");
			}, 3000);

			$("#jobform").load(window.location.href + " #jobform");
        // console.log(response);
    },
    error: function (res) {
    	console.log(res);
    },
});
}
});

// function searchJobWithTopIndValue() {
// 	if ($(".act-cat").hasClass("active")) {
// 		var activeElement = document.getElementsByClassName("act-cat active");
// 		var activeElementValue = activeElement[0].querySelector(".this_cat").value;

// 		var title = $('input[name="job_title"]').val();
// 		var address = $('input[name="address"]').val();
// 		var city = $(".city").val();

// 		$.ajax({
// 			url: window.search_job_with_city,
// 			method: "post",
// 			data: {
// 				title: title,
// 				address: address,
// 				city: city,
// 				form_type: activeElementValue,
// 			},
// 			success: function (response) {
//         // console.log(response);
//         $("#loaddata").html(response);
//     },
//     error: function (res) {
//     	console.log(res);
//     },
// });
// 	}
// }

// add to favourite

// house
function addToFavourite(post_id) {
	$.ajax({
		url: window.add_to_favourite,
		method: "post",
		data: {
			post_id: post_id,
		},
		success: function (response) {
			console.log(response);
			$("#addToFvrtSuccess").addClass("show");
			setTimeout(function () {
				$("#addToFvrtSuccess").removeClass("show");
			}, 3000);
		},
		error: function (res) {
			console.log(res);
		},
	});
}

function addToLastVisit(post_id) {
	$.ajax({
		url: window.add_to_last_visit,
		method: "post",
		data: {
			post_id: post_id,
		},
		success: function (response) {
			console.log(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
}

// remove from favourite
function removeFromFavurite(post_id) {
	swal({
		title: "Delete From Favourite!",
		text: "Do you want to remove this product from your favourite list?",
		icon: "info",
		buttons: true,
		dangerMode: true,
	}).then((removeFvrt) => {
		if (removeFvrt) {
			$.ajax({
				url: window.remove_from_favourite,
				method: "post",
				data: {
					post_id: post_id,
				},
				success: function (response) {
					console.log(response);
					$("#loaddata").load(window.location.href + " #loaddata");
					swal(response, {
						icon: "success",
					});
				},
				error: function (res) {
					console.log(res);
				},
			});
		}
	});
}

function setThisPrice(type, amount, act_id, days) {
  // console.log(days);
  if (type == "prom") {
  	$("#prmPrice").text(amount);
  	$(".prom_pr_f").text(amount);
  	$(".promot_price").val(amount);
  	$(".promot_id").val(act_id);
  	$(".promot_days").val(days);
  } else if (type == "advrt") {
  	$("#adPrice").text(amount);
  	$(".ad_pr_f").text(amount);
  	$(".advert_price").val(amount);
  	$(".advert_id").val(act_id);
  	$(".advert_days").val(days);
  } else if (type == "package") {
  	$(".pack_price").text(amount);
  	$(".package_price").val(amount);
  	$(".package_id").val(act_id);
  }
  calculateTotalOrder();
}

function calculateTotalOrder() {
	var package_price = $(".package_price").val();
	var promot_price = $(".promot_price").val();
	var advert_price = $(".advert_price").val();

	var total = 0;
	$(".mark-price").each(function () {
		total += parseInt($(this).val());
	});
	$(".ttl_price").text(total);
	$(".ttl_price").val(total);

	var bl = $("#AcBal").val();

	if (bl >= total){
		$("#accBalance").removeClass('d-none');
	}else{
		$("#accBalance").addClass('d-none');
	}

}

function submitWithPayment() {
	var total_price = $("#totalPriceForPay").val();
	var promot_id = $(".promot_id").val();
	var advert_id = $(".advert_id").val();
	var package_id = $(".package_id").val();
	var promot_days = $(".promot_days").val();
	var advert_days = $(".advert_days").val();

	var payment_method = $(".radiob:checked").val();
	// if ($("#payMethod:checked").val) {
	// 	var payment_method = "stripe";
	// } else {
	// 	var payment_method = "paypal";
	// }
	$.ajax({
		url: window.insert_payment_information,
		method: "post",
		data: {
			total_price: total_price,
			payment_method: payment_method,
			promot_id: promot_id,
			advert_id: advert_id,
			package_id: package_id,
			promot_days: promot_days,
			advert_days: advert_days,
		},
		success: function (response) {
			console.log(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
}

function thisPaymentInfo(pay_id) {
	$("#paymentId").val(pay_id);
	$.ajax({
		url: window.this_payment_info,
		method: "post",
		data: {
			pay_id: pay_id,
		},
		success: function (response) {
      // console.log(response);
  },
  error: function (res) {
  	console.log(res);
  },
});
}

function adValidityUpdate() {
	console.log(345435);
	var pay_id = $("#paymentId").val();
	var total_price = $("#totalPriceForPay").val();
	var promot_days = $(".promot_days").val();
	var advert_days = $(".advert_days").val();
	$.ajax({
		url: window.update_ads_validity,
		method: "post",
		data: {
			pay_id: pay_id,
			total_price: total_price,
			promot_days: promot_days,
			advert_days: advert_days,
		},
		success: function (response) {
			console.log(response);
		},
		error: function (res) {
			console.log(res);
		},
	});
}

$(document).ready(function () {
	$(document).on("click", ".pop-rslt li", function (e) {
		var val = $(this).find("span").text();
		$(e.target).parents(".pop-body").find("input").val(val);
		$(e.target).parents(".pop-body").find(".pop-dctr").hide();
	});
});
$(document).click(function (e) {
	$(".pop-body").find(".pop-dctr").hide();

	if (
		$(e.target).parents(".pop-body").length != 0 &&
		$(e.target).parents(".pop-rslt").length == 0
		) {
		var id = $(e.target).parents(".pop-body").attr("ctm-id");

	$(".pop-body").find(".pop-dctr").hide();

	if (
		typeof $(".pop-body")
		.eq(id - 1)
		.find("input")
		.val() === "undefined" &&
		$(".pop-body")
		.eq(id - 1)
		.find("input")
		.val().length
		) {
		$(".pop-body")
	.eq(id - 1)
	.find(".pop-dctr")
	.show();
} else {
	$(".pop-body")
	.eq(id - 1)
	.find(".pop-dctr")
	.hide();
}
}
});

// filter realestate
$(document).on('click', '.filter-advertisement', function() {
	filterResVal();
});
// filter realestate
$(document).on('blur', '.filter-advertisement-blur', function() {
	filterResVal();
});
// filter realestate
$(document).on('change', '.filter-advertisement-change', function() {
	filterResVal();
});



function filterResVal(){
	let form_type = [], title = '', keyword = '',
	min_room = '',max_room = '',livingAreaMin = '',
	livingAreaMax = '',award = '',
	new_dev = '',price_min = '',price_max = '',water_dis = '',
	min_year = '',max_year = '',house_type = '',sqr_mtr_price_min = '',
	sqr_mtr_price_max = '',address = '',distance = '';
	$('.form-type-filter:checked').each(function(i){
		form_type[i] = $(this).val();
	});
	title = $('.title-filter').val();
	keyword = $('.keyword-filter').val();
	min_room = $('#roomMin').val();
	max_room = $('#roomMax').val();
	livingAreaMin = $('#LivibAreaMin').val();
	livingAreaMax = $('#LivibAreaMax').val();
	award = $('#award').val();
	new_dev = $('#neDevelopment').val();
	price_min = $('#priceMin').val();
	price_max = $('#priceMax').val();
	water_dis = $('#waterDistance').val();
	min_year = $('.min_year').val();
	max_year = $('.max_year').val();
	house_type = $('#houseType').val();
	sqr_mtr_price_min = $('.sqr_mtr_price_min').val();
	sqr_mtr_price_max = $('.sqr_mtr_price_max').val();
	address = $('.address-filter').val();
	distance = $('.distance-filter').val();

	$.ajax({
		url: window.filter_house_by_all_value,
		method: "post",
		data: {
			form_type: form_type,
			title: title,
			keyword: keyword,
			room_min: min_room,
			room_max: max_room,
			living_area_min: livingAreaMin,
			living_area_max: livingAreaMax,
			award: award,
			new_development: new_dev,
			price_min: price_min,
			price_max: price_max,
			water_distance: water_dis,
			min_year: min_year,
			max_year: max_year,
			house_type: house_type,
			per_sq_price_min: sqr_mtr_price_min,
			per_sq_price_max: sqr_mtr_price_max,
			address: address,
			distance: distance
		},
		success: function (response) {
			$("#loaddata").html('');
			$("#loaddata").html(response);
			reloadMarkers(map,false);
		},
		error: function (res) {
			console.log(res);
		},
	});
}


function serachTitle(e,value) {
	$(".loading").css({display:'block'});
	$(".doc_show").html('');
	if ($(e.target).val().length) {
		$(e.target).parents(".pop-body").find(".pop-dctr").show();
		var value = $(e.target).val();
	} else {
		$(e.target).parents(".pop-body").find(".pop-dctr").hide();
	}
	var city = $("#cityBox").val();
	var cat = $("#catBox").val();
	$.ajax({
		url: window.search_title,
		method: "post",
		data: {
			value: value,
			city: city,
			cat: cat,
		},
		success: function (response) {
			console.log(response);
			$(".doc_show").html(response);
			$(".loading").css({display:'none'});

		},
		error: function (res) {
			console.log(res);
		},
	});
}

function loadInfoPanel(value) {
	if (value == 1) {
		$("#companyInfo").removeClass("d-none");
		$("#gUserInfo").addClass("d-none");
		$("#dob").attr("required", false);
	} else if (value == 2) {
		$("#gUserInfo").removeClass("d-none");
		$("#companyInfo").addClass("d-none");
		$("#dob").attr("required", true);
	}
}


// notification
function removeThisNotification(id){
	$.ajax({
		url: window.remove_ad_from_notification,
		method: "post",
		data: {
			id:id
		},
		success: function (response) {
			// console.log(response);
		},
		error: function (res) {
			// console.log(res);
		},
	});
}

// remove cover
function removeCoverImg(e,img_id){
	swal({
		title: "Are You Sure?",
		text: "You are going to delete a cover image which is must to be updated",
		icon: "info",
		buttons: true,
		dangerMode: true,
	}).then((removeCvr) => {
		if (removeCvr) {
			$(e.target).parent(".pip").remove();
			$("#cover").addClass('required');
			$.ajax({
				url: window.remove_cover_img,
				method: "post",
				data: {
					img_id: img_id,
				},
				success: function (response) {
					swal('cover has been removed successfully; Please add a new cover photo.', {
						icon: "success",
					});
				},
				error: function (res) {
					console.log(res);
				},
			});
		}
	});
}
// remove alt image
function removeAltImg(e,img_id){
	swal({
		title: "Are You Sure?",
		text: "You want to remove one of advertisement image!",
		icon: "info",
		buttons: true,
		dangerMode: true,
	}).then((removeAlt) => {
		if (removeAlt) {
			$(e.target).parent(".pip").remove();
			$.ajax({
				url: window.remove_alt_img,
				method: "post",
				data: {
					img_id: img_id,
				},
				success: function (response) {
					swal('Image has been removed successfully.', {
						icon: "success",
					});
				},
				error: function (res) {
					console.log(res);
				},
			});
		}
	});
}

function removeCvrPip(){
	$('#cvrPip').remove();
}

function removeMyPost(post_id){
	swal({
		title: "Delete Item!",
		text: "Do you want to remove this advertizment?",
		icon: "info",
		buttons: true,
		dangerMode: true,
	})
	.then((removePost) => {
		if (removePost) {
			$.ajax({
				url: window.delete_my_post,
				method: 'post',
				data: {
					post_id: post_id
				},
				success: function(response){
					console.log(response);
						// $( "#userSidebar" ).load(window.location.href + " #userSidebar");
						$( "#returnData" ).load(window.location.href + " #returnData");
						swal(response, {
							icon: "success",
						});
					},
					error: function(res){
						console.log(res);
					}
				});
		}
	});
}

// developent related js
