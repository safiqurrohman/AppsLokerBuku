
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?>/</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Data Karyawan PT. XYZ</h2>
        <p></p>
        <table class="table table-hover mt-3">
                <thead>
                    <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">ID Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">File</th>
                    <th scope="col">cover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 0; ?>
                    <?php foreach ($daftarBuku as $db) :?>
                        <tr>
                        <?php $nomor = $nomor + 1;?>
                        <th scope="row"><?= $nomor;?></th>
                        <td><?= $db['id'];?></td>
                        <td><?= $db['judul'];?></td>
                        <td><?= $db['kategori'];?></td>
                        <td><?= $db['deskripsi'];?></td>
                        <td><?= $db['jumlah'];?></td>
                        <td><?= $db['file'];?></td>
                        <td><?= $db['cover'];?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
        </table>
    </div>
</body>
</html>