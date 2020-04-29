<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('contact.json');
    $all = json_decode($all, true);
    $jsonfile = $all["Call"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["Call"][$id]);
        $all["Call"] = array_values($all["Call"]);
        file_put_contents("contact.json", json_encode($all));
    }
    header("Location: list.php");
}
?>
