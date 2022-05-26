<div class="modal-header">
    <h4 class="modal-title float-left">EDIT DATA PERUSAHAAN</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
</div>
<form action="<?= site_url('admin/perusahaan/update/'.$id_perusahaan) ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label for="" class="control-label col-xs-12 col-md-3 text-right">Nama Perusahaan :</label>
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" value="<?= $data->nm_perusahaan ?>" required name="nm_perusahaan" placeholder="Nama perusahaan">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="control-label col-xs-12 col-md-3 text-right">Email Perusahaan :</label>
            <div class="col-md-4 col-xs-12">
                <input type="email" class="form-control" value="<?= $data->email_perusahaan ?>" required name="email_perusahaan" placeholder="Ex : example@mail.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="control-label col-xs-12 col-md-3 text-right">Alamat :</label>
            <div class="col-md-6 col-xs-12">
                <textarea name="alamat_perusahaan" required placeholder="Alamat" class="form-control" cols="30" rows="3"><?= $data->alamat_perusahaan ?></textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="control-label col-xs-12 col-md-3 text-right">No. Telepon :</label>
            <div class="col-md-4 col-xs-12">
                <input type="text" class="form-control" value="<?= $data->noTelp_perusahaan ?>" required name="noTelp_perusahaan" placeholder="Telepon">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="control-label col-xs-12 col-md-3 text-right">Jenis Perusahaan :</label>
            <div class="col-md-4 col-xs-12">
                <input type="text" class="form-control" value="<?= $data->jenis_perusahaan ?>" required name="jenis_perusahaan" placeholder="Jenis perusahaan">
            </div>
        </div>
        <div class="form-group row">
        <label for="" class="control-label col-xs-12 col-md-3 text-right">Surat Izin Perusahaan :</label>
        <div class="col-md-4 col-xs-12">
            <input type="text" class="form-control" value="<?= $data->surat_izin ?>" required name="surat_izin" placeholder="Surat izin">
        </div>
    </div>
    </div>

    <div class="modal-footer" style="clear:both;">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm"> Simpan</button>
    </div>
    
    
    
</form>