<?php 
	include_once('connessione.php');
    
    $Nome = $_POST["Nome"];
    $Cognome = $_POST["Cognome"];
    $COD = $_POST["COD"];
    $luogo = $_POST["luogo"];
    $data = $_POST["data"];
   
    $sql = "SELECT *
            From Autore
            Where Nome LIKE '%$Nome%' AND Cognome LIKE '%$Cognome%' AND CodiceFiscale LIKE '%$COD%' AND LuogoNascita LIKE '%$luogo%' AND DataNascita LIKE '%$data%';";

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
		<title>Ricerca Autori</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
    </head>

    <body>

        <h1>Autori</h1>

        <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Codice fiscale</th>
                <th>Luogo nascita</th>
                <th>Data nascita</th>
            </tr>
        </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($autori)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["Nome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["Cognome"]); ?></td>
                        <td><?php echo htmlspecialchars($row["CodiceFiscale"]); ?></td>
                        <td><?php echo htmlspecialchars($row["DataNascita"]); ?></td>
                        <td><?php echo htmlspecialchars($row["LuogoNascita"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <form action="index.php" method="get">
            <button type="submit">Home</button>
        </form>

    </body>

</html>