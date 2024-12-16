<?php
$storyTitle = "Survival in the Desert";
$pageTitle = "Desert Story";

$storyData = [
    "start" => [
        "text" => "In the blazing heat of the desert, a group of travelers found themselves lost after their vehicle broke down. With water running low, they must make critical decisions to survive.",
        "choices" => [
            "Search for an oasis" => "oasis",
            "Stay and signal for help" => "signal"
        ]
    ],
    "oasis" => [
        "text" => "You decide to search for an oasis. The sun is merciless, and the sand dunes seem endless. Do you follow the tracks of animals or trust the map?",
        "choices" => [
            "Follow the tracks" => "find_oasis",
            "Trust the map" => "lost"
        ]
    ],
    "signal" => [
        "text" => "You stay near the vehicle and build a signal fire. As the hours pass, you can either keep the fire going or venture out to explore nearby.",
        "choices" => [
            "Keep the fire going" => "rescued",
            "Venture out" => "lost"
        ]
    ],
    "find_oasis" => [
        "text" => "Following the tracks leads you to a hidden oasis. There, you find fresh water and shade, enough to survive until help arrives. Congratulations, you made it!",
        "choices" => []
    ],
    "lost" => [
        "text" => "The harsh desert conditions prove too much. Without proper direction or resources, you succumb to the unforgiving heat. This marks the end of your journey.",
        "choices" => []
    ],
    "rescued" => [
        "text" => "Your signal fire catches the attention of a passing rescue team. They arrive just in time, saving you from the unforgiving desert. Congratulations, you made it!",
        "choices" => []
    ]
]; // <-- Missing semicolon added here

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
            background: linear-gradient(to right, #EE5A19, #EEC419);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            color: #4d2a0a;
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
            border: 2px solid #f2a96f;
            animation: fadeIn 2s ease;
        }

        h1 {
            text-align: center;
            color: #b34700;
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
            background: #EE5A19;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .choices a:hover {
            background: #b34700;
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
