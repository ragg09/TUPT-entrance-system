$(document).ready(function(){
	$("#burger1").hide();
	$(".header").hide();
	$(".b-left").hide();
	$(".body").css("height","95%");
	$(".b-right").css("width","98.9%");
	  $("#burger2").click(function(){
	    $(".header").show(200);
	    $(".b-left").show(200);
	    //$(".body").css("height","83%");
	    //$(".b-right").css("width","82.5%");
	    $(".body").animate({height: "83%"}, 200);
	    $(".b-right").animate({width: "82.5%"}, 200);
	    $("#burger2").hide();
	    $("#burger1").show();
	  });
	  $("#burger1").click(function(){
	  	$(".header").hide(200);
		$(".b-left").hide(200);
		// $(".body").css("height","95%");
		// $(".b-right").css("width","98.9%");
		$(".body").animate({height: "95%"}, 150);
	    $(".b-right").animate({width: "98.9%"}, 200);
		$("#burger2").show();
		$("#burger1").hide();
	  });

	});