<?php
$storyTitle = "Survival in Antarctica";
$pageTitle = "Antarctica Story";

$storyData = [
    "start" => [
        "text" => "In the harsh, icy wilderness of Antarctica, a team of scientists found themselves stranded after a fierce snowstorm wiped out their communication equipment. You must decide how to survive.",
        "choices" => [
            "Build a snow shelter" => "shelter",
            "Search for a nearby research station" => "station"
        ]
    ],
    "shelter" => [
        "text" => "Using makeshift tools, you begin constructing a snow shelter. The wind is howling, and your fingers are numb. You can either continue building or take a break to conserve energy.",
        "choices" => [
            "Continue building" => "complete_shelter",
            "Take a break" => "rest"
        ]
    ],
    "station" => [
        "text" => "You decide to venture out in search of a nearby research station. The snow is deep, and visibility is poor. Do you follow the map or trust your instincts?",
        "choices" => [
            "Follow the map" => "find_station",
            "Trust your instincts" => "lost"
        ]
    ],
    "complete_shelter" => [
        "text" => "You complete the snow shelter just in time to escape the storm. As night falls, you are safe for now. Survival is uncertain, but hope remains.",
        "choices" => []
    ],
    "rest" => [
        "text" => "Exhaustion takes its toll. As you rest, the storm intensifies. Unfortunately, you are unable to complete the shelter in time. This marks the end of your journey.",
        "choices" => []
    ],
    "find_station" => [
        "text" => "Following the map, you stumble upon an abandoned research station. It provides shelter and resources to survive until rescue arrives. Congratulations, you made it!",
        "choices" => []
    ],
    "lost" => [
        "text" => "Trusting your instincts leads you deeper into the wilderness. The harsh conditions prove too much, and you succumb to the cold. This marks the end of your journey.",
        "choices" => []
    ]
];

$currentStage = $_GET['stage'] ?? 'start';
$stageData = $storyData[$currentStage];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #19EED2, #19D9EE);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            color: #10394a;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            border: 2px solid #a3e8e0;
            animation: fadeIn 2s ease;
        }

        h1 {
            text-align: center;
            color: #0b7485;
            animation: slideIn 1.5s ease;
        }

        p {
            text-indent: 50px;
        }

        .choices {
            margin-top: 20px;
        }

        .choices a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #19d9ee;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .choices a:hover {
            background: #0b7485;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $storyTitle; ?></h1>
        <p><?php echo $stageData['text']; ?></p>

        <?php if (!empty($stageData['choices'])): ?>
            <div class="choices">
                <?php foreach ($stageData['choices'] as $choiceText => $nextStage): ?>
                    <a href="?stage=<?php echo $nextStage; ?>"><?php echo $choiceText; ?></a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>The End.</p>
        <?php endif; ?>
    </div>
</body>
</html>
