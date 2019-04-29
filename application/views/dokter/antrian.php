<?php 
$this->load->view('dokter/main/header');
$this->load->view('dokter/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
    </div>

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
                                <th>Kode</th>
                                <th>No. Pendaftaran</th>
                                <th>Pasien</th>
                                <th>Rujukan</th>
                                <th>Klinik</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>No. Antrian</th>
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
</div>
<!-- /#page-wrapper -->

<!-- /#wrapper -->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Id Pendaftaran</label>
                        <div class="col-xs-9">
                            <input name="id_pendaftaran_edit" id="id_pendaftaran2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Status Pasien</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="status_edit" id="status2">
                                <option value="Baru">Baru</option>
                                <option value="Lama">Lama</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Pendaftaran</label>
                        <div class="col-xs-9">
                            <input name="no_pendaftaran_edit" id="no_pendaftaran2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Pasien</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_pasien_edit" id="id_pasien2">
                                <?php foreach ($pasien as $key => $value): ?>
                                    <option value="<?php echo $value->id_pasien; ?>"><?php echo $value->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Rujukan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="rujukan_edit" id="rujukan2">
                                <option value="Datang Sendiri">Datang Sendiri</option>
                                <option value="Puskesmas">Puskesmas</option>
                                <option value="Rumah Sakit">Rumah Sakit</option>
                                <option value="lain-lain">lain-lain</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Klinik</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_klinik_edit" id="id_klinik2">
                                <?php foreach ($klinik as $key => $value): ?>
                                    <option value="<?php echo $value->id_klinik; ?>"><?php echo $value->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Masuk</label>
                        <div class="col-xs-9">
                            <input name="tgl_masuk_edit" id="tgl_masuk2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Antrian</label>
                        <div class="col-xs-9">
                            <input name="no_antrian_edit" id="no_antrian2" class="form-control" type="text">
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL EDIT-->

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="kode" id="textkode" value="">
                    <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" id="btn_hapus">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->

<?php 
$this->load->view('dokter/main/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_antrian/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'id_pendaftaran'},
             { data: 'no_pendaftaran'},
             { data: 'pasien'},
             { data: 'rujukan' },
             { data: 'klinik' },
             { data: 'tgl_masuk' },
             { data: 'status' },
             { data: 'no_antrian' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="<?php echo base_url('C_antrian/proses/'); ?>'+row.id_pendaftaran+'" class="btn btn-info btn-sm item_proses" >Proses</a>';
                return ret;
               }
             }
             ]
        });

    });

</script>

</body>

</html>
