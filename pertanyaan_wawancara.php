<?php
session_start();
include 'config/config.php';
// kalo /jika session tidak ada, tolong redirect ke login
if (!isset($_SESSION['nama'])) {
    header("location:index.php?error=acces-failed");
}

$query = mysqli_query($koneksi, "SELECT jurusan.nama_jurusan, pertanyaan_wawancara.* FROM pertanyaan_wawancara
LEFT JOIN jurusan ON jurusan.id = pertanyaan_wawancara.id_jurusan 
ORDER BY pertanyaan_wawancara.id DESC");



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'inc/head.php'; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'inc/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'inc/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Pertanyaan</h1>

                    <div class="mb-3" align="right">
                        <a href="tambah-pertanyaan-wawancara.php" class="btn btn-primary">Tambah Pertanyaaan</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jurusan</th>
                                    <th>Pertanyaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?> </td>
                                        <td><?php echo $row['nama_jurusan'] ?></td>
                                        <td><?php echo $row['nama_pertanyaan'] ?></td>
                                        <td>
                                            <a href="tambah-pertanyaan-wawancara.php?edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" href="tambah-pertanyaan-wawancara.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'inc/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'inc/modal-logout.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/js.php'; ?>

</body>

</html>