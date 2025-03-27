<?php
require "adminClass.php";

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedOnUserProfile");
    exit();
}

$userId = $_SESSION["id"];

$getadmin = new admin();
$adminData =$getadmin->getuser($userId);

if (!$adminData) {
    header("Location: ../src/login.php?error=UserNotFound");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Profile</title>
</head>

<body>
    <?php require "navPar.php"; ?>
    <div class="profile-dashboard">
        <div class="profile-header">
            <div class="profile-avatar-container">
                <div class="avatar-circle" style="background-color: <?php echo getHouseColor($adminData['house_name'] ?? ''); ?>">
                    <?php echo getInitials($adminData['name']); ?>
                </div>
                

            </div>
            <div class="profile-title">
                <h1><?php echo htmlspecialchars($adminData['name']); ?></h1>
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-card house-<?php echo htmlspecialchars($adminData['house_name'] ?? ''); ?>">
                <div class="card-body">
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo htmlspecialchars($adminData['email']); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Wand:</span>
                        <span class="info-value"><?php echo htmlspecialchars($adminData['wand_name'] ?? "Not Assigned"); ?></span>
                    </div>
                   
                </div>
            </div>

            <div class="wand-card">
                <h3>Wand Details</h3>
                <div class="wand-visual">
                    <?php
                    $wandParts = explode(' - ', $adminData['wand_name'] ?? 'Unknown - Unknown');
                    $wandWood = $wandParts[0] ?? 'Unknown';
                    $wandCore = $wandParts[1] ?? 'Unknown';
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