<?php
$host = "localhost";
$db = "quizz";
$user = "quiz";
$pass = "password";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM questions ORDER BY RAND() LIMIT 1");
    $stmt->execute();

    $questions = $stmt->fetch(PDO::FETCH_ASSOC);

    $choices = [
        $questions['choice1'],
        $questions['choice2'],
        $questions['choice3'],
        $questions['choice4']
    ];

    shuffle($choices);

    $reponse = [
        'question' => $questions['question'],
        'choices' => $choices,
        'correct' => $questions['correct']
    ];

    echo json_encode($reponse);

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>