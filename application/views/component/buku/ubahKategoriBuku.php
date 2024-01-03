

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBukuLabel">Edit Kategori Buku</h5>
                <a href="<?= base_url('index.php/buku/kategoriBuku');?>" class="close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>

            <?php echo validation_errors(); ?>

            <?php echo form_open('buku/editKategoriBuku/' . $kategori['id']); ?>    
           
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori Buku</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori buku">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <!-- <a href=""></a> -->
                    <a href="<?= base_url('index.php/buku/kategoriBuku');?>" class="btn btn-secondary">Batal</a>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
