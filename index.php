<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Send</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 form-container">
            <h2>Send a Mail</h2>
            <?php 
                // Display success or error message
                if (isset($_SESSION['message'])): 
                    $message = $_SESSION['message'];
                    $alertClass = $message['type'] === 'success' ? 'alert-success' : 'alert-danger';
            ?>
                <div class="alert <?= $alertClass; ?> alert-dismissible fade show" role="alert">
                    <?= $message['text']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['message']); // Clear message after displaying it
                endif; 
            ?>
            <form action="send_mail.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message:</label>
                    <textarea class="form-control" name="mesaj" id="exampleFormControlTextarea1" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-custom" name="send">Send</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb9WJzeFG5AaO5y1IY3g/x2hl2mTc8nYt9Zp6UfuIDoV2g9d5g" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cuBt8qgW6Q7EZZh5PZfFce5a7akj8tM8Y14O/8XtdX8GpXlAF7ikTy+38vYXxHk5" crossorigin="anonymous"></script>

</body>
</html>
