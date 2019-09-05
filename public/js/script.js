
$(document).ready(function(){
    $("input#nick").on("input", function(){
        $nick = ($(this).val());

        if ( $nick.length < 3 && $nick.length != 0 )
		{
			$('button#submit').attr("disabled", "true");
			$errormsg = '"Nick" musi zawierać minimum 3 znaki'
			$('span.error').css('opacity', '1');
			$('span.error').text($errormsg);
		} else 
		{
			$isValid = /^[A-Za-z0-9]{3,}$/.test($nick);
			if (!$isValid && $nick.length != 0 ) {
				$('button#submit').attr("disabled", "true");
				$errormsg = '"Nick" musi być bez znaków specjalnych';
				$('span.error').css('opacity', '1');
				$('span.error').text($errormsg);
			} else {
				$errormsg = '';
				$('span.error').css('opacity', '0');
				$('span.error').text($errormsg);
				$('button#submit').removeAttr("disabled");
			}
		};
	});

});



function timer(){

    var sec = 0;
    function pad ( val ) { return val > 9 ? val : "0" + val; }
    intervalID = setInterval( function(){
        document.getElementById("seconds").innerHTML=pad(++sec%60);
        document.getElementById("minutes").innerHTML=pad(parseInt(sec/60,10));
    }, 1000);
   
    //clearInterval(intervalID); //stop the timer  
};

timer();

$i = 1; //first found object
$('.divImg').click(function( i ) {

	$('span#currentDifferences').text($i++);
	$current = $('span#currentDifferences').text();
	$current = parseInt($current);
	if ( $current === 5 )
	{
		clearInterval(intervalID);
		$min =  $('span#minutes').text();
		$sec =  $('span#seconds').text();
		$('input#usersTime').val($min + ':' + $sec); //save time 

		$('.modal').css('display','block');
	
	}

});