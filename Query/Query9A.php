<?php 
	include_once('connessione.php');
    
    $Anno = $_POST["Anno"];
   
    $sql = "SELECT COUNT(*) AS Num
            From Libro
            Where AnnoPubblicazione = '$Anno'";

    $query = mysqli_query($link,$sql);

    if(!$query){
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

    $anno = $query;

    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
		<title>Statistiche</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Statistiche</h1>

        <table>
        <thead>
            <tr>
                <th>Libri publicati</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($anno)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["Num"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>

    </body>

</html>