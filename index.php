<?php
include_once('tcpdf.php');

$fechaE = '20/06/2023';
$cClues = 'Clue';
$cNombreUnidad = "Nombre unidad";
$cCurp = 'Curp';
$nombre_medico = "Nombre medico";
$cTipoPersonal = "Tipo personal";
$Cedula1 = "Cedula";

// Crea un nuevo objeto TCPDF
$pdf = new TCPDF('L', PDF_UNIT, 'Oficio', true, 'UTF-8');

// Establece algunas propiedades del documento
$pdf->SetTitle('Mi documento PDF');
// $pdf->SetMargins('2', '1', '2');
$pdf->SetAutoPageBreak(TRUE, '8');

$pdf->SetFont('helvetica', '', 6);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// Agrega una página al documento
$pdf->AddPage();
$tbl = '';

//Cabecera y columnas de información
$tbl = $tbl . '
<table width="100%" border="1">
  <tr>
    <td width="12%" align="center"><br><br><img src="titulos/salud.png" width="60px"><br></td>
    <td width="76%" style="font-size:9px;" align="center"><br><br><b>H O J A&nbsp;&nbsp;D I A R I A&nbsp;&nbsp;D E&nbsp;&nbsp;C O N S U L T A&nbsp;&nbsp;E X T E R N A&nbsp;&nbsp;D E&nbsp;&nbsp;S A L U D&nbsp;&nbsp;M E N T A L</b></td>
    <td width="12%" align="center"><br><br><br><b> FECHA:</b> ' . $fechaE . '</td>
  </tr>
  <tr>
    <td width="12%"><b> CLUES:</b> ' . $cClues . '</td>
    <td width="14%"><b> NOMBRE UNIDAD:</b> ' . $cNombreUnidad . '</td>
    <td width="36%"><b> CURP:</b> ' . $cCurp . ' <br><b> NOMBRE DEL PRESTADOR DEL SERVICIO</b> ' . $nombre_medico . '</td>
    <td width="14%"><b> TIPO DE PERSONAL:</b><br> ' . $cTipoPersonal . '</td>
    <td width="12%"><b> CÉDULA PROFESIONAL:</b><br> ' . $Cedula1 . '</td>
    <td width="12%"><b> SERVICIO:</b><br> SALUD MENTAL</td>
  </tr>
  </table>';

