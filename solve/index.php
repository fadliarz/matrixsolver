<?php

include('../function.php');

if(isset($_POST['matrix'])){
  $inputMatrix = "{$_POST['matrix']}";
  $inputMatrix = explode("\n", $inputMatrix);

  for($i=0; $i<count($inputMatrix); $i++){
    $matrixRow = explode(" ", $inputMatrix[$i]);

    for($j=0; $j<count($matrixRow); $j++){
      $matrix[$i][$j] = (int) $matrixRow[$j];
    }
  }
}

echo "<h1 style='font-size:50px; text-align: center;'><b>PROBLEM</b></h1>";

printMatrix($matrix, -1);

$matrix = getLowerTriangularMatrix($matrix);
$matrix = getUpperTriangularMatrix($matrix);

printFinalMatrix($matrix);

printSolution($matrix);

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Matrix Problem Solver</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../assets/style.css">

</head>
<body style="background-image: url(https://media.istockphoto.com/vectors/illustration-about-mathematics-vector-id1141668764?k=20&m=1141668764&s=612x612&w=0&h=SalwAAdyAak0iCGQ3BH8esYl_YpvnzsT2ry9HrWCzGA=); background-blend-mode: lighten;">

<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../assets/script.js"></script>

</body>
</html>