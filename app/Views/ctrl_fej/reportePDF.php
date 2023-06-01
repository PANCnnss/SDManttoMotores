<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('content') ?>
<style>
    #pdf-to-print h5{
      font-size: 0.9em !important;
    }

    #pdf-to-print h4{
      font-size: 1.3em !important;
    }
</style>

<div class="container-fluid">
    <!-- PDF A IMPRIMIR  CONTENIDO-PDF1 -->
    <div hidden>
        <div id="pdf-to-print" style="padding:20px; padding-bottom:50px;">
            <!-- PAGINA 1 PDF -->
            <div class="container" id="pdf-page" style="border-color:black; font-size:0.74vw;width: 210mm;height: 296.8mm">

                <div style="padding:8px;margin-top:30px;">
                    <div class="row">
                        <img src="../resources/imagenes/antapaccay.png" width="15%" height="25%" style="margin-right:2em;margin-top:-6em;">
                        <h4 style="text-align:center; font-weight:bold;">INFORMACIÓN DE PRUEBA DE MOTOR</h4>
                    </div>

                    <!-- NUMERO DE HOJA -->
                    <div class="row">
                        <h5 style="font-size:0.8vw;">HOJA N°:</h5>

                        <div class="col" style="margin-top:-2px;margin-left:-8px">
                            <span id="NomUsuRecibe">-</span>
                            <hr width="25%" style="margin-left:0px;margin-top:-2px;color:black;">
                        </div>
                    </div>
                    <!-- FIN DE PRIMERA FILA -->

                    <!-- RANGO DE 3 COLUMNAS -->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h5 style="font-size:0.8vw;">CLIENTE:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="DNIUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">DIRECCIÓN:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span>-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>

                        <div class="col" style="margin-left: 12px;">
                            <div class="row">
                                <h5 style="font-size:0.8vw;">FECHA:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                <span id="TelfUsuRecibe">-</span>
                                <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>

                            </div>
                            <div class="row">
                                <h5 style="font-size:0.8vw;">TEMP. AIRE:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="CargoUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>

                        <div class="col" style="margin-left: 12px;">
                            <div class="row">
                                <h5 style="font-size:0.8vw;">PROYECTO N°:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                <span id="TelfUsuRecibe">-</span>
                                <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>

                            </div>
                            <div class="row">
                                <h5 style="font-size:0.8vw;">REL. HUMEDAD:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="CargoUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN RANGO 3 COLUMNAS -->

                    <!-- RANGO 2 COLUMNAS -->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h5 style="font-size:0.8vw;">PROPIETARIO/USUARIO:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="DNIUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">DIRECCIÓN:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span>-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">
                                <h5 style="font-size:0.8vw;">FECHA ULTIMA DE INSPECCION:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="DNIUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">REPORTE DE ULTIMA INSPECCION:</h5>
                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span>-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN RANGO 2 COLUMNAS -->

                    <!-- UBICACION E IDENTIFICACION EQUIPO -->
                    <div class="row" style="margin-top:1em;">
                        <h5 style="font-size:0.8vw;">UBICACION DEL EQUIPO:</h5>

                        <div class="col" style="margin-top:-2px;margin-left:-8px">
                            <span id="NomUsuRecibe">-</span>
                            <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                        </div>
                    </div>
                    
                    <div class="row">
                        <h5 style="font-size:0.8vw;">IDENTIFICACION DEL CIRCUITO:</h5>

                        <div class="col" style="margin-top:-2px;margin-left:-8px">
                            <span id="NomUsuRecibe">-</span>
                            <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                        </div>
                    </div>
                    <!-- FIN UBICACION E IDENTIFICACION EQUIPO -->

                    <!-- INFORMACION DE PRUEBA DEL MOTOR -->
                    <div class="container">
                        <h4 style="font-weight: bold; text-align:center">INFORMACION DE PRUEBA DE MOTOR</h4>
                        <div style="padding-left:10em;">
                            <div class="row">
                                <h5 style="font-size:0.8vw;">RESULTADO DE PRUEBAS DE RESISTENCIA DE AISLAMIENTO:</h5>

                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="NomUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">30 seg:</h5>

                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="NomUsuRecibe">-</span>
                                    <hr width="35%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">60 seg:</h5>

                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="NomUsuRecibe">-</span>
                                    <hr width="35%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">10 min:</h5>

                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="NomUsuRecibe">-</span>
                                    <hr width="35%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">DA:</h5>

                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="NomUsuRecibe">-</span>
                                    <hr width="37.5%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>

                            <div class="row">
                                <h5 style="font-size:0.8vw;">PI:</h5>

                                <div class="col" style="margin-top:-2px;margin-left:-8px">
                                    <span id="NomUsuRecibe">-</span>
                                    <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>

                        <!-- Detalles desde la A a la S motor-->
                        <div class="row">
                            <div class="col">
                                <h5 style="font-size:0.8vw;">A. NOMBRE & MARCA DEL MOTOR</h5>
                                <h5 style="font-size:0.8vw;">B. FABRICANTE</h5>
                                <h5 style="font-size:0.8vw;">C. MODELO NUMERO</h5>
                                <h5 style="font-size:0.8vw;">D. NUMERO DE SERIE</h5>
                                <h5 style="font-size:0.8vw;">E. RPM</h5>
                                <h5 style="font-size:0.8vw;">F. FRAME</h5>
                                <h5 style="font-size:0.8vw;">G. CODIGO</h5>
                                <h5 style="font-size:0.8vw;">H. POTENCIA (HP)</h5>
                                <h5 style="font-size:0.8vw;">I. VOLTAJE & FASE DEL FABRICANTE</h5>
                                <h5 style="font-size:0.8vw;">J. CORRIENTE DEL FABRICANTE</h5>
                                <h5 style="font-size:0.8vw;">K. VOLTAJE REAL</h5>
                                <h5 style="font-size:0.8vw;">L. CORRIENTE REAL</h5>
                                <h5 style="font-size:0.8vw;">M. ARRANCADOR DEL FABRICANTE</h5>
                                <h5 style="font-size:0.8vw;">N. TAMAÑO DE ARRANCADOR</h5>
                                <h5 style="font-size:0.8vw;">O. TAMAÑO HEATER, CATALOGO & AMP</h5>
                                <h5 style="font-size:0.8vw;">P. ELEMENTO DUAL DEL FABRICANTE</h5>
                                <h5 style="font-size:0.8vw;">Q. CORRIENTE DEL FUSIBLE</h5>
                                <h5 style="font-size:0.8vw;">R. FACTOR DE POTENCIA</h5>
                                <h5 style="font-size:0.8vw;">S. FACTOR DE SERVICIO</h5>
                            </div>

                            <div class="col">
                                <div class="col" style="margin-top:-6px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-12px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                                <div class="col" style="margin-top:-11px;margin-left:-8px">
                                    <span id="TelfUsuRecibe">-</span>
                                    <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                                </div>
                            </div>
                        </div>
                        <!-- fin de los detalles -->

                        <!-- Observaciones -->
                        <div>
                            <span id="Observaciones">OBSERVACIONES</span>
                            <hr width="100%" style="margin-top:-3px;color:black;">
                            <hr width="100%" style="margin-top:20px;color:black;">
                            <hr width="100%" style="margin-top:20px;color:black;">
                            <hr width="100%" style="margin-top:20px;color:black;">
                        </div>
                        <!-- fin de las observaciones -->
                        
                        <div class="row" style="padding-left:15px;">
                            <div class="col-8">
                                <div class="row">
                                    <h5 style="font-size:0.8vw;">EQUIPO DE PRUEBA UTILIZADO:</h5>
                                    <div class="col" style="margin-top:-2px;margin-left:-8px">
                                        <span id="DNIUsuRecibe">-</span>
                                        <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <h5 style="font-size:0.8vw;">PRESENTADO POR:</h5>
                                    <div class="col" style="margin-top:-2px;margin-left:-8px">
                                        <span>-</span>
                                        <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row">
                                    <h5 style="font-size:0.8vw;">SERIAL #:</h5>
                                    <div class="col" style="margin-top:-2px;margin-left:-8px">
                                        <span id="DNIUsuRecibe">-</span>
                                        <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <h5 style="font-size:0.8vw;">PRUEBA:</h5>
                                    <div class="col" style="margin-top:-2px;margin-left:-8px">
                                        <span>-</span>
                                        <hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la informacion prueba -->
                </div>
            </div>
        </div>
    </div>

    <button onclick="myFunction()" class="btn btn-danger">Generar PDF</button>
    <!--END PDF_TO_PRINT-->
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="https://unpkg.com/js-html2pdf@latest/lib/html2pdf.min.js"></script>
<script>
    pathArray = location.href.split('/');
    cadenaurl = pathArray[0] + "//" + pathArray[2] + "/";
    var ctrl = '<?php echo (isset($ctrl) ? $ctrl : "") ?>';

    function myFunction() {
        var element = document.getElementById('pdf-to-print');
        var options = { filename: 'Asignacion.pdf'};
        var exporter = new html2pdf(element, {
                                    margin:0,
                                    jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}
                                },options);

        exporter.getPdf(true);
        options.source = element;
        options.download = false;

        html2pdf.getPdf(options);
    }
