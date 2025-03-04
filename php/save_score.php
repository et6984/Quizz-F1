<?php
session_start();

$_SESSION["score"] = $_SESSION["score"] + $_GET["point"];

$host = "localhost";
$db = "quizz";
$user = "quiz";
$pass = "password";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt3 = $pdo->prepare("UPDATE utilisateurs SET der_score = :score WHERE nom = :nom");
    $stmt3->bindParam(':score', $_SESSION['score']);
    $stmt3->bindParam(':nom', $_SESSION['utilisateur']);
    $stmt3->execute();

    $info = $stmt3->fetch(PDO::FETCH_ASSOC);

    $stmt4 = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom = :nom");
    $stmt4->bindParam(':nom', $_SESSION['utilisateur']);
    $stmt4->execute();

    $test_score = $stmt4->fetch(PDO::FETCH_ASSOC);

    if ($_SESSION['score'] > $test_score['meilleur_score']) {
        $stmt5 = $pdo->prepare("UPDATE utilisateurs SET meilleur_score = :score WHERE nom = :nom");
        $stmt5->bindParam(':score', $_SESSION['score']);
        $stmt5->bindParam(':nom', $_SESSION['utilisateur']);
        $stmt5->execute();
    }
}
catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>