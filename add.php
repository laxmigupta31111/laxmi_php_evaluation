<?php

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


include 'navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $iname = $_POST[' Item Name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category  = $_POST['category'];
    $user_id = $_SESSION['user_id'];

    // Image Upload Fix
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $uploadDir = __DIR__ . "/uploads/";

    // Auto create uploads folder if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $targetFile = $uploadDir . basename($image);

    if (move_uploaded_file($tmp, $targetFile)) {

        $stmt = $conn->prepare("INSERT INTO menu (iname, description, price, image, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $iname, $description, $price, $image, $user_id);

        if ($stmt->execute()) {
            echo "<script>alert('Menu Added Successfully'); window.location='view.php';</script>";
            exit();
        } else {
            echo "Database Insert Error!";
        }

    } else {
        echo "Image Upload Failed!";
    }
}
?>

<div class="container mt-4">
    <h2>Add Course</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Menu Name</label>
            <input type="text" name="iname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>price</label>
            <input type="text" name="price" class="form-control" required>
        </div>

         <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Menu Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Add Menu
        </button>

    </form>
</div>

</body>
</html>