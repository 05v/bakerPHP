<?php
require_once("../../source/db_connect.php");

$slug = $_GET['slug'];

$stmt = $conn->prepare("SELECT * FROM products WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['title']); ?></title>
    <link rel="stylesheet" href="/assets/style/style.css">
    <script src="/assets/javascript/main.js" defer></script>
</head>

<body>

    <section class="productpage">
        <p class="productpage__title"><?php echo htmlspecialchars($product['title']); ?></p>
        <p class="productpage__intro"><?php echo htmlspecialchars($product['intro']); ?></p>
        <img src="/assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="Image of <?php echo htmlspecialchars($product['title']); ?>" class="productpage__image">
        <ul class="productpage__ingredients">
            <?php $ingredients = explode(',', $product['ingredients']);
            foreach ($ingredients as $ingredient) : ?>
                <li class="productpage__ingredient"><?php echo htmlspecialchars(trim($ingredient)); ?></li>
            <?php endforeach; ?>
        </ul>
        <p class="productpage__description"><?php echo htmlspecialchars($product['description']); ?></p>
    </section>

</body>

</html>