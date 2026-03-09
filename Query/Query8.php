<?php 
	include_once('connessione.php');
    
    $DataIn = $_POST["DataIn"];
    $DataFin = $_POST["DataFin"];

    if($DataIn == NULL || $DataFin == NULL){
        $sql = "SELECT U.Nome, U.Cognome, P.*
                From (Prestito AS P JOIN Utente AS U ON P.Matricola=U.Matricola)
                where DataScadenza > CURDATE()";
    }else{
        $sql = "SELECT U.Nome, U.Cognome, P.*
                From (Prestito AS P JOIN Utente AS U ON P.Matricola=U.Matricola)
                where DataUscita >'$DataIn' AND DataUscita <'$DataFin'";
    }

    $query = mysqli_query($link,$sql);

    if(!$query){
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

    $prestiti = $query;

    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
		<title>Prestiti</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Prestiti</h1>

        <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Codice Libro</th>
                <th>ID</th>
                <th>Matricola</th>
                <th>Data Uscita</th>
                <th>Data Scadenza</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($prestiti)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["Nome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Cognome"]); ?></td>
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