<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <?php
    $empt = NULL;
    $GLOBALS['matrix_pierwsza']=$matrix_pierwsza = array(
        array(5,6,12), array(8,1,53), array(1,-7,7),
    );
    $GLOBALS['matrix_druga']= $matrix_druga = array(
        array(2,2,1), array(4,20,12), array(-3,14,21),
    );
    $GLOBALS['matrix_trzecia']= $matrix_trzecia = array(
        array(21,13,11), array(1,2,3), array(3,2,2),
    );
    function matrix_print($matrix)
    {
        if (count($GLOBALS['matrix_pierwsza'])==count($GLOBALS['matrix_druga']))
        {
            $string = '';
            if ($matrix != NULL)
            {
                $string .= "<table cellpadding='20px'>";
                foreach ($matrix as $row) {
                    foreach ($row as $index => $value) {
                        if ($index == 0) {
                            $string .= "<tr>";
                        }
                        if (count($row) == $index) {
                            $string .= $value;
                            $string .= "</tr>";
                        } else {
                            $string .= "<td>" . $value . "</td>";
                        }
                    }
                }
                $string .= "</table>";
                $str_html = $string;
                return $str_html;
            }
        }
    }
    function matrix_trans($matrix){
        if (count($GLOBALS['matrix_trzecia'])==count($GLOBALS['matrix_trzecia'])) {
            $string = '';
            if ($matrix != NULL) {
                $t_matrix = array_map(null, ...$matrix);
                $string .= "<table cellpadding='20px'>";
                foreach ($t_matrix as $row) {
                    foreach ($row as $index => $value) {
                        if ($index == 0) {
                            $string .= "<tr>";
                        }
                        if (count($row) == $index) {
                            $string .= $value;
                            $string .= "</tr>";
                        } else {
                            $string .= "<td>" . $value . "</td>";
                        }
                    }
                }
                $string .= "</table>";
                $t_array = $string;
                return $t_array;}
            echo " Macierz nie spelnia wymagan";
            return NULL;
        }
    }



    ?>
</head>

<center>
    <h3>Pierwsza Macierz</h3>
    <?php
    echo matrix_print($matrix_pierwsza);
    ?>
</center>

<center>
    <h3>Druga Macierz</h3>
    <?php
    echo matrix_print($matrix_druga);
    ?>
</center>


<center> <h2>Transponowanie Macierzy</h2></center>


<center>          <h3>Pierwsza Macierz</h3>

    <?php
    echo matrix_trans($matrix_trzecia);
    ?>
</center>

<center>

    <h2>Dodawanie Macierzy</h2>

    <?php function matrix_add($matrix_pierwsza, $matrix_druga){
        if(count($matrix_pierwsza) == count($matrix_druga)){
            foreach($matrix_pierwsza as $index=>$item)
            {
                if(count($matrix_pierwsza[$index]) != count($matrix_druga[$index])){
                    return false;
                }
            }
            foreach($matrix_pierwsza as $index=>$row)
            {
                foreach($row as $index1=>$value)
                {
                    $matrix_pierwsza[$index][$index1] += $matrix_druga[$index][$index1];
                }
            }
            return $matrix_pierwsza;
        }
        else
        {
            print_r( "Macierz nie spelnia wymagan");
            return NULL;
        }
    }
    ?>
    <h3>Pierwsza Macierz</h3>
    <?php
    echo matrix_print($matrix_pierwsza);
    ?>
    <h3>Druga Macierz</h3>
    <?php
    echo matrix_print($matrix_druga);
    ?>
    <h3>Macierz Wynikowa</h3>
    <?php
    echo matrix_print(matrix_add($matrix_pierwsza,$matrix_druga));
    ?>

</center>


<center>

    <h2>Mnożenie Macierzy</h2>

    <?php

    function sprwdzanie($matrix_pierwsza, $matrix_druga){
        if(count($matrix_pierwsza[0]) == count($matrix_druga)){
            return true;
        }
        return false;
    }

    function matrix_mul($matrix_pierwsza, $matrix_druga)
    {
        if(sprawdzanie($matrix_pierwsza, $matrix_druga)){
            $tmp_array = array(array());
            foreach($matrix_pierwsza as    $i=>$value)
            {
                foreach($matrix_druga as $j=>$value1)
                {
                    $tmp = 0;
                    foreach($matrix_druga as $k=>$value2)
                    {
                        $tmp += $matrix_pierwsza[$i][$k] * $matrix_druga[$k][$j];
                    }
                    $tmp_array[$i][$j] = $tmp;
                }
            }
            return $tmp_array;
        }
        print_r("Macierz nie spelnia wymagan");
        return NULL;
    }
    ?>
    <h3>Pierwsza Macierz</h3>
    <?php
    echo matrix_print($matrix_pierwsza);
    ?>
    <h3>Druga Macierz</h3>
    <?php
    echo matrix_print($matrix_druga);
    ?>
    <h3>Macierz Wynikowa</h3>
    <?php
    echo matrix_print(matrix_mul($matrix_pierwsza,$matrix_druga));
    ?>

</center>
</body>
</html>