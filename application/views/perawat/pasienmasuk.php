<?php 
$this->load->view('perawat/main/header');
$this->load->view('perawat/main/navbar');
?>

<div id="page-wrapper">
    <form action="<?php echo base_url('C_pasienrawat/pasienmasuk'); ?>" method="POST" >
    <div class="row">
        <h3 class="page-header">Pasien Masuk</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label col-md-3">Pasien</label>
                <div class="col-md-9">
                    <select name="pendaftaran" id="" class="form-control">
                        <?php foreach ($pendaftaran as $key) : ?>
                            <option value="<?php echo $key->id_pendaftaran; ?>">( <?php echo $key->no_pendaftaran; ?> ) - <?php echo $key->nps; ?></option>
                        <?php endforeach; ?>
                    </select>
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

            <div class="form-group">
                <label for="" class="control-label col-md-3">Tanggal Masuk</label>
                <div class="col-md-9"><input type="date" name="tgl_masuk" class="form-control"><br></div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Keterangan</label>
                <div class="col-md-9">
                    <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
                <br></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <button type="submit" name="simpan" class="btn btn-info">Simpan</button><br><br>
        </div>
    </div>
    </form>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Data Antrian</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Pendaftaran</th>
                                <th>Pasien</th>
                                <th>Ruangan</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->

<?php 
$this->load->view('perawat/main/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_pasienrawat/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'no_pendaftaran'},
             { data: 'pasien'},
             { data: 'ruang' },
             { data: 'tgl_masuk' },
             { data: 'tgl_keluar' },
             { data: 'status' },
             { data: 'keterangan' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="<?php echo base_url('C_pasienrawat/pindahruangan/'); ?>'+row.id_rawatinap+'" class="btn btn-warning btn-sm item_proses" >Pindah Ruangan</a>';
                ret += '<a href="<?php echo base_url('C_pasienrawat/keluarkanpasien/'); ?>'+row.id_rawatinap+'/'+row.id_ruangan+'" class="btn btn-danger btn-sm item_proses" >Keluarkan Pasien</a>';
                return ret;
               }
             }
             ]
        });

    });

</script>

</body>

</html>
