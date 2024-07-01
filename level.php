<?php
session_start();
include 'config/config.php';
// kalo /jika session tidak ada, tolong redirect ke login
if (!isset($_SESSION['nama']))
    header("location:index.php?error=acces-failed");


$queryLevel = mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");
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
                    <h1 class="h3 mb-4 text-gray-800">Data Level</h1>
                    <div align="right">
                        <a href="tambah-level.php" class="btn btn-primary mb-3">Tambah Level</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($dataLevel = mysqli_fetch_assoc($queryLevel)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?> </td>
                                        <td><?php echo $dataLevel['nama_level'] ?></td>
                                        <td>
                                            <a href="tambah-level.php?edit=<?php echo $dataLevel['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a onclick="retur
                                            
                                            
                                            
                                            
                                            n confirm('Apakah anda yakin akan menghapus data ini??')" href="tambah-level.php?delete=<?php echo $dataLevel['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
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