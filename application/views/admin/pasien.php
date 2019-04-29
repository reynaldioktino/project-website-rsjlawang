<?php 
$this->load->view('admin/main/header');
$this->load->view('admin/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Pasien</h1>
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
                                <th>No. RM</th>
                                <th>No. KTP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal lahir</th>
                                <th>Umur</th>
                                <th>Status</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
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
                        <label class="control-label col-xs-3" >No. RM</label>
                        <div class="col-xs-9">
                            <input name="no_rm_add" id="no_rm1" class="form-control" type="text" readonly="" value="<?php echo $no_rm; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. KTP</label>
                        <div class="col-xs-9">
                            <input name="no_ktp_add" id="no_ktp1" class="form-control" type="number">
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
                        <label class="control-label col-xs-3" >Tempat Lahir</label>
                        <div class="col-xs-9">
                            <input name="tempat_lahir_add" id="tempat_lahir1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Lahir</label>
                        <div class="col-xs-9">
                            <input name="tanggal_lahir_add" id="tanggal_lahir1" class="form-control" type="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Umur</label>
                        <div class="col-xs-9">
                            <input name="umur_add" id="umur1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-9">
                            <input name="status_add" id="status1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan</label>
                        <div class="col-xs-9">
                            <input name="pendidikan_add" id="pendidikan1" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pekerjaan</label>
                        <div class="col-xs-9">
                            <input name="pekerjaan_add" id="pekerjaan1" class="form-control" type="text">
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
                            <input name="id_pasien_edit" id="id_pasien2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. RM</label>
                        <div class="col-xs-9">
                            <input name="no_rm_edit" id="no_rm2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. KTP</label>
                        <div class="col-xs-9">
                            <input name="no_ktp_edit" id="no_ktp2" class="form-control" type="number">
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
                        <label class="control-label col-xs-3" >Tempat Lahir</label>
                        <div class="col-xs-9">
                            <input name="tempat_lahir_edit" id="tempat_lahir2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Lahir</label>
                        <div class="col-xs-9">
                            <input name="tanggal_lahir_edit" id="tanggal_lahir2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Umur</label>
                        <div class="col-xs-9">
                            <input name="umur_edit" id="umur2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-9">
                            <input name="status_edit" id="status2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan</label>
                        <div class="col-xs-9">
                            <input name="pendidikan_edit" id="pendidikan2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pekerjaan</label>
                        <div class="col-xs-9">
                            <input name="pekerjaan_edit" id="pekerjaan2" class="form-control" type="text">
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
            ajax: '<?php echo base_url("C_pasien/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'id_pasien'},
             { data: 'no_rm'},
             { data: 'no_ktp'},
             { data: 'nama' },
             { data: 'alamat' },
             { data: 'jk' },
             { data: 'tempat_lahir' },
             { data: 'tanggal_lahir' },
             { data: 'umur' },
             { data: 'status' },
             { data: 'pendidikan' },
             { data: 'pekerjaan' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_pasien+'">Update</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.id_pasien+'">Delete</a>';
                ret+= '<a href="javascript:;" class="btn btn-warning btn-sm item_hapus" data="'+row.id_pasien+'">Cetak</a>';
                return ret;
               }
             }
             ]
        });

       
        //Add Barang
        $('#btn_simpan').on('click',function(){
            var id_pasien=$('#id_pasien1').val();
            var no_rm=$('#no_rm1').val();
            var no_ktp=$('#no_ktp1').val();
            var nama=$('#nama1').val();
            var alamat=$('#alamat1').val();
            var jk=$('#jk1').val();
            var tempat_lahir=$('#tempat_lahir1').val();
            var tanggal_lahir=$('#tanggal_lahir1').val();
            var umur=$('#umur1').val();
            var status=$('#status1').val();
            var pendidikan=$('#pendidikan1').val();
            var pekerjaan=$('#pekerjaan1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_pasien/add')?>",
                dataType : "JSON",
                data : {id_pasien:id_pasien, no_rm:no_rm, no_ktp:no_ktp, nama:nama, alamat:alamat, jk:jk, tempat_lahir:tempat_lahir, tanggal_lahir:tanggal_lahir, umur:umur, status:status, pendidikan:pendidikan, pekerjaan:pekerjaan},
                success: function(data){
                    $('[name="no_rm_add"]').val("");
                    $('[name="no_ktp_add"]').val("");
                    $('[name="nama_add"]').val("");
                    $('[name="alamat_add"]').val("");
                    $('[name="jk_add"]').val("");
                    $('[name="tempat_lahir_add"]').val("");
                    $('[name="tanggal_lahir_add"]').val("");
                    $('[name="umur_add"]').val("");
                    $('[name="status_add"]').val("");
                    $('[name="pendidikan_add"]').val("");
                    $('[name="pekerjaan_add"]').val("");
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
                url  : "<?php echo base_url('C_pasien/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_pasien, no_rm, no_ktp, nama, alamat, jk, tempat_lahir, tanggal_lahir, umur, status, pendidikan, pekerjaan){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_pasien_edit"]').val(data.id_pasien);
                        $('[name="no_rm_edit"]').val(data.no_rm);
                        $('[name="no_ktp_edit"]').val(data.no_ktp);
                        $('[name="nama_edit"]').val(data.nama);
                        $('[name="alamat_edit"]').val(data.alamat);
                        $('[name="jk_edit"]').val(data.jk);
                        $('[name="tempat_lahir_edit"]').val(data.tempat_lahir);
                        $('[name="tanggal_lahir_edit"]').val(data.tanggal_lahir);
                        $('[name="umur_edit"]').val(data.umur);
                        $('[name="status_edit"]').val(data.status);
                        $('[name="pendidikan_edit"]').val(data.pendidikan);
                        $('[name="pekerjaan_edit"]').val(data.pekerjaan);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_pasien=$('#id_pasien2').val();
            var no_rm=$('#no_rm2').val();
            var no_ktp=$('#no_ktp2').val();
            var nama=$('#nama2').val();
            var alamat=$('#alamat2').val();
            var jk=$('#jk2').val();
            var tempat_lahir=$('#tempat_lahir2').val();
            var tanggal_lahir=$('#tanggal_lahir2').val();
            var umur=$('#umur2').val();
            var status=$('#status2').val();
            var pendidikan=$('#pendidikan2').val();
            var pekerjaan=$('#pekerjaan2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_pasien/update')?>",
                dataType : "JSON",
                data : {id_pasien:id_pasien, no_rm:no_rm, no_ktp:no_ktp, nama:nama, alamat:alamat, jk:jk, tempat_lahir:tempat_lahir, tanggal_lahir:tanggal_lahir, umur:umur, status:status, pendidikan:pendidikan, pekerjaan:pekerjaan},
                success: function(data){
                    $('[name="id_pasien_edit"]').val("");
                    $('[name="no_rm_edit"]').val("");
                    $('[name="no_ktp_edit"]').val("");
                    $('[name="nama_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('[name="jk_edit"]').val("");
                    $('[name="tempat_lahir_edit"]').val("");
                    $('[name="tanggal_lahir_edit"]').val("");
                    $('[name="umur_edit"]').val("");
                    $('[name="status_edit"]').val("");
                    $('[name="pendidikan_edit"]').val("");
                    $('[name="pekerjaan_edit"]').val("");
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
                url  : "<?php echo base_url('C_pasien/delete')?>",
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
