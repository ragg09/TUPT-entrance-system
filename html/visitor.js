// path: tupt-entrance/html/visitor.js
$(document).ready(function(){
	// refers to the input type radio in visitor.php and listens to click event
    $("input[type='radio']").click(function(){
    	// get radio button value = by using selectors :checked and .val() to get value
       	var radioValue = $("input[name='analytics']:checked").val();
        if(radioValue == "day"){
        	// if radio value is day do 
        	$('#chart').load('http://localhost/tupt-entrance/html/statistic/visitor-by-day.php');
        	// hides if year is not selected
        	$('#years').hide();
        } else if(radioValue == "month"){
        	$('#chart').load('http://localhost/tupt-entrance/html/statistic/visitor-by-month.php');
        	$('#years').hide();
        } else if(radioValue == "year"){
        	// the div years will show id year is selected
        	$('#years').show();
        	$('#years').load('http://localhost/tupt-entrance/html/statistic/visitor-by-year.php');
        }else {
        	alert("Choose from the ff radio buttons");
        }
	});
});