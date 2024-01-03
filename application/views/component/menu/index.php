

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1>


        <div class="row">
            <?= validation_errors();?>
            <?=  form_error('menu','<small class="text-danger pl-3">','</small>'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menuBaruModal">Tambah Menu</a>
            <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">ID Menu</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 0; ?>
                    <?php foreach ($menu as $m) :?>
                        <tr>
                        <?php $nomor = $nomor + 1;?>
                        <th scope="row"><?= $nomor;?></th>
                        <td><?= $m['id'];?></td>
                        <td><?= $m['menu'];?></td>
                        <td class="gap-2">
                            <a class="btn btn-success" href="#"><i class="fas fa-fw fa-eye-dropper"></i></i></a>
                            <a class="btn btn-danger" href="#"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="menuBaruModal" tabindex="-1" aria-labelledby="menuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuBaruModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('index.php/menu/addMenu');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan nama menu">
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