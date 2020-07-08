<?php
function getALLBlogPosts()
{
    global $conn;
    $sql = "SELECT blog_posts.id `title`, `url`, `date`, `image`, LEFT(`text`, 100) AS 'text', categories.name 
FROM `blog_posts` JOIN `blog_posts_categories` 
ON blog_posts.id = blog_post_id 
JOIN categories 
ON category_id = categories.id";
    $res = mysqli_query($conn, $sql);
    return $res;
}
