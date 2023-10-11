<?php
  include "../json/SrvCatalogos.php";

  $idcatalogo = 0;
  $annio = 2023;
  $salida = "";
  if(isset($_GET["catalogo"])){
    $idcatalogo = $_GET["catalogo"];

    if(isset($_GET["annio"])){
      $annio = $_GET["annio"];
    }

    $srv = new SrvCatalogos();
    switch ($idcatalogo){
      case "1": //unidades
        $salida = $srv->getUnidades();
        break;
      case "2": //operadores
        $salida = $srv->getOperadores();
        break;
      case "3": //parametros
        $salida = $srv->getParametros();
        break;
      case "4": //periodos
        $salida = $srv->getPeriodos();
        break;
      case "5": //jornadas
        $salida = $srv->getJornadas();
        break;
      case "6": //jornadas
        $salida = $srv->getCatalogosResultado();
        break;
      case "7": //jornadas
        $salida = $srv->getRangosISR($annio);
        break;
      case "8": //jornadas
        $salida = $srv->getRangosISRDescuento($annio);
        break;
      case "9": //vacaciones
        $salida = $srv->getVacaciones($annio);
        break;

    }

  }

  header('Content-Type: application/json; charset=utf-8');
  echo $salida;

 ?>
