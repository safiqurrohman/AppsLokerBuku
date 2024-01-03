<div class="modal fade" id="daftarbuku" tabindex="-1" aria-labelledby="daftarbukuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarbukuLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open_multipart('buku/formUploadBuku');?>
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
                        <input type="text" class="form-control" id="cover" name="cover"  placeholder="Upload cover buku">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            <?php echo form_close();?>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

</div>