<?php 
	include_once('connessione.php');
    
    $Titolo = $_POST["Titolo"];
   
    $sql = "SELECT * FROM Libro WHERE Titolo LIKE '%$Titolo%'";

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
		<title>Ricerca Libri</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Libri</h1>

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