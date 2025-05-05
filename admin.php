<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true ||
!isset($_SESSION["login_time"]) || time() - $_SESSION["login_time"] > 300
) {
session_unset();
session_destroy();
header("Location: login.php");
exit;
}
if (isset($_GET['sid'], $_GET['delete'],) && 
    !empty($_GET['sid']) && 
    is_numeric($_GET['sid']) && 
    $_GET['delete'] === 'true')
    {
    $id = (int)$_GET['sid'];
    $sql = "DELETE FROM feedback WHERE id=$id";
    if ($db->dbQuery($sql)) {
        echo "<div class='alert alert-success'>Kommentaar kustutatud!</div>";
    } else {
        echo "<div class='aler alert-danger'>Kommentaari ei saanud kustutada!</div>";
    }
}

$sql = "SELECT id, name, email, message, DATE_FORMAT(added, '%d.%m.%Y %H:%i:%s') as adding FROM feedback ORDER BY added DESC";
$data = $db->dbGetArray($sql);
//$db->show($data); //TEST!

// CSV lugemine
//
//$rows = [];
//if (file_exists("feedback.csv")) {
    //$lines = file("feedback.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    //foreach ($lines as $line) {
        //$fields = explode(";", $line);
        //if (count($fields) >= 4) {
            //$rows[] = $fields;
        //}
    //}
//}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Tagasiside haldus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Laekunud tagasiside</h2>
        <div class="d-flex justify-content-end align-items-center mb-3">
            

            <a href="index.php" class="btn btn-outline-success me-1">Avaleht</a>
            <a href="logout.php" class="btn btn-outline-danger">Logi välja</a>
        </div>
        <?php if ($data !== false): ?>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Aeg</th>
                        <th>Nimi</th>
                        <th>E-post</th>
                        <th>Sõnum</th>
                        <th>Kustuta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($x = 0; $x < count($data); $x++) { ?>
                        <tr>
                        <td><?= $data[$x]['adding']; ?></td>
                        <td><?= $data[$x]['name']; ?></td>
                        <td><?= $data[$x]['email']; ?></td>
                        <td><?= $data[$x]['message']; ?></td>
                        <td class="text-center">
                                    <a href="?page=admin&sid=<?= $data[$x]['id'] ?>&delete=true" onclick="return confirm('Kas oled kindel, et soovid kustada?');" class="text-danger" title="Kustuta kommentaar">Kustuta</a>
                                </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted">Tagasisidet ei ole veel saabunud.</p>
        <?php endif; ?>
    </div>
</body>
</html>
