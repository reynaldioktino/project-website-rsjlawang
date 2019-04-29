<?php 
$this->load->view('apoteker/main/header');
$this->load->view('apoteker/main/navbar');
?>

<div id="page-wrapper">
    <?php echo form_open_multipart('C_pengambilanresep/ambilresep'); ?>
    <?php echo form_hidden('id_resep',$resep[0]->id_resep); ?>
    <div class="row">
        <h3 class="page-header">Detail Resep</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label col-md-3">Kode Resep</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kode_resep" value="<?php echo $resep[0]->kode; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">No. Rekam Medis</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="no_rm" value="<?php echo $resep[0]->no_rm; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Pasien</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="pasien" value="<?php echo $resep[0]->pasien; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Dokter</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="dokter" value="<?php echo $resep[0]->dokter; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Tanggal Periksa</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="tgl_periksa" value="<?php echo $resep[0]->tgl_periksa; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Obat</label>
                <div class="col-md-9">
                    <table class="table table-stripped table-bordered">
                        <?php foreach ($obat as $key) : ?>
                        <tr>
                            <td width="70%"><?php echo $key->obat; ?></td>
                            <td width="30%"><?php echo $key->aturan; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <br>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <?php echo form_submit('submit','Konfirmasi',"class='btn btn-warning'");?>
            <a href="<?php echo base_url('C_menuapoteker/pengambilanresep'); ?>" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?php 
$this->load->view('apoteker/main/footer');
?>


</body>

</html>
