<?php 
	include_once('connessione.php');
    
    $azione = $_POST['azione'];

    if ($azione === 'inserisci') {
        $Matricola = $_POST["Matricola"];
        $Nome = $_POST["Nome"];
        $Cognome = $_POST["Cognome"];
        $Tel = $_POST["Telefono"];
        $Via = $_POST["Via"];
        $Civico = $_POST["Civico"];
        $Citta = $_POST["Citta"];
    
        $sql = "INSERT INTO Utente VALUES ('$Matricola','$Nome','$Cognome','$Tel','$Via','$Civico','$Citta')";
        $query = mysqli_query($link,$sql);
        if(!$query){
            echo "Si è verificato un errore: " . mysqli_error($link);
            exit;
        }

    }
    $utenti = mysqli_query($link, "SELECT * FROM Utente");

    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
		<title>Inserimento nuovo utente</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>
        <h1>Utenti Biblioteca</h1>

        <table>
        <thead>
            <tr>
                <th>Matricola</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Via</th>
                <th>Civico</th>
                <th>Città</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($utenti)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["Matricola"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Nome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Cognome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["NumTelefono"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Via"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Civico"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Citta"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>

    </body>

</html>