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
        <title>Edit Product</title>
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
                        <h1 class="mt-4 text-center">Edit Product!</h1>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-12">
                                            <?php 

                                            $product = new DbObjectView();

                                            $specific_product = $product->Find_by_id($_GET['table'], $_GET['id'], $_GET['userid']);
                                
                                            if(isset($_GET['error'])){
                                                
                                                echo "<div class='alert alert-danger text-center' role='alert'>";
                                                switch ($_GET['error']){

                                                    case "submit":
                                                        echo "You have to submit the form!";
                                                        break;

                                                    case "photo":
                                                        echo "There were some troubles with uploading your photo!";
                                                        break;

                                                    case "save":
                                                        echo "There were some troubles with saving photo!";
                                                        break;

                                                    case "emptyfields":
                                                        echo "Those fields are reuired : name, kcal, protein, fat, carbohydrates, sugar and photo)";
                                                        break;

                                                    case "stmtfailed":
                                                        echo "Something went wrong with Db connection, contact with Admin!";
                                                        break;    

                                                }

                                                echo "</br>".$_SESSION['error'];

                                                echo "</div>";

                                                }

                                                if(isset($_GET['info'])){

                                                    echo "<div class='alert alert-success text-center' role='alert'>";
                                                    switch ($_GET['info']){
                                                        
                                                        case "properlyAdded":
                                                            echo "Succes! You have succesfylly added your product!"; 
                                                            break;

                                                        case "deleted":
                                                            echo "Succes! You have succesfully deleted this product!"; 
                                                            break;

                                                        case "edited":
                                                            echo "Succes! You have succesfully edited this product!"; 
                                                            break;
                                                    }
 
                                                    echo "</div>";
    
                                                }
                                            ?>
                                    <div class="card-header text-center">
                                        <i class="fas fa-chart-area me-1"></i>
                                        <h3><?php echo $specific_product[0]['name']; ?></h2>
                                    </div>

                                    <!-- Put here image and description -->

                                    <div class="row text-center">
                                        <div class="col-lg-6">
                                        <img src="uploads/images/<?php echo $specific_product[0]['filename']; ?>" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div class="col-lg-6">div 2</div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-12">
                                            <?php 
                                
                                            if(isset($_GET['error'])){
                                                
                                                echo "<div class='alert alert-danger text-center' role='alert'>";
                                                switch ($_GET['error']){

                                                    case "submit":
                                                        echo "You have to submit the form!";
                                                        break;

                                                    case "photo":
                                                        echo "There were some troubles with uploading your photo!";
                                                        break;

                                                    case "save":
                                                        echo "There were some troubles with saving photo!";
                                                        break;

                                                    case "emptyfields":
                                                        echo "Those fields are reuired : name, kcal, protein, fat, carbohydrates, sugar and photo)";
                                                        break;

                                                    case "stmtfailed":
                                                        echo "Something went wrong with Db connection, contact with Admin!";
                                                        break;    

                                                }

                                                echo "</br>".$_SESSION['error'];

                                                echo "</div>";

                                                }

                                                if(isset($_GET['info'])){

                                                    echo "<div class='alert alert-success text-center' role='alert'>";
                                                    switch ($_GET['info']){
                                                        
                                                        case "edited":
                                                            echo "Succes! You have succesfully edited this product!"; 
                                                            break;
                                                    }
 
                                                    echo "</div>";
    
                                                }

                                            ?>
                                    <div class="card-header text-center">
                                        <i class="fas fa-chart-area me-1"></i>
                                        <h3>Type all informations per 100g</h2>
                                    </div>
                                    <form action="includes/add_product.inc.php" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-lg-4 text-center">
                                            <label for="exampleFormControlTextarea1" >Name</label>
                                            <input type="text" class="form-control text-center" name="name" required>
                                            </div>
                                            <div class="col-lg-4 text-center">
                                            <label for="exampleFormControlTextarea1" >Photo</label>
                                            <input type="file" class="form-control text-center" name="photo">
                                            </div>
                                            <div class="col-lg-4 text-center">
                                            <label for="exampleFormControlTextarea1" >kCal</label>
                                            <input type="text" class="form-control text-center" name="kcal" required>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                            <label for="exampleFormControlTextarea1" >Protein</label>
                                            <input type="text" class="form-control text-center" name="protein" required>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                            <label for="exampleFormControlTextarea1" >Carbs</label>
                                            <input type="text" class="form-control text-center" name="carbohydrates" required>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                            <label for="exampleFormControlTextarea1" >Fat</label>
                                            <input type="text" class="form-control text-center" name="fat" required>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                            <label for="exampleFormControlTextarea1" >Sugar</label>
                                            <input type="text" class="form-control text-center" name="sugar" required>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header text-center">
                                <i class="fas fa-table me-1"></i>
                                Makro and Micro elements - optional informations
                            </div>
                            <div class="card-body">
                                <div class="container-fluid overflow-auto form-inline" style="height: 200px;">
                                        <div class="col-sm-12 overflow-auto">
                                            <div id="product_details"> 
 
                                            <?php 
                                            
                                            $fields = array('Ani. Protein', 'Vege. Protein', 'Sat. Fat', 
                                            'Mono_Fat', 'Poly Fat', 'Omega3', 'Omega6', 
                                            'Mono Fat', 'Fiber', 'Vege_Protein', 'Vege_Protein', 
                                            'Netto Carbs', 'Salt', 'Salt', 'Cholesterol', 
                                            'Witamin K', 'Witamin A', 'Witamin B1', 'Witamin B2', 
                                            'Witamin B5', 'Witamin B6', 'Biotin', 'Folic Acid', 
                                            'Witamin B12', 'Witamin C', 'Witamin D', 'Witamin E', 
                                            'Witamin PP', 'Calcium', 'Chlorine', 'Magnesium', 
                                            'Phosphorus', 'Potassium', 'Sodium', 'Iron', 
                                            'Zinc', 'Copper', 'Manganese', 'Molybdenum', 
                                            'Iodine', 'Fluorine', 'Chrome', 'Selenium');

                                            foreach ($fields as $field) { ?>

                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" ><?php echo $field ?></label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="<?php echo $field ?>" value=0></input>
                                                </div>
                                            
                                            <?php 

                                            }
                                            
                                            ?>
                                
                                           </div>  
                                        </div>
                                    </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-primary text-center" name="submit">Update this product !</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
