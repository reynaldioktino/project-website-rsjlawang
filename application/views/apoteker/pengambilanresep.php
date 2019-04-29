<?php 
$this->load->view('apoteker/main/header');
$this->load->view('apoteker/main/navbar');
?>

<div id="page-wrapper">
    <div class="row">
    </div>

    <div class="row">
        <div class="col-lg-12">
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Data Resep</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Periksa</th>
                                <th>Pasien</th>
                                <th>Dokter</th>
                                <th>Kode Resep</th>
                                <th>Keterangan</th>
                                <th>Status</th>
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

<?php 
$this->load->view('apoteker/main/footer');
?>

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_pengambilanresep/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'kp'},
             { data: 'pasien'},
             { data: 'dokter' },
             { data: 'kode' },
             { data: 'keterangan' },
             { data: 'status' },
             {
              data: null,
              render: function ( data, type, row ) {
                  if (row.status== "Pending") {
                      var ret = '<a href="<?php echo base_url('C_pengambilanresep/detailresep/'); ?>'+row.kode+'" class="btn btn-info btn-sm item_proses" >Detail</a>';
                      return ret;
                  } else {
                    return '<span class="label label-danger">Sudah Diambil</span>';
                  }
               }
             }
             ]
        });

    });

</script>

</body>

</html>
