<?php 
require "conn.php";
$result = $conn->query("SELECT * FROM role");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Jeep</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">Mobile Jeep</p>
        <nav class="my-2 my-md-0 me-md-3">
            <a class="p-2 text-dark" href="index.php">Home</a>
            <a class="p-2 text-dark" href="create_role.php">Tambah Role</a>
            <a class="p-2 text-dark" href="create_hero.php">Tambah Hero</a>
        </nav>
    </header>
    <center>
    <main class="container pt-md-5">
        <div class="row justify-content-center text-center">
            <div class="col-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Tambah Role</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] == "POST") :
                                $role = $_POST['role'];
                                $insert = $conn->query("INSERT INTO role VALUE('', '$role')");
                                if ($insert) :
                                    echo 
                                        '<div class="alert alert-success" role="alert">
                                            Role Berhasil ditambahkan
                                        </div>';
                                else :
                                    echo 
                                    '<div class="alert alert-danger" role="alert">
                                        Role Gagal ditambahkan
                                    </div>';
                                endif;
                            endif;
                        ?>    
                        <form action="" method="POST">
                            <input class="form-control" type="text" name="role" placeholder="Masukan Role"><br>
                            <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Role -->
            <div class="col-3">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Role</h4>
                    </div>
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table style="table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        while ($data = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td scope="row"><?php echo $no?></td>
                                                <td><?php echo $data['name']?></td>
                                                <td><a href="edit_role.php?p=<?php echo $data['id']?>">Edit</a>
                                                    <a href="hapus.php?p=<?php echo $data['id']?>&s=role">Hapus</a></td>
                                            </tr>
                                    <?php
                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>