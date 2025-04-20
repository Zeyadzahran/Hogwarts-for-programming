<?php
$rootDir = dirname(dirname(__DIR__));
require_once $rootDir . "/user/userClass.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"])) {
    header("Location: /login?error=FailedOnUserProfile");
    exit();
}

$userId = $_SESSION["id"];

$getUser = new user();
$userData = $getUser->getuser($userId);

$wand = $getUser->getWand($userData["wand_id"]);

if (!$userData) {
    header("Location: /login?error=UserNotFound");
    exit();
}

$userPoints = $getUser->getStudentPoints($userId);
$totalUserPoints = $userPoints['totalMark'] ?? 0;
$housePointsData = $getUser->getHousePoints($userData["house_id"]);
$housePoints = $housePointsData['points'] ?? 0;
$pointsPercentage = min(100, ($totalUserPoints / 100) * 100);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/style.css">
    <title>Profile</title>
</head>

<body>
    <?php require_once $rootDir . "/user/navPar.php"; ?>
    <div class="profile-dashboard">
        <div class="profile-header">
            <div class="profile-avatar-container">
                <div class="avatar-circle" style="background-color: <?php echo getHouseColor($userData['house_name'] ?? ''); ?>">
                    <?php echo getInitials($userData['name']); ?>
                </div>
                <div class="points-display">
                    <div class="points-circle">
                        <svg class="points-circle-svg" viewBox="0 0 36 36">
                            <path class="points-circle-bg"
                                d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831" />
                            <path class="points-circle-fill"
                                stroke-dasharray="<?php echo $pointsPercentage; ?>, 100"
                                d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831" />
                        </svg>
                        <div class="points-circle-text">
                            <span><?php echo $totalUserPoints; ?></span>
                            <small>pts</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-title">
                <h1><?php echo htmlspecialchars($userData['name']); ?></h1>
                <p class="house-badge" style="background-color: <?php echo getHouseColor($userData['house_name'] ?? ''); ?>">
                    <?php echo htmlspecialchars($userData['house_name'] ?? "Not Assigned"); ?>
                </p>
                <br> <a href="/editProfile" class="setadmin">Edit Profile</a>
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-card house-<?php echo htmlspecialchars($userData['house_name'] ?? ''); ?>">
                <div class="card-body">
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo htmlspecialchars($userData['email']); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Wand:</span>
                        <span class="info-value"><?php echo htmlspecialchars($userData['wand_name'] ?? "Not Assigned"); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">House Points:</span>
                        <span class="info-value"><?php echo $housePoints; ?></span>
                    </div>
                </div>
            </div>

            <div class="wand-card">
                <h3>Wand Details</h3>
                <div class="wand-visual">
                    <?php
                    $wandWood = $wand['wood'] ?? 'Unknown';
                    $wandCore = $wand['core'] ?? 'Unknown';
                    ?>
                    <div class="wand-wood"><?php echo htmlspecialchars($wandWood); ?></div>
                    <div class="wand-core"><?php echo htmlspecialchars($wandCore); ?></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
function getInitials($name)
{
    $initials = '';
    $words = explode(' ', $name);
    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }
    return substr($initials, 0, 2);
}

function getHouseColor($house)
{
    $colors = [
        'Gryffindor' => '#ae0001',
        'Slytherin' => '#2a623d',
        'Ravenclaw' => '#222f5b',
        'Hufflepuff' => '#ecb939',
        'default' => '#5d5d5d'
    ];
    return $colors[$house] ?? $colors['default'];
}
?>