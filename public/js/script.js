
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

function foundDiffer( differences ) {

	//alert($differences);

	$countDiff = $differences.length / 2;

	$('span#currentDifferences').text($countDiff);
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

};

function checkDifferences()
{
const areas = {
  'area.number1': 'bingo1',
  'area.number2': 'bingo2',
  'area.number3': 'bingo3',
  'area.number4': 'bingo4',
  'area.number5': 'bingo5',

  'area.number1-1': 'bingo1-1',
  'area.number2-1': 'bingo2-1',
  'area.number3-1': 'bingo3-1',
  'area.number4-1': 'bingo4-1',
  'area.number5-1': 'bingo5-1'
};

$differences = [];

const handleClick = function(text){

	if(text === 'bingo1' || text === 'bingo1-1'){
		if(!$differences.includes('bingo1'))
		{
		$differences.push('bingo1');
		$differences.push('bingo1-1');
		};
	}
	if(text === 'bingo2' || text === 'bingo2-1'){
		if(!$differences.includes('bingo2'))
		{
		$differences.push('bingo2');
		$differences.push('bingo2-1');
		};
	}
	if(text === 'bingo3' || text === 'bingo3-1'){
		if(!$differences.includes('bingo3'))
		{
		$differences.push('bingo3');
		$differences.push('bingo3-1');
		};
	}
	if(text === 'bingo4' || text === 'bingo4-1'){
		if(!$differences.includes('bingo4'))
		{
		$differences.push('bingo4');
		$differences.push('bingo4-1');
		}
	}
	if(text === 'bingo5' || text === 'bingo5-1'){
		if(!$differences.includes('bingo5'))
		{
		$differences.push('bingo5');
		$differences.push('bingo5-1');
		};
	};
	
	//alert($differences.length);
	foundDiffer($differences);

};

Object.entries(areas).forEach(([selector, text]) => {
  document.querySelector(selector).addEventListener('click', handleClick.bind(null, text), false);
});
};

checkDifferences();
