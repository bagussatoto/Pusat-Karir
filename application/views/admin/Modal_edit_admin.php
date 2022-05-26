<div class="modal-header">
    <h4 class="modal-title float-left">EDIT DATA ADMIN</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
</div>
<form action="<?= site_url('admin/admin/update/'.$id) ?>" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label for="" class="control-label">Username :</label>
            <input type="text" class="form-control" value="<?= $data->username ?>" name="username" placeholder="Username">
        </div>
        <div class="form-group ">
            <label for="" class="control-label text-right">Password :</label>
            <input type="text" class="form-control" value="<?= $data->password ?>" name="password" placeholder="Password">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button> &nbsp;
        <button type="submit" class="btn btn-primary btn-sm"> Simpan</button>
    </div>
</form>