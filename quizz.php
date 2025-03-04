<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quizz Formule 1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?version=<?php echo filemtime('css/style.css');?>">
</head>
<body>
    <div id="quiz-container">
        <?php 
        session_start(); 

        if (!isset($_SESSION['utilisateur'])) {
            echo "Accès refusé. Veuillez vous connecter.";
            echo "<a href='index.php'>Retour</a>";
            exit();
        }

        $nom_utilisateur = htmlspecialchars($_SESSION['utilisateur']);
        $score_affiche = $_SESSION['score'];
        ?>

        <div id="utilisateur">
            <p id="nom">Joueur : <?php echo $nom_utilisateur ?></p>
        </div>
        <h2 id="question">Questions ici</h2>
        <div id="choices">
            <button class="choice">Choix 1</button>
            <button class="choice">Choix 2</button>
            <button class="choice">Choix 3</button>
            <button class="choice">Choix 4</button>
        </div>
            <form id="scoreForm" method="POST" action="php/save_score.php">
                <div id="actions">
                    <a class="changement" id="quitter" href="index.php">Quitter</a>
                    <a class="changement" id="socre" href="results.php">Score</a>
                </div>
                <div id="time-score">
                    <p id="timer">Temps restant : 30s</p>
                    <p id="score"><?php echo "Score : " . $score_affiche;?></p>
            </div>
            </form>
        </div> 
    </div>
    <script src="js/script.js?version=<?php echo filemtime('js/script.js');?>"></script>
</body>
</html>