<?php 
$this->load->view('dokter/main/header');
$this->load->view('dokter/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Periksa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- <h1 class="page-header" id="demo">Data Ruang</h1> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Pasien</th>
                                <th>Dokter</th>
                                <th>Tgl. Periksa</th>
                                <th>Keluhan</th>
                                <th>Diagnosa Primer</th>
                                <th>Catatan</th>
                                <th>Kondisi Umum</th>
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
                    <input type="hidden" name="id_periksa_edit" id="id_periksa2">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode</label>
                        <div class="col-xs-9">
                            <input name="kode_edit" id="kode2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pasien</label>
                        <div class="col-xs-9">
                            <input name="pasien_edit" id="pasien2" readonly="" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Dokter</label>
                        <div class="col-xs-9">
                            <input name="dokter_edit" id="dokter2" readonly="" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Periksa</label>
                        <div class="col-xs-9">
                            <input name="tgl_periksa_edit" id="tgl_periksa2"  class="form-control" type="date">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keluhan</label>
                        <div class="col-xs-9">
                            <textarea name="keluhan_edit" id="keluhan2" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Diagnosa Primer</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_icd10_edit" id="id_icd102">
                                <?php foreach ($icd10 as $key => $value): ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo $value->jenis_penyakit; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Catatan</label>
                        <div class="col-xs-9">
                            <textarea name="catatan_edit" id="catatan2" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Kondisi Umum</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="kondisi_umum_edit" id="kondisi_umum2">
                                <option value="Muntah">Sadar</option>
                                <option value="Muntah">Tidak Sadar</option>
                            </select>
                            <br>
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
$this->load->view('dokter/main/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_periksa/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'kode'},
             { data: 'pasien' },
             { data: 'dokter' },
             { data: 'tgl_periksa' },
             { data: 'keluhan' },
             { data: 'icd10' },
             { data: 'catatan' },
             { data: 'kondisi_umum' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_periksa+'">Update</a>';
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
                url  : "<?php echo base_url('C_periksa/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_periksa, kode, pasien, dokter, tgl_periksa, keluhan, id_icd10, catatan, kondisi_umum){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_periksa_edit"]').val(data.id_periksa);
                        $('[name="kode_edit"]').val(data.kode);
                        $('[name="pasien_edit"]').val(data.pasien);
                        $('[name="dokter_edit"]').val(data.dokter);
                        $('[name="tgl_periksa_edit"]').val(data.tgl_periksa);
                        $('[name="keluhan_edit"]').val(data.keluhan);
                        $('[name="id_icd10_edit"]').val(data.id_icd10);
                        $('[name="catatan_edit"]').val(data.catatan);
                        $('[name="kondisi_umum_edit"]').val(data.kondisi_umum);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_periksa=$('#id_periksa2').val();
            var tgl_periksa=$('#tgl_periksa2').val();
            var keluhan=$('#keluhan2').val();
            var id_icd10=$('#id_icd102').val();
            var catatan=$('#catatan2').val();
            var kondisi_umum=$('#kondisi_umum2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_periksa/update')?>",
                dataType : "JSON",
                data : {id_periksa:id_periksa, tgl_periksa:tgl_periksa, keluhan:keluhan, id_icd10:id_icd10, catatan:catatan, kondisi_umum:kondisi_umum},
                success: function(data){
                    $('[name="id_periksa_edit"]').val("");
                    $('[name="pasien_edit"]').val("");
                    $('[name="dokter_edit"]').val("");
                    $('[name="tgl_periksa_edit"]').val("");
                    $('[name="keluhan_edit"]').val("");
                    $('[name="id_icd10_edit"]').val("");
                    $('[name="catatan_edit"]').val("");
                    $('[name="kondisi_umum_edit"]').val("");
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
                url  : "<?php echo base_url('C_periksa/delete')?>",
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
