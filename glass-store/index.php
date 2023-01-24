<?php


$prev = ($first_record - record_per_page >= 0) ? $first_record - record_per_page : 0;
$prev = $common . $prev;require_once "./vendor/autoload.php";
$pages = array("all", "details");
$page = (isset($_GET["view"]) && in_array($_GET["view"], $pages)) ? $_GET["view"] : 0;

$glass_id = (isset($_GET["id"]) && is_numeric($_GET["id"])) ? $_GET["id"] : 17;
$first_record = (isset($_GET["start"]) && is_numeric($_GET["start"]) && $_GET["start"] >= 0) ? $_GET["start"] : 0;
$common = "index.php?view=all&start=";
$next = $first_record + record_per_page;
$next = $common . $next;

try {

} catch (Exception $ex) {
    echo "no data";
}

if ($page === "details") {
    require_once "./views/details.php";
} else {
    require_once "./views/all.php";
}
