<?php 
$this->load->view('admin/main/header');
$this->load->view('admin/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Keluarga Pasien</h1>
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
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Hubungan</th>
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
                    <label for="" class="control-label col-xs-3">Pasien</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_pasien_add" id="id_pasien1">
                                <?php foreach ($pasien as $key => $value): ?>
                                    <option value="<?php echo $value->id_pasien ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Username</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_user_add" id="id_user1">
                                <?php foreach ($user as $key => $value): ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->username ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_add" id="nama1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat_add" id="alamat1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Telp</label>
                        <div class="col-xs-9">
                            <input name="no_tlp_add" id="no_tlp1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Hubungan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="hubungan_add" id="hubungan1">
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Saudara Kandung">Saudara Kandung</option>
                                <option value="Sepupu">Sepupu</option>
                                <option value="Lain-Lain">Lain-Lain</option>
                            </select>
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
                        <label class="control-label col-xs-3" >Kode</label>
                        <div class="col-xs-9">
                            <input name="id_edit" id="id2" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Pasien</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_pasien_edit" id="id_pasien2">
                                <?php foreach ($pasien as $key => $value): ?>
                                    <option value="<?php echo $value->id_pasien ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Username</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_user_edit" id="id_user2">
                                <?php foreach ($user as $key => $value): ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->username ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat_edit" id="alamat2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Telp</label>
                        <div class="col-xs-9">
                            <input name="no_tlp_edit" id="no_tlp2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Hubungan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="hubungan_edit" id="hubungan2">
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Saudara Kandung">Saudara Kandung</option>
                                <option value="Sepupu">Sepupu</option>
                                <option value="Lain-Lain">Lain-Lain</option>
                            </select>
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
            ajax: '<?php echo base_url("C_keluarga/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'id'},
             { data : 'pasien'},
             { data : 'uname'},
             { data : 'nama'},
             { data : 'alamat'},
             { data : 'no_tlp'},
             { data : 'hubungan'},
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
            var id=$('#id1').val();
            var id_pasien=$('#id_pasien1').val();
            var id_user=$('#id_user1').val();
            var nama=$('#nama1').val();
            var alamat=$('#alamat1').val();
            var no_tlp=$('#no_tlp1').val();
            var hubungan=$('#hubungan1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_keluarga/add')?>",
                dataType : "JSON",
                data : {id:id, id_pasien:id_pasien, id_user:id_user, nama:nama, alamat:alamat, no_tlp:no_tlp, hubungan:hubungan},
                success: function(data){
                    $('[name="id_add"]').val("");
                    $('[name="id_pasien_add"]').val("");
                    $('[name="id_user_add"]').val("");
                    $('[name="nama_add"]').val("");
                    $('[name="alamat_add"]').val("");
                    $('[name="no_tlp_add"]').val("");
                    $('[name="hubungan_add"]').val("");
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
                url  : "<?php echo base_url('C_keluarga/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, id_pasien, id_user, nama, alamat, no_tlp, hubungan){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_edit"]').val(data.id);
                        $('[name="id_user_edit"]').val(data.id_user);
                        $('[name="nip_edit"]').val(data.nip);
                        $('[name="nama_edit"]').val(data.nama);
                        $('[name="alamat_edit"]').val(data.alamat);
                        $('[name="no_tlp_edit"]').val(data.no_tlp);
                        $('[name="jk_edit"]').val(data.jk);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id=$('#id2').val();
            var id_pasien=$('#id_pasien2').val();
            var id_user=$('#id_user2').val();
            var nama=$('#nama2').val();
            var alamat=$('#alamat2').val();
            var no_tlp=$('#no_tlp2').val();
            var hubungan=$('#hubungan2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_keluarga/update')?>",
                dataType : "JSON",
                data : {id:id, id_pasien:id_pasien, id_user:id_user, nama:nama, alamat:alamat, no_tlp:no_tlp, hubungan:hubungan},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="id_pasien_edit"]').val("");
                    $('[name="id_user_edit"]').val("");
                    $('[name="nama_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('[name="no_tlp_edit"]').val("");
                    $('[name="hubungan_edit"]').val("");
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
                url  : "<?php echo base_url('C_keluarga/delete')?>",
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
