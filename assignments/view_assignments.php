<?php
include_once '../helpers/Auth.php';
include_once '../helpers/Connection.php';
session_start();
$auth = new Auth();
if (!$auth->isUserLoggedIn()) {
    echo "You need to login to access this page";
    die();
}
// Select all pupils from the database
$connection = new Connection();
if (isset($_GET['deactivate']) && isset($_GET['id'])) {
    // We are deactivating
    $connection->update('pupils', ['status' => 'Deactivated'], ['id' => $_GET['id']]);
    header('Location: ./view_pupils.php');
    die();
}
if (isset($_GET['activate']) && isset($_GET['id'])) {
    // We are deactivating
    $connection->update('pupils', ['status' => 'Activated'], ['id' => $_GET['id']]);
    header('Location: ./view_pupils.php');
    die();
}
$assigns = $connection->select('assignments', []);
$message = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    include('../navbar.php');
    ?>

    <div id="layoutSidenav">
        <?php
        include '../sidebar.php';
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> View Pupils
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Assignment Date</th>
                                        <th>Assignment</th>
                                        <th>Start Time</th>
                                        <th>Stop Time</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Assignment Date</th>
                                        <th>Assignment</th>
                                        <th>Start Time</th>
                                        <th>Stop Time</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    
                                    foreach ($assigns as $assign) {

                                    ?>
                                    <tr>
                                    <td><?= $assign['assignmentDate']?></td>
                                        <td><?= $assign['assignment']?></td>
                                        <td><?= $assign['startTime']?></td>
                                        <td><?= $assign['endTime']?></td>
                                         <td>
                                             <a href="">Edit</a>
                                         </td>
                                      
                                    </tr>
                                        
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">GROUP 31 RECESS 2022</div>
                        <div>
                            <a href="#">Pupil system</a> &middot;
                            <a href="#">KCPMS</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>