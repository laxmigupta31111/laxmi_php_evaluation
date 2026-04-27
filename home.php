<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'navbar.php';
?>

<div class="container mt-4">

    <h2 class="text-center mb-4">Welcome to Restaurant Menu Management System</h2>

    <!-- Bootstrap Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
                     class="d-block w-100"
                     style="height:500px; object-fit:cover;">
                <div class="carousel-caption">
                    <h3>menu1</h3>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3"
                     class="d-block w-100"
                     style="height:500px; object-fit:cover;">
                <div class="carousel-caption">
                    <h3>menu2</h3>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7"
                     class="d-block w-100"
                     style="height:500px; object-fit:cover;">
                <div class="carousel-caption">
                    <h3>Success Starts Here</h3>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>