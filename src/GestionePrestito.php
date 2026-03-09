<?php 
	include_once('connessione.php');

    $azione = $_POST['azione2'];
    
    $COD = $_POST["COD"];
    $ID = $_POST["ID"];
    $Matricola = $_POST["Matricola"];
    $uscita = $_POST["uscita"];
    $dataUscita = DateTime::createFromFormat('Y-m-d', $uscita);
    $dataUscita->modify('+30 days');
    $scadenza = $dataUscita->format('Y-m-d');
    
    if ($azione === 'inserisci') {
        $sql = "INSERT INTO Prestito VALUES ('$COD','$ID','$Matricola','$uscita','$scadenza')";
        $query = mysqli_query($link,$sql);
        
        if(!$query){
            echo "Si è verificato un errore: " . mysqli_error($link);
            exit;
        }

        echo "Ho inserito il libro $COD e $ID";
    }elseif ($azione === 'cancella') {
        $sql = "DELETE FROM Prestito WHERE CodLibro = '$COD' AND ID = '$ID' AND Matricola = '$Matricola' AND DataUscita = '$uscita'";

        $query = mysqli_query($link,$sql);

        if(!$query){
            echo "Si è verificato un errore: " . mysqli_error($link);
            exit;
        }
        echo "Ho cancellato il libro $COD e $ID";
    }

    $prestiti = mysqli_query($link, "SELECT * FROM Prestito");

    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
		<title>Gestione prestito</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Prestiti Biblioteca</h1>

        <table>
        <thead>
            <tr>
                <th>Codice Libro</th>
                <th>ID Succursale</th>
                <th>Matricola</th>
                <th>Data uscita</th>
                <th>Data scadenza</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($prestiti)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["CodLibro"]); ?></td>
                        <td><?php echo htmlspecialchars($row["ID"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Matricola"]); ?></td>
                        <td><?php echo htmlspecialchars($row["DataUscita"]); ?></td>
                        <td><?php echo htmlspecialchars($row["DataScadenza"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>
    </body>

</html>