//Descripción de las etiquetas
$tbl = $tbl . '
  <table>
    <tr>
      <td style="border-left: 1px solid black;" width="1%"></td>
      <td style="font-size:4.5px" width="41%">
      <b>TIPO DE PERSONAL:</b> 15.PASANTE DE PSICOLOGÍA 16.PSICÓLOGO 17.RESIDENTE DE PSIQUIATRA 18.PSIQUIATRÍA 19.MÉDICA(O) GENERAL HABILITADO PARA SALUD MENTAL 24.MÉDICA(O) ESPECIALISTA HABILITADO PARA SALUD MENTAL 25.LICENCIADA(O) EN GERONTOLOGÍA 88.OTRAS(OS)<br>
      <b>SERVICIO:</b> 1.ATENCIÓN A ADICCIONES 2.ATENCIÓN A LA VIOLENCIA CONTRA LA MUJER 18.PRECONSULTA 20.PSICOLOGÍA 15.PAIDOPSIQUIATRÍA 19.PSICOGERIATRÍA 21.PSIQUIATRÍA 22.SERVICIO AMIGABLE 60.GERONTOLOGÍA 88.OTROS<br>
      <b>1. DERECHOHABIENCIA:</b> 1.NINGUNA 2.IMSS 3.ISSTE 4.PEMEX 5.SEDENA 6.SEMAR 10.IMSS BIENESTAR 11.ISSFAM 13.INSABI 8.OTRA 99.SE IGNORA<br>
      <b>2. CLAVE DE LA EDAD:</b> M.MESES A.AÑOS<br>
      <b>3. SEXO:</b> 1.HOMBRE 2.MUJER 3.INTERSEXUAL 9.NO ESPECIFICADO<br>
      <b>4. DIFICULTAD PARA (DISCAPACIDAD):</b> A) 1.VER 2.ESCUCHAR 3.CAMINAR 4.USAR BRAZOS/MANOS 5.APRENDER/RECORDAR 6.CUIDADO PERSONAL 7.HABLAR/COMUNICARSE 8.EMOCIONAL/MENTAL 9.NINGUNA B) 1.POCA DIFICULTAD 2.MUCHA DIFICULTAD 3.NO PUEDE HACERLO 8.SIN DIFICULTAD C) 1.ENFERMEDAD 2.EDAD AVANZADA 3.NACIÓ ASÍ 4.ACCIDENTE 5.VIOLENCIA 6.OTRA CAUSA 9.SIN DIFICULTAD<br>
      </td>
      <td style="font-size:4.5px" width="30%">
      <b>RT (RELACIÓN TEMPORAL POR MOTIVO):</b> 0. PRIMERA VEZ 1.SUBSECUENTE<br>
      <b>5. DERIVACIÓN PRECONSULTA:</b> 1.CONSULTA EXTERNA 2.URGENCIAS 3.DOMICILIO 4.OTRA UNIDAD<br>
      <b>6. EVALUACIÓN PSICOLÓGICA:</b> 1.APLICACIÓN DE PRUEBAS 2.CALIFICACIÓN DE PRUEBAS 3.INTEGRACIÓN DE LA EVALUACIÓN 4.ENTREGA DE RESULTADOS<br>
      <b>7. PSICOTERAPIA:</b> 1.INDIVIDUAL 2.GRUPAL 3.PAREJA 4.FAMILIAR 5.POSTVENCIÓN<br>
      <b>8. SUSTANCIA DE CONSUMO:</b> 1.ALCOHOL 2.TABACO 3.CANNABIS 4.COCAÍNA 5.METANFETAMINAS 6.INHALADORES 7.OPIÁCEOS 8.ALUCINÓGENOS 9.BENZODIAZEPINAS 10.OTROS<br>
      <b>9. TIPO DE ATENCIÓN:</b> 1.PRIMARIO 2.COMORBILIDAD 3.DETECTADO<br>
      <b>10 TIPO DE CONSUMO:</b> 1.EPISODIO ÚNICO DE CONSUMO NOCIVO 2.CONSUMO PELIGROSO 3.PATRÓN NOCIVO 4.DEPENDENCIA<br>
      <b>11. ÁMBITO DE VIOLENCIAS:</b> 1.FAMILIAR 2.COMUNITARIA 3.COLECTIVA
      </td>
      <td style="border-right: 1px solid black; font-size:4.5px" width="28%">
      <b>12. TIPO DE VIOLENCIA:</b> 1.PSICOLÓGICA 2.FÍSICA 3.PATRIMONIAL 4.ECONÓMICA 5.SEXUAL<br>
      <b>13. COMPORTAMIENTO SUICIDA:</b> 1.AUTOLESIÓN SIN RIESGO 2.AUTOLESIÓN CON RIESGO 3.IDEACIÓN 4.INTENTO<br>
      <b>14. CASO MÉDICO LEGAL:</b> 1.USUARIO EN CONFLICTO CON LA LEY 4.PROGRAMA DE JUSTICIA TERAPÉUTICA<br>
      <b>15. ESQUEMAS DE VACUNACIÓN:</b> 0.ESQUEMA INCOMPLETO 1.ESQUEMA COMPLETO<br>
      <b>16. TELECONSULTA/INTERPRETACIÓN DIAGNÓSTICA:</b> A) 0.NO 1.SÍ B) 1.USG 2.ECG 3.RAYOS 4.TOMOGRAFÍA 5.RESONANCIA MAGNÉTICA 6.MASTOGRAFÍA 7.OTROS<br>
      <b>17. MODALIDAD:</b> 1.EN TIEMPO REAL 2.DIFERIDA<br>
      <b>18. SURTIMIENTO DE RECETA MÉDICA EN SU ÚLTIMA CONSULTA:</b> 1.COMPLETO 2.PARCIAL 3.NINGÚN MEDICAMENTO SURTIDO 4.NO RECUERDA/NO SABE
      </td>
    </tr>
  </table>';

