<?php 
$this->load->view('dokter/main/header');
$this->load->view('dokter/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ICD10</h1>
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
                                <th>ID</th>
                                <th>Kode ICD</th>
                                <th>Jenis Penyakit</th>
                                <th>Penyebab</th>
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

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Add Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="id_add" id="id1" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode ICD</label>
                        <div class="col-xs-9">
                            <input name="icd_kode_add" id="icd_kode1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Penyakit</label>
                        <div class="col-xs-9">
                            <input name="jenis_penyakit_add" id="jenis_penyakit1" class="form-control" type="text">
                        </div>
                    </div>

                <div class="form-group">
                        <label class="control-label col-xs-3" >Penyebab</label>
                        <div class="col-xs-9">
                            <input name="sebabpenyakit_add" id="sebabpenyakit1" class="form-control" type="text" required>
                        </div>
                    </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-success" id="btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->

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
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="id_edit" id="id2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode ICD</label>
                        <div class="col-xs-9">
                            <input name="icd_kode_edit" id="icd_kode2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Penyakit</label>
                        <div class="col-xs-9">
                            <input name="jenis_penyakit_edit" id="jenis_penyakit2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Penyebab</label>
                        <div class="col-xs-9">
                            <input name="sebabpenyakit_edit" id="sebabpenyakit1" class="form-control" type="text" required>
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
            ajax: '<?php echo base_url("C_icd10/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'id'},
             { data: 'icd_kode' },
             { data: 'jenis_penyakit' },
             { data: 'sebabpenyakit' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id+'">Update</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.id+'">Delete</a>';
                return ret;
               }
             }
             ]
        });

       
        //Add Barang
        $('#btn_simpan').on('click',function(){
            var id=$('#id_ruangan1').val();
            var icd_kode=$('#icd_kode1').val();
            var jenis_penyakit=$('#jenis_penyakit1').val();
            var sebabpenyakit=$('#sebabpenyakit1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_icd10/add')?>",
                dataType : "JSON",
                data : {id:id , icd_kode:icd_kode, jenis_penyakit:jenis_penyakit, sebabpenyakit:sebabpenyakit},
                success: function(data){
                    $('[name="id_add"]').val("");
                    $('[name="icd_kode_add"]').val("");
                    $('[name="jenis_penyakit_add"]').val("");
                    $('[name="sebabpenyakit_add"]').val("");
                    $('#ModalAdd').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_icd10/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, icd_kode, jenis_penyakit, sebabpenyakit){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_edit"]').val(data.id);
                        $('[name="icd_kode_edit"]').val(data.icd_kode);
                        $('[name="jenis_penyakit_edit"]').val(data.jenis_penyakit);
                        $('[name="sebabpenyakit_edit"]').val(data.sebabpenyakit);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id=$('#id2').val();
            var icd_kode=$('#icd_kode2').val();
            var jenis_penyakit=$('#jenis_penyakit2').val();
            var sebabpenyakit=$('#sebabpenyakit2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_icd10/update')?>",
                dataType : "JSON",
                data : {id:id , icd_kode:icd_kode, jenis_penyakit:jenis_penyakit, sebabpenyakit:sebabpenyakit},
                success: function(data){
                    $('[name="idedit"]').val("");
                    $('[name="icd_kode_edit"]').val("");
                    $('[name="jenis_penyakit_edit"]').val("");
                    $('[name="sebabpenyakit_edit"]').val("");
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
                url  : "<?php echo base_url('C_icd10/delete')?>",
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
