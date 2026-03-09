<?php 
	include_once('connessione.php');


    $sql = "SELECT  A.Nome, A.Cognome, COUNT(*) AS Libri
            From (Autore AS A JOIN Scrive AS S ON A.CodiceFiscale=S.CodiceFiscale)
            Group by A.CodiceFiscale";

    $query = mysqli_query($link,$sql);

    if(!$query){
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

    $autori = $query;

    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
		<title>Statistiche autore</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Statistiche</h1>

        <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Numero libri</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($autori)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["Nome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Cognome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Libri"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>

    </body>

</html>