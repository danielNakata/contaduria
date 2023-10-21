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
                      <th>Prevision Social</th>
                      <td>
                        <input id="txtMontoPrevisionSocial" name="txtMontoPrevisionSocial" ng-model="param.txtMontoPrevisionSocial" type="text" ng-change="calculaPrevisionSocialGravado()" />
                        <!--<input id="txtMontoSalarioDia" name="txtMontoSalarioDia" ng-model="param.txtMontoSalarioDia" type="text" /> -->
                        Prevision Social Dia: <strong><span id="txtMontoPrevisionSocialDia" name="txtMontoPrevisionSocialDia">${{param.txtMontoPrevisionSocialDia|number:2}}</span></strong>
                        Prevision Social Gravado: <strong><span id="txtMontoPrevisionSocialGravado" name="txtMontoPrevisionSocialGravado">${{param.txtMontoPrevisionSocialGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Dias Trabajados en el Año</th>
                      <td>
                        <input id="txtDiasTrabajadosAnnio" name="txtDiasTrabajadosAnnio" ng-model="param.txtDiasTrabajadosAnnio" type="text" ng-change="calculaAguinaldoGravado()" />
                      </td>
                    </tr>
                    <tr>
                      <th>Aguinaldo</th>
                      <td>
                        <input id="txtMontoAguinaldo" name="txtMontoAguinaldo" ng-model="param.txtMontoAguinaldo" type="text" ng-blur="calculaAguinaldoGravado1()" />
                        <!--<input id="txtMontoSalarioDia" name="txtMontoSalarioDia" ng-model="param.txtMontoSalarioDia" type="text" /> -->
                        Aguinaldo Diario: <strong><span id="txtMontoAguinaldoDia" name="txtMontoAguinaldoDia">${{param.txtMontoAguinaldoDia|number:2}}</span></strong>
                        Aguinaldo Gravado: <strong><span id="txtMontoAguinaldoGravado" name="txtMontoAguinaldoGravado">${{param.txtMontoAguinaldoGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Años Trabajados</th>
                      <td>
                        <input id="txtAniosTrabajados" name="txtAniosTrabajados" ng-model="param.txtAniosTrabajados" type="text" ng-change="calculaPrimaVacacional()" />
                      </td>
                    </tr>
                    <tr>
                      <th>Prima Vacacional</th>
                      <td>
                        <input id="txtMontoPrimaVacacional" name="txtMontoPrimaVacacional" ng-model="param.txtMontoPrimaVacacional" type="text" ng-blur="calculaPrimaVacacional1()" />
                        <!--<input id="txtMontoSalarioDia" name="txtMontoSalarioDia" ng-model="param.txtMontoSalarioDia" type="text" /> -->
                        Prima Vacacional Diario: <strong><span id="txtMontoPrimaVacacionalDia" name="txtMontoPrimaVacacionalDia">${{param.txtMontoPrimaVacacionalDia|number:2}}</span></strong>
                        Prima Vacacional Gravado: <strong><span id="txtMontoPrimaVacacionalGravado" name="txtMontoPrimaVacacionalGravado">${{param.txtMontoPrimaVacacionalGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Bonos</th>
                      <td>
                        <input id="txtMontoBonos" name="txtMontoBonos" ng-model="param.txtMontoBonos" type="text" ng-change="calculaBonos()" />
                        <!--<input id="txtMontoSalarioDia" name="txtMontoSalarioDia" ng-model="param.txtMontoSalarioDia" type="text" /> -->
                        Bonos Diario: <strong><span id="txtMontoBonosDia" name="txtMontoBonosDia">${{param.txtMontoBonosDia|number:2}}</span></strong>
                        Bonos Excento: <strong><span id="txtMontoBonosExcento" name="txtMontoBonosExcento">${{param.txtMontoBonosExcento|number:2}}</span></strong>
                        Bonos Gravado: <strong><span id="txtMontoBonosGravado" name="txtMontoBonosGravado">${{param.txtMontoBonosGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>PTU</th>
                      <td>
                        <input id="txtMontoPTU" name="txtMontoPTU" ng-model="param.txtMontoPTU" type="text" ng-change="calculaPTU()" />
                        Bonos Excento: <strong><span id="txtMontoPTUExcento" name="txtMontoPTUExcento">${{param.txtMontoPTUExcento|number:2}}</span></strong>
                        Bonos Gravado: <strong><span id="txtMontoPTUGravado" name="txtMontoPTUGravado">${{param.txtMontoPTUGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Ancipos / Rendimientos</th>
                      <td>
                        <input id="txtMontoAnticipo" name="txtMontoAnticipo" ng-model="param.txtMontoAnticipo" type="text" ng-change="calculaAnticipo()" />
                        Anticipos Excento: <strong><span id="txtMontoAnticipoExcento" name="txtMontoAnticipoExcento">${{param.txtMontoAnticipoExcento|number:2}}</span></strong>
                        Anticipos Gravado: <strong><span id="txtMontoAnticipoGravado" name="txtMontoAnticipoGravado">${{param.txtMontoAnticipoGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Honorarios</th>
                      <td>
                        <input id="txtMontoHonorario" name="txtMontoHonorario" ng-model="param.txtMontoHonorario" type="text" ng-change="calculaHonorario()" />
                        Honorarios Excento: <strong><span id="txtMontoHonorarioExcento" name="txtMontoHonorarioExcento">${{param.txtMontoHonorarioExcento|number:2}}</span></strong>
                        Honorarios Gravado: <strong><span id="txtMontoHonorarioGravado" name="txtMontoHonorarioGravado">${{param.txtMontoHonorarioGravado|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <th>Indemnización</th>
                      <td>
                        <input id="txtMontoIndemnizacion" name="txtMontoIndemnizacion" ng-model="param.txtMontoIndemnizacion" type="text" ng-change="calculoIndemnizacion()" />
                        Indemnizacion Excenta: <strong><span id="txtMontoIndemnizacionExcenta" name="txtMontoIndemnizacionExcenta">${{param.txtMontoIndemnizacionExcenta|number:2}}</span></strong>
                        Indemnizacion Gravada: <strong><span id="txtMontoIndemnizacionGravado" name="txtMontoIndemnizacionGravado">${{param.txtMontoIndemnizacionGravado|number:2}}</span></strong>
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
                        <!-- <input type="text" id="txtMontoDDL" name="txtMontoDDL" ng-model="param.txtMontoDDL" />-->
                        Monto Dia de Descanso Laborado: <strong><span id="txtMontoDDL" name="txtMontoDDL">{{param.txtMontoDDL|number:2}}</span></strong>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="width: 100%; text-align:right;">
                        <button class="btn btn-primary btn-sm" style="width: 15%;" type="button" ng-click="realizaCalculo()">Calcular ISR</button>
                        <button class="btn btn-warning btn-sm" style="width: 15%;" type="button" ng-click="cargaInicial()">Reiniciar</button>
                      </td>
                    </tr>
                </table>
            </form>

          <table  class="table table-sm table-bordered">
              <tr><th colspan="4">Resultados</th></tr>
              <tr><th>Concepto</th>                            <th>Monto</th>                    <th>Excento</th>            <th>Gravado</th></tr>
              <tr ng-repeat="item in lstCatCatalogosResultado">
                <td style="text-align: left">({{item.idorden}}) - {{item.concepto.replace("comodin", param.periodoSel.periodo)}}</td>
                <td style="text-align: right">{{item.monto|number:2}}</td>
                <td style="text-align: right">{{item.excento|number:2}}</td>
                <td style="text-align: right">{{item.gravado|number:2}}</td>
              </tr>
          </table>
        </div>
    </body>
</html>
