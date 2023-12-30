
    <div class="container">
        <div class="box-content  ">
            <div class="head-text ">
                <h3><?= $tagline;?></h3>
            </div>
            <div class="card o-hidden  border-0 shadow-lg my-3 col-lg-12">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $judul; ?></h1>
                                </div>
                            
                                <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama"
                                                placeholder="Nama lengkap" value="<?= set_value('nama'); ?>">
                                                <?=  form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" name="alamat" id="alamat"
                                                placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                                <?=  form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="email" id="email"
                                            placeholder="Email Address" value="<?= set_value('email'); ?>">
                                            <?=  form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="password" placeholder="Password">
                                                <?=  form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" name="ulangipassword"
                                                id="ulangipassword" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register 
                                    </button>
                        
                                </form>
                                
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('index.php/auth/index');?>">Sudah memiliki akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
