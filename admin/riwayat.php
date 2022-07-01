<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infaq Website - Admin</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <img style="width: 8%;" src="../images/logo-masjid.jpeg">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="navbar-brand" aria-current="page" href="index.php">Infaq Masjid </br> Roudlotul Jannah</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- Konten -->
        <section class="h-100" style=" background-color: #015D4D; ">
            <header class="container h-100">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="d-flex flex-column">
                        <div class="container-sm mt-5 mb-2 rounded-pill" style="background-color: #2AA436;">
                            <!-- saldo masuk-->
                            <?php
                            include "../koneksi.php";
                            $sql = "SELECT YEARWEEK(tanggal) AS minggu, sum(jumlah) AS total_saldo FROM pemasukan WHERE YEARWEEK(tanggal)=YEARWEEK(NOW()) GROUP BY YEARWEEK(tanggal);";

                            $hasil = mysqli_query($kon, $sql);
                            $total_saldo = mysqli_fetch_array($hasil)
                            ?>
                            <!-- saldo masuk-->
                            <h1 class="text align-self-center p-2" style="color: white;"> Saldo Masuk Rp. <?php echo $total_saldo["total_saldo"]; ?> </h1>
                        </div>
                        <!-- Tabel Pemasukkan-->
                        <table class="table table-striped table-primary table-wrapper-scroll-y my-custom-scrollbar" style="background-color: white;">
                            <!-- Button -->

                            <div class="d-grid gap-2 d-md-flex mb-2 justify-content-md-end">
                                <button type="button" class="button1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah</button>

                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasukkan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="tambah_saldo.php" method="post">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nilai" class="col-form-label">Nominal:</label>
                                                    <input type="number" name="jumlah" class="form-control">
                                                    <br>
                                                    <label for="color">Sumber :</label>
                                                    <select class="form-select" aria-label="Default select example" name="sumber">
                                                        <option value="Dana">Dana</option>
                                                        <option value="OVO">OVO</option>
                                                        <option value="GOPAY">GOPAY</option>
                                                        <option value="SHOPEEPAY">SHOPEEPAY</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir button-->
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Tanggal Input Data</th>
                                <th>Sumber</th>
                            </tr>
                            <?php
                            include "../koneksi.php";
                            $sql = "select * from pemasukan order by tanggal desc";

                            $hasil = mysqli_query($kon, $sql);
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                                $no++;

                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data["jumlah"]; ?></td>
                                        <td><?php echo $data["tanggal"]; ?></td>
                                        <td><?php echo $data["sumber"]; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                        <!-- Akhir Tabel Pemasukkan-->


                    </div>

                </div>
            </header>
            <div class="container h-100 mb-5">
                <div class="mb-6 mt-4" style="text-align: center">
                    <h4 style="color:  white"> Dan dirikanlah shalat dan tunaikanlah zakat.<br> Dan kebaikan apa saja yang kamu usahakan bagi dirimu,<br> tentu kamu akan mendapat pahala nya pada sisi Allah. Sesungguhnya Alah Maha Melihat apa-apa yang kamu kerjakan.<br> (Q.S. Al-Baqarah : 110) </h4>
                </div>
            </div>
            <br><br><br>
        </section>

    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="js/javascript.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/3e7c653e94.js" crossorigin="anonymous"></script>

</html>