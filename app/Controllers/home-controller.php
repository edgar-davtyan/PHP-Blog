<?php
$data = mysqli_fetch_all(getALLBlogPosts());

function formatDate($data)
{
    foreach ($data as &$post) {
        $post["date"] = date("F d, Y", strtotime($post["date"]));
    }
    return $data;
}

$data = formatDate($data);
