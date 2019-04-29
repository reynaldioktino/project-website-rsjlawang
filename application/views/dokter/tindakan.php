<?php 
$this->load->view('dokter/main/header');
$this->load->view('dokter/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header">Form Pendaftaran</h3>

            <form action="<?php echo base_url('C_tindakan/add'); ?>" method="POST">

            <div class="form-group">
                <label for="" class="control-label col-md-3">Dokter</label>
                <div class="col-md-9"><input type="text" name="no_pendaftaran" readonly="" class="form-control" value="<?php echo $dokter; ?>"><br></div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-xs-3">Perawat</label>
                <div class="col-xs-9">
                    <select class="form-control" name="id_perawat" id="id_perawat">
                        <?php foreach ($perawat as $key => $value): ?>
                            <option value="<?php echo $value->id_perawat; ?>"><?php echo $value->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-xs-3">Kode Periksa</label>
                <div class="col-xs-9">
                    <select class="form-control" name="id_periksa" id="id_periksa">
                        <?php foreach ($periksa as $key => $value): ?>
                            <option value="<?php echo $value->id_periksa; ?>"><?php echo $value->kode; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-xs-3">Ruangan</label>
                <div class="col-xs-9">
                    <select class="form-control" name="id_ruangan" id="id_ruangan">
                        <?php foreach ($ruangan as $key => $value): ?>
                            <option value="<?php echo $value->id_ruangan; ?>"><?php echo $value->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Tanggal Tindakan</label>
                <div class="col-md-9"><input type="date" name="tgl_tindakan" class="form-control"><br></div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-xs-3">Tindakan</label>
                <div class="col-xs-9">
                    <select class="form-control" name="id_icd9" id="id_icd9">
                        <?php foreach ($icd9 as $key => $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->keterangan; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Catatan</label>
                <div class="col-md-9">
					<textarea name="catatan" id="" cols="30" rows="3" class="form-control"></textarea>
                	<br></div>
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
                    <h4>Data Tindakan</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
							    <th>No.</th>
							    <th>Dokter</th>
							    <th>Perawat</th>
							    <th>Kode Periksa</th>
							    <th>Ruangan</th>
							    <th>Tanggal Tindakan</th>
							    <th>Tindakan</th>
							    <th>Catatan</th>
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

                	<input type="hidden" name="id_tindakan_edit" id="id_tindakan2">

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Dokter</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_dokter_edit" id="id_dokter2">
		                        <?php foreach ($dokterlist as $key => $value): ?>
		                            <option value="<?php echo $value->id_dokter; ?>"><?php echo $value->nama; ?></option>
		                        <?php endforeach; ?>
		                    </select>
                            <br>
                        </div>
                    </div>

                	<div class="form-group">
                    <label for="" class="control-label col-xs-3">Perawat</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_perawat_edit" id="id_perawat2">
		                        <?php foreach ($perawat as $key => $value): ?>
		                            <option value="<?php echo $value->id_perawat; ?>"><?php echo $value->nama; ?></option>
		                        <?php endforeach; ?>
		                    </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Kode Periksa</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_periksa_edit" id="id_periksa2">
		                        <?php foreach ($periksa as $key => $value): ?>
		                            <option value="<?php echo $value->id_periksa; ?>"><?php echo $value->kode; ?></option>
		                        <?php endforeach; ?>
		                    </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Ruangan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_ruangan_edit" id="id_ruangan2">
		                        <?php foreach ($ruangan as $key => $value): ?>
		                            <option value="<?php echo $value->id_ruangan; ?>"><?php echo $value->nama; ?></option>
		                        <?php endforeach; ?>
		                    </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Tindakan</label>
                        <div class="col-xs-9">
                            <input name="tgl_tindakan_edit" id="tgl_tindakan2" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="control-label col-xs-3">Tindakan</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="id_icd9_edit" id="id_icd92">
		                        <?php foreach ($icd9 as $key => $value): ?>
		                            <option value="<?php echo $value->id; ?>"><?php echo $value->keterangan; ?></option>
		                        <?php endforeach; ?>
		                    </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Catatan</label>
                        <div class="col-xs-9">
                        	<textarea name="catatan_edit" id="catatan2" class="form-control" cols="30" rows="3"></textarea>
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
            ajax: '<?php echo base_url("C_tindakan/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'dokter'},
             { data: 'perawat'},
             { data: 'kp'},
             { data: 'ruangan' },
             { data: 'tgl_tindakan' },
             { data: 'icd9' },
             { data: 'catatan' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_tindakan+'">Update</a>';
                ret+= '<a href="<?php echo base_url('C_tindakan/delete/'); ?>'+row.id_tindakan+'" class="btn btn-danger btn-sm item_hapus" data="'+row.id_pendaftaran+'">Delete</a>';
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
                url  : "<?php echo base_url('C_tindakan/where')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_tindakan, id_dokter, id_perawat, id_periksa, id_ruangan, tgl_tindakan, id_icd9, catatan){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_tindakan_edit"]').val(data.id_tindakan);
                        $('[name="id_dokter_edit"]').val(data.id_dokter);
                        $('[name="id_perawat_edit"]').val(data.id_perawat);
                        $('[name="id_periksa_edit"]').val(data.id_periksa);
                        $('[name="id_ruangant_edit"]').val(data.id_ruangan);
                        $('[name="tgl_tindakan_edit"]').val(data.tgl_tindakan);
                        $('[name="id_icd9_edit"]').val(data.id_icd9);
                        $('[name="catatan_edit"]').val(data.catatan);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_tindakan=$('#id_tindakan2').val();
            var id_dokter=$('#id_dokter2').val();
            var id_perawat=$('#id_perawat2').val();
            var id_periksa=$('#id_periksa2').val();
            var id_ruangan=$('#id_ruangan2').val();
            var tgl_tindakan=$('#tgl_tindakan2').val();
            var id_icd9=$('#id_icd92').val();
            var catatan=$('#catatan2').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_tindakan/update')?>",
                dataType : "JSON",
                data : {id_tindakan:id_tindakan, id_dokter:id_dokter, id_perawat:id_perawat, id_periksa:id_periksa, id_ruangan:id_ruangan, tgl_tindakan:tgl_tindakan, id_icd9:id_icd9, catatan:catatan},
                success: function(data){
                    	$('[name="id_tindakan_edit"]').val("");
                        $('[name="id_dokter_edit"]').val("");
                        $('[name="id_perawat_edit"]').val("");
                        $('[name="id_periksa_edit"]').val("");
                        $('[name="id_ruangant_edit"]').val("");
                        $('[name="tgl_tindakan_edit"]').val("");
                        $('[name="id_icd9_edit"]').val("");
                        $('[name="catatan_edit"]').val("");
                        $('#ModalUpdate').modal('hide');
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
