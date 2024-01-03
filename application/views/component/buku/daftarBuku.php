

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1>
        <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <div class="row">
           <?= $this->session->set_flashdata('msg'); ?>

            <a href="#"data-toggle="modal" data-target="#Buku" class="btn btn-primary mb-3 mr-2"><i class="fas fa-fw fa-plus"></i>Tambah Buku</a>
            <a href="<?= base_url('index.php/generate');?>" class="btn btn-success mb-3" ><i class="fas fa-fw fa-file-pdf"></i>PDF</a>
            <div class="col-lg-12">
                <div class="col-lg-12 mt-0 justify-content-space-between">
                    <?php foreach($kategoriBuku as $kb) :?>
                        <a class="btn btn-outline-success mt-3" href="#"><?= $kb['kategori'];?></a>
                        <!-- <input class="btn btn-outline-success mt-3" type="button" value=""> -->
                    <?php endforeach; ?>
                    
                </div>
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
                    <th scope="col">Action</th>
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
                        <td class=" p-3">
                            <a class="btn btn-success" href="#"><i class="fas fa-fw fa-eye-dropper"></i></i></a>
                            <a class="btn btn-danger" href="<?= base_url('index.php/buku/hapus/'). $db['id'];?>"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
        </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- End of Main Content -->


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="Buku" tabindex="-1" aria-labelledby="BukuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BukuLabel">Tambah Buku Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('index.php/buku/daftarBuku');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan title">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Pilihan Kategori</label>
                       <select class="form-control" name="id_kategori" id="id_kategori" class="from-control">
                            <option value="">pilih Kategori</option>
                                <?php foreach($kategoriBuku as $kb) :?>
                                <option value="<?= $kb['id'];?>"><?= $kb['kategori'];?></option>
                            <?php endforeach; ?>
                       </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan URL menu">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">File Buku</label>
                        <input type="file" class="form-control" id="file" name="file"  placeholder="Upload file pdf">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Cover Buku</label>
                        <input type="file" class="form-control" id="cover" name="cover"  placeholder="Upload cover buku">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
