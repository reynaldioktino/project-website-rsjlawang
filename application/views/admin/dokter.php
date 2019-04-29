<?php 
$this->load->view('admin/main/header');
$this->load->view('admin/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Dokter</h1>
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
                                <th>Username</th>
                                <th>Klinik</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>JK</th>
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
                    <label for="" class="control-label col-xs-3">Username</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_user_add" id="id_user1">
                                <?php foreach ($user as $key => $value): ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->username; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Klinik</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_klinik_add" id="id_klinik1">
                                <?php foreach ($klinik as $key => $value): ?>
                                    <option value="<?php echo $value->id_klinik; ?>"><?php echo $value->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-9">
                            <input name="nip_add" id="nip1" class="form-control" type="text">
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
                    <label for="" class="control-label col-xs-3">Jenis Kelamin</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="jk_add" id="jk1">
                                <option value="Laki-Laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
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
                            <input name="id_dokter_edit" id="id_dokter2" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Username</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_user_edit" id="id_user2">
                                <?php foreach ($user as $key => $value): ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->username; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Klinik</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_klinik_edit" id="id_klinik2">
                                <?php foreach ($klinik as $key => $value): ?>
                                    <option value="<?php echo $value->id_klinik ?>"><?php echo $value->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-9">
                            <input name="nip_edit" id="nip2" class="form-control" type="text">
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
                    <label for="" class="control-label col-xs-3">Jenis Kelamin</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="jk_edit" id="jk2">
                                <option value="Laki-Laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
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
            ajax: '<?php echo base_url("C_dokter/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data : 'id_dokter'},
             { data : 'uname'},
             { data : 'klinik'},
             { data : 'nip'},
             { data : 'nama'},
             { data : 'alamat'},
             { data : 'no_tlp'},
             { data : 'jk'},
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_dokter+'">Update</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.id_dokter+'">Delete</a>';
                return ret;
               }
             }
             ]
        });

       
        //Add Barang
        $('#btn_simpan').on('click',function(){
            var id_dokter=$('#id_dokter1').val();
            var id_user=$('#id_user1').val();
            var id_klinik=$('#id_klinik1').val();
            var nip=$('#nip1').val();
            var nama=$('#nama1').val();
            var alamat=$('#alamat1').val();
            var no_tlp=$('#no_tlp1').val();
            var jk=$('#jk1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_dokter/add')?>",
                dataType : "JSON",
                data : {id_dokter:id_dokter, id_user:id_user, id_klinik:id_klinik, nip:nip, nama:nama, alamat:alamat, no_tlp:no_tlp, jk:jk},
                success: function(data){
                    $('[name="id_dokter_add"]').val("");
                    $('[name="id_user_add"]').val("");
                    $('[name="id_klinik_add"]').val("");
                    $('[name="nip_add"]').val("");
                    $('[name="nama_add"]').val("");
                    $('[name="alamat_add"]').val("");
                    $('[name="no_tlp_add"]').val("");
                    $('[name="jk_add"]').val("");
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
                url  : "<?php echo base_url('C_dokter/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_dokter, id_user, id_klinik, nip, nama, alamat, no_tlp, jk){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_dokter_edit"]').val(data.id_dokter);
                        $('[name="id_user_edit"]').val(data.id_user);
                        $('[name="id_klinik_edit"]').val(data.id_klinik);
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
            var id_dokter=$('#id_dokter2').val();
            var id_user=$('#id_user2').val();
            var id_klinik=$('#id_klinik2').val();
            var nip=$('#nip2').val();
            var nama=$('#nama2').val();
            var alamat=$('#alamat2').val();
            var no_tlp=$('#no_tlp2').val();
            var jk=$('#jk2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_dokter/update')?>",
                dataType : "JSON",
                data : {id_dokter:id_dokter, id_user:id_user, id_klinik:id_klinik, nip:nip, nama:nama, alamat:alamat, no_tlp:no_tlp, jk:jk},
                success: function(data){
                    $('[name="id_dokter_edit"]').val("");
                    $('[name="id_user_edit"]').val("");
                    $('[name="id_klinik_edit"]').val("");
                    $('[name="nip_edit"]').val("");
                    $('[name="nama_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('[name="no_tlp_edit"]').val("");
                    $('[name="jk_edit"]').val("");
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
                url  : "<?php echo base_url('C_dokter/delete')?>",
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
