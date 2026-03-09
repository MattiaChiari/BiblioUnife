<?php 
	include_once('connessione.php');

    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
		<title>Biblioteca Unife</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

        <style>

        </style>
    </head>
    <body>
        <!-- Query 2 e Query 6-->
        <h1>Utente</h1>
        <div class="container1">
		<form action="GestioneUtente.php" method="POST">
            <input type="hidden" name="azione" id="azione" value="">
			<fieldset>
				<label>Matricola:</label>
				<input type="text" name="Matricola">
			</fieldset>
            <fieldset>
				<label>Nome:</label>
				<input type="text" name="Nome">
			</fieldset>
			<fieldset>
				<label>Cognome:</label>
				<input type="text" name="Cognome">
			</fieldset>
			<fieldset>
				<label>Telefono:</label>
				<input type="number" name="Telefono">
			</fieldset>
			<fieldset>
				<label>Via:</label>
				<input type="text" name="Via">
			</fieldset>
            <fieldset>
				<label>Civico:</label>
				<input type="number" name="Civico">
			</fieldset>
            <fieldset>
				<label>Città:</label>
				<input type="text" name="Citta">
			</fieldset>
			<button type="submit" onclick="document.getElementById('azione').value='inserisci'">Inserisci</button>
	        <button type="submit" onclick="document.getElementById('azione').value='mostra'">Mostra Elenco</button>

		</form>
        </div>

        <!-- Query 1 -->
        <h1>Prestito</h1>
        <div class="container2">
		<form id="prestitoForm" method="POST" action="GestionePrestito.php">
            <input type="hidden" name="azione2" id="azione2" value="">
			<fieldset>
				<label>Codice Libro:</label>
				<input type="text" name="COD">
			</fieldset>
            <fieldset>
				<label>ID succursale:</label>
				<input type="text" name="ID">
			</fieldset>
			<fieldset>
				<label>Matricola:</label>
				<input type="text" name="Matricola">
			</fieldset>
			<fieldset>
				<label>Data uscita:</label>
				<input type="date" name="uscita">
			</fieldset>
			<button type="submit" onclick="document.getElementById('azione2').value='inserisci'">Inserisci</button>
	        <button type="submit" onclick="document.getElementById('azione2').value='cancella'">Cancella</button>
		</form>
        </div>

        <!-- Query 3 -->
        <h1>Ricerca Libri tramite titolo</h1>
        <div class="container3">
		<form action="Query3.php" method="POST">
            <fieldset>
				<label>Titolo:</label>
				<input type="text" name="Titolo">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

        <!-- Query 4 -->
        <h1>Ricerca libri tramite autore</h1>
        <div class="container4">
		<form action="Query4.php" method="POST">
            <fieldset>
				<label>Nome:</label>
				<input type="text" name="Nome">
			</fieldset>
            <fieldset>
				<label>Cognome:</label>
				<input type="text" name="Cognome">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

        <!-- Query 5-->
        <h1>Ricerca autori</h1>
        <div class="container5">
		<form action="Query5.php" method="POST">
            <fieldset>
				<label>Nome:</label>
				<input type="text" name="Nome">
			</fieldset>
            <fieldset>
				<label>Cognome:</label>
				<input type="text" name="Cognome">
			</fieldset>
			<fieldset>
				<label>Codice fiscale:</label>
				<input type="text" name="COD">
			</fieldset>
            <fieldset>
				<label>Luogo nascita:</label>
				<input type="text" name="luogo">
			</fieldset>
			<fieldset>
				<label>Data nascita:</label>
				<input type="date" name="data">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

        <!-- Query 7-->
        <h1>Storico prestiti di un utente</h1>
        <div class="container6">
		<form method="POST" action="Query7.php">
			<fieldset>
				<label>Nome:</label>
				<input type="text" name="Nome">
			</fieldset>
            <fieldset>
				<label>Cognome:</label>
				<input type="text" name="Cognome">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

		<!-- Query 8-->
        <h1>Prestiti in un range di date</h1>
		<p>(Se non inserisci date verranno mostrati i prestiti prossimi alla scandenza)</p>
        <div class="container7">
		<form action="Query8.php" method="POST">
			<fieldset>
				<label>Data inizio:</label>
				<input type="date" name="DataIn">
			</fieldset>
            <fieldset>
				<label>Data fine:</label>
				<input type="date" name="DataFin">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

		<!-- Query 9A-->
        <h1>Ricerca libri tramite anno</h1>
        <div class="container7">
		<form action="Query9A.php" method="POST">
			<fieldset>
				<label>Anno:</label>
				<input type="number" name="Anno">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

		<!-- Query 9B-->
        <h1>Ricerca prestiti per succursali</h1>
		<p>(Se non inserisci date verranno mostrate le statistiche per tutte le succursali)</p>

        <div class="container7">
		<form action="Query9B.php" method="POST">
			<fieldset>
				<label>Data inizio:</label>
				<input type="date" name="DataIn">
			</fieldset>
            <fieldset>
				<label>Data fine:</label>
				<input type="date" name="DataFin">
			</fieldset>
			<input type="submit" value="Cerca"/>
		</form>
        </div>

		<!-- Query 9C-->
        <h1>Numero libri per ogni autore</h1>
        <div class="container7">
		<form action="Query9C.php" method="POST">
			<input type="submit" value="Cerca"/>
		</form>
        </div>
    </body>
</html>
