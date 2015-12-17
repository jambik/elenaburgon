$(function(){
	if($("#countdown").length > 0)
	{
		var note = $('#note'),
		ts = new Date(2012, 0, 1),
		newYear = true;
	
		if((new Date()) > ts){
			// The new year is here! Count towards something else.
			// Notice the *1000 at the end - time must be in milliseconds
			ts = (new Date()).getTime() + 10*24*60*60*1000;
			newYear = false;
		}
		
		$('#countdown').countdown({
			timestamp	: ts,
			callback	: function(days, hours, minutes, seconds){

				var message = "";

				//message += days + " day" + ( days==1 ? '':'s' ) + ", ";
				//message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
				//message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
				//message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";

				message +=  "Дней - " + days + ", ";
				message +=  " часов - " + hours + ", ";
				message +=  " минут - " + minutes + " и ";
				message +=  " секунд - " + seconds + " <br />"; 

				if(newYear){
					message += "до нового года!";
				}
				else {
					message += "осталось до окончания акции!";
				}

				note.html(message);
			}
		});
	}
	
});
