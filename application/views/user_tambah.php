
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Form Input User</h6>
    <form action="<?= site_url('user/simpan') ?>" method="post">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="type" class="form-control" name="username">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div>       
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select name="level" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>                                                    
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>