</script>

<!-- EXPORTAR PDF -->
<script>

//   function exportPDF(id){
//     $.ajax({
//         type:"GET",
//         url: cadenaurl + ctrl +`/ajaxPDFAsignacion/${id}`,
//         data: {'idAsignacion':id},
//         success:function(response){
//           // console.log(response);
//           var a = response.dataequipos

//           $('#NomUsuRecibe').text(response.dataPDF[0].NombreRecepcion) 
//           $('#DNIUsuRecibe').text(response.dataPDF[0].DNIRecepcion)
//           $('#TelfUsuRecibe').text(response.dataPDF[0].TelUsu)
//           // $('#CargoUsuRecibe').text(response.dataPDF[0].CargoUsu)

//           $('#Observaciones').text(response.dataPDF[0].Observaciones)

//           $('#NomUsuRecibe1').text(response.dataPDF[0].NombreRecepcion)
//           $('#DNIUsuRecibe1').text(response.dataPDF[0].DNIRecepcion)

//           $('#DNIUsuRecibe2').text(response.dataPDF[0].DNIRecepcion)
//           $('#FechaRecibe').text(response.dataPDF[0].FecRecepcion)
//           $('#FechaRecibe1').text(response.dataPDF[0].FecRecepcion)


//           $('#DNIUsuEntrega').text(response.dataPDF[0].DNIEntrega)
//           $('#DNIUsuEntrega1').text(response.dataPDF[0].DNIEntrega)
//           $('#FechaEntrega').text(response.dataPDF[0].FecEntrega)
//           $('#FechaEntrega1').text(response.dataPDF[0].FecEntrega)


