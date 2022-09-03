// path: tupt-entrance/html/item.js
$(document).ready(function(){
    // refers to the input type radio in item.php and listens to click event
    $("input[type='radio']").click(function(){
        // get radio button value = by using selectors :checked and .val() to get value
        var radioValue = $("input[name='analytics']:checked").val();
        if(radioValue == "day"){
            $("#chart").empty();
            $("#chart2").empty();
            $('#chart').load('http://localhost/tupt-entrance/html/statistic/item-predict-day.php');
            // hides if year is not selected
            
        } else if(radioValue == "month"){
            $("#chart").empty();
            $("#chart2").empty();
            $('#chart').load('http://localhost/tupt-entrance/html/statistic/item-predict-month.php');
            
        } else if(radioValue == "year"){
            // the div years will show id year is selected
            $("#chart").empty();
            $("#chart2").empty();
            $('#chart').load('http://localhost/tupt-entrance/html/statistic/item-predict-year.php');
        }else {
            alert("Choose from the ff radio buttons");
        }
    });
});