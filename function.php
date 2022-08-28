<?php

function printSolution($matrix){
    echo "<h1 style='font-size:50px; text-align: center;'><b>Solution</b></h1>
    <table class='rwd-table' style='margin-left: auto; margin-right: auto;'>
    <tr>
    ";

    for($i=1; $i<=count($matrix); $i++){
        echo "<th>x<sub>{$i}</sub></th>";
    }

    echo "
        </tr>
        <tr>
        ";

    for($i=0; $i<count($matrix); $i++){
        $solution = round($matrix[$i][count($matrix[0])-1]/$matrix[$i][$i], 2);
        if($solution == -0){$solution = 0;}
        echo "<td>{$solution}</td>";
    }

    echo "
        </tr>
        </table><br><br><br>
        ";
}

function printMatrix($matrix, $executedRow){
    echo "
    <table class='rwd-table' style='margin-left: auto; margin-right: auto;'>
    <tr>
        <th></th>
    ";

    for($i=1; $i<=count($matrix[0]); $i++){
        echo "<th style='text-align:center;'>{$i}</th>";
    }

    echo "</tr>";

    for($i=1; $i<=count($matrix); $i++){
        if($i == $executedRow+1){
            echo "
            <tr>
                <th style='text-align:center; background-color:rgba(0, 26, 86, 0.5)'>{$i}</th>
            ";
        }else{
            echo "
            <tr>
                <th>{$i}</th>
            ";
        }


        for($j=0; $j<count($matrix[0]); $j++){
            if($i == $executedRow+1){
                echo "<td style='text-align:center; width: 50px; background-color: rgba(0, 26, 86, 0.5);'>{$matrix[$i-1][$j]}</td>";
            }else{
                echo "<td style='text-align:center; width: 50px;'>{$matrix[$i-1][$j]}</td>";
            }
            
        }

        echo "
        </tr>
        ";
    }

    echo "
        </table><br><br><br>
        ";
}

function printFinalMatrix($matrix){
    echo "<h1 style='font-size:50px; text-align: center;'><b>Final Matrix</b></h1>"; 
    echo "
    <table class='rwd-table' style='margin-left: auto; margin-right: auto;'>
    <tr>
        <th></th>
    ";

    for($i=1; $i<=count($matrix[0]); $i++){
        echo "<th style='text-align:center;'>{$i}</th>";
    }

    echo "<tr>";

    for($i=1; $i<=count($matrix); $i++){
        echo "
        <tr>
            <th>{$i}</tj>
        ";

        for($j=0; $j<count($matrix[0]); $j++){
            $roundedMatrixElement = round($matrix[$i-1][$j],2);

            if($roundedMatrixElement == -0){
                $roundedMatrixElement = 0;
            }

            echo "<td style='text-align:center; width: 50px;'>{$roundedMatrixElement}</td>";
        }

        echo "
        </tr>
        ";
    }

    echo "
        </table><br><br><br>
        ";
}

function swapMatrix($matrix, $i, $ii){
    for($j=0; $j<count($matrix[0]); $j++){
        $temp = $matrix[$i][$j];
        $matrix[$i][$j] = $matrix[$ii][$j];
        $matrix[$ii][$j] = $temp;
    }

    return $matrix;
}

function getUpperTriangularMatrix($matrix){
    for($j=0; $j<count($matrix)-1; $j++){
        for($i=$j+1; $i<count($matrix); $i++){
            if($matrix[$i][$j] != 0){
                $iRef = $j;
                $stop = False;

                while(True){
                    if($matrix[$iRef][$j] != 0 && $iRef != $i){
                        break;
                    }

                    if($iRef == count($matrix)-1){
                        // Swap
                        $matrix = swapMatrix($matrix, $i, $j);
                        $stop = True;
                        break;
                    }

                    $iRef++;
                }

                if($stop != True){
                    $upper = $matrix[$i][$j]; $lower = $matrix[$iRef][$j];
                    for($jj=0; $jj<count($matrix[0]); $jj++){
                        $matrix[$i][$jj] = round($matrix[$i][$jj] - $upper/$lower*$matrix[$iRef][$jj], 10);
                    }
                }

                // Display Step
                $ii = $i+1; $iiRef = $iRef+1;
                echo "<h1 style='font-size:30px; text-align: center;'><b>R{$ii} ↔ R{$ii} - ({$upper}/{$lower})*R{$iiRef}</b></h1>";
                printMatrix($matrix, $i);
            }
        }
    }

    return $matrix;
}

function getLowerTriangularMatrix($matrix){
    for($j=count($matrix)-1; $j>0; $j--){
        for($i=0; $i<$j; $i++){
            if($matrix[$i][$j] != 0){
                $iRef = $j;
                $stop = False;

                while(True){
                    if($matrix[$iRef][$j] != 0 && $iRef != $i){
                        break;
                    }

                    if($iRef == 0){
                        // Swap
                        $matrix = swapMatrix($matrix, $i, $j);
                        $stop = True;
                        break;
                    }

                    $iRef--;
                }

                if($stop != True){
                    $upper = $matrix[$i][$j]; $lower = $matrix[$iRef][$j];
                    for($jj=0; $jj<count($matrix[0]); $jj++){
                        $matrix[$i][$jj] = round($matrix[$i][$jj] - $upper/$lower*$matrix[$iRef][$jj], 10);
                    } 
                }

                // Display step
                $ii = $i+1; $iiRef = $iRef+1;
                echo "<h1 style='font-size:30px; text-align: center;'><b>R{$ii} ↔ R{$ii} - ({$upper}/{$lower})*R{$iiRef}</b></h1>";
                printMatrix($matrix, $i);
            }
        }
    }

    return $matrix;
}

?>