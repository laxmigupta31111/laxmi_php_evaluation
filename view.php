<?php

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'navbar.php';

$result = $conn->query("SELECT * FROM menu WHERE user_id = " . $_SESSION['user_id']);
?>

<div class="container mt-4">
    <h2 class="mb-4">View Menu</h2>

    <div class="row">

        <?php while($row = $result->fetch_assoc()) { ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow">

                    <?php if (!empty($row['image']) && file_exists("uploads/" . $row['image'])) { ?>
                        
                        <img 
                            src="uploads/<?php echo $row['image']; ?>" 
                            class="card-img-top"
                            alt="Item Image"
                            style="height:250px; object-fit:cover;"
                        >

                    <?php } else { ?>

                        <img 
                            src="r1.jpg" 
                            class="card-img-top"
                            alt="No Image"
                            style="height:250px; object-fit:cover;"
                        >
                        <img

                    <?php } ?>

                    <div class="card-body">

                        <h4><?php echo $row['cname']; ?></h4>

                        <p><?php echo $row['description']; ?></p>

                        <p>
                            <strong>Duration:</strong> 
                            <?php echo $row['duration']; ?>
                        </p>

                        <a 
                            href="edit.php?id=<?php echo $row['id']; ?>" 
                            class="btn btn-warning"
                        >
                            Edit
                        </a>

                        <a 
                            href="delete_course.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Are you sure?')"
                        >
                            Delete
                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>
</div>

</body>
</html>