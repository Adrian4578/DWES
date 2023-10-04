<footer>

    <?php
    $dia = date("l");
    $diaN = date("d");
    $Mes = date("M");
    $año = date("Y");
    $Fecha = ["Dias"=>["Monday" => "Lunes",
    "Tuesday" => "Martes",
    "Wednesday" => "Miercoles",
    "Thursday" => "Jueves",
    "Friday" => "Viernes",
    "Saturday" => "Sabado",
    "Sunday" => "Domingo"],
    "Meses"=>["Jan" => "Enero",
    "Feb" => "Febrero",
    "Mar" => "Marzo",
    "Apr" => "Abril",
    "May" => "Mayo",
    "Jun" => "Junio",
    "Jul" => "Julio",
    "Aug" => "Agosto",
    "Sep" => "Septiembre",
    "Oct" => "Octubre",
    "Nov" => "Noviembre",
    "Dec" => "Diciembre"]];
  /*  switch ($dia) {
        case "Monday":
            $dia = "Lunes";
            break;
        case "Tuesday":
            # code...
            $dia = "Martes";
            break;
        case "Wednesday":
            # code...
            $dia = "Miercoles";
            break;
        case "Thursday":
            # code...
            $dia = "Jueves";
            break;
        case "Friday":
            # code...
            $dia = "Viernes";
            break;
        case "Saturday":
            # code...
            $dia = "Sabado";
            break;
        case "Sunday":
            # code...
            $dia = "Domingo";
            break;
        default:
            # code...
            break;
    }*/

  /*  switch ($Mes) {
        case "Jan":
            # code...
            $Mes = "Enero";
            break;
        case "Feb":
            # code...
            $Mes = "Febrero";
            break;
        case "Mar":
            # code...
            $Mes = "Marzo";
            break;
        case "Apr":
            # code...
            $Mes = "Abril";
            break;
        case "May":
            # code...
            $Mes = "Mayo";
            break;
        case "Jun":
            # code...
            $Mes = "Junio";
            break;
        case "Jul":
            # code...
            $Mes = "Julio";
            break;
        case "Aug":
            # code...
            $Mes = "Agosto";
            break;
        case "Sep":
            # code...
            $Mes = "Septiembre";
            break;
        case "Oct":
            # code...
            $Mes = "Octubre";
            break;
        case "Nov":
            # code...
            $Mes = "Noviembre";
            break;

        case "Dec":
            # code...
            $Mes = "Diciembre";
            break;

        default:
            # code...
            break;
    }*/

    
    echo "  <footer>   Adrian danvila daria </br>
   ".$Fecha["Dias"][$dia]." ,$diaN de ".$Fecha["Meses"][$Mes]." de $año </footer>"
        ?>

</footer>