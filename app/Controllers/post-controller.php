<?php
if (empty($_GET["url"])) {
    header("Location: ?p=home");
}
$data = mysqli_fetch_array(getBlogPost(strip_tags($_GET["url"])), MYSQLI_ASSOC);
var_dump($data);

function formatDate($data)
{
    $data["date"] = date("F d, Y", strtotime($data["date"]));
    return $data;
}

$data = formatDate($data);
