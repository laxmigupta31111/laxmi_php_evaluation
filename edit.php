<?php

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'navbar.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM menu WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $iname = $_POST['iname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];


    $stmt = $conn->prepare("UPDATE menu SET iname=?, description=?, price=? category=? WHERE id=?");
    $stmt->bind_param("sssi", $iname, $description, $price, $category , $id);

    if ($stmt->execute()) {
        header("Location: view_courses.php");
        exit();
    } else {
        echo "Update Failed!";
    }
}
?>

<div class="container mt-4">
    <h2>Edit Menu</h2>

    <form method="POST" action ="view_courses.php">

        <div class="mb-3">
            <label>Menu Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="<?php echo $row['iname'] ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea
                name="description"
                class="form-control"
                required
            ><?php echo $row['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input
                type="text"
                name="price"
                class="form-control"
                value="<?php echo $row['price']; ?>"
                required
            >
        </div>

           <div class="mb-3">
            <label>Category (Starter/Main Course/Dessert/Drinks)</label>
            <input
                type="text"
                name="category"
                class="form-control"
                value="<?php echo $row['category']; ?>"
                required
            >
        </div>

        <button class="btn btn-success">Update Menu</button>

    </form>
</div>

</body>
</html>