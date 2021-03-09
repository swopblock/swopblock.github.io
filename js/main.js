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
		xhttp.open("POST", "email.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("email=" + em);

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
	em.innerHTML = "<h2 style=\"color: white; padding-bottom: 12px;\">You're all signed up!</h2><h2>Look out for updates.</h2>";
}

