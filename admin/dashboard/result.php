<?php
include("../functions/init.php");
if(isset($_GET['id']) && !isset($_GET['other'])) {
  $data = $_GET['id'];
?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"> ALL Students/Pupils - RESULT</h3>
            <div class="card-tools">
                <button type="button" onclick="window.print();" id="prn" data-toggle="tooltip" title="Print Result"
                    class="btn btn-tool"><i class="fas fa-print"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool"
                    data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                    data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Exam ID</th>
                        <th>Full Name</th>
                        <th>Subject</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php
                 
 $sql="SELECT * from `result` WHERE `subject` = '$data'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  if(row_count($result_set) == "") {

           echo  "<p style='color:red;'>No Record Found</p>";
            
          } else {
          ?>
                        <td><?php echo $row['stud_id']; ?></td>
                        <td><?php echo $row['names']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['score']; ?></td>
                        </td>
                    </tr>
                    <?php
          } 
        }
          ?>
                </tbody>

            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<script type="text/javascript">
document.getElementById('prn').addEventListener('click', myfn);

function myfn() {
    window.print();
}
</script>


<?php
} else {
$data =  $_GET['id'];
$other = $_GET['other'];
?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><?php echo strtoupper($data); ?> - RESULT</h3>
            <div class="card-tools">
                <button type="button" onclick="window.print();" id="prin" data-toggle="tooltip" title="Print Result"
                    class="btn btn-tool"><i class="fas fa-print"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool"
                    data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                    data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Exam ID</th>
                        <th>Full Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php
                 
 $sql="SELECT * from `result` WHERE `subject` = '$data' AND `year` = '$other'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  if(row_count($result_set) == "") {

           echo  "<p style='color:red;'>No Record Found</p>";
            
          } else {
          ?>
                        <td><?php echo $row['stud_id']; ?></td>
                        <td><?php echo $row['names']; ?></td>
                        <td><?php echo $row['score']; ?></td>
                        </td>
                    </tr>
                    <?php
          } 
        }
          ?>
                </tbody>

            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<?php
      }
      ?>

<script type="text/javascript">
document.getElementById('prin').addEventListener('click', myfun);

function myfun() {
    window.print();
}
</script>