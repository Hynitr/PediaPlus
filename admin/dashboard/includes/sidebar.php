<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
        <img style="width: 40px; height: 40px;" src="../images/logo.png" alt="<?php echo $call['school'] ?>"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <?php 
                    $date     = date("Y");
                    $predate  = $date - 1;
                    $academic = $predate."/".$date;
                    ?>
        <span class="brand-text font-weight-light">CBT <?php echo $academic; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <br />
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="./" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <br />
                <li class="nav-item">
                    <a href="./upload" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Upload Questions
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <br />
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            Preview Questions
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <!---display db tables--->
                    <?php
$sql = "SHOW TABLES";
$result = query($sql);
while ($row = mysqli_fetch_row($result)) {
  if($row[0] == "login" || $row[0] == "timer" || $row[0] == "result") {
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
  echo '

   
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./questions?id='.$row[0].'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>'.$row[0].'<br/></p>
                </a>
              </li>
            </ul>
  ';
}
}
mysqli_free_result($result);
?>
                    <!---end of script--->

                </li>
                <br />
                <li class="nav-item has-treeview">
                    <a href="./deletesubject" class="nav-link">
                        <i class="nav-icon fa fa-trash"></i>
                        <p>
                            Delete Subjects
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <br />
                <li class="nav-item has-treeview">
                    <a href="./access" class="nav-link">
                        <i class="nav-icon fas fa-unlock"></i>
                        <p>
                            Edit Access Code
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <br />
                <li class="nav-item has-treeview">
                    <a href="./selectcbt" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Start CBT
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <br />
                <li class="nav-item has-treeview">
                    <a href="./printres" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Print Results
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <br />
                <li class="nav-item has-treeview">
                    <a href="../logout" class="nav-link">
                        <i class="nav-icon fa fa-lock"></i>
                        <p>
                            Logout
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>