<?php 
$this->load->view('perawat/main/header');
$this->load->view('perawat/main/navbar');
?>

<div id="page-wrapper">
    <?php echo form_open_multipart('C_pasienrawat/pindahruangan'); ?>
    <?php echo form_hidden('id_rawatinap',$rawat[0]->id_rawatinap); ?>
    <?php echo form_hidden('ruangasal',$rawat[0]->id_ruangan); ?>
    <div class="row">
        <h3 class="page-header">Pindah Ruangan</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label col-md-3">No. Pendaftaran</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="no_pendaftaran" value="<?php echo $rawat[0]->no_pendaftaran; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Pasien</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="pasien" value="<?php echo $rawat[0]->pasien; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Ruangan Asal</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="namaruang" value="<?php echo $rawat[0]->ruang; ?>" readonly="">
                    <br>
                </div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-md-3">Ruangan</label>
                <div class="col-md-9">
                    <select name="ruang" id="" class="form-control">
                        <?php foreach ($ruang as $key) : ?>
                            <option value="<?php echo $key->id_ruangan; ?>"><?php echo $key->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <?php echo form_submit('submit','Pindah Ruang',"class='btn btn-warning'");?>
            <a href="<?php echo base_url('C_menuperawat/pasienmasuk'); ?>" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?php 
$this->load->view('perawat/main/footer');
?>


</body>

</html>
