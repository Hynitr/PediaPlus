<?php include("include/needed.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload Questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item active">Questions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <?php
 $sql="SELECT * from `".$data."`";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  if(row_count($result_set) == "") {
            
          } else {
          ?>     

          <section id="preview" class="content">
          <!-- right column -->
          <div class="col-md-12">
              <div class="card card-dark">
            <div class="card-header">
              <?php
              $sqler = "SELECT * from timer WHERE `subject` = '".$data."'";
              $resullt = query($sqler);
              while($row_counted = mysqli_fetch_array($resullt))
              {
                $timer    =  $row_counted['hour'];
                $minutes    =  $row_counted['min'];
              ?>
              <h3 class="card-title">Preview Question for <?php echo $data; ?> <br/><br/> Time Allowed [<?php echo $timer."Hours : ".$minutes."Minutes"; ?>]</h3>
              <?php
            }
            ?>
               <div class="card-tools">
                 <button type="button" id="del" data-toggle="modal" data-target="#modal-reset" data-toggle="tooltip" title="Reset this subject" class="btn btn-tool"><i class="fas fa-recycle"></i>
                  </button>
                  <button type="button" id="del" data-toggle="modal" data-target="#modal-delete" data-toggle="tooltip" title="Delete a question" class="btn btn-tool"><i class="fas fa-trash"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                    <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" style="width: 5px;">S/N</th>
                  <th class="text-center">Question</th>
                  <th class="text-center">Correct Answer</th>
                  <th class="text-center">Multichoice</th>
                </tr>
                </thead>
                <tbody>
        
                <tr>
                   <?php
                 
 $sql = "SELECT * FROM `".$data."`  \n"

    . "ORDER BY `".$data."`.`sn` ASC";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
          ?>          
                  <td><?php echo $row['sn']; ?></td>
                  <td><?php echo $row['question']; ?></td>
                  <td><?php echo $row['correct']; ?></td>
                  <td><?php echo $row['oa'].", ".$row['ob'].", ".$row['oc'].", ".$row['od']; ?></td>
                  
                </td>
                </tr>
                 <?php
          } 
          ?>
                </tbody>
             
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </section>
<?php
}
}
?>


 <!-- Main content -->
    <section class="content">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Upload Question for <?php echo $data ?> CBT <span id="year"><?php echo date("Y"); ?></span></h3>
                 <div class="card-tools">
                    <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form name="uploadQuestionaire" role="form">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Question Serial Number .:</label>
                    <input type="number" class="form-control" id="sn" placeholder="e.g 1, 2, 3 e.t.c">
                  </div>
                   <div class="form-group">
                        <label>Type in a Question.:</label>
                        <textarea class="form-control" rows="3" id="ques" placeholder="e.g What is my name?"></textarea>
                      </div>
                   <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                    <label for="exampleInputEmail1">Option A .:</label>
                    <input type="text" class="form-control" id="oa" placeholder="e.g Dot">
                  </div>
                    </div>

                    <div class="col-sm-6">
                       <div class="form-group">
                    <label for="exampleInputEmail1">Option B .:</label>
                    <input type="text" class="form-control" id="ob" placeholder="e.g Eight">
                  </div>
                    </div>
                    
                  </div>

                   <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                    <label for="exampleInputEmail1">Option C .:</label>
                    <input type="text" class="form-control" id="oc" placeholder="e.g inc">
                  </div>
                    </div>

                    <div class="col-sm-6">
                       <div class="form-group">
                    <label for="exampleInputEmail1">Option D .:</label>
                    <input type="text" class="form-control" id="od" placeholder="e.g ek">
                  </div>
                    </div>
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Correct Answer .:</label>
                        <select id="correct" class="form-control">
                          <option id="correct">Option A</option>
                          <option id="correct">Option B</option>
                          <option id="correct">Option C</option>
                          <option id="correct">Option D</option>
                        </select>
                      </div>

                   <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $data; ?>" id="subj" hidden>
                  </div>

                  <p class="text-danger">Make sure you recheck all questions typed in before uploading</p>
                   <button type="button" id="Questionaire" class="btn float-right btn-danger btn-outline-light">Upload Question</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
           
          </div>
          <!--/.col (right) -->
    </section>
    <!-- /.content -->   


      </div>
  <!-- /.content-wrapper -->
 <?php include("includes/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php
                 
 $sql="SELECT * from `".$data."`";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
          ?>      

      <!---modal delete--->
<div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete a Question <span id="msg"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="card-body">
                <p class="text-grey">Kindly confirm the question you want to delete by typing the question serial number below</p>

                <form name="deleting">
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Question</span>
                  </div>
                  <input type="text" name="delsn" id="delsn" class="form-control" placeholder="e.g 1, 2, 3 e.t.c">
                  <input type="text" name="val" id="val" value="<?php echo $data; ?>" class="form-control" placeholder="e.g 1, 2, 3 e.t.c" hidden>
                </div>
              </form>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" id="movedel" class="btn btn-outline-light">Continue</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php
}
?>


 <!---modal reset--->
<div class="modal fade" id="modal-reset">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Reset <?php echo $data; ?> Question(s)<span id="msg"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="card-body">
                <p class="text-grey">Resetting will clear off all uploaded questions in this subject.</p>
                 <p class="text-grey">Are you sure you want to continue?</p>
                 <input type="text" value="<?php echo $data; ?>" id="subb" hidden>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No! Cancel</button>
              <button type="button" id="reseted" class="btn btn-outline-light">Yes! Continue</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script src="ajax.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  });

</script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
    });
  });
</script>
</body>
</html>