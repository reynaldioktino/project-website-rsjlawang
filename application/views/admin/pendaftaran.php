<?php 
$this->load->view('admin/main/header');
$this->load->view('admin/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header">Form Pendaftaran</h3>

            <form action="<?php echo base_url('C_pendaftaran/add'); ?>" method="POST">
            <div class="form-group">

            <div class="form-group">
                <label for="" class="control-label col-md-3">No. Pendaftaran</label>
                <div class="col-md-9"><input type="text" name="no_pendaftaran" class="form-control" value="<?php echo $no_pendaftaran ?>" readonly=""><br></div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-xs-3">Pasien</label>
                <div class="col-xs-9">
                    <select class="form-control" name="id_pasien" id="id_pasien">
                        <?php foreach ($pasien as $key => $value): ?>
                            <option value="<?php echo $value->id_pasien; ?>"><?php echo $value->nama; ?></option>
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
            <label for="" class="control-label col-xs-3">Klinik</label>
                <div class="col-xs-9">
                    <select class="form-control" name="id_klinik" id="id_klinik">
                        <?php foreach ($klinik as $key => $value): ?>
                            <option value="<?php echo $value->id_klinik; ?>"><?php echo $value->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">No. Antrian</label>
                <div class="col-md-9"><input type="text" name="no_antrian" class="form-control"><br></div>
            </div>
            
            <div class="form-group">
            <label for="" class="control-label col-xs-3">Rujukan</label>
                <div class="col-xs-9">
                    <select class="form-control" name="rujukan" id="rujukan">
                        <option value="Datang Sendiri">Datang Sendiri</option>
                        <option value="Puskesmas">Puskesmas</option>
                        <option value="Rumah Sakit">Rumah Sakit</option>
                        <option value="lain-lain">lain-lain</option>
                    </select>
                    <br>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6"><button type="submit" class="btn btn-info">Simpan</button></div>
            </form>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Data Pendaftaran</h4>
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
                                <option value="pemeriksaan">pemeriksaan</option>
                                <option value="antri">antri</option>
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
$this->load->view('admin/main/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_pendaftaran/getAjax") ?>',
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
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_pendaftaran+'">Update</a>';
                ret+= '<a href="<?php echo base_url('C_pendaftaran/delete/'); ?>'+row.id_pendaftaran+'" class="btn btn-danger btn-sm item_hapus" data="'+row.id_pendaftaran+'">Delete</a>';
                return ret;
               }
             }
             ]
        });


        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_pendaftaran/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_pendaftaran, no_pendaftaran, id_pasien, rujukan, id_klinik, tgl_masuk, status, no_antrian){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_pendaftaran_edit"]').val(data.id_pendaftaran);
                        $('[name="no_pendaftaran_edit"]').val(data.no_pendaftaran);
                        $('[name="id_pasien_edit"]').val(data.id_pasien);
                        $('[name="rujukan_edit"]').val(data.rujukan);
                        $('[name="id_klinik_edit"]').val(data.id_klinik);
                        $('[name="tgl_masuk_edit"]').val(data.tgl_masuk);
                        $('[name="status_edit"]').val(data.status);
                        $('[name="no_antrian_edit"]').val(data.no_antrian);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_pendaftaran=$('#id_pendaftaran2').val();
            var no_pendaftaran=$('#no_pendaftaran2').val();
            var id_pasien=$('#id_pasien2').val();
            var rujukan=$('#rujukan2').val();
            var id_klinik=$('#id_klinik2').val();
            var tgl_masuk=$('#tgl_masuk2').val();
            var status=$('#status2').val();
            var no_antrian=$('#no_antrian2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_pendaftaran/update')?>",
                dataType : "JSON",
                data : {id_pendaftaran:id_pendaftaran, no_pendaftaran:no_pendaftaran, id_pasien:id_pasien, rujukan:rujukan, id_klinik:id_klinik, tgl_masuk:tgl_masuk, status:status, no_antrian:no_antrian},
                success: function(data){
                    $('[name="id_pendaftaran_edit"]').val("");
                    $('[name="no_pendaftaran_edit"]').val("");
                    $('[name="id_pasien_edit"]').val("");
                    $('[name="rujukan_edit"]').val("");
                    $('[name="id_klinik_edit"]').val("");
                    $('[name="tgl_masuk_edit"]').val("");
                    $('[name="status_edit"]').val("");
                    $('[name="no_antrian_edit"]').val("");
                    $('#ModalUpdate').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });


        // //GET HAPUS
        // $('#show_data').on('click','.item_hapus',function(){
        //     var id=$(this).attr('data');
        //     $('#ModalDelete').modal('show');
        //     $('[name="kode"]').val(id);
        // });

        // //Hapus Barang
        // $('#btn_hapus').on('click',function(){
        //     var kode=$('#textkode').val();
        //     $.ajax({
        //         type : "POST",
        //         url  : "<?php echo base_url('C_pendaftaran/delete')?>",
        //         dataType : "JSON",
        //         data : {kode: kode},
        //         success: function(data){
        //             $('#ModalDelete').modal('hide');
        //             // tampil_data();
        //             rownumber=0;
        //             tableajax.ajax.reload();
        //         }
        //     });
        //     return false;
        // });

    });

</script>

</body>

</html>
