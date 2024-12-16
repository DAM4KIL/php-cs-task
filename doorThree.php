<?php
$storyTitle = "Survival in the Forest";
$pageTitle = "Forest Story";

$storyData = [
    "start" => [
        "text" => "You find yourself lost deep in a lush forest. The trees are tall, and the sun barely peeks through the thick foliage. With no map and your phone dead, you must decide what to do.",
        "choices" => [
            "Follow the river" => "river",
            "Climb a tree to get a better view" => "climb_tree"
        ]
    ],
    "river" => [
        "text" => "You decide to follow the river, hoping it will lead you to civilization. The water is cool, but the path is rough. Do you continue downstream or try to find a way across?",
        "choices" => [
            "Continue downstream" => "find_clearing",
            "Cross the river" => "danger"
        ]
    ],
    "climb_tree" => [
        "text" => "You climb a tree to get a better view. From the top, you see a clearing in the distance. Do you climb down and head towards it or stay and wait for someone to find you?",
        "choices" => [
            "Head towards the clearing" => "find_clearing",
            "Stay in the tree" => "danger"
        ]
    ],
    "find_clearing" => [
        "text" => "You make your way toward the clearing and find a small campsite with a fire still burning. You decide to rest there for the night, and in the morning, you're rescued. Congratulations, you made it!",
        "choices" => []
    ],
    "danger" => [
        "text" => "While trying to cross the river or waiting in the tree, you encounter a dangerous wild animal. Despite your efforts to escape, it’s the end of your journey.",
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
            background: linear-gradient(to right, #40EE19, #19EE60);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            color: white;
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
            background: white; /* White background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            border: 2px solid #19EE60;
            animation: fadeIn 2s ease;
        }

        h1 {
            text-align: center;
            color: #000; 
            animation: slideIn 1.5s ease;
        }

        p {
            text-indent: 50px;
            color: black;
        }

        .choices {
            margin-top: 20px;
        }

        .choices a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #19EE60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .choices a:hover {
            background: #40EE19;
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
