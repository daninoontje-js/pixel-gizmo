<?php

require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"], $_POST["score"])) {

    $username = trim($_POST["username"]);
    $score = (int) $_POST["score"];

    $stmt = $conn->prepare("
        INSERT INTO scores (username, score)
        VALUES (?, ?)
    ");

    $stmt->execute([$username, $score]);
    $conn->query("
    DELETE FROM scores
    WHERE id NOT IN (
        SELECT id
        FROM (
            SELECT id
            FROM scores
            ORDER BY score DESC
            LIMIT 10
        ) AS top10
    )
");

    exit;
}

$stmt = $conn->query("
    SELECT username, score
    FROM scores
    ORDER BY score DESC
    LIMIT 10
");

$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="css/home.css">
<div class="hoi">
    <h1>Welkom op PixelGizmo</h1>
    <p>Dit is de homepagina</p>
</div>


<div id="game">
    <h5>(Arrows to move)</h5>
    <div id="player"></div>
    <div id="obstacle"></div>
    <div id="obstacle2"></div>
    <div id="end">
        <h1>Game Over</h1>

        <h5>Score:</h5>
        <h5 id="tel">0</h5>

        <input
            type="text"
            id="username"
            placeholder="Vul je naam in"
            maxlength="50"
        >

        <button id="saveScoreButton">Score opslaan</button>

        <button onclick="location.reload()">Play Again</button>
    </div>
</div>

<h1>databse schema ofzo</h1>
<div id="leaderboard">
    <h1>🏆 Leaderboard</h1>

    <?php $plaats = 1; ?>

<?php foreach ($scores as $player): ?>

    <div>
        <?= $plaats . (" = ")?> <?= htmlspecialchars($player["username"]) ?> <?= $player["score"] ?>
    </div>

    <?php $plaats++; ?>

<?php endforeach; ?>

</div>

<script src="js/home.js"></script>