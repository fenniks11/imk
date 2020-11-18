<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Tambah Data Siswa
        </div>
        <div class="panel-body">
            <?php
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }

            echo form_open_multipart('siswa/add'); ?>
            <div class="form-group">
                <label>NIS</label>
                <input class="form-control" type="text" name="nis" placeholder="NIS Siswa" required>
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input class="form-control" type="text" name="nama_siswa" placeholder="Nama Siswa" required>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Tangggal Lahir</label>
                    <input class="form-control" type="date" name="tgl_lahir" placeholder="Tangggal Lahir" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <option value="10">X</option>
                        <option value="11">XI</option>
                        <option value="12">XII</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Foto Siswa</label>
                    <input class="form-control" type="file" name="foto_siswa" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>