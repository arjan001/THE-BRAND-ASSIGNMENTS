<!DOCTYPE html>
<html>
<head>
    <title>THE BRAND JSON VISUALIZATION</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .post {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .post h2 {
            font-size: 20px;
            margin: 0 0 10px;
        }

        .post p {
            margin: 5px 0;
        }

        .post img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php
$url = "https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView";
$jsonData = file_get_contents($url);

$data = json_decode($jsonData, true);

if ($data && isset($data['category']) && isset($data['posts'])) {
    $category = $data['category'];
    $posts = $data['posts'];

    echo '<h1>Category: ' . $category['name'] . '</h1>';
    
    foreach ($posts as $post) {
        echo '<div class="post">';
        echo '<h2>' . $post['title'] . '</h2>';
        echo '<p><strong>Keywords:</strong> ' . $post['keywords'] . '</p>';
        echo '<p><strong>Created at:</strong> ' . $post['created_at'] . '</p>';
        echo '<p><strong>Category:</strong> ' . $post['category_name'] . '</p>';
        
        // Display the images using the provided image URLs
        $imageDefault = $post['image_default'];
        if (!empty($imageDefault)) {
            echo '<img src="https://www.thebrand.ai/i/' . $imageDefault . '" alt="Image">';
        }
        
        echo '</div>';
    }
} else {
    echo '<p style="color: red;">Invalid JSON data.</p>';
}
?>
</body>
</html>
