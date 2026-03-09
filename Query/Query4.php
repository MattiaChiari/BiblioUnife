<?php 
	include_once('connessione.php');
    
    $Nome = $_POST["Nome"];
    $Cognome = $_POST["Cognome"];

    $sql = "SELECT CodiceFiscale
            FROM Autore
            WHERE  Nome = '$Nome' AND Cognome = '$Cognome'";
    $tmp = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($tmp);
    $COD = $row["CodiceFiscale"];

    if($COD == NULL){
        echo "L'autore $Nome $Cognome non ha libri presenti in biblioteca";
    }

    $sql = "SELECT * 
            FROM Libro AS L JOIN Scrive AS S ON L.ISBN=S.ISBN
            WHERE  CodiceFiscale = '$COD'
            ORDER BY AnnoPubblicazione";

    $query = mysqli_query($link,$sql);

    if(!$query){
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

    $libri = $query;

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

        <h1>Libri di <?php echo "$Nome $Cognome"; ?></h1>

        <table>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Titolo</th>
                <th>Anno Pubblicazione</th>
                <th>Lingua</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($libri)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["ISBN"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Titolo"]); ?></td>
                        <td><?php echo htmlspecialchars($row["AnnoPubblicazione"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Lingua"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>

    </body>

</html>