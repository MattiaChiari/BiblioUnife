<?php 
	include_once('connessione.php');
    
    $DataIn = $_POST["DataIn"];
    $DataFin = $_POST["DataFin"];

    if($DataIn == NULL || $DataFin == NULL){
        $sql = "SELECT ID AS IDSuccursale, COUNT(*) AS PrestitiEffettuati
                From Prestito
                Group by ID";
    }else{
        $sql = "SELECT ID AS IDSuccursale, COUNT(*) AS PrestitiEffettuati
                From Prestito
                where DataUscita >'$DataIn' AND DataUscita <'$DataFin'
                Group by ID";
    }

    $query = mysqli_query($link,$sql);

    if(!$query){
        echo "Si è verificato un errore: " . mysqli_error($link);
        exit;
    }

    $succursale = $query;

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
                <th>ID succursale</th>
                <th>Prestiti effetuati</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($succursale)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["IDSuccursale"]); ?></td>
                        <td><?php echo htmlspecialchars($row["PrestitiEffettuati"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>

    </body>

</html>