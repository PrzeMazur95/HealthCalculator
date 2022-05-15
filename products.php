<?php session_start(); ?>
<?php include_once("includes/autoloader.inc.php"); ?>

<?php

    if(!isset($_SESSION['username'])){

        header("location: login.php?error=loginfirst");
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
                    <input class="form-control text-center" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
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
                        <h1 class="mt-4 text-center">List of your products!</h1>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-12">

                                <?php 

                                    if(isset($_GET['error'])){
                                                                                
                                        echo "<div class='alert alert-danger text-center' role='alert'>";
                                        switch ($_GET['error']){

                                            case "id":
                                                echo "You could not delete this product, it is not yours!";
                                                break;

                                            case "stmtfailed":
                                                echo "Something went wrong with Db connection, contact with Admin!";
                                                break;  
                                                
                                            case "image":
                                                echo "Something went wrong with Db connection, contact with Admin!";
                                                break; 

                                        }
                                        echo "</div>";

                                    }

                                        if(isset($_GET['info'])){

                                            echo "<div class='alert alert-success text-center' role='alert'>";
                                            switch ($_GET['info']){
                                                
                                                case "deleted":
                                                    echo "Succes! You have succesfully deleted this result!"; 
                                                    break;

                                                case "edited":
                                                    echo "Succes! You have succesfully edited this result!"; 
                                                    break;
                                            }

                                            echo "</div>";

                                        }
                                
                                $Products = new ProductView;
                                $Results = $Products->showProducts();
                                
                                ?>

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">kCal</th>
                                            <th class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Results as $Result) { ?>
                                        <tr>
                                            <td width="100" class="text-center"><img src="uploads/images/<?php echo $Result['filename'] ?>" width= "50" height="50" alt=""></td>
                                            <td class="text-center"><?php echo $Result['name'] ?></td>
                                            <td class="text-center"><?php echo $Result['kcal'] ?></td>
                                            <td class="text-center">
                                            <a href="edit_product.php?id=<?php echo $Result['id']; ?>&table=Products&action=edit&userid=<?php echo $_SESSION['userid'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="includes/delete.php?id=<?php echo $Result['id']; ?>&table=Products&userid=<?php echo $_SESSION['userid'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this result?')">Delete</a>
                                            <a href="includes/view_product.php?id=<?php echo $Result['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            </td>      
                                        </tr>

                                        <?php }; ?>
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
    </body>
</html>
