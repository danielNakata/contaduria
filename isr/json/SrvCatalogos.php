<?php
  include "../db/Conexion.php";
  include "../dao/Catalogos.php";
  class SrvCatalogos {


    public function getUnidades(){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatUnidades($conexion->conn);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }

    public function getVacaciones($paannio){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatVacaciones($conexion->conn, $paannio);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }


    public function getRangosISR($paannio){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatRangosISR($conexion->conn, $paannio);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }


    public function getRangosISRDescuento($paannio){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatRangosISRDescuento($conexion->conn, $paannio);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }


    public function getJornadas(){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatJornadas($conexion->conn);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }

    public function getCatalogosResultado(){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatConceptosResultado($conexion->conn);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }

    public function getOperadores(){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatOperadores($conexion->conn);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }

    public function getParametros(){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatParametros($conexion->conn);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }

    public function getPeriodos(){
      $salidaJSON = "";
      $conexion = new Conexion();
      $catalogos = new Catalogos();
      try{
        $conexion->creaConexionDB();
        $arrdatos = $catalogos->cargaCatPeriodos($conexion->conn);
        $tam = count($arrdatos);
        $jsonaux = "";
        $jsonarr = "";
        for($i = 0; $i < $tam; $i++){
            $arrkeys = get_object_vars($arrdatos[$i]);
            $jsonaux = "";
            foreach ($arrkeys as $key => $value) {
              $jsonaux .= ",\"$key\": \"$value\"";
            }
            $jsonarr .= ",{".substr($jsonaux,1)."}";
        }
        $jsonarr = "[".substr($jsonarr,1)."]";
        $salidaJSON = "{\"res\":1,\"msg\":\"DATOS OBTENIDOS\", \"datos\": $jsonarr }";
      }catch(Exception $ex){
        $salidaJSON = "{\"res\":-1,\"msg\":\"$ex->getMessage()\"}";
      }finally{
        $conexion->cierraConexionDB();
      }
      return $salidaJSON;
    }


  }

 ?>
