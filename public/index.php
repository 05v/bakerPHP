<?php
require_once("../source/db_connect.php");
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baking Products</title>
    <link rel="stylesheet" href="/assets/style/style.css">
    <script src="/assets/javascript/main.js" defer></script>
</head>

<body>
    <section class="products">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?><a href="/products/<?php echo $row["slug"]; ?>.php" class="product">
            <p class="product__title"><?php echo $row["title"]; ?></p>
            <p class="product__intro"><?php echo $row["intro"]; ?></p>
            <img src="/assets/images/<?php echo $row["image"]; ?>" alt="Image of <?php echo $row["title"]; ?>"
                class="product__image">
        </a>
        <?php
            }
        } else {
            echo "No products found!";
        }
        ?>
    </section>
</body>

</html>