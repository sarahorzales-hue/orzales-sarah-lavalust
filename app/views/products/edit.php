<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

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
            max-width: 600px;
            margin: 40px auto;
        }

        h1 {
            margin: 0 0 25px;
            font-size: 26px;
            font-weight: 600;
        }

        .errors {
            border: 1px solid #000000;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #000000;
            background: #ffffff;
            color: #000000;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .button {
            padding: 10px 16px;
            border: 1px solid #000000;
            background: #000000;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .button {
            background: #ffffff;
            color: #000000;
        }

        button:hover {
            background: #ffffff;
            color: #000000;
        }

        .button:hover {
            background: #000000;
            color: #ffffff;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Product</h1>

    <?php $LAVA = lava_instance(); ?>

    <?php if ($LAVA->form_validation->errors()): ?>
        <div class="errors">
            <?= $LAVA->form_validation->errors(); ?>
        </div>
    <?php endif; ?>

    <form
        method="POST"
        action="<?= base_url('products/edit/' . $product['id']); ?>"
    >

        <div class="field">

            <label for="product_name">
                Product Name
            </label>

            <input
                type="text"
                id="product_name"
                name="product_name"
                value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>"
                required
            >

        </div>

        <div class="field">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                required
            ><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>

        </div>

        <div class="field">

            <label for="price">
                Price
            </label>

            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                min="0"
                value="<?= htmlspecialchars($product['price'] ?? ''); ?>"
                required
            >

        </div>

        <div class="field">

            <label for="quantity">
                Quantity
            </label>

            <input
                type="number"
                id="quantity"
                name="quantity"
                min="0"
                value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>"
                required
            >

        </div>

        <div class="buttons">

            <button type="submit">
                Update Product
            </button>

            <a
                href="<?= base_url('products'); ?>"
                class="button"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

</body>
</html>