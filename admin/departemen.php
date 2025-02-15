<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include('../config/koneksi.php');

$pageTitle = 'Manajemen Departemen';
$activePage = 'departemen';
include('view/header.php');

// Ambil data departemen
$query = "SELECT * FROM departemen";
$result = mysqli_query($koneksi, $query);
?>
<main class="content">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4 text-primary">Manajemen Departemen</h1>
            </div>
        </div>
        
        <style>
            .card-header {
                background: #007bff;
                color: white;
            }
            .btn-tambah {
                background-color: #007bff;
                border-color: #007bff;
                color: white;
                padding: 10px 20px;
                font-weight: bold;
                border-radius: 5px;
                transition: all 0.3s ease;
            }
            .btn-tambah:hover {
                background-color: #0056b3;
                border-color: #0056b3;
            }
            .table thead {
                background-color: #007bff;
                color: white;
            }
            .table-hover tbody tr:hover {
                background-color: rgba(0, 123, 255, 0.1);
            }
            .btn-aksi-edit {
                background-color: #007bff;
                color: white;
            }
            .btn-aksi-hapus {
                background-color: #dc3545;
                color: white;
            }
        </style>
        
        <div class="card border-0 shadow-sm">
        <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Daftar Departemen</h5>
                    <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahDepartemenModal">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Departemen
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Departemen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_departemen']) ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-aksi-edit" 
                                           data-bs-toggle="modal" 
                                           data-bs-target="#editDepartemenModal<?= $row['id_departemen'] ?>">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="../proses/hapus_departemen.php?id=<?= $row['id_departemen'] ?>" 
                                           class="btn btn-sm btn-aksi-hapus" 
                                           onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit Departemen -->
                            <div class="modal fade" id="editDepartemenModal<?= $row['id_departemen'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Edit Departemen</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="../proses/edit_departemen.php" method="post">
                                            <input type="hidden" name="id_departemen" value="<?= $row['id_departemen'] ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Departemen</label>
                                                    <input type="text" name="nama_departemen" class="form-control" 
                                                           value="<?= htmlspecialchars($row['nama_departemen']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Departemen -->
        <div class="modal fade" id="tambahDepartemenModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Tambah Departemen</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="../proses/tambah_departemen.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Departemen</label>
                                <input type="text" name="nama_departemen" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('view/footer.php'); ?>