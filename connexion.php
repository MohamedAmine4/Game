<?php
session_start();



if (isset($_POST['pseudo']) && isset($_POST['nombre'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['nombre'])) {

        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = 0;
        }
        if (!isset($_SESSION['nombreAleatoire1'])) {
          $_SESSION['nombreAleatoire1'] =rand(0, 3);
      }
      $nombreAleatoire = $_SESSION['nombreAleatoire1'];
        $count = $_SESSION['count'];
        $number = $_POST["nombre"];
        $nom = $_POST["pseudo"];
 echo  $nombreAleatoire;
        if ($number < $nombreAleatoire) {
            echo "  plus petit !";
            $count++;
        } else if ($number > $nombreAleatoire) {
            $count++;
            echo "plus grand !";
        } else {
            echo "Bravo " . $nom . " Vous avez trouvé le nombre en " . $count . " coups !";

            // Détruire la session une fois le résultat trouvé
            session_destroy();
            exit; // Arrêter l'exécution du script après la destruction de la session
        }

        $_SESSION['count'] = $count; // Mettez à jour la valeur de la session
    }
}
?>
