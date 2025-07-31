<?php foreach($user as $aa){ ?>
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Form Edit User</h6>
    <form action="<?= base_url('user/update') ?>" method="post">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="type" class="form-control" name="username" value="<?= $aa['username'] ?>" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?= $aa['nama'] ?>">
            </div>
        </div>       
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select name="level" class="form-control">
                    <option value="user" <?php if($aa['level']=='user'){ echo "selected";} ?> >User</option>
                    <option value="admin" <?php if($aa['level']=='admin'){ echo "selected";} ?> >Admin</option>
                </select>
            </div>
        </div>  
        <input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">                                                  
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?php } ?>