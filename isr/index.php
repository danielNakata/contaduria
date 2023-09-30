<?php

?>
<html ng-app="general">
    <head>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
        <script src="js/angular.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/general.js"></script>
        <title>
            Calculo de ISR
        </title>
    </head>
    <body ng-controller="principalisr" ng-init="cargaInicial()">
        <div class="container">
            <form>
                <table class="table table-sm table-bordered">
                    
                    <tr>
                        <th>Tipo Salario</th>
                        <td>
                            <select id="cmbTipoSalario" name="cmbTipoSalario" ng-model="param.periodoSel">
                              <option ng-repeat="item in lstCatPeriodos" ng-value="item">{{item.periodo}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                      <th>Año de Ejercicio</th>
                      <td>
                        <input id="txtAnnio" name="txtAnnio" ng-model="param.apanio" type="text" />
                      </td>
                    </tr>
                    <tr>
                      <th>Monto Salario</th>
                      <td>
                        <input id="txtMontoSalario" name="txtMontoSalario" ng-model="param.montoSalario" type="text" ng-change="calculaSalarioDiario()" />
                        <!--<input id="txtMontoSalarioDia" name="txtMontoSalarioDia" ng-model="param.txtMontoSalarioDia" type="text" /> -->
                        Salario Diario: <strong><span id="txtMontoSalarioDia" name="txtMontoSalarioDia">${{param.txtMontoSalarioDia|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                        <th>Tipo de Jornada</th>
                        <td>
                            <select id="cmbTipoJornada" name="cmbTipoJornada" ng-model="param.jornadaSel">
                              <option ng-repeat="item in lstCatJornadas" ng-value="item">{{item.jornada}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                      <th>Horas por Dia</th>
                      <td>
                        <input id="txtHorasDia" name="txtHorasDia" ng-model="param.horasDia" ng-value="0" type="text" ng-change="calculaSalarioHora()" />
                        <!-- <input id="txtHorasDiaMax" name="txtHorasDiaMax" ng-model="param.jornadaSel.maxhorastrabajo" type="text" /> -->
                        Horas de Trabajo Máximas: <strong><span id="txtHorasDiaMax" name="txtHorasDiaMax">{{param.jornadaSel.maxhorastrabajo|number:0}}</span></strong>
                        <!-- <input id="txtMontoSalarioHora" name="txtMontoSalarioHora" ng-model="param.salarioHora" type="text" /> -->
                        Monto por Hora de Trabajo: <strong id="txtMontoSalarioHora" name="txtMontoSalarioHora">{{param.salarioHora|number:0}}</strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Horas Extras Dobles</th>
                      <td>
                        <input id="txtHorasExtraDoble" name="txtHorasExtraDoble" type="text" ng-model="param.horasExtraDobles" ng-change="calculoHorasDoble()" />
                        <!-- <input id="txtHorasExtraDobleMax" name="txtHorasExtraDobleMax" type="text" ng-value="param.periodoSel.maxhorasextrasdobles" /> -->
                        <br />Maximo Horas Extra por Periodo: <strong><span id="txtHorasExtraDobleMax" name="txtHorasExtraDobleMax">{{param.periodoSel.maxhorasextrasdobles|number:0}}</span></strong>
                        <!-- <input id="txtMontoHorasExtraDoble" name="txtMontoHorasExtraDoble" type="text" ng-model="param.montoHorasExtraDoble" />-->
                        <br />Monto Horas Extra Dobles: <strong><span id="txtMontoHorasExtraDoble" name="txtMontoHorasExtraDoble">${{param.montoHorasExtraDoble|number:2}}</span></strong>
                        <!-- <input id="montoHorasExtraDobleExcento" name="montoHorasExtraDobleExcento" type="text" ng-model="param.montoHorasExtraDobleExcento" /> -->
                        <br />Monto Excento Horas Extra Dobles: <strong><span id="montoHorasExtraDobleExcento" name="montoHorasExtraDobleExcento">${{param.montoHorasExtraDobleExcento|number:2}}</span></strong>
                        <!-- <input id="montoHorasExtraDobleGravado" name="montoHorasExtraDobleGravado" type="text" ng-model="param.montoHorasExtraDobleGravado" /> -->
                        <br />Monto Gravado Horas Extra Dobles: <strong><span id="montoHorasExtraDobleGravado" name="montoHorasExtraDobleGravado">${{param.montoHorasExtraDobleGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Horas Extras Triples</th>
                      <td>
                        <input id="txtHorasExtraTriple" name="txtHorasExtraTriple" type="text" ng-model="param.horasExtraTriples" ng-change="calculoHorasTriple()" />
                        <!-- <input id="txtHorasExtraTripleMax" name="txtHorasExtraTripleMax" type="text" ng-value="param.periodoSel.maxhorasextrastriples" /> -->
                        <br />Maximo Horas Extra por Periodo: <strong><span id="txtHorasExtraTripleMax" name="txtHorasExtraTripleMax">{{param.periodoSel.maxhorasextrastriples|number:0}}</span></strong>
                        <!-- <input id="txtMontoHorasExtraTriple" name="txtMontoHorasExtraTriple" type="text" ng-model="param.montoHorasExtraTriple" />-->
                        <br />Monto Horas Extra Triple: <strong><span id="txtHorasExtraTripleMax" name="txtHorasExtraTripleMax">${{param.montoHorasExtraTriple|number:2}}</span></strong>
                        <!-- <input id="montoHorasExtraTripleExcento" name="montoHorasExtraTripleExcento" type="text" ng-model="param.montoHorasExtraTripleExcento" /> -->
                        <br />Monto Horas Extra Triple Excento: <strong><span id="montoHorasExtraTripleExcento" name="montoHorasExtraTripleExcento">${{param.montoHorasExtraTripleExcento|number:2}}</span></strong>
                        <!-- <input id="montoHorasExtraTripleGravado" name="montoHorasExtraTripleGravado" type="text" ng-model="param.montoHorasExtraTripleGravado" /> -->
                        <br />Monto Horas Extra Triple Gravado: <strong><span id="montoHorasExtraTripleGravado" name="montoHorasExtraTripleGravado">${{param.montoHorasExtraTripleGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Dia de Descanso Laborado</th>
                      <td>
                        <input id="txtDiaDescLab" name="txtDiaDescLab" type="text" ng-model="param.txtDiaDescLab" ng-change="calculoDiaLaborado()" />
                        <input id="txtDiaDescPeriodo" name="txtDiaDescPeriodo" type="text" ng-model="param.txtDiaDescPeriodo" ng-value="param.periodoSel.diasdescanso" />
                        <input type="text" id="txtMontoDDL" name="txtMontoDDL" ng-model="param.txtMontoDDL" />
                      </td>
                    </tr>
                    <tr>
                      <th colspan="1">Sueldos a Calcular</th>
                      <td><button class="btn btn-primary btn-sm" type="button" ng-click="realizaCalculo()">Calcular</button></td>
                    </tr>
                </table>
            </form>

        <table  class="table table-sm table-bordered">
            <tr><th colspan="4">Resultados</th></tr>
            <tr><th>Concepto</th>                            <th>Monto</th>                    <th>Excento</th>            <th>Gravado</th></tr>
            <tr ng-repeat="item in lstCatCatalogosResultado">
              <td style="text-align: left">{{item.concepto.replace("comodin", param.periodoSel.periodo)}}</td>
              <td style="text-align: right">{{item.monto|number:2}}</td>
              <td style="text-align: right">{{item.excento|number:2}}</td>
              <td style="text-align: right">{{item.gravado|number:2}}</td>
            </tr>

            <!--
            <tr><td>Salario {{param.periodoSel.periodo}}</td><td></td>                         <td></td>                   <td></td></tr>
            <tr><td>Tiempo Extra {{param.periodoSel.periodo}}</td><td></td>                    <td></td>                   <td></td></tr>
            <tr><td>Dia de Descanso Laborado</td>            <td></td>                         <td></td>                   <td></td></tr>
            <tr><td>Prima Dominical</td>                     <td></td>                         <td></td>                   <td></td></tr>
            <tr><th>Totales {{param.periodoSel.periodo}}</th><th></th>                         <th></th>                   <th></th></tr>
            <tr><td colspan="3">Limite Inferior ISR</td>                                                                   <td></td></tr>
            <tr><td colspan="3">Excedente Limite Inferior ISR</td>                                                         <td></td></tr>
            <tr><td colspan="3">Porcentaje Aplicable Lim Inf ISR</td>                                                      <td></td></tr>
            <tr><td colspan="3">ISR Marginal</td>                                                                          <td></td></tr>
            <tr><td colspan="3">Cuota Fija</td>                                                                            <td></td></tr>
            <tr><td colspan="3">Subsidio al Empleo Correspondiente</td>                                                    <td></td></tr>
            <tr><th colspan="3">ISR a Retener {{param.periodoSel.periodo}}</th>                                            <th></th></tr>
            -->
        </table>
        </div>
    </body>
</html>
