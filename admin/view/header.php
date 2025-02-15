<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Sistem Kepegawaian' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body {
        min-height: 100vh;
        overflow-x: hidden;
        background-color: #ffffff; /* Putih */
    }
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 250px;
        background: #1E3A8A; /* Biru tua */
        color: #ffffff;
    }
    .sidebar .nav-link {
        font-weight: 500;
        color: #ffffff;
        transition: all 0.3s ease;
        padding: 10px 15px;
    }
    .sidebar .nav-link:hover {
        background-color: #3B82F6; /* Biru lebih terang */
        color: #ffffff; 
    }
    .sidebar .nav-link.active {
        background-color: #60A5FA; /* Biru sedang */
        color: #1E3A8A; /* Biru tua */
        border-radius: 5px;
    }
    .sidebar .nav-link i {
        margin-right: 10px;
        color: #60A5FA; /* Biru sedang */
    }
    .sidebar .nav-link.active i {
        color: #1E3A8A; /* Biru tua */
    }
    
    .content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
    }
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            position: static;
        }
        .content {
            margin-left: 0;
            width: 100%;
        }
    }
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-md-block sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == 'dashboard' ? 'active' : '' ?>" href="dashboard.php">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == 'departemen' ? 'active' : '' ?>" href="departemen.php">
                            <i class="bi bi-building me-2"></i>Departemen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == 'jabatan' ? 'active' : '' ?>" href="jabatan.php">
                            <i class="bi bi-briefcase me-2"></i>Jabatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == 'pegawai' ? 'active' : '' ?>" href="pegawai.php">
                            <i class="bi bi-people me-2"></i>Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../proses/logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</body>
</html>
