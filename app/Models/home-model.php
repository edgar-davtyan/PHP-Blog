<?php
function getALLBlogPosts()
{
    global $conn;
    $sql = "SELECT blog_posts.id, `title`, `url`, `date`, `author`, `image`, LEFT(`text`, 400) AS 'text', GROUP_CONCAT(categories.id, ',' , categories.name SEPARATOR ',') AS 'category' FROM `blog_posts` JOIN `blog_posts_categories` ON blog_posts.id = blog_post_id JOIN categories ON category_id = categories.id";
    $ress = mysqli_query($conn, $sql);
    return $ress;
}
