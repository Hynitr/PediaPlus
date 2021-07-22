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
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">CBT</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Upload CBT Questions</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Begin by uploading Computer Based Test questions to be taken by
                                students</p>
                            <a href="./upload" class="btn btn-primary">Upload</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->

                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Delete Subjects</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Delete a subject you don't wish to have anymore. Contact <a
                                    href="tel: +2348103171902">DotEightInc</a> for details</p>
                            <a href="./deletesubject" class="btn btn-primary">Delete Subjects</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Start CBT</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Get your students/Pupils started by starting the Computer Based Test
                            </p>
                            <a href="./selectcbt" class="btn btn-primary">Start CBT</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Print Result</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">View students/pupils scores and assigned them for printing or save as
                                PDF to be shared</p>
                            <a href="./printres" class="btn btn-primary">Print Results</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>

</html>