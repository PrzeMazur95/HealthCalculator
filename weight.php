<?php session_start(); ?>
<?php include_once("includes/autoloader.inc.php"); ?>

<?php

    if(!isset($_SESSION['username'])){

        header("location: login.php?error=loginfirst");
    }

    if(isset($_GET['rate'])){

        $_SESSION['min'] = $_GET['min'];
        $_SESSION['max'] = $_GET['max'];
    } else {

        $_SESSION['min'] = 50;
        $_SESSION['max'] = 110;

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Weight Calculator</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Health Calculator</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Welcome <?php echo $_SESSION['username']; ?></a></li>
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="includes/logout.inc.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Options</div>
                            </a> 
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            </div>
                        </div>
                        <div class="col-xl-12 d-flex justify-content-center">
                                    <form class="form-inline" action="weight.php">
                                        <!-- <div> -->
                                            <p class="text-center">Change the chart guidelines</p>
                                            <input type="text" class="form-control" name="min" placeholder="Min">
                                            <input type="text" class="form-control" name="max" placeholder="Max">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="rate">Change!</button>
                                            </div>
                                            <!-- <button type="submit" class="btn btn-primary mb-2 text-center" name="rate">Change!</button> -->
                                        <!-- </div> -->
                                        
                                    </form>
                                </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['username']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Weight control</h1>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Daily results
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                            <?php 
                                
                                            if(isset($_GET['error'])){
                                                
                                                echo "<div class='alert alert-danger text-center' role='alert'>";
                                                switch ($_GET['error']){

                                                    case "emptyweight":
                                                        echo "You have to fill weight field!";
                                                        break;
                                                    
                                                    case "submit":
                                                        echo "You have to submit the form!";
                                                        break;

                                                    case "emptyinput":
                                                        echo "You may be not logged in, or you not filled weight!";
                                                        break;

                                                    case "invalidEmail":
                                                        echo "User with this email allready exists!";
                                                        break;

                                                    case "stmtfailed":
                                                        echo "Something went wrong with Db connection, contact with Admin!";
                                                        break;    

                                                }
                                                echo "</div>";

                                                }

                                                if(isset($_GET['info'])){

                                                    echo "<div class='alert alert-success text-center' role='alert'>";
                                                    switch ($_GET['info']){
                                                        
                                                        case "properlyAdded":
                                                            echo "Succes! You have added todays result!"; 
                                                            break;

                                                        case "deleted":
                                                            echo "Succes! You have succesfully deleted this result!"; 
                                                            break;

                                                        case "edited":
                                                            echo "Succes! You have succesfully edited this result!"; 
                                                            break;
                                                    }
 
                                                    echo "</div>";
    
                                                }
                                            ?>
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        <h3>Add todays weight!</h2>
                                    </div>
                                    <form action="includes/weight.inc.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-4">
                                            <input type="text" class="form-control" name="weight" placeholder="Type your result for example : 73,5" required>
                                            </div>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control" name="comment" placeholder="Optional type some comment - Maybe yesterday was w cheatday?">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="submit" value="Add">Add</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Daily inputs
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Weight</th>
                                            <th>Comment</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Weight</th>
                                            <th>Comment</th>
                                            <th>Opcje</th>
                                        </tr>
                                    </tfoot>
                                    <?php 
                                    
                                    $weight = new WeightView();
                                    $results = $weight->showWeight($_SESSION['userid']);
                                    
                                    ?>
                                    <tbody>
                                        <?php foreach($results as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['datte']; ?></td>
                                                <td><?php echo $row['weight']; ?></td>
                                                <td><?php echo $row['comment']; ?></td>
                                                <td>
                                                <a href="includes/edit.php?id=<?php echo $row['id']; ?>&table=Weight&action=edit&userid=<?php echo $_SESSION['userid'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="includes/delete.php?id=<?php echo $row['id']; ?>&table=Weight&userid=<?php echo $_SESSION['userid'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this result?')">Delete</a>
                                                </td>
                                                    
                                            </tr>
                                        <?php endforeach; ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php foreach($results as $row) {echo "'".$row['datte']."',"; } ?>],
            datasets: [{
            label: "Weight",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: [<?php foreach($results as $row) {echo $row['weight'].","; } ?>],
            }],
        },
        options: {
            scales: {
            xAxes: [{
                time: {
                unit: 'date'
                },
                gridLines: {
                display: false
                },
                ticks: {
                maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                min: <?php echo $_SESSION['min']; ?>,
                max: <?php echo $_SESSION['max']; ?>,
                maxTicksLimit: 9
                },
                gridLines: {
                color: "rgba(0, 0, 0, .125)",
                }
            }],
            },
            legend: {
            display: false
            }
        }
        });
        
        </script>
    </body>
</html>
