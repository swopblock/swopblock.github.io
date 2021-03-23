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
	dc.style.display = "block";
	em.innerHTML = "<img src=\"..\img\thumbs-up.jpg\"><h2 style=\"color: white; padding-bottom: 12px; padding-top:175px;\">Confirmation<br>on it's way!</h2>";
}

function fitImage()
{
	var img = document.getElementById("largeImg");
	var mImg = document.getElementById("mobileImg");
	
	var wImg = img.offsetWidth;
	var hImg = wImg * 0.2771;
	
	console.log(wImg);
	console.log(Math.floor(hImg) + "px !important");
	
	//img.width = wImg;
	img.style.height = Math.floor(hImg) + "px";
	
	var wMg = mImg.offsetWidth;
	var hMg = wMg * 0.881;
	
	mImg.style.height = Math.floor(hMg) + "px";
	//img.width = wMg;
}

