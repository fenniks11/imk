<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data Siswa
        </div>
        <div class="panel-body">
            <?php
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
            ?>
            <?php
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }

            echo form_open_multipart('siswa/edit/' . $siswa->id_siswa) ?>
            <div class="form-group">
                <label>NIS</label>
                <input class="form-control" value="<?= $siswa->nis ?>" type="text" name="nis" placeholder="NIP Siswa" required>
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input class="form-control" value="<?= $siswa->nama_siswa ?>" type="text" name="nama_siswa" placeholder="Nama Siswa" required>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" value="<?= $siswa->tempat_lahir ?>" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Tangggal Lahir</label>
                    <input class="form-control" value="<?= $siswa->tgl_lahir ?>" type="date" name="tgl_lahir" placeholder="Tangggal Lahir" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control">
                        <option value="<?= $siswa->kelas ?>"><?= $siswa->kelas ?></option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <img src="<?= base_url('foto_siswa/' . $siswa->foto_siswa); ?>" alt="" width="200px">
            </div>
            <div class="form-group">
                <label>Ganti Foto Siswa</label>
                <input type="file" class="form-control" name="foto_siswa">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>