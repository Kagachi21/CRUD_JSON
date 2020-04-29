<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('posting.json');
    $all = json_decode($all, true);
    $jsonfile = $all["Anime"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["Anime"][$id]);
        $all["Anime"] = array_values($all["Anime"]);
        file_put_contents("posting.json", json_encode($all));
    }
    header("Location: index.php");
}
?>
