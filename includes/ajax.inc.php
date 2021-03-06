<script>

    $('.link-info').on('click', function(){

    var id = $(this).attr("id");

    var name = $(this).attr("rel");

    // alert(name);
    $('#info').show();
    $('#add_button').show();

    $('#name').text(name);
    $('#add_calc_product_id').val(id);
});


</script>

<?php 
session_start();
include_once "autoloader.inc.php";

if(!isset($_SESSION['username'])){

    header("location: login.php?error=loginfirst");
}


if(isset($_POST['search'])){

    if($_POST['table']=="products"){

        $search = $_POST['search'];
        $table = "Products";

    } else {

        header("location: calculator.php");

    }

    if($search === ""){

        echo "<script>

        $('#info').hide();
        $('#add_button').hide();

        </script>";

        echo "";
        die();
    }

    $Results = new DbObjectView();

    $Products = $Results->Find_by_name($table, $search);

    if(!$Products){

        echo "<div class='text-center text-info mb-3'>Sorry, we do not have this product</div>";
    
    } else {
        echo "<table class='table table-striped text-center'>";
        echo "<tbody>";
        foreach ($Products as $row) {

            $name = $row['name'];
            $productId = $row['id'];
    
            echo "<tr>";
            echo "<td>";
            echo "<a class='link-info' rel='".$name."' id='".$productId."' href='#'>".$name."</a>";
            echo "</td>";
            echo "</tr>";
    
        }
    echo "</tbody";
    echo "</table";
    
    }
    
} elseif (isset($_POST['add_calc_product'])) {
    
    $meal = new CalculatorController();
    $meal->newMeal($_POST['userid'], $_POST['add_calc_product_id'], $_POST['quantity']);
    
    
} else {

    header("location: ../index.php");

}

?>
