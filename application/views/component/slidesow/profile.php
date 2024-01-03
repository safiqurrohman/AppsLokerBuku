<!-- Logout Modal-->
<div class="modal fade" id="profile" tabindex="1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <span syle="color: black; ">Nama : </span><?= $user['nama'];?></h5>
                <p class="card-text"><span class="fw-bold">Email : </span><?= $user['email'];?></p>
                
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
            <a class="btn btn-primary" href="#">Setting profile</a>
        </div>
    </div>
</div>


<!-- Logout Modal-->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Klik "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('index.php/auth/logout');?>">Logout</a>
        </div>
    </div>
</div>