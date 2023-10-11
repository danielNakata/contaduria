var general;

(function () {
  general = angular.module("general", []);

  general.controller('principalisr', function($scope, $http, $window, $location){

    let param = {
      periodoSel: {periodo:""}
      ,vacacionesSel: {}
      ,montoSalario: ""
      ,horasDia: 8
      ,salarioHora: 0
      ,primaDominical: 0
      ,horasExtra: 0
      ,txtDiaDescLab: 0
      ,txtMontoDDL: 0
      ,txtMontoSalarioDia: 0
      ,horasExtraTriples: 0
      ,horasExtraDobles: 0
      ,jornadaSel: ""
      ,montoHorasExtraDoble: 0
      ,montoHorasExtraDobleExcento:0
      ,montoHorasExtraDobleGravado:0
      ,montoHorasExtraTriple : 0
      ,montoHorasExtraTripleExcento : 0
      ,montoHorasExtraTripleGravado : 0
      ,txtMontoDDL : 0
      ,apanio: 2023
      ,txtMontoPrevisionSocial : 0
      ,txtMontoPrevisionSocialGravado : 0
      ,txtMontoPrevisionSocialDia : 0
      ,txtDiasTrabajadosAnnio : 0
      ,txtMontoAguinaldo : 0
      ,txtMontoAguinaldoDia : 0
      ,txtMontoAguinaldoGravado : 0
      ,txtMontoPrimaVacacional: 0
      ,txtMontoPrimaVacacionalDia : 0
      ,txtMontoPrimaVacacionalGravado: 0
      ,txtMontoIndemnizacion: 0
      ,txtMontoIndemnizacionExcenta: 0
      ,txtMontoIndemnizacionGravado: 0
      ,txtAniosTrabajados: 0
      ,txtMontoPrimaVacacionalDia: 0
      ,txtMontoPrimaVacacionalGravado: 0
      ,txtMontoBonos: 0
      ,txtMontoBonosExcento: 0
      ,txtMontoBonosGravado: 0
      ,txtMontoBonosDia: 0
      ,txtMontoPTU: 0
      ,txtMontoPTUExcento: 0
      ,txtMontoPTUGravado: 0
    };

    let lstCatUnidades    = [];
    let lstCatPeriodos    = [];
    let lstCatParametros  = [];
    let lstCatOperadores  = [];
    let lstCatJornadas    = [];
    let lstCatCatalogosResultado = [];
    let lstCatCatalogosResultadoOrigen = [];
    let lstCatRangosISR   = [];
    let lstCatRangosISRDescuentos   = [];
    let lstCatVacaciones = [];

    $scope.cargaInicial = function(){
      $scope.lstCatUnidades    = [];
      $scope.lstCatPeriodos    = [];
      $scope.lstCatParametros  = [];
      $scope.lstCatOperadores  = [];
      $scope.lstCatJornadas    = [];
      $scope.lstCatCatalogosResultado = [];
      $scope.lstCatCatalogosResultadoOrigen = [];
      $scope.lstCatRangosISR   = [];
      $scope.lstCatRangosISRDescuentos = [];
      $scope.lstCatVacaciones = [];


      $scope.param = {
        periodoSel: {periodo:""}
        ,vacacionesSel: {}
        ,montoSalario: ""
        ,horasDia: 8
        ,salarioHora: 0
        ,primaDominical: 0
        ,horasExtra: 0
        ,txtDiaDescLab: 0
        ,txtMontoDDL: 0
        ,txtMontoSalarioDia: 0
        ,horasExtraTriples: 0
        ,horasExtraDobles: 0
        ,jornadaSel: ""
        ,montoHorasExtraDoble: 0
        ,montoHorasExtraDobleExcento:0
        ,montoHorasExtraDobleGravado:0
        ,montoHorasExtraTriple : 0
        ,montoHorasExtraTripleExcento : 0
        ,montoHorasExtraTripleGravado : 0
        ,txtMontoDDL : 0
        ,apanio: 2023
        ,txtMontoPrevisionSocial : 0
        ,txtMontoPrevisionSocialGravado : 0
        ,txtMontoPrevisionSocialDia : 0
        ,txtDiasTrabajadosAnnio : 0
        ,txtMontoAguinaldo : 0
        ,txtMontoAguinaldoDia : 0
        ,txtMontoAguinaldoGravado : 0
        ,txtMontoPrimaVacacional: 0
        ,txtMontoPrimaVacacionalDia : 0
        ,txtMontoPrimaVacacionalGravado: 0
        ,txtMontoIndemnizacion: 0
        ,txtMontoIndemnizacionExcenta: 0
        ,txtMontoIndemnizacionGravado: 0
        ,txtAniosTrabajados: 0
        ,txtMontoPrimaVacacionalDia: 0
        ,txtMontoPrimaVacacionalGravado: 0
        ,txtMontoBonos: 0
        ,txtMontoBonosExcento: 0
        ,txtMontoBonosGravado: 0
        ,txtMontoBonosDia: 0
        ,txtMontoPTU: 0
        ,txtMontoPTUExcento: 0
        ,txtMontoPTUGravado: 0
      };

      $scope.cargaCatalogos();
      $scope.cargaRangosISR();
      $scope.cargaRangosISRDescuentos();
    };

    /*carga de catalogos*/
    $scope.cargaCatalogos = function(){
      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=1'
        }).then(function successCallback(response){
           $scope.lstCatUnidades = response.data.datos;
           //console.log($scope.lstCatUnidades);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=2'
        }).then(function successCallback(response){
           $scope.lstCatOperadores = response.data.datos;
           //console.log($scope.lstCatOperadores);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=3'
        }).then(function successCallback(response){
           $scope.lstCatParametros = response.data.datos;
           console.log($scope.lstCatParametros);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=4'
        }).then(function successCallback(response){
           $scope.lstCatPeriodos = response.data.datos;
           console.log($scope.lstCatPeriodos);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=5'
        }).then(function successCallback(response){
          $scope.lstCatJornadas = response.data.datos;
           console.log($scope.lstCatJornadas);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=6'
        }).then(function successCallback(response){
           $scope.lstCatCatalogosResultado = response.data.datos;
           $scope.lstCatCatalogosResultadoOrigen = response.data.datos;
           console.log($scope.lstCatCatalogosResultado);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=9'
        }).then(function successCallback(response){
           $scope.lstCatVacaciones = response.data.datos;
           console.log($scope.lstCatVacaciones);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

    };

    $scope.cargaCatalogosResultados = function(){
      try{
        $http({
          method: 'GET'
          ,url: 'services/catalogos.php?catalogo=6'
        }).then(function successCallback(response){
           $scope.lstCatCatalogosResultado = response.data.datos;
           $scope.lstCatCatalogosResultadoOrigen = response.data.datos;
           console.log($scope.lstCatCatalogosResultado);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.cargaRangosISR = function(){
      try{
          $http({
            method: 'GET'
            ,url: 'services/catalogos.php?catalogo=7&annio='+$scope.param.apanio
          }).then(function successCallback(response){
            $scope.lstCatRangosISR = response.data.datos;
            console.log($scope.lstCatRangosISR);
          }, function errorCallback(response){
            console.log("Error: ");
            console.log(response);
          });
        }catch(ex){
          console.log(ex);
        }
    };

    $scope.cargaCatVacaciones = function(){
      try{
          $http({
            method: 'GET'
            ,url: 'services/catalogos.php?catalogo=9&annio='+$scope.param.apanio
          }).then(function successCallback(response){
            $scope.lstCatVacaciones = response.data.datos;
            console.log($scope.lstCatVacaciones);
          }, function errorCallback(response){
            console.log("Error: ");
            console.log(response);
          });
        }catch(ex){
          console.log(ex);
        }
    };

    $scope.cargaRangosISRDescuentos = function(){
      try{
          $http({
            method: 'GET'
            ,url: 'services/catalogos.php?catalogo=8&annio='+$scope.param.apanio
          }).then(function successCallback(response){
            $scope.lstCatRangosISRDescuentos = response.data.datos;
            console.log($scope.lstCatRangosISRDescuentos);
          }, function errorCallback(response){
            console.log("Error: ");
            console.log(response);
          });
        }catch(ex){
          console.log(ex);
        }
    };

    $scope.calculaSalarioDiario = function(){
      try{
        console.log("entro aqui");
        if($scope.param.montoSalario > 0){
          if(typeof $scope.param.periodoSel !== 'undefined'){
            $scope.param.txtMontoSalarioDia = $scope.param.montoSalario / $scope.param.periodoSel.totaldias;
            $scope.calculaSalarioHora();
          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculaSalarioHora = function(){
      try{
        if($scope.param.horasDia > 0){
          if(typeof $scope.param.txtMontoSalarioDia !== 'undefined'){
            $scope.param.salarioHora = $scope.param.txtMontoSalarioDia / $scope.param.horasDia;
          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculoHorasDoble = function(){
      try{
        $scope.param.montoHorasExtraDobleGravado = 0;
        $scope.param.montoHorasExtraDobleExcento = 0;
        if($scope.param.salarioHora > 0){
          if(typeof $scope.param.horasExtraDobles !== 'undefined'){
            $scope.param.montoHorasExtraDoble = ($scope.param.salarioHora * $scope.param.horasExtraDobles)*2;
            if($scope.param.horasExtraDobles <= $scope.param.periodoSel.maxhorasextrasdoblesexcentas){
              $scope.param.montoHorasExtraDobleExcento = $scope.param.montoHorasExtraDoble;
            }else{
              $scope.param.montoHorasExtraDobleExcento = (($scope.param.periodoSel.maxhorasextrasdoblesexcentas) * $scope.param.salarioHora)*2;;
              $scope.param.montoHorasExtraDobleGravado = (($scope.param.horasExtraDobles - $scope.param.periodoSel.maxhorasextrasdoblesexcentas) * $scope.param.salarioHora)*2;
            }

          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculoHorasTriple = function(){
      try{
        $scope.param.montoHorasExtraTripleExcento = 0;
        $scope.param.montoHorasExtraTripleGravado = 0;
        if($scope.param.salarioHora > 0){
          if(typeof $scope.param.horasExtraTriples !== 'undefined'){
            $scope.param.montoHorasExtraTriple = ($scope.param.salarioHora * $scope.param.horasExtraTriples)*3;
            $scope.param.montoHorasExtraTripleExcento = 0;
            $scope.param.montoHorasExtraTripleGravado = $scope.param.montoHorasExtraTriple;
          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculoDiaLaborado = function(){
      $scope.param.txtMontoDDL = 0;
      try{
        if($scope.param.txtDiaDescLab > 0){
          if(typeof $scope.param.txtMontoSalarioDia !== 'undefined'){
            $scope.param.txtMontoDDL = ($scope.param.txtMontoSalarioDia * $scope.param.txtDiaDescLab)*2;
          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculaPrevisionSocialGravado = function(){
      $scope.param.txtMontoPrevisionSocialGravado = 0;
      $scope.param.txtMontoPrevisionSocialDia = 0;
      try{
        if(typeof $scope.param.txtMontoPrevisionSocial !== 'undefined'){
          $scope.param.txtMontoPrevisionSocialDia = $scope.param.txtMontoPrevisionSocial / $scope.param.periodoSel.totaldias;
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculaBonos = function(){
      $scope.param.txtMontoBonosDia = 0;
      $scope.param.txtMontoBonosExcento = 0;
      $scope.param.txtMontoBonosGravado = 0;
      let limbonificacion = parseFloat($scope.lstCatParametros[11].valor);
      try{
        if(typeof $scope.param.txtMontoBonos !== 'undefined'){
          if(parseFloat($scope.param.txtMontoBonos) > 0){
            limbonificacion = limbonificacion * parseInt($scope.param.periodoSel.totaldias);
            $scope.param.txtMontoBonosDia = parseFloat($scope.param.txtMontoBonos) / parseFloat($scope.param.periodoSel.totaldias);
            console.log(limbonificacion + "    " + $scope.param.txtMontoBonosDia);
            if(parseFloat($scope.param.txtMontoBonos) > limbonificacion){
              $scope.param.txtMontoBonosGravado = parseFloat($scope.param.txtMontoBonos) - limbonificacion;
              $scope.param.txtMontoBonosExcento = limbonificacion;
            }else{
              $scope.param.txtMontoBonosGravado = 0;
              $scope.param.txtMontoBonosExcento = parseFloat($scope.param.txtMontoBonos);
            }
          }
        }
      }catch(ex){
        console.log(ex);
      }
    }

    $scope.calculaPTU = function(){
      $scope.param.txtMontoPTUExcento = 0;
      $scope.param.txtMontoPTUGravado = 0;
      let limPTU = parseFloat($scope.lstCatParametros[12].valor);
      try{
        if(typeof $scope.param.txtMontoPTU !== undefined){
          if(parseFloat($scope.param.txtMontoPTU) > limPTU){
            $scope.param.txtMontoPTUExcento = parseFloat(limPTU);
            $scope.param.txtMontoPTUGravado = parseFloat($scope.param.txtMontoPTU) - parseFloat(limPTU);
          }else{
            $scope.param.txtMontoPTUExcento = parseFloat($scope.param.txtMontoPTU);
            $scope.param.txtMontoPTUGravado = 0;
          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculaAguinaldoGravado = function(){
      $scope.param.txtMontoAguinaldoGravado = 0;
      $scope.param.txtMontoAguinaldoDia = 0;
      let limAginaldo = parseFloat($scope.lstCatParametros[6].valor);
      let diasAguinaldo = parseFloat($scope.lstCatParametros[7].valor);
      try{
        $scope.param.txtMontoAguinaldoDia = $scope.param.txtMontoSalarioDia;
        limAginaldo = limAginaldo * parseInt($scope.param.periodoSel.totaldias);
        console.log($scope.param.txtMontoAguinaldo);
        if(typeof $scope.param.txtMontoAguinaldo !== 'undefined'){
          if(parseFloat($scope.param.txtMontoAguinaldo > 0)){
            if(parseFloat($scope.param.txtMontoAguinaldo) > limAginaldo){
              $scope.param.txtMontoAguinaldoGravado = parseFloat($scope.param.txtMontoAguinaldo)-limAginaldo;
            }
          }else{
            console.log("entro al else");
            $scope.param.txtMontoAguinaldo = $scope.param.txtMontoAguinaldoDia * diasAguinaldo;
            if($scope.param.txtDiasTrabajadosAnnio > 0){
              $scope.param.txtMontoAguinaldo = $scope.param.txtMontoAguinaldo / 365;
              $scope.param.txtMontoAguinaldo = $scope.param.txtMontoAguinaldo * $scope.param.txtDiasTrabajadosAnnio;
              if(parseFloat($scope.param.txtMontoAguinaldo) > limAginaldo){
                $scope.param.txtMontoAguinaldoGravado = parseFloat($scope.param.txtMontoAguinaldo)-limAginaldo;
              }else{
                $scope.param.txtMontoAguinaldoGravado = 0;
              }
            }else{
              $scope.param.txtMontoAguinaldo = 0;
            }
          }
        }else{
          $scope.param.txtMontoAguinaldo = 0;
          $scope.param.txtMontoAguinaldoDia = 0;
          $scope.param.txtMontoAguinaldoGravado = 0;
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculoIndemnizacion = function(){
      $scope.param.txtMontoIndemnizacionExcenta = 0;
      $scope.param.txtMontoIndemnizacionGravado = 0;
      let limIndemnizacion = parseFloat($scope.lstCatParametros[10].valor);
      try{
        if(typeof $scope.param.txtMontoIndemnizacion !== 'undefined'){
          if(parseFloat($scope.param.txtMontoIndemnizacion) >= parseFloat(limIndemnizacion)){
            $scope.param.txtMontoIndemnizacionGravado = parseFloat($scope.param.txtMontoIndemnizacion) - parseFloat(limIndemnizacion);
            $scope.param.txtMontoIndemnizacionExcenta = parseFloat(limIndemnizacion);
          }else{
            $scope.param.txtMontoIndemnizacionExcenta = parseFloat($scope.param.txtMontoIndemnizacion);
            $scope.param.txtMontoIndemnizacionGravado = 0;
          }
        }else{
          $scope.param.txtMontoIndemnizacion = 0;
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.calculaPrimaVacacional = function(){
      $scope.param.vacacionesSel = {};
      $scope.param.txtMontoPrimaVacacionalDia = 0;
      $scope.param.txtMontoPrimaVacacionalGravado = 0;
      let limPrima = parseFloat($scope.lstCatParametros[8].valor);
      let pctgPrima = parseFloat($scope.lstCatParametros[9].valor);
      try{
        //console.log($scope.param.txtAniosTrabajados);
        if(typeof $scope.param.txtAniosTrabajados !== 'undefined'){
          if($scope.param.txtAniosTrabajados > 0){
            let auxrango = "";
            for(let i = 0; i < $scope.lstCatVacaciones.length; i++){
              let auxrango = $scope.lstCatVacaciones[i];
              //console.log(auxrango);
              if((parseInt(auxrango.annioinicial)<= parseInt($scope.param.txtAniosTrabajados))
                &&(parseInt(auxrango.anniofinal) >= parseInt($scope.param.txtAniosTrabajados))){
                  $scope.param.vacacionesSel = auxrango;
                  break;
              }
            }
            //console.log($scope.param.vacacionesSel);
            $scope.param.txtMontoPrimaVacacional = parseFloat($scope.param.txtMontoSalarioDia) * pctgPrima * $scope.param.vacacionesSel.diasvacaciones;
          }else{
            $scope.param.txtMontoPrimaVacacional = 0;
          }
        }

        if(typeof $scope.param.txtMontoPrimaVacacional !== 'undefined'){
          if($scope.param.txtMontoPrimaVacacional > 0){
            if(parseFloat($scope.param.txtMontoPrimaVacacional) > limPrima){
              $scope.param.txtMontoPrimaVacacionalGravado = parseFloat($scope.param.txtMontoPrimaVacacional) - limPrima;
            }
          }
        }
      }catch(ex){
        console.log(ex);
      }
    };

    $scope.obtieneRangoISR = function(paidperiodo, pamontosaldo){
      let rangoSel = "";
      try{
        console.log(paidperiodo + " " + pamontosaldo);
        for(i = 0; i < $scope.lstCatRangosISR.length; i++){
          let aux = $scope.lstCatRangosISR[i];
          if(parseInt(aux.idperiodo,10) == parseInt(paidperiodo,10)){
            //console.log(aux);
            if(parseFloat(aux.limiteinferior) <= parseFloat(pamontosaldo) && parseFloat(aux.limitesuperior) >= parseFloat(pamontosaldo)){
              rangoSel = aux;
              break;
            }
          }
        }
      }catch(ex){
        console.log(ex);
        rangoSel = "-";
      }
      //console.log(rangoSel);
      return rangoSel;
    };

    $scope.obtieneRangoISRDescuento = function(paidperiodo, pamontosaldo){
      let rangoSel = "";
      try{
        console.log(paidperiodo + " " + pamontosaldo);
        for(i = 0; i < $scope.lstCatRangosISRDescuentos.length; i++){
          let aux = $scope.lstCatRangosISRDescuentos[i];
          if(parseInt(aux.idperiodo,10) == parseInt(paidperiodo,10)){
            console.log("son iguales los periodos: " + aux.idperiodo + "    " + paidperiodo);
            console.log(aux);
            console.log(aux.limitemaximo + " >= " + pamontosaldo + " && " + aux.limiteinferior + "<= " + pamontosaldo);
            if(parseFloat(aux.limitemaximo) >= parseFloat(pamontosaldo) && parseFloat(aux.limiteinferior) <= parseFloat(pamontosaldo)){
              rangoSel = aux;
              break;
            }
          }
        }
        if(rangoSel === ""){
          rangoSel = $scope.lstCatRangosISRDescuentos[($scope.lstCatRangosISRDescuentos.length - 1)];
          rangoSel.descuento = 0;
        }
      }catch(ex){
        console.log(ex);
        rangoSel = "-";
      }
      //console.log(rangoSel);
      return rangoSel;
    };

    $scope.realizaCalculo = function(){
      try{
        console.log($scope.param);
        $scope.lstCatCatalogosResultado = [];
        $scope.lstCatCatalogosResultado = $scope.lstCatCatalogosResultadoOrigen;

        /*comienza a llenar la tabla*/
        try{
          $scope.lstCatCatalogosResultado[0].monto = parseFloat($scope.param.montoSalario);
          $scope.lstCatCatalogosResultado[0].excento = 0;
          $scope.lstCatCatalogosResultado[0].gravado = parseFloat($scope.param.montoSalario) * parseFloat($scope.lstCatCatalogosResultado[0].pctggravado) * parseFloat($scope.lstCatCatalogosResultado[0].multiplicador);

          $scope.lstCatCatalogosResultado[1].monto = (parseFloat($scope.param.montoHorasExtraTriple) + parseFloat($scope.param.montoHorasExtraDoble))*parseFloat($scope.lstCatCatalogosResultado[0].multiplicador);
          $scope.lstCatCatalogosResultado[1].excento = (parseFloat($scope.param.montoHorasExtraTripleExcento) + parseFloat($scope.param.montoHorasExtraDobleExcento))*parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);
          $scope.lstCatCatalogosResultado[1].gravado = (parseFloat($scope.param.montoHorasExtraTripleGravado) + parseFloat($scope.param.montoHorasExtraDobleGravado))*parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);

          $scope.lstCatCatalogosResultado[2].monto = parseFloat($scope.param.txtMontoPrevisionSocial);
          $scope.lstCatCatalogosResultado[2].excento = parseFloat($scope.param.txtMontoPrevisionSocial);
          $scope.lstCatCatalogosResultado[2].gravado = $scope.param.txtMontoPrevisionSocialGravado;

          $scope.lstCatCatalogosResultado[3].monto = parseFloat($scope.param.txtMontoAguinaldo);
          $scope.lstCatCatalogosResultado[3].excento = parseFloat($scope.param.txtMontoAguinaldo) - parseFloat($scope.param.txtMontoAguinaldoGravado);
          $scope.lstCatCatalogosResultado[3].gravado = parseFloat($scope.param.txtMontoAguinaldoGravado);

          $scope.lstCatCatalogosResultado[4].monto = parseFloat($scope.param.txtMontoPrimaVacacional);
          $scope.lstCatCatalogosResultado[4].excento = parseFloat($scope.param.txtMontoPrimaVacacional) - parseFloat($scope.param.txtMontoPrimaVacacionalGravado);
          $scope.lstCatCatalogosResultado[4].gravado = parseFloat($scope.param.txtMontoPrimaVacacionalGravado);

          $scope.lstCatCatalogosResultado[5].monto = parseFloat($scope.param.txtMontoDDL) * parseFloat($scope.lstCatCatalogosResultado[2].multiplicador);
          $scope.lstCatCatalogosResultado[5].excento = parseFloat($scope.param.txtMontoDDL) * parseFloat($scope.lstCatCatalogosResultado[2].multiplicador);
          $scope.lstCatCatalogosResultado[5].gravado = 0;

          $scope.lstCatCatalogosResultado[6].monto = (parseFloat($scope.param.txtDiaDescLab)) * parseFloat($scope.lstCatParametros[0].valor) * parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);
          $scope.lstCatCatalogosResultado[6].excento = (parseFloat($scope.param.txtDiaDescLab)) * parseFloat($scope.lstCatParametros[0].valor) * parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);
          $scope.lstCatCatalogosResultado[6].gravado = 0

          $scope.lstCatCatalogosResultado[7].monto = parseFloat($scope.param.txtMontoIndemnizacion);
          $scope.lstCatCatalogosResultado[7].excento = parseFloat($scope.param.txtMontoIndemnizacionExcenta);
          $scope.lstCatCatalogosResultado[7].gravado = parseFloat($scope.param.txtMontoAguinaldoGravado);

          $scope.lstCatCatalogosResultado[8].monto = parseFloat($scope.param.txtMontoBonos);
          $scope.lstCatCatalogosResultado[8].excento = parseFloat($scope.param.txtMontoBonosExcento);
          $scope.lstCatCatalogosResultado[8].gravado = parseFloat($scope.param.txtMontoBonosGravado);

          $scope.lstCatCatalogosResultado[9].monto = parseFloat($scope.param.txtMontoPTU);
          $scope.lstCatCatalogosResultado[9].excento = parseFloat($scope.param.txtMontoPTUExcento);
          $scope.lstCatCatalogosResultado[9].gravado = parseFloat($scope.param.txtMontoPTUGravado);

          for(let i = 0; i < 10; i++){
            $scope.lstCatCatalogosResultado[10].monto = parseFloat($scope.lstCatCatalogosResultado[10].monto) + parseFloat($scope.lstCatCatalogosResultado[i].monto);
            $scope.lstCatCatalogosResultado[10].excento = parseFloat($scope.lstCatCatalogosResultado[10].excento) + parseFloat($scope.lstCatCatalogosResultado[i].excento);
            $scope.lstCatCatalogosResultado[10].gravado = parseFloat($scope.lstCatCatalogosResultado[10].gravado) + parseFloat($scope.lstCatCatalogosResultado[i].gravado);
          }

          $scope.param.rangoSel = $scope.obtieneRangoISR($scope.param.periodoSel.idperiodo, $scope.lstCatCatalogosResultado[10].gravado);
          //console.log($scope.param.rangoSel);
          $scope.param.rangoDescSel = $scope.obtieneRangoISRDescuento($scope.param.periodoSel.idperiodo, $scope.lstCatCatalogosResultado[10].gravado);
          console.log($scope.param.rangoDescSel);

          $scope.lstCatCatalogosResultado[11].gravado = parseFloat($scope.param.rangoSel.limiteinferior) * $scope.lstCatCatalogosResultado[11].multiplicador;
          $scope.lstCatCatalogosResultado[12].gravado = parseFloat($scope.lstCatCatalogosResultado[10].gravado) + parseFloat($scope.lstCatCatalogosResultado[11].gravado);
          $scope.lstCatCatalogosResultado[13].gravado = parseFloat($scope.param.rangoSel.pctgaplica);
          $scope.lstCatCatalogosResultado[14].gravado = parseFloat($scope.lstCatCatalogosResultado[12].gravado) * (parseFloat($scope.param.rangoSel.pctgaplica)/100);
          $scope.lstCatCatalogosResultado[15].gravado = parseFloat($scope.param.rangoSel.cuotafija) * $scope.lstCatCatalogosResultado[13].multiplicador; //cuota fija
          $scope.lstCatCatalogosResultado[16].gravado = $scope.param.rangoDescSel.descuento * parseFloat($scope.lstCatCatalogosResultado[14].multiplicador); //subsidio al empleo
          $scope.lstCatCatalogosResultado[17].gravado = $scope.lstCatCatalogosResultado[14].gravado + $scope.lstCatCatalogosResultado[15].gravado + $scope.lstCatCatalogosResultado[16].gravado; 

        }catch(ex){
          console.log(ex);
        }

      }catch(ex){
        console.log(ex);
      }
    };

  });
})();
