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

    if ($info['meilleur_score'] < $_SESSION['score']) {
        $stmt2 = $pdo->prepare("UPDATE utilisateurs SET meilleur_score = :score WHERE nom = :nom");
        $stmt2->bindParam(':score', $_SESSION['score']);
        $stmt2->bindParam(':nom', $_SESSION['utilisateur']);
        $stmt2->execute();
    }
}
catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>