<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center">
                <img src="<?= base_url('images/logo.png') ?>" alt="Wisdom Dental Care Logo" class="logo me-3">
                <div>
                    <h1 class="mb-0">Dr. Terry Lee</h1>
                    <h2 class="subtitle mb-0"><?= $subtitle ?></h2>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('services') ?>">Services</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-md-6">
                    <h2 class="display-6 fw-light">Wait no more and schedule your appointment now</h2>
                    <h1 class="display-4 fw-bold mb-4">We Accept Reservation Through Online</h1>
                    <button class="btn btn-primary btn-lg">Book Appointment</button>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('images/dental-hero.png') ?>" alt="Dental Care" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <section class="services-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">WE PROVIDE THE BEST QUALITY DENTAL SERVICE</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 service-card">
                        <img src="<?= base_url('images/service1.jpg') ?>" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title">General Dentistry</h5>
                            <p class="card-text">Comprehensive dental care for your entire family.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 service-card">
                        <img src="<?= base_url('images/service2.jpg') ?>" class="card-img-top" alt="Service 2">
                        <div class="card-body">
                            <h5 class="card-title">Cosmetic Dentistry</h5>
                            <p class="card-text">Transform your smile with our cosmetic services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 service-card">
                        <img src="<?= base_url('images/service3.jpg') ?>" class="card-img-top" alt="Service 3">
                        <div class="card-body">
                            <h5 class="card-title">Dental Implants</h5>
                            <p class="card-text">Restore your smile with dental implants.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 