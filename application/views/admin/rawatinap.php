<?php 
$this->load->view('admin/main/header');
$this->load->view('admin/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Data Rawat Inap</h4>
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
</div>

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

                    <input type="hidden" name="id_rawatinap_edit" id="id_rawatinap2">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Pendaftaran</label>
                        <div class="col-xs-9">
                            <input name="no_pendaftaran_edit" id="no_pendaftaran2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pasien</label>
                        <div class="col-xs-9">
                            <input name="pasien_edit" id="pasien2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ruang</label>
                        <div class="col-xs-9">
                            <input name="ruang_edit" id="ruang2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tgl Masuk</label>
                        <div class="col-xs-9">
                            <input name="tgl_masuk_edit" id="tgl_masuk2" class="form-control" type="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tgl Keluar</label>
                        <div class="col-xs-9">
                            <input name="tgl_keluar_edit" id="tgl_keluar2" class="form-control" type="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-9">
                            <select name="status_edit" id="status2" class="form-control">
                                <option value="Belum Keluar">Belum Keluar</option>
                                <option value="Keluar">Keluar</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan</label>
                        <div class="col-xs-9">
                            <textarea name="keterangan_edit" id="keterangan2" cols="30" rows="3" class="form-control"></textarea>
                        </div>
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
            ajax: '<?php echo base_url("C_rawatinap/getAjax") ?>',
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
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_rawatinap+'">Update</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.id_rawatinap+'">Delete</a>';
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
                url  : "<?php echo base_url('C_rawatinap/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_rawatinap, no_pendaftaran, pasien, ruang, tgl_masuk, tgl_keluar, status, keterangan){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_rawatinap_edit"]').val(data.id_rawatinap);
                        $('[name="no_pendaftaran_edit"]').val(data.no_pendaftaran);
                        $('[name="pasien_edit"]').val(data.pasien);
                        $('[name="ruang_edit"]').val(data.ruang);
                        $('[name="tgl_masuk_edit"]').val(data.tgl_masuk);
                        $('[name="tgl_keluar_edit"]').val(data.tgl_keluar);
                        $('[name="status_edit"]').val(data.status);
                        $('[name="keterangan_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_rawatinap=$('#id_rawatinap2').val();
            var tgl_masuk=$('#tgl_masuk2').val();
            var tgl_keluar=$('#tgl_keluar2').val();
            var status=$('#status2').val();
            var keterangan=$('#keterangan2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_rawatinap/update')?>",
                dataType : "JSON",
                data : {id_rawatinap:id_rawatinap , tgl_masuk:tgl_masuk, tgl_keluar:tgl_keluar, status:status, keterangan:keterangan},
                success: function(data){
                    $('[name="id_rawatinap_edit"]').val("");
                    $('[name="no_pendaftaran_edit"]').val("");
                    $('[name="pasien_edit"]').val("");
                    $('[name="ruang_edit"]').val("");
                    $('[name="tgl_masuk_edit"]').val("");
                    $('[name="tgl_keluar_edit"]').val("");
                    $('[name="status_edit"]').val("");
                    $('[name="keterangan_edit"]').val("");
                    $('#ModalUpdate').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalDelete').modal('show');
            $('[name="kode"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_rawatinap/delete')?>",
                dataType : "JSON",
                data : {kode: kode},
                success: function(data){
                    $('#ModalDelete').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });

    });

</script>

</body>

</html>
