
    <!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1>


        <div class="row">
            <?= validation_errors();?>
            <?=  form_error('menu','<small class="text-danger pl-3">','</small>'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#roleModal">Tambah Role baru</a>
            <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">ID Menu</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 0; ?>
                    <?php foreach ($role as $r) :?>
                        <tr>
                        <?php $nomor = $nomor + 1;?>
                        <th scope="row"><?= $nomor;?></th>
                        <td><?= $r['id'];?></td>
                        <td><?= $r['role'];?></td>
                        <td>
                            <a class="btn btn-success" href="#"><i class="fas fa-fw fa-square-pen"></i></a>
                            <a class="btn btn-danger" href="#"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-2" id="roleLabel">Tambah Role baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?= base_url('index.php/admin/role');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama Role</label>
                                <input type="text" class="form-control" id="role" name="role" placeholder="Masukkan nama menu">
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