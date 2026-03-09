<?php 

	// Connessione 
	$link = mysqli_connect("127.0.0.1", "INSERISCI_QUI_IL_TUO_USERNAME", "INSERISCI_QUI_LA_TUA_PASSWORD", "BiblioUnife");

	// Controllo se è avvenuta la connessione al database:
	if (!$link) { // if ($link == NULL)
		echo "Si è verificato un errore: Non riesco a collegarmi al database <br/>";
		echo "Codice errore: " . mysqli_connect_errno() . "<br/>";
		echo "Messaggio errore: " . mysqli_connect_error() . "<br/>";
		exit;
	}	

?>
