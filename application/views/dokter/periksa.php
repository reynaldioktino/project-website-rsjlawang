<?php 
$this->load->view('dokter/main/header');
$this->load->view('dokter/main/navbar');
?>

<div id="page-wrapper">
    <form action="<?php echo base_url('C_periksa/add'); ?>" method="POST" >
    <div class="row">
        <h3 class="page-header">Data Periksa</h3>
        <div class="col-md-6">
            <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran ?>">
            <div class="form-group">
                <label for="" class="control-label col-md-3">Kode Periksa</label>
                <div class="col-md-9"><input type="text" name="kode" class="form-control" readonly="" value="<?php echo $id_periksa; ?>"><br></div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-md-3">Pasien</label>
                <div class="col-md-9"><input type="text" name="pasien" class="form-control" readonly="" value="<?php echo $pasien->np; ?>"><br></div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">No. Pendaftaran</label>
                <div class="col-md-9"><input type="text" name="no_pendaftaran" class="form-control" readonly="" value="<?php echo $pasien->no_pendaftaran; ?>"><br></div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Tanggal Periksa</label>
                <div class="col-md-9"><input type="date" name="tgl_periksa" class="form-control"><br></div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Keluhan</label>
                <div class="col-md-9">
                    <textarea name="keluhan" id="" cols="30" rows="3" class="form-control"></textarea>
                <br></div>
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
            <br>
            <label for="" class="control-label col-md-3">Kondisi Umum</label>
                <div class="col-md-9">
                    <select class="form-control" name="kondisi_umum" id="kondisi_umum">
                        <option value="Muntah">Sadar</option>
                        <option value="Muntah">Tidak Sadar</option>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Dokter</label>
                <div class="col-md-9"><input type="text" name="dokter" class="form-control" value="<?php echo $dokter ?>" readonly=""><br></div>
            </div>
            
            <div class="form-group">
                <label for="" class="control-label col-md-3">Catatan</label>
                <div class="col-md-9">
                    <textarea name="catatan" id="" cols="30" rows="3" class="form-control"></textarea>
                <br></div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        </div>
    <div class="row">
        <h3 class="page-header">Diagnosa Pasien</h3>
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="form-group">
            <label for="" class="control-label col-md-3">Diagnosa Primer</label>
                <div class="col-md-9">
                    <select class="form-control" name="id_icd10" id="id_icd10">
                        <?php foreach ($icd10 as $key) : ?>
                            <option value="<?php echo $key->id; ?>"><?php echo $key->jenis_penyakit; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-md-3">Diagnosa Sekunder</label>
                <div class="col-md-9">
                    <table class="table table-striped table-bordered table-hover" width="100%">
                        <tr>
                            <td width="90%">
                                <select class="form-control" name="id_icd10_sekunder" id="id_icd10_sekunder">
                                    <?php foreach ($icd10 as $key) : ?>
                                        <option value="<?php echo $key->id; ?>"><?php echo $key->jenis_penyakit; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td align="center"></div><button class="btn btn-success"> + </button></td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="page-header">Data Resep</h3>
            <div class="form-group">
                <label for="" class="control-label col-md-3">Kode Resep</label>
                <div class="col-md-9"><input type="text" name="kode_resep" class="form-control" readonly="" value="<?php echo $kode_resep; ?>"><br></div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Keterangan</label>
                <div class="col-md-9">
                    <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
                <br></div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-md-3">Detail Obat</label>
                <div class="col-md-9">
                    <table class="table table-striped table-bordered table-hover" width="100%">
                        <tr>
                            <td width="70%">
                                <select class="form-control" name="obat" id="obat">
                                    <?php foreach ($obat as $key) : ?>
                                        <option value="<?php echo $key->id; ?>"><?php echo $key->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td width="20%"><input type="text" name="aturan" class="form-control"></td>
                            <td align="center"></div><button class="btn btn-success"> + </button></td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="page-header">Lampiran</h3>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Lampiran</label>
                <div class="col-md-9"><input type="file" name="lampiran" class="form-control"><br></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <button type="submit" name="simpan" class="btn btn-info">Simpan</button><br><br>
        </div>
    </div>
    </form>
    <br>

<?php 
$this->load->view('dokter/main/footer');
?>

</body>

</html>
