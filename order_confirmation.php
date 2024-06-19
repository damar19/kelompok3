<?php
session_start();

// Periksa apakah ada data pesanan
if (!isset($_SESSION['order'])) {
    header("Location: checkout.php");
    exit;
}

$order = $_SESSION['order'];

require 'app/Conn.php';
$number = $db->query('SELECT no_wa FROM settings WHERE id = 1')->fetchAll()[0]['no_wa'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            background-color: #ffffff;
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }

        .billing-details p {
            margin-bottom: 5px;
        }

        .order-details {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-details h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
        }

        .table {
            margin-bottom: 0;
        }

        .pro-thumbnail img {
            max-width: 100px;
            height: auto;
        }

        .pro-title {
            width: 30%;
        }

        .pro-price,
        .pro-quantity,
        .pro-subtotal {
            width: 15%;
        }

        .order-total ul {
            list-style-type: none;
            padding: 0;
        }

        .order-total li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .confirmation-message {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation-message p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .confirmation-message a {
            display: inline-block;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg');
            background-size: contain;
            background-repeat: no-repeat;
            width: 32px;
            height: 32px;
            line-height: 32px;
            text-indent: -9999px;
            margin-left: 10px;
            vertical-align: middle;
        }

        @media (max-width: 576px) {
            .pro-title {
                width: 40%;
            }

            .pro-price,
            .pro-quantity,
            .pro-subtotal {
                width: 20%;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">Order Confirmation</h3>
                <p class="text-center">Please review your order details below:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="order-details">
                    <h3>Order Details</h3>
                    <div class="billing-details">
                        <p><strong>First Name:</strong> <?php echo $order['first_name']; ?></p>
                        <p><strong>Last Name:</strong> <?php echo $order['last_name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
                        <p><strong>Address:</strong> <?php echo $order['address']; ?></p>
                        <p><strong>City:</strong> <?php echo $order['city']; ?></p>
                        <p><strong>Postal Code:</strong> <?php echo $order['postal_code']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
                        <?php if (!empty($order['notes'])) : ?>
                            <p><strong>Notes:</strong> <?php echo $order['notes']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="order-details">
                    <h3>Your Order</h3>
                    <div class="order-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0 ?>
                                <?php foreach ($order['cart'] as $item) : ?>
                                    <tr>
                                        <td class="pro-thumbnail"><img src="<?php echo $item['image']; ?>" alt="Product Image"></td>
                                        <td class="pro-title"><?php echo $item['name']; ?></td>
                                        <td class="pro-price"><?php echo 'Rp' . number_format($item['price']); ?></td>
                                        <td class="pro-quantity"><?php echo $item['quantity']; ?></td>
                                        <td class="pro-subtotal"><?php echo 'Rp' . number_format($item['price'] * $item['quantity']); ?></td>
                                    </tr>
                                    <?php $subtotal += $item['price'] * $item['quantity']; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="order-total">
                        <h3>Order Total</h3>
                        <ul>
                            <li><span class="left">Subtotal</span> <span class="right"><?php echo 'Rp' . number_format($subtotal); ?></span></li>
                            <li><span class="left">Shipping</span> <span class="right">Rp300.000</span></li>
                            <li><span class="left">Total</span> <span class="right"><?php echo 'Rp' . number_format($subtotal + 300000); ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="confirmation-message">
                    <p>Screenshot this page and send it to this WhatsApp number for payment:</p>
                    <a href="https://wa.me/<?= str_replace("08", "628", $number) ?>" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <p><strong><?= $number ?></strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>