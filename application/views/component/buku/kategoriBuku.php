

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

            <a href="#" class="btn btn-primary mb-3 w-30" data-toggle="modal" data-target="#kategoriBuku"><i class="fas fa-fw fa-plus"></i>Tambah Kategori Buku</a>
            <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">ID Kategori</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 0; ?>
                    <?php foreach ($kategori as $k) :?>
                        <tr>
                        <?php $nomor = $nomor + 1;?>
                        <th scope="row"><?= $nomor;?></th>
                        <td><?= $k['id'];?></td>
                        <td><?= $k['kategori'];?></td>
                        <td class="gap-2">
                            <a class="btn btn-success" href="<?= base_url('index.php/buku/edit_kategori') .$k['id'];?>"><i class="fas fa-fw fa-eye-dropper"></i></a>
                            <a class="btn btn-danger" href="<?= base_url('index.php/buku/delete/') .$k['id'];?>"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="kategoriBuku" tabindex="-1" aria-labelledby="kategoriBukuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBukuLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('index.php/buku/kategoriBuku');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori Buku</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori buku">
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

  

</div>
<!-- End of Main Content -->
