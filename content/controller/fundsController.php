<?php

include "../model/fundsModel.php";
$aux = $_POST["aux"];

if ($aux == "consultarOperacion") {
  $listIdOperacion = consultarFlujo();
?>
  <table class="table table-hover table-striped col-center" id="tableIdOperacion">
    <thead>
      <tr>
        <th>ID Operacion</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($listIdOperacion as $auxLista) {
      ?>
        <tr>
          <td style="text-align:left;"><?php echo $auxLista["id_operacion"]; ?></td>
          <td><button class="btn btn-light" style="border-radius: 60px;" onclick="seleccionarCustomer('<?php echo $auxLista["id_operacion"]; ?>','<?php echo $auxLista["operacion"]; ?>','<?php echo $auxLista["cartola"]; ?>','<?php echo $auxLista["descripcion"]; ?>','<?php echo $auxLista["total"]; ?>','<?php echo $auxLista["saldo"]; ?>')"><i class="bi bi-check2" title="Seleccionar"></i></button></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

if ($aux == "consultarFlujo") {

  $listaPerfiles = consultarFlujo();

?>
  <table class="display table table-hover table-striped" style="width: 100%;" id="tableFlujo">
    <thead>

      <tr>
        <th></th>
        <th>ID</th>
        <th>DIA</th>
        <th>MES</th>
        <th>AÑO</th>
        <th>SUCURSAL</th>
        <th>CUENTA</th>
        <th>ALIAS</th>
        <th>CARTOLA</th>
        <th>OPERACIÓN</th>
        <th>CONCEPTO</th>
        <th>DETALLE</th>
        <th>DESCRIPCION</th>
        <th>CHEQUE</th>
        <th>DEPOSITO</th>
        <th>SALDO</th>
        <th>COMPROBANTE</th>
        <th>VERIFICACION</th>
        <th>COMENTARIOS</th>
        <th>LANGUAGES</th>
        <th>HEY</th>
        <th>UPPER</th>
        <th>LETS TALK</th>
        <th>GENERAL</th>
        <th>OTROS</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        foreach ($listaPerfiles as $auxLista) {

          $state_ver = $auxLista["statusver"];
          if ($state_ver == "0") {
            $auxVer = "POR VERIFICAR";
            $auxVer2 = "badge bg-danger";
          }
          if ($state_ver == "1") {
            $auxVer = "VERIFICADO";
            $auxVer2 = "badge bg-success";
          }
        ?>
          <th>
            <table>
              <td>
                <form action="viewflow.php" method="POST">
                  <input name="id" value="<?php echo $auxLista["id"]; ?>" type="hidden" id="id">
                  <button class="btn btn-outline-secondary btn-sm mr-1" type="submit">
                    <span class="bi bi-view-list"></span>
                  </button>
                </form>
              </td>
              <td>
                <button class="btn btn-outline-secondary btn-sm mr-1" onclick="deletelead('<?php echo $auxLista["id"]; ?>');">
                  <form action="viewflow.php" method="POST">
                    <input name="id" value="<?php echo $auxLista["id"]; ?>" type="hidden" id="id">

                    <span class="bi bi-trash"></span>
                </button>
                </form>
              </td>
              <td>
                <form action="editflow.php" method="POST">
                  <input name="id" value="<?php echo $auxLista["id"]; ?>" type="hidden" id="id">
                  <button class="btn btn-outline-secondary btn-sm mr-1" type="submit">
                    <span class="bi bi-pencil"></span>
                  </button>
                </form>
              </td>

            </table>

          </th>

          <td><?php echo $auxLista["dia"] . $auxLista["mes"] . $auxLista["year"] . "-" . $auxLista["id"]; ?></td>
          <td><?php echo $auxLista["dia"]; ?></td>
          <td><?php echo $auxLista["mes"]; ?></td>
          <td><?php echo $auxLista["year"]; ?></td>
          <td><?php echo $auxLista["sucursal"]; ?></td>
          <td><?php echo $auxLista["cuenta"]; ?></td>
          <td><?php echo $auxLista["alias"]; ?></td>
          <td><?php echo $auxLista["cartola"]; ?></td>
          <td><?php echo $auxLista["operacion"]; ?></td>
          <td><?php echo $auxLista["concepto"]; ?></td>
          <td><?php echo $auxLista["detalle"]; ?></td>
          <td><?php echo $auxLista["descripcion"]; ?></td>
          <td>$ <?php echo $auxLista["cheque"]; ?></td>
          <td>$ <?php echo $auxLista["deposito"]; ?></td>
          <td>$ <?php echo $auxLista["saldo"]; ?></td>

          <?php if ($auxLista["comprobante"] == '') { ?>
            <td><a href=""></a></td>
          <?php
          } else { ?>
            <td><a href="contenido/<?php echo $auxLista["comprobante"]; ?>" target="_blank">Ver</a></td>
          <?php
          }
          ?>
          <td class="<?php echo $auxVer2; ?>"><?php echo $auxVer; ?></td>
          <td><?php echo $auxLista["comentarios"]; ?></td>
          <td>$<?php echo $auxLista["languages"]; ?> - <?php echo $auxLista["percent_lang"]; ?>%</td>
          <td>$<?php echo $auxLista["hey"]; ?> - <?php echo $auxLista["percent_hey"]; ?>%</td>
          <td>$<?php echo $auxLista["upper"]; ?> - <?php echo $auxLista["percent_upper"]; ?>%</td>
          <td>$<?php echo $auxLista["letstalk"]; ?> - <?php echo $auxLista["percent_letstalk"]; ?>%</td>
          <td>$<?php echo $auxLista["general"]; ?> - <?php echo $auxLista["percent_general"]; ?>%</td>
          <td>$<?php echo $auxLista["otros"]; ?> - <?php echo $auxLista["percent_otros"]; ?>%</td>
      </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
<?php

}

if ($aux == "saveFlujo") {

  $dia = $_POST["dia"];
  $mes = $_POST["mes"];
  $year = $_POST["year"];
  $cartola = $_POST["cartola"];
  $cuenta = $_POST["cuenta"];
  $sucursal = $_POST["sucursal"];
  $alias = $_POST["alias"];
  $concepto = $_POST["concepto"];
  $detalle = $_POST["detalle"];
  $descripcion = $_POST["descripcion"];
  $total = $_POST["total"];
  $operacion = $_POST["operacion"];

  $cargo = $_POST["cargo"];
  $abono = $_POST["abono"];
  $saldo = $_POST["saldo"];

  $language = $_POST["language"];
  $hey = $_POST["hey"];
  $upper = $_POST["upper"];
  $letsTalk = $_POST["letsTalk"];
  $general = $_POST["general"];
  $otros = $_POST["otros"];
  $totalPercent = $_POST["totalPercent"];
  $languageVal = $_POST["languageVal"];
  $heyVal = $_POST["heyVal"];
  $upperVal = $_POST["upperVal"];
  $letsTalkVal = $_POST["letsTalkVal"];
  $generalVal = $_POST["generalVal"];
  $otrosVal = $_POST["otrosVal"];

  if ($dia == '' || $cartola == '' || $cuenta == '') {
    echo false;
  } else {
    $saveFlujo = saveFlujo($dia,$mes,$year,$cartola,$cuenta,$sucursal,$alias,$concepto,$detalle,$descripcion,$total,$operacion,
      $cargo,$abono,$saldo,$language,$hey,$upper,$letsTalk,$general,$otros,$totalPercent,$languageVal,$heyVal,$upperVal,$letsTalkVal,
      $generalVal,$otrosVal);
    echo $saveFlujo;
  }
}



if ($aux == "editFlujo") {

  $id = $_POST["id"];
  $concepto = $_POST["concepto"];
  $detalle = $_POST["detalle"];

  $language = $_POST["language"];
  $hey = $_POST["hey"];
  $upper = $_POST["upper"];
  $letsTalk = $_POST["letsTalk"];
  $general = $_POST["general"];
  $otros = $_POST["otros"];

  $languageVal = $_POST["languageVal"];
  $heyVal = $_POST["heyVal"];
  $upperVal = $_POST["upperVal"];
  $letsTalkVal = $_POST["letsTalkVal"];
  $generalVal = $_POST["generalVal"];
  $otrosVal = $_POST["otrosVal"];
  $totalPorcentaje = $_POST["totalPorcentaje"];

  $editFlujo = editFlujo($id, $concepto, $detalle, $language, $hey, $upper, $letsTalk, $general, $otros, $languageVal, $heyVal, $upperVal, $letsTalkVal, $generalVal, $otrosVal, $totalPorcentaje);

  echo $editFlujo;
}

if ($aux == "saveConsolidado") {
  $diaStart = $_POST["diaStart"];
  $mesStart = $_POST["mesStart"];
  $yearStart = $_POST["yearStart"];
  $diaEnd = $_POST["diaEnd"];
  $mesEnd = $_POST["mesEnd"];
  $yearEnd = $_POST["yearEnd"];
  $saveConsolidado = saveConsolidado($diaStart, $mesStart, $yearStart, $diaEnd, $mesEnd, $yearEnd);
  echo $saveConsolidado;
}

if ($aux == "deleteRow") {
  $id= $_POST["id"];

  $eliminateRow = eliminateRow($id);
  echo $eliminateRow;
}
