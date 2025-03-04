<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quizz Formule 1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <form method="POST">
        <div id="accueil">
            <h2>Quizz Formule 1</h2>
            <input type="text" class="name" name="utilisateur" placeholder="nom utilisateur"></input>
            <input type="submit" class="changement" name="start" value="Jouer"></input>
            <?php
            session_start();

            $_SESSION['score'] = 0;

            $host = "localhost";
            $db = "quizz";
            $user = "quiz";
            $pass = "password";

            if(isset($_POST['start']) && !empty($_POST['utilisateur'])) {
                $name = trim(htmlspecialchars($_POST['utilisateur']));
                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom = :name");
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->execute();

                    $row = $stmt->fetch();
                    
                    if(!$row) {
                        $stmt2 = $pdo->prepare("INSERT INTO utilisateurs (nom) VALUES (:name)");
                        $stmt2->bindParam(':name', $name, PDO::PARAM_STR);
                        $stmt2->execute();
                    }

                    $_SESSION['utilisateur'] = $name;

                    header("Location: quizz.php");
                    exit();
                } catch (PDOException $e) {
                    die("Erreur : " . $e->getMessage());
                }
            }
            ?>
        </div>
    </form>
</body>
</html>