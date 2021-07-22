<?php 
include("includes/top.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Print Result</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Print Result</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form name="printres" role="form">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Subject .:</label>
                            <select name="ressbj" id="ressbj" class="form-control">
                                <?php
$sql = "SHOW TABLES";
$result = query($sql);
while ($row = mysqli_fetch_row($result)) {
 if($row[0] == "login" || $row[0] == "timer" || $row[0] == "mst_useranswer" || $row[0] == "result") {
    echo '<ul class="nav nav-treeview" hidden>
              <li class="nav-item">
                <a href="./questions?id='.$row[0].'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>'.$row[0].'<br/></p>
                </a>
              </li>
            </ul>
            ';
  } else {
          ?>
                                <option id="ressbj" name="ressbj"><?php echo $row[0] ?></option>
                                <?php
          }
        }
          ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Result Year.:</label>
                            <input type="number" id="sbjyear" name="sbjyear" class="form-control"
                                placeholder="e.g 2020">
                        </div>

                        <button type="button" id="chkres" class="btn btn-danger btn-outline-light">Check Result</button>
                        <button type="button" id="resres" class="btn btn-dark btn-outline-light">View All
                            Results</button>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

        </div>
        <section id="displayres" class="content">

        </section>
        <!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
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
$(document).ready(function() {
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

<script>
//filter
document.getElementById('chkres').addEventListener('click', getResult);

function getResult() {
    var x = document.forms["printres"]["ressbj"].value;
    var y = document.forms["printres"]["sbjyear"].value;
    if (y == null || y == "") {
        $(toastr.error('Please input a CBT Result Year'));
        return false;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './result?id=' + x + '&other=' + y, true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            //document.write(this.responseText);
            document.getElementById('displayres').innerHTML = xhr.responseText;
        } else {

            document.write('File not Found');
        }
    }

    xhr.send();
}


//select all
document.getElementById('resres').addEventListener('click', resResult);

function resResult() {
    var x = document.forms["printres"]["ressbj"].value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', './result?id=' + x, true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            //document.write(this.responseText);
            document.getElementById('displayres').innerHTML = xhr.responseText;
        } else {

            document.write('File not Found');
        }
    }

    xhr.send();
}
</script>


</body>

</html>