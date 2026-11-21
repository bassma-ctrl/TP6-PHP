<?php
require_once "06-connexion.php";

$sql = "SELECT * FROM products WHERE price > 300";
$statement = $pdo->query($sql);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>

    <?php if (count($products) > 0): ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Stock</th>
                <th>Total</th>
            </tr>

            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product["name"]) ?></td>
                    <td><?= htmlspecialchars($product["price"]) ?> DH</td>
                    <td><?= htmlspecialchars($product["quantity"]) ?></td>
                    <td><?= $product["quantity"] > 0 ? "En stock" : "Rupture de stock" ?></td>
                    <td><?= $product["price"] * $product["quantity"] ?> DH</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun produit trouvé.</p>
    <?php endif; ?>
</body>
</html>