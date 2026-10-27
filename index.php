<?php 
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5" style="max-width: 500px;">
        <form action="controllers/ContactController.php" method="POST" class="bg-white border rounded p-4 shadow-sm">
            <h3 class="mb-4 text-center">Contact Us</h3>

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" 
                       class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                       value="<?= htmlspecialchars($old['name'] ?? '') ?>" 
                       placeholder="Enter your name">
                <?php if (isset($errors['name'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['name'][0] ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" 
                       class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                       value="<?= htmlspecialchars($old['email'] ?? '') ?>" 
                       placeholder="Enter your email">
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['email'][0] ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Phone Field -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" name="phone" id="phone" 
                       class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" 
                       value="<?= htmlspecialchars($old['phone'] ?? '') ?>" 
                       placeholder="Enter your phone number">
                <?php if (isset($errors['phone'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['phone'][0] ?>
                    </div>
                <?php endif; ?>
            </div>  

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" 
                       class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                       placeholder="Enter password">
                <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['password'][0] ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success">Send</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>