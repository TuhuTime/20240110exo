<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>
<body>

<h2>Calculatrice</h2>

<form method="post" action="">
    <label for="nombre1">Nombre 1 :</label>
    <input type="text" name="nombre1" required>
    <br>

    <label for="nombre2">Nombre 2 :</label>
    <input type="text" name="nombre2" required>
    <br>

    <label for="operation">Opération :</label>
    <select name="operation" required>
        <option value="addition">Addition</option>
        <option value="multiplication">Multiplication</option>
        <option value="soustraction">Soustraction</option>
        <option value="division">Division</option>
        <option value="puissance">Puissance</option>
    </select>
    <br>

    <input type="submit" value="Calculer">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs saisies par l'utilisateur
    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];
    $operation = $_POST["operation"];

    // Vérification si les saisies sont des nombres
    if (is_numeric($nombre1) && is_numeric($nombre2)) {
        // Calcul en fonction de l'opération choisie
        switch ($operation) {
            case "addition":
                $resultat = $nombre1 + $nombre2;
                break;
            case "multiplication":
                $resultat = $nombre1 * $nombre2;
                break;
            case "soustraction":
                $resultat = $nombre1 - $nombre2;
                break;
            case "division":
                if ($nombre2 != 0) {
                    $resultat = $nombre1 / $nombre2;
                } else {
                    echo "<p>Erreur : division par zéro.</p>";
                    break;
                }
                break;
            case "puissance":
                $resultat = pow($nombre1, $nombre2);
                break;
            default:
                echo "<p>Opération non reconnue.</p>";
                break;
        }

        // Affichage du résultat
        echo "<p>Résultat de l'opération : $resultat</p>";
    } else {
        // Affichage d'un message d'erreur si les saisies ne sont pas des nombres
        echo "<p>Veuillez saisir des nombres valides.</p>";
    }
}
?>

</body>
</html>

