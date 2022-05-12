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
                        <h1 class="mt-4 text-center">Add new product !</h1>
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
                                        <!-- <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="more" value="Add more informations!">Add more informations</button>
                                        </div> -->
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
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Ani. Protein</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="animal_protein" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Vege. Protein</label>
                                                    <input type="text" class="form-control text-center"  id="exampleFormControlTextarea2" rows="1" name="vegetable_protein" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Sat. Fat </label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="saturated_fat" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Mono Fat</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="monounsaturated_fat" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Poly Fat</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="polyunsaturated_fat" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Omega3</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="omega3_acid" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Omega6</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="omega6_acid" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Netto Carbs</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="net_carbohydrates" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Fiber</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="fiber" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Salt</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="salt" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Cholesterol</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="cholesterol" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin K</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_k" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin A</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_a" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin B1</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_b1" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin B2</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_b2" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin B5</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_b5" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin B6</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_b6" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Biotin</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="biotin" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Folic Acid</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="folic_acid" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin B12</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_b12" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin C</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_c" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin D</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_d" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin E</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_e"value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Witamin PP</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="witamin_pp" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Calcium</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="calcium" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Chlorine</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="chlorine" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Magnesium</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="magnesium" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Phosphorus</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="phosphorus" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Potassium</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="potassium" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Sodium</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="sodium" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Iron</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="iron" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Zinc</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea2" rows="1" name="zinc" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Copper</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="copper"value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Manganese</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="manganese" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Molybdenum</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="molybdenum" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Iodine</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="iodine" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Fluorine</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="fluorine" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Chrome</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="chrome" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label for="exampleFormControlTextarea1" >Selenium</label>
                                                    <input type="text" class="form-control text-center" id="exampleFormControlTextarea3" rows="1" name="selenium" value=0></input>
                                                </div>
                                                <div class="form-group text-center">
                                                        <label for="exampleFormControlTextarea1" >Description</label>
                                                        <input type="text" class="form-control text-center" id="exampleFormControlTextarea4" rows="2" name="description" ></input>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-primary text-center" name="submit">Add this product !</button>
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
