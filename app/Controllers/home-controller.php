<?php
$limit = 5;
$currentPage = (!empty($_GET["page"])) ? intval($_GET["page"]) : 1;
$offset = (($currentPage - 1) * $limit);
$data = mysqli_fetch_all(getALLBlogPosts($limit, $offset), MYSQLI_ASSOC);



function formatDate($data)
{
    foreach ($data as &$post) {
        $post["date"] = date("F d, Y", strtotime($post["date"]));
    }
    return $data;
}

$data = formatDate($data);

$pageCount = ceil(getBlogPostsCount() / $limit);
if ($currentPage > $pageCount){
    exit();
}

