<?php
    include "../dto/CatOperadores.php";
    include "../dto/CatParametro.php";
    include "../dto/CatPeriodos.php";
    include "../dto/CatUnidades.php";
    include "../dto/CatJornadas.php";
    include "../dto/CatConceptosResultados.php";
    include "../dto/RangosISR.php";
    include "../dto/RangosISRDescuento.php";

    class Catalogos{


        public function cargaCatUnidades($conn){
            $arr = "";
            try{
                $resultado = $conn->query("select idunidad, unidad, idestatus from contadb.catunidades where idestatus = 1 order by idunidad");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new CatUnidades();
                        $cat->idunidad = $fila["idunidad"];
                        $cat->unidad = $fila["unidad"];
                        $cat->idestatus = $fila["idestatus"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }

        public function cargaCatConceptosResultado($conn){
            $arr = "";
            try{
                $resultado = $conn->query("select idfila, idorden, concepto, multiplicador, monto, excento, gravado, idestatus, pctggravado from contadb.catconceptosresultado where idestatus = 1 order by idorden asc");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new CatUnidades();
                        $cat->idfila = $fila["idfila"];
                        $cat->idorden = $fila["idorden"];
                        $cat->concepto = $fila["concepto"];
                        $cat->multiplicador = $fila["multiplicador"];
                        $cat->monto = $fila["monto"];
                        $cat->excento = $fila["excento"];
                        $cat->gravado = $fila["gravado"];
                        $cat->idestatus = $fila["idestatus"];
                        $cat->pctggravado = $fila["pctggravado"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }


        public function cargaCatJornadas($conn){
            $arr = "";
            try{
                $resultado = $conn->query("select idjornada, jornada, maxhorastrabajo, maxhorasextras, annio, idestatus from contadb.catjornadas where idestatus = 1 order by idjornada asc");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new CatJornadas();
                        $cat->idjornada = $fila["idjornada"];
                        $cat->jornada = $fila["jornada"];
                        $cat->maxhorastrabajo = $fila["maxhorastrabajo"];
                        $cat->maxhorasextras = $fila["maxhorasextras"];
                        $cat->annio = $fila["annio"];
                        $cat->idestatus = $fila["idestatus"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }


        public function cargaCatRangosISR($conn, $paannio){
            $arr = "";
            try{
                $resultado = $conn->query("SELECT idrango, idperiodo, annio, limiteinferior, limitesuperior
                                                , cuotafija, pctgaplica, idestatus, orden
                                            FROM contadb.rangosisr
                                            WHERE annio = $paannio AND idestatus = 1
                                            ORDER BY idperiodo ASC, orden ASC ");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new RangosISR();
                        $cat->idrango = $fila["idrango"];
                        $cat->idperiodo = $fila["idperiodo"];
                        $cat->annio = $fila["annio"];
                        $cat->limiteinferior = $fila["limiteinferior"];
                        $cat->pctgaplica = $fila["pctgaplica"];
                        $cat->cuotafija = $fila["cuotafija"];
                        $cat->limitesuperior = $fila["limitesuperior"];
                        $cat->idestatus = $fila["idestatus"];
                        $cat->orden = $fila["limitesuperior"];
                        $cat->orden = $fila["orden"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }


        public function cargaCatRangosISRDescuento($conn, $paannio){
            $arr = "";
            try{
                $resultado = $conn->query("SELECT idretencion, idperiodo, annio, limiteinferior, limitemaximo 
                                                , descuento, idestatus, orden 
                                            FROM contadb.rangosisrdescuento 
                                            WHERE annio = $paannio AND idestatus = 1 
                                            ORDER BY idperiodo ASC, orden ASC ");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new RangosISRDescuento();
                        $cat->idretencion = $fila["idretencion"];
                        $cat->idperiodo = $fila["idperiodo"];
                        $cat->annio = $fila["annio"];
                        $cat->limiteinferior = $fila["limiteinferior"];
                        $cat->limitemaximo = $fila["limitemaximo"];
                        $cat->descuento = $fila["descuento"];
                        $cat->idestatus = $fila["idestatus"];
                        $cat->orden = $fila["orden"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }


        public function cargaCatOperadores($conn){
            $arr = "";
            try{
                $resultado = $conn->query("select idoperador, operador, idestatus from contadb.catoperadores where idestatus = 1 order by idoperador");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new CatOperadores();
                        $cat->idoperador = $fila["idoperador"];
                        $cat->operador = $fila["operador"];
                        $cat->idestatus = $fila["idestatus"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }

        public function cargaCatPeriodos($conn){
            $arr = "";
            try{
                $resultado = $conn->query("select idperiodo, periodo, totaldias, diasdescanso, idestatus, maxhorasextrasdobles, maxhorasextrastriples, maxhorasextrasdoblesexcentas from contadb.catperiodos where idestatus = 1 order by idperiodo");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new CatPeriodos();
                        $cat->idperiodo = $fila["idperiodo"];
                        $cat->periodo = $fila["periodo"];
                        $cat->totaldias = $fila["totaldias"];
                        $cat->diasdescanso = $fila["diasdescanso"];
                        $cat->idestatus = $fila["idestatus"];
                        $cat->maxhorasextrasdobles = $fila["maxhorasextrasdobles"];
                        $cat->maxhorasextrastriples = $fila["maxhorasextrastriples"];
                        $cat->maxhorasextrasdoblesexcentas = $fila["maxhorasextrasdoblesexcentas"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }

        public function cargaCatParametros($conn){
            $arr = "";
            try{
                $resultado = $conn->query("SELECT a.idparametro, a.parametro, a.valor, a.idoperador, a.idunidad, a.idperiodo
                , a.limiteinf, a.limitemax, a.idestatus, a.annio, a.aplicaisr, a.pctgaplicaisr
                ,b.operador
                ,c.unidad
                ,d.periodo, d.totaldias, d.diasdescanso
                FROM contadb.catparametros a
                INNER JOIN contadb.catoperadores b ON a.idoperador = b.idoperador AND b.idestatus = 1
                INNER JOIN contadb.catunidades c ON a.idunidad = c.idunidad AND c.idestatus = 1
                INNER JOIN contadb.catperiodos d ON a.idperiodo = d.idperiodo AND d.idestatus = 1
                WHERE a.idestatus = 1
                ORDER BY a.idparametro ASC");
                if($resultado){
                    $arr = array();
                    while($fila = $resultado->fetch_assoc()){
                        $cat = new CatParametro();
                        $cat->idparametro = $fila["idparametro"];
                        $cat->parametro = $fila["parametro"];
                        $cat->valor = $fila["valor"];
                        $cat->idoperador = $fila["idoperador"];
                        $cat->idunidad = $fila["idunidad"];
                        $cat->idperiodo = $fila["idperiodo"];
                        $cat->limiteinf = $fila["limiteinf"];
                        $cat->limitemax = $fila["limitemax"];
                        $cat->idestatus = $fila["idestatus"];
                        $cat->annio = $fila["annio"];
                        $cat->aplicaisr = $fila["aplicaisr"];
                        $cat->pctgaplicaisr = $fila["pctgaplicaisr"];

                        $cat->operador = $fila["operador"];

                        $cat->unidad = $fila["unidad"];

                        $cat->periodo = $fila["periodo"];
                        $cat->totaldias = $fila["totaldias"];
                        $cat->diasdescanso = $fila["diasdescanso"];
                        array_push($arr, $cat);
                    }
                    //print_r($arr);
                    $resultado->free();
                }
            }catch(Exception $ex){
                print_r($ex);
                $arr = $ex->getMessage();
            }
            return $arr;
        }

    }

?>
