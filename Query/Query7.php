<?php 
	include_once('connessione.php');
    
    $Nome = $_POST["Nome"];
    $Cognome = $_POST["Cognome"];

    $sql = "SELECT Matricola
            FROM Utente
            WHERE  Nome = '$Nome' AND Cognome = '$Cognome'";
    $tmp = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($tmp);
    $MAT = $row["Matricola"];

    if($MAT == NULL){
        echo "L'utente non ha prestit";
    }

    $sql = "SELECT *
            From Prestito
            where Matricola = '$MAT'";

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
		<title>Ricerca autore</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Prestit di <?php echo "$Nome $Cognome"; ?></h1>

        <table>
        <thead>
            <tr>
                <th>CodLibro</th>
                <th>ID</th>
                <th>Matricola</th>
                <th>DataUscita</th>
                <th>DataScadenza</th>
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