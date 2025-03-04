<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quizz Formule 1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?version=<?php echo filemtime('css/style.css');?>">
</head>
<body>
    <form method="POST">
        <div id="resultat">
            <?php
            session_start();

            if (!isset($_SESSION['utilisateur'])) {
                echo "Accès refusé. Veuillez vous connecter.";
                exit();
            }

            $nom_utilisateur = htmlspecialchars($_SESSION['utilisateur']);

            $host = "localhost";
            $db = "quizz";
            $user = "quiz";
            $pass = "password";

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom = :nom");
                $stmt->bindParam(':nom', $nom_utilisateur);
                $stmt->execute();

                $score = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erreur : " . $e->getMessage());
            }
            ?>
            <div id="global-classement">
                <div id="clasement-personnel">
                    <h2 class="titre">Score <?php echo $nom_utilisateur?></h2>
                    <p class="affiche_score">Dernière Score : <?php echo $score['der_score'];?></p>
                    <p class="affiche_score">Meilleur Score : <?php echo $score['meilleur_score'];?></p>
                </div>
                <div id="classement-generale">
                    <table class="tableau">
                        <h2 class="titre">Top 3</h2>
                    <?php
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $stmt1 = $pdo->prepare("SELECT nom, meilleur_score FROM utilisateurs ORDER BY meilleur_score DESC LIMIT 3;");
                        $stmt1->execute();

                        foreach($stmt1 as $row) {
                            echo "<tr><td class='nom'>" . $row['nom']."</td><td class='score'>".$row['meilleur_score']."</td></tr>";
                        }
                    } catch (PDOException $e) {
                        die("Erreur : " . $e->getMessage());
                    }
                    ?>
                    </table>
                </div>
            </div>
            <div id="actions">
                <a class="changement" href="quizz.php">Jouer</a>
                <a class="changement" href="index.php">Quitter</a>
            </div>
        </div>
    </form>
</body>
</html>