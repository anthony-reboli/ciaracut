// PRESTATION
var btnPopupprestation = document.getElementById('btnPopupprestation');
var overlayprestation = document.getElementById('overlayprestation');
var btnCloseprestation = document.getElementById('btnCloseprestation');

btnPopupprestation.addEventListener("click" ,openModal);

btnCloseprestation.addEventListener("click" , closePopup);

	function openModal()
	{
		overlayprestation.style.display = "block";
	}

	function closePopup()
	{
		overlayprestation.style.display ="none";
	}
// fin de PRESTATION


// reservation
var btnPopupreservation = document.getElementById('btnPopupreservation');
var overlayreservation = document.getElementById('overlayreservation');
var btnClosereservation = document.getElementById('btnClosereservation');

btnPopupreservation.addEventListener("click" ,openModal2);

btnClosereservation.addEventListener("click" , closePopup2);

	function openModal2()
	{
		overlayreservation.style.display = "block";
	}

	function closePopup2()
	{
		overlayreservation.style.display ="none";
	}
// fin de reservation

