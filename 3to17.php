<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['value'])) {
    $string = trim($_POST['value']);
    $pattern = '/[^-]?+[^012.,]/';
    if (preg_match($pattern, $string)) {
        echo 'wrong, please reload page and enter any of .,012';
    } else {

        function toTen($x) {
            $leng = mb_strlen($_POST['value'], 'UTF-8');
            /*
             * вычисляем из троичной в десяти если число без дробной части 
             */
            if (!(strstr($x, '.') || strstr($x, ','))) {
                for ($i = 0; $i < $leng; $i++) {
                    $ten += $x[$i] * pow(3, $leng - $i - 1);
                }
            } else {
                /*
                 * вычисляем из 3-ной системы счисления в 10-ную если число с дробной части
                 * можно было обьединить и 1 раз вычислять целую часть
                 * числа есть ли дробь   или нет
                 * но я поздно взялся и неуспел(
                 */
                $ceil = floor($x);
                $ceil = strval($ceil);
                for ($i = 0; $i < strlen($ceil); $i++) {
                    $ceilPart += $ceil[$i] * pow(3, strlen($ceil) - $i - 1);
                }
                /*
                 * вычисляем  дробную часть заданного числа и преобразуем 
                 * в 10 систему исчисления
                 */
                $float = strval($x - intval($x));
                for ($i = -1; $i > -strlen($float) + 1; $i--) {
                    $floatPart += $float[-$i + 1] * pow(3, $i);
                }
                $ten = $ceilPart + $floatPart;
            }
            return $ten;
        }

        function toSeventeen($ten) {
            /*
             * приводим дробную часть заданного числа из 10-ной системы счисления в 17
             */
            $float = strval($ten - intval($ten));

            for ($k = 0; $k < strlen($float); $k += 1) {
                $floatResult[$k] = intval($float * 17);
                $float = $float * 17 - intval($float * 17);
            }
            /*
             * переводим целую часть заданного числа из 10-ной
             *  системы счисления в 17-ную
             */
            $sev = intval($ten);
            $result = array();
            $i = 0;
            while ($sev) {
                $floor = floor($sev / 17);
                if ($floor === 0) {
                    
                } else {
                    $result[$i] = $sev - $floor * 17;
                    $i++;
                    $sev = $floor;
                }
            }
            /*
             * записываем в результат целую часть
             */
            for ($j = count($result); $j > -1; $j -= 1) {
                switch ($result[$j]) {
                    case 0: $res .= $result[$j];
                        break;
                    case 1: $res .= $result[$j];
                        break;
                    case 2: $res .= $result[$j];
                        break;
                    case 3: $res .= $result[$j];
                        break;
                    case 4: $res .= $result[$j];
                        break;
                    case 5: $res .= $result[$j];
                        break;
                    case 6: $res .= $result[$j];
                        break;
                    case 7: $res .= $result[$j];
                        break;
                    case 8: $res .= $result[$j];
                        break;
                    case 9: $res .= $result[$j];
                        break;
                    case 10: $res .= "a";
                        break;
                    case 11: $res .= "b";
                        break;
                    case 12: $res .= "c";
                        break;
                    case 13: $res .= "d";
                        break;
                    case 14: $res .= "e";
                        break;
                    case 15: $res .= "f";
                        break;
                    case 16: $res .= "g";
                        break;
                }
            }
            /*
             * добавляем к результату дробную часть
             */
            $res.='.';
            for ($j = 0; $j < count($floatResult); $j += 1) {
                switch ($floatResult[$j]) {
                    case 0: $res .= $floatResult[$j];
                        break;
                    case 1: $res .= $floatResult[$j];
                        break;
                    case 2: $res .= $floatResult[$j];
                        break;
                    case 3: $res .= $floatResult[$j];
                        break;
                    case 4: $res .= $floatResult[$j];
                        break;
                    case 5: $res .= $floatResult[$j];
                        break;
                    case 6: $res .= $floatResult[$j];
                        break;
                    case 7: $res .= $floatResult[$j];
                        break;
                    case 8: $res .= $floatResult[$j];
                        break;
                    case 9: $res .= $floatResult[$j];
                        break;
                    case 10: $res .= "A";
                        break;
                    case 11: $res .= "B";
                        break;
                    case 12: $res .= "C";
                        break;
                    case 13: $res .= "D";
                        break;
                    case 14: $res .= "E";
                        break;
                    case 15: $res .= "F";
                        break;
                    case 16: $res .= "G";
                        break;
                }
            }
            return $res;
        }

        $ten = toTen($_POST['value']);
        $res = toSeventeen($ten);
        echo '<b>в семнадцатиричной системе '.'<b>';
          echo '<b>счисления<br><b>';
        
        echo $res;
        
    }
}
?>