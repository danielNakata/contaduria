<?php
    include "db/Conexion.php";
    include "dao/Catalogos.php";

    $conexion = new Conexion();
    $conexion->creaConexionDB();
    //print_r($conexion->conn);

    $catalogos = new Catalogos();
    $arrUnidades = $catalogos->cargaCatUnidades($conexion->conn);
    $arrOperadores = $catalogos->cargaCatOperadores($conexion->conn);
    $arrPeriodos = $catalogos->cargaCatPeriodos($conexion->conn);
    $arrParametros = $catalogos->cargaCatParametros($conexion->conn);

    $conexion->cierraConexionDB();
    //print_r($arrUnidades);
    //print_r($arrOperadores);
    //print_r($arrPeriodos);
    //print_r($arrParametros);

    $tam = count($arrPeriodos);
    $optPeriodos = "";
    for($i = 0; $i < $tam; $i++){
        $optPeriodos .= "<option value=\"".$arrPeriodos[$i]->idperiodo."\">".$arrPeriodos[$i]->periodo."</option>";
    }
    //echo $optPeriodos;
?>
<html>
    <head>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
        <script src="js/bootstrap.js"></script>
        <title>
            Calculo de ISR
        </title>
    </head>
    <body>
        <div class="container">
            <form action="index.php" method="POST">
                <table class="table table-sm table-bordered">
                    <tr><th colspan="1">Sueldos a Calcular</th><td><button class="btn btn-primary btn-sm" type="submit">Calcular</button></td></tr>
                    <tr>
                        <th>Tipo Salario</th>
                        <td>
                            <select id="cmbTipoSalario" name="cmbTipoSalario" value="">
                            <?php 
                                echo $optPeriodos;
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr><th>Monto Salario</th><td><input id="txtMontoSalario" name="txtMontoSalario" type="text" value="0" /></td></tr>
                    <tr><th>Horas por Dia</th><td><input id="txtMontoSalario" name="txtMontoSalario" type="text" value="8" /></td></tr>
                    <tr><th>Prima Dominical</th><td><input id="txtPrimaDom" name="txtPrimaDom" type="text" value="8" /></td></tr>
                    <tr><th>Horas Extras</th><td><input id="txtHorasExtras" name="txtHorasExtras" type="text" value="0" /></td></tr>
                    <tr><th>Dia de Descanso Laborado</th><td><input id="txtDiaDescLab" name="txtDiaDescLab" type="text" value="0" /><input type="text" id="txtMontoDDL" name="txtMontoDDL" value="0" /></td></tr>
                </table>
            </form>

        <table  class="table table-sm table-bordered">
            <tr><th colspan="4">Resultados</th></tr>
            <tr><th>Concepto</th><th>Monto</th><th>Excento</th><th>Gravado</th>
            <tr><td>Salario [Periodo]</td><td></td><td></td><td></td></tr>
            <tr><td>Tiempo Extra [Periodo]</td><td></td><td></td><td></td></tr>
            <tr><td>Dia de Descanso Laborado</td><td></td><td></td><td></td></tr>
            <tr><td>Prima Dominical</td><td></td><td></td><td></td></tr>
            <tr><th>Totales</th><th></th><th></th><th></th></tr>
            <tr><td colspan="3">Limite Inferior ISR</td><td></td></tr>
            <tr><td colspan="3">Excedente Limite Inferior ISR</td><td></td></tr>
            <tr><td colspan="3">Porcentaje Aplicable Lim Inf ISR</td><td></td></tr>
            <tr><td colspan="3">ISR Marginal</td><td></td></tr>
            <tr><td colspan="3">Cuota Fija</td><td></td></tr>
            <tr><td colspan="3">Subsidio al Empleo Correspondiente</td><td></td></tr>
            <tr><th colspan="3">ISR a Retener [Periodo]</th><th></th></tr>
        </table>
        </div>
    </body>
</html>