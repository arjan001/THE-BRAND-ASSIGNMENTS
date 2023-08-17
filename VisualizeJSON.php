<!DOCTYPE html>
<html>

<head>
    <title>JSON Visualization</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <?php


    $url = "https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView";
    $jsonData = file_get_contents($url);

    $data = json_decode($jsonData, true);

    if ($data && isset($data['category']) && isset($data['posts'])) {


        $category = $data['category'];
        $posts = $data['posts'];

        echo '<div class="container mt-4">';
        echo '<h1 class="mb-4">Category: ' . $category['name'] . '</h1>';

        foreach ($posts as $post) {
            echo '<div class="card mb-4">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title">' . $post['title'] . '</h2>';
            echo '<p class="card-text"><strong>Keywords:</strong> ' . $post['keywords'] . '</p>';
            echo '<p class="card-text"><strong>Created at:</strong> ' . $post['created_at'] . '</p>';
            echo '<p class="card-text"><strong>Category:</strong> ' . $post['category_name'] . '</p>';


            // Display the images using the provided image URLs
            $imageDefault = $post['image_default'];
            if (!empty($imageDefault)) {
                echo '<img src="https://www.thebrand.ai/i/' . $imageDefault . '" alt="Image" class="img-fluid">';
            }

            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p style="color: red;">Invalid JSON data.</p>';
    }


    
    ?>

    <!-- Include Bootstrap JS and jQuery (required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>