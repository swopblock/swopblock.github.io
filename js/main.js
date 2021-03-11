/* =========================================
                Preloader
============================================ */
 $(window).on('load', function () { // makes sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
 });
 
 function PostMessage(id)
{
    var em = document.getElementById(id).value;
	
	try {
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "https://Swopblock.us1.list-manage.com/subscribe/post?u=2c41c6aff157499178b84b6de&amp;id=41b5fb3eb4", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("EMAIL=" + em);

		console.log(xhttp.responseText);
	}
	catch(err) {
		console.log(err.message);
	}
	
	ConfirmMessage();
}

function ConfirmMessage()
{
	var em = document.getElementById("confirmEmail");
	var dc = document.getElementById("displaychange");
	dc.style.Display = "none";
	em.innerHTML = "<h2 style=\"color: white; padding-bottom: 12px;\">Thank you!</h2>";
}

