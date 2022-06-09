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
        <script   src="https://code.jquery.com/jquery-3.6.0.min.js"   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="   crossorigin="anonymous"></script>
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
                        <h1 class="mt-4 text-center">Calculate todays meals!</h1>
                        <div class="row">
                            <?php
                            
                            if(isset($_GET['error'])){
                                                
                                echo "<div class='alert alert-danger text-center' role='alert'>";
                                switch ($_GET['error']){

                                    case "emptyinput":
                                        echo "You have to fill all fields!";
                                        break;  

                                    case "stmtfailed":
                                        echo "Something went wrong with Db connection, contact with admin!";
                                        break; 
                                        
                                    case "id":
                                        echo "You could not delete this meal, it is not yours!";

                                    }
                                echo "</div>";

                                }

                                if(isset($_GET['info'])){

                                    echo "<div class='alert alert-success text-center' role='alert'>";
                                    switch ($_GET['info']){
                                        
                                        case "properlyAdded":
                                            echo "Succes! You have added a meal!"; 
                                            break;

                                        case "deleted":
                                            echo "You have deleted this meal!"; 
                                            break;
    

                                    }

                                    echo "</div>";

                                }
                            
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-12">
                                <form class="form text-center" id="Add" action="includes/ajax.inc.php">
                                    <div class="form-group mb-1">
                                        <input type="text" class="form-control text-center" id="product" name="product" placeholder="Search something!">
                                    </div>
                                    <div class="col-xl-12 text-center" id="info">
                                        <div class="row">
                                            <div class="col-xl-4-8 text-center"><h2><span id="name"></span></h2></div>
                                        </div>
                                        <div class="col-xl-4-8">
                                            <div><input type="text" class="form-control text-center d-flex justify-content-center" id="quantity" name="quantity" placeholder="Type quantity" required></div>
                                            <div><input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid'] ?>"></div>
                                            <div><input type="hidden" name="add_calc_product"></div>
                                            <div><input type="hidden" id="add_calc_product_id" name="add_calc_product_id"></div>
                                        </div>
                                    </div>
                                    <div id="result"></div>
                                    <button type="submit" class="btn btn-success mb-2" id="add_button">Add !</button>
                                </form>
                                <div id="container"></div>

                                <?php 
                                
                                $date = date("Y-m-d");
                                $datte = (string)$date;

                                $result = new CalculatorView();
                                $results = $result->showDailyUserResults($datte, $_SESSION['userid']);
                                ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">kCal</th>
                                            <th class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if($results){ foreach($results as $result){ ?>        
                            
                                        <tr>
                                            <td class="text-center"><?php echo $result['name']; ?></td>
                                            <td class="text-center"><?php echo $result['quantity']; ?></td>
                                            <td class="text-center"><?php echo ($result['kcal'] * $result['quantity']); ?></td>  
                                            <td class="text-center">
                                                <a href="includes/edit.php?id=<?php echo $result['id']; ?>&table=Calculator&action=edit&userid=<?php echo $_SESSION['userid'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="includes/delete.php?id=<?php echo $result['id']; ?>&table=Calculator&userid=<?php echo $_SESSION['userid'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this meal?')">Delete</a>
                                            </td>
                                                
                                        </tr>

                                        <?php }} ?>
                                    </tbody>
                                </table>

                                <table class="table text-center">
                                <thead>
                                        <tr>
                                        <th scope="col" colspan="5" class="table-info">Summary !</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                        <th scope="col">kCal</th>
                                        <th scope="col">Carbs</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Fat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td style="font-size: 35px;">3000g</td>
                                        <td style="font-size: 20px;">300g</td>
                                        <td style="font-size: 20px;">120g</td>
                                        <td style="font-size: 20px;">99g</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-info text-center" id="showInformations">Get more informations!</button>
                                </div>

                                <?php

                                    $daily = new DbObjectView();
                                
                                ?>
                                    <table class='table table-condensed table-striped' id="informations">
                                        <tr>
                                            <td>one</td>
                                            <td>two</td>
                                            <td>three</td>
                                        </tr>
                                        <tr>
                                            <td>one</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>three</td>
                                        </tr>
                                        <tr>
                                            <td>one</td>
                                            <td>two</td>
                                            <td>three</td>
                                        </tr>
                                    </table>
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

        

        <script>

            $(document).ready(function(){

                $('#info').hide();
                $('#add_button').hide();
                $('#informations').hide();

                $('#product').keyup(function(){

                    var search = $('#product').val();

                    $('#addedInfo').hide();

                    $.ajax({

                        url:' includes/ajax.inc.php',
                        data: {search:search, table:'products'},
                        type: 'POST',
                        success: function(data){

                            if(!data.error) {

                                $('#container').html(data);

                            }

                        }

                    });

                });



                $("#Add").submit(function(evt){

                    evt.preventDefault();

                    var addData = $(this).serialize();

                    var url = $(this).attr('action');

                    $.post(url, addData, function(add_data){

                        $('#quantity').val("");

                        $("#result").html(add_data);

                        location.reload();

                    });

                });


                $("#showInformations").on('click', function() {
                    var $this = $("#informations");

                    $this.show();
                    
                    if ($this.hasClass("clicked")) {
                        // already been clicked once, hide it
                        $this.hide();
                        $this.removeClass("clicked");
                    }
                    else {
                        // first time this is clicked, mark it
                        $this.addClass("clicked");
                    }
                });




            });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