//Etiquetas de la cebecera
$tbl = $tbl . '
<table width="100%" border="1">
  <tr>
    <td rowspan="3" width="1%"> <img src="titulos/no.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/derecho.png"></td>
    <td rowspan="3" width="22%" colspan="2" align="center"><br><br><br><br><b>IDENTIFICACIÓN DEL PACIENTE</b></td>
    <td rowspan="3" width="1%"> <img src="titulos/edad.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/sexo.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/afro.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/indigena.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/migrante.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/vezuneme.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/vezanio.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/dificultad.png"></td>
    <td width="13%" align="center">ENFERMERÍA</td>
    <td rowspan="3" width="2%" align="center"> <img src="titulos/relacion.png" width="120%"></td>
    <td rowspan="3" width="20%" colspan="2" align="center"><br><br><br><br><b>DIAGNÓSTICO</b></td>
    <td rowspan="3" width="1%"> <img src="titulos/derivacion.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/evaluacion.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/psicoterapia.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/psicoeducacion.png"></td>
    <td width="6%" align="center" style="font-size:4.5px">CONSUMO DE SUSTANCIAS PSICOACTIVAS</td>
    <td width="4%" align="center" style="font-size:4.5px">IDENTIFICACIÓN DE VIOLENCIAS</td>
    <td rowspan="3" width="1%"> <img src="titulos/comportamiento.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/caso.png"></td>
    <td  rowspan="3" width="1%"> <img src="titulos/remision.png"></td>
    <td width="6%" align="center" style="font-size:4.5px">PROMOCIÓN DE LA SALUD</td>
    <td rowspan="3" width="1%"> <img src="titulos/referido.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/contrarreferido.png"></td>
    <td width="6%" align="center" style="font-size:4.5px">TELECONSULTA</td>
    <td rowspan="3" width="1%"> <img src="titulos/surtimiento.png"></td>
    <td rowspan="3" width="1%"> <img src="titulos/fecha.png"></td>
  </tr>
  <tr>
    <td rowspan="2" width="1%"> <img src="titulos/plan.png"></td>
    <td rowspan="2" width="1%"> <img src="titulos/lesiones.png"></td>
    <td rowspan="2" width="1%"> <img src="titulos/educacion.png"></td>
    <td rowspan="1" width="10%" align="center">MEDICIONES</td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/sustancia.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/atencion.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/consumo.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/ambito.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/violencia.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/linea.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/cartilla.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/esquema.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/unidad.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/teleconsulta.png" width="100%"></td>
    <td rowspan="2" width="2%" align="center"> <img src="titulos/modalidad.png" width="100%"></td>
  </tr>
  <tr>
    <td border="0" rowspan="1" width="2%" align="center"> <img src="titulos/peso.png" width="100%"></td>
    <td border="0" rowspan="1" width="2%" align="center"> <img src="titulos/presion.png" width="100%"></td>
    <td border="0" rowspan="1" width="1%"> <img src="titulos/circunferencia.png"></td>
    <td border="0" rowspan="1" width="2%" align="center"> <img src="titulos/frecuencia.png" width="100%"></td>
    <td border="0" rowspan="1" width="1%"> <img src="titulos/temperatura.png"></td>
    <td border="0" rowspan="1" width="1%"> <img src="titulos/saturacion.png"></td>
    <td border="0" rowspan="1" width="1%"> <img src="titulos/glucosa.png"></td>
  </tr>
  <tr style="font-size:4.5px">
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #FFFFFF;"> 1</td>
    <td border="1" style="background-color: #FFFFFF; font-size:6px" align="center"> FOLIO RECETA</td>
    <td border="1" style="background-color: #FFFFFF; font-size:6px" align="center"> EXPEDIENTE</td>
    <td border="1" style="background-color: #FFFFFF;"> 2</td>
    <td border="1" style="background-color: #FFFFFF;"> 3</td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #FFFFFF;"> 4</td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #FFFFFF;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #FFFFFF;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #A9A9A9;"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%" align="center"> RT</td>
    <td border="1" style="background-color: #A9A9A9; font-size:6px" width="20%" align="center"> No utilice abreviaturas</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"> 5</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"> 6</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"> 7</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 8</td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 9</td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 10</td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 11</td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 12</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"> 13</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"> 14</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 15</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"></td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 16</td>
    <td border="1" style="background-color: #FFFFFF;" width="2%"> 17</td>
    <td border="1" style="background-color: #FFFFFF;" width="1%"> 18</td>
    <td border="1" style="background-color: #A9A9A9;" width="1%"></td>
  </tr>
</table>';

//Filas de resultados por paciente
$tbl = $tbl . '
<table width="100%" border="1">
  <tr>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="1" width="1%"> <br><br></td>
    <td rowspan="1" width="11%"> </td>
    <td rowspan="1" width="11%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="1" width="1%"> a</td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="2" width="2%"> Peso</td>
    <td rowspan="2" width="2%"> Dias.</td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="2" width="2%"> Car.</td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="1" width="2%"> </td>
    <td rowspan="1" colspan="2" width="20%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="2" width="2%"> a</td>
    <td rowspan="3" width="2%"> </td>
    <td rowspan="3" width="1%"> </td>
    <td rowspan="3" width="1%"> </td>
  </tr>
  <tr>
    <td rowspan="1" colspan="3"> CURP O Fecha de nacimientoy Entidad de nacimiento <br> </td>
    <td rowspan="1" width="1%"> b</td>
    <td rowspan="1" width="2%" style="background-color: #A9A9A9;"> </td>
    <td rowspan="1" width="18%"> </td>
    <td rowspan="1" width="2%"> 1ra</td>
  </tr>
  <tr>
    <td rowspan="1" colspan="3"> Nombre(s) <br><br></td>
    <td rowspan="1" width="1%"> c</td>
    <td rowspan="1" width="2%"> Talla</td>
    <td rowspan="1" width="2%"> Sist.</td>
    <td rowspan="1" width="2%"> Res.</td>
    <td rowspan="1" width="2%" style="background-color: #A9A9A9;"> </td>
    <td rowspan="1" width="18%"> </td>
    <td rowspan="1" width="2%"> 1ra</td>
    <td rowspan="1" width="2%"> b</td>
  </tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->lastPage();

// Genera el documento PDF
$pdf->Output('mi_documento.pdf', 'I');
