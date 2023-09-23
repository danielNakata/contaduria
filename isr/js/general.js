var general;

(function () {
  general = angular.module("general", []);

  general.controller('principalisr', function($scope, $http, $window, $location){

    let param = {
      periodoSel: {periodo:""}
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
      ,txtMontoDDL : 0;
    };

    let lstCatUnidades    = [];
    let lstCatPeriodos    = [];
    let lstCatParametros  = [];
    let lstCatOperadores  = [];
    let lstCatJornadas    = [];
    let lstCatCatalogosResultado = [];

    $scope.cargaInicial = function(){
      $scope.lstCatUnidades    = [];
      $scope.lstCatPeriodos    = [];
      $scope.lstCatParametros  = [];
      $scope.lstCatOperadores  = [];
      $scope.lstCatJornadas    = [];
      $scope.lstCatCatalogosResultado = [];

      $scope.param = {
        periodoSel: {periodo:""}
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
        ,txtMontoDDL : 0;
      };

      $scope.cargaCatalogos();
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
           console.log($scope.lstCatCatalogosResultado);
        }, function errorCallback(response){
          console.log("Error: ");
          console.log(response);
        });
      }catch(ex){
        console.log(ex);
      }

    }

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

    $scope.realizaCalculo = function(){
      try{
        console.log($scope.param);
        /*comienza a llenar la tabla*/
        try{
          $scope.lstCatCatalogosResultado[0].monto = parseFloat($scope.param.montoSalario);
          $scope.lstCatCatalogosResultado[0].excento = 0;
          $scope.lstCatCatalogosResultado[0].gravado = parseFloat($scope.param.montoSalario) * parseFloat($scope.lstCatCatalogosResultado[0].pctggravado) * parseFloat($scope.lstCatCatalogosResultado[0].multiplicador);

          $scope.lstCatCatalogosResultado[1].monto = (parseFloat($scope.param.montoHorasExtraTriple) + parseFloat($scope.param.montoHorasExtraDoble))*parseFloat($scope.lstCatCatalogosResultado[0].multiplicador);
          $scope.lstCatCatalogosResultado[1].excento = (parseFloat($scope.param.montoHorasExtraTripleExcento) + parseFloat($scope.param.montoHorasExtraDobleExcento))*parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);
          $scope.lstCatCatalogosResultado[1].gravado = (parseFloat($scope.param.montoHorasExtraTripleGravado) + parseFloat($scope.param.montoHorasExtraDobleGravado))*parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);

          $scope.lstCatCatalogosResultado[2].monto = parseFloat($scope.param.txtMontoDDL) * parseFloat($scope.lstCatCatalogosResultado[2].multiplicador);
          $scope.lstCatCatalogosResultado[2].excento = parseFloat($scope.param.txtMontoDDL) * parseFloat($scope.lstCatCatalogosResultado[2].multiplicador);
          $scope.lstCatCatalogosResultado[2].gravado = 0;

          $scope.lstCatCatalogosResultado[3].monto = 51.82 * parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);
          $scope.lstCatCatalogosResultado[3].excento = 51.82 * parseFloat($scope.lstCatCatalogosResultado[1].multiplicador);
          $scope.lstCatCatalogosResultado[3].gravado = 0

          for(let i = 0; i < 4; i++){
            $scope.lstCatCatalogosResultado[4].monto = parseFloat($scope.lstCatCatalogosResultado[4].monto) + parseFloat($scope.lstCatCatalogosResultado[i].monto);
            $scope.lstCatCatalogosResultado[4].excento = parseFloat($scope.lstCatCatalogosResultado[4].excento) + parseFloat($scope.lstCatCatalogosResultado[i].excento);
            $scope.lstCatCatalogosResultado[4].gravado = parseFloat($scope.lstCatCatalogosResultado[4].gravado) + parseFloat($scope.lstCatCatalogosResultado[i].gravado);
          }


        }catch(ex){

        }

      }catch(ex){
        console.log(ex);
      }
    };

  });
})();