//           $('#CodInventarioEquip').text(response.dataequipos[0].CodInventario)
//           $('#NroSerieEquip').text(response.dataequipos[0].NroSerie)
//           $('#ModeloEquip').text(response.dataequipos[0].Modelo)
//           $('#DescripcionEquip').text(response.dataequipos[0].Descripcion)

//           $('#NomUsuRecibe2').text(response.dataPDF[0].NombreRecepcion)
//           $('#DNIUsuRecibe3').text(response.dataPDF[0].DNIRecepcion)
//           $('#DNIUsuRecibe4').text(response.dataPDF[0].DNIRecepcion)



//           var table = document.getElementById("datas");
//           table.innerHTML="";

//           var tr="";
//           a.forEach(x=>{
//             tr+='<tr>';
//             tr+='<td>'+x.Cantidad+'</td>'+'<td>'+x.Descripcion+'</td>'+'<td>'+x.Marca+'</td>'+'<td>'+x.Modelo+'</td>'+'<td>'+x.NroSerie+'</td>'
//             tr+='</tr>'

//           })
//           table.innerHTML+=tr;
          
//           var count = table.rows.length;
//           var rpt = [8 - parseInt(count)];

//           var tr2="";
//           for(var x = 0; x<rpt; x++){
//             tr2+='<tr>';
//             tr2+='<td>'+'</td>'+'<td>'+'</td>'+'<td>'+'</td>'+'<td>'+'</td>'+'<td>'+'</td>'
//             tr2+='</tr>'
//           }
//           table.innerHTML+=tr2;
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             console.log(jqXHR, textStatus, errorThrown);
//         }, 
//         complete: function(data){
//           var element = document.getElementById('pdf-to-print');
//           var options = { filename: 'Asignacion.pdf'};
//           var exporter = new html2pdf(element, {
//                                       margin:0,
//                                       jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}
//                                     },options);

//           exporter.getPdf(true);
//           options.source = element;
//           options.download = false;

//           html2pdf.getPdf(options);
//         }
//     });
//   }
</script>

<?= $this->endSection() ?>