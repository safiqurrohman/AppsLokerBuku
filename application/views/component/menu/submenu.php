

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

            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#submenu">Tambah Sub Menu</a>
            <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">ID Sub Menu</th>
                    <th scope="col">Title</th>
                    <th scope="col">Menu</th>
                    <th scope="col">URL</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Aktiv</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 0; ?>
                    <?php foreach ($subMenu as $sm) :?>
                        <tr>
                        <?php $nomor = $nomor + 1;?>
                        <th scope="row"><?= $nomor;?></th>
                        <td><?= $sm['id'];?></td>
                        <td><?= $sm['menu'];?></td>
                        <td><?= $sm['title'];?></td>
                        <td><?= $sm['url'];?></td>
                        <td><?= $sm['icon'];?></td>
                        <td><?= $sm['is_active'];?></td>
                        <td class="gap-2">
                            <a class="btn btn-success" href="#"><i class="fas fa-fw fa-eye-dropper"></i></a>
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
<div class="modal fade" id="submenu" tabindex="-1" aria-labelledby="submenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submenuLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('index.php/menu/submenu');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Judul menu</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan title menu">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Menu Pilihan</label>
                       <select class="form-control" name="menu_id" id="menu_id" class="from-control">
                            <option value="">pilih menu</option>
                            <?php foreach($menu as $m) :?>
                                <option value="<?= $m['id'];?>"><?= $m['menu'];?></option>
                            <?php endforeach; ?>
                       </select>
                    <div class="form-group">
                        <label for="formGroupExampleInput">URL menu</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan URL menu">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Icon menu</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan Icon menu">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label for="is_active" class="form-check-label">
                                Active?
                            </label>
                        </div>

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