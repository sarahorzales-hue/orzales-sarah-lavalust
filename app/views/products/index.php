<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #000000;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        a {
            color: #000000;
            text-decoration: none;
        }

        .button {
            display: inline-block;
            padding: 9px 14px;
            border: 1px solid #000000;
            font-size: 14px;
        }

        .button:hover {
            background: #000000;
            color: #ffffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 30px;
            border: 1px solid #000000;
        }

        .delete {
            margin-left: 8px;
        }

        @media (max-width: 700px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 7px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>Products</h1>

        <div class="actions">
            <a href="<?= base_url('products/create'); ?>" class="button">
                Add Product
            </a>

            <a href="<?= base_url('logout'); ?>" class="button">
                Logout
            </a>
        </div>

    </div>

    <?php if (!empty($products)): ?>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($products as $product): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($product['id'] ?? ''); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($product['product_name'] ?? ''); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($product['description'] ?? ''); ?>
                        </td>

                        <td>
                            ₱<?= number_format((float)($product['price'] ?? 0), 2); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($product['quantity'] ?? ''); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($product['created_at'] ?? ''); ?>
                        </td>

                        <td>
                            <a
                                href="<?= base_url('products/edit/' . $product['id']); ?>"
                                class="button"
                            >
                                Edit
                            </a>

                            <a
                                href="<?= base_url('products/delete/' . $product['id']); ?>"
                                class="button delete"
                                onclick="return confirm('Are you sure you want to delete this product?');"
                            >
                                Delete
                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php else: ?>

        <div class="empty">
            No products found.
        </div>

    <?php endif; ?>

</div>

</body>
</html>