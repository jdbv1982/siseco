<?php namespace App\Modules\Pagos\Servicios;

use TCPDF;

class OrdenPago{
	public function Orden($orden, $cuenta){

              $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
              // set margins
                      $pdf->SetMargins(5,10, 5);
              $pdf->setPrintHeader(false);

              $pdf->SetFont('helvetica', '', 10);

              // add a page
              $pdf->AddPage();

              $html = '<link href="../public/assets/css/impresion.css" rel="stylesheet" type="text/css">';

              $html .= '<table class="table">
               <tr>
                <td colspan="2" rowspan="2" class="td-logo">
                        <img src="../public/assets/images/logo-cao.png" class="logo" >
                </td>
                <td colspan="5" class="text-center">CAMINOS Y AEROPISTAS DE OAXACA</td>
                <td colspan="2">Folio: '.$orden->folio.'</td>
                 </tr>
               <tr>

                  <td colspan="5" class="text-center">ORDEN DE PAGO</td>
                  <td colspan="2">Fecha: '. date_format($orden->created_at, 'd-m-Y')  .' </td>
                </tr>
                <tr>
                    <td colspan="9">
                        La caja de CAO expedira cheque a favor de: <span>'.$orden->beneficiario.'</span>
                    </td>
                </tr>
                 <tr>
                    <td colspan="9" class="text-sm">
                            <span>Cuenta Bancaria:</span> '.$cuenta.'
                    </td>
                </tr>
                <tr>
                    <td colspan="9" class="text-lg">
                            <span>Observaciones: </span>'.$orden->observaciones.'
                    </td>
                </tr>
                <tr>
                    <td colspan="8" class="text-lg">
                            <span>Concepto: </span>'.$orden->concepto.'
                    </td>
                    <td class="text-right">'.number_format($orden->importe, 2, '.', ',').'</td>
                </tr>
                <tr>
                    <td colspan="8" class="text-md">
                            <span>Aditivas:</span>
                    </td>
                    <td class="text-right">'.number_format($orden->aditivas, 2, '.', ',').'</td>
                </tr>
                <tr>
                    <td colspan="8" class="text-md">
                            <span>Deducciones:</span>
                    </td>
                    <td class="text-right">'.number_format($orden->deducciones, 2, '.', ',').'</td>
                </tr>
                <tr>
                    <td colspan="8" class="text-md">
                            <span>Total:</span>
                    </td>
                    <td class="text-right">'.number_format($orden->total, 2, '.', ',').'</td>
                </tr>

              </table>';

              $html .= '<table class="firmas">
               <tr>
                    <td class="text-center">REVISADO</td>
                    <td class="text-center">AUTORIZADO</td>
                    <td class="text-center">RECIBE NOMBRE Y FIRMA</td>
                 </tr>
                <tr>
                    <td class="text-center">C.P. OMAR ALEJANDRO GUTU PEREZ<br>
                    DEPTO. DE CONTROL PRESUPUESTAL</td>
                    <td class="text-center">C.P. MARIA MAGDALENA SOLANA JARQUIN
                    <br>
                    DIRECTORA ADMINISTRATIVA
                    </td>
                    <td class="text-center">C.P. DULCE MARIA GARCIA MARTINEZ<br>
                    ENCARGADO DEL DEPTO. DE CAJA Y BANCOS
                    </td>


                 </tr>
                 </table>';

              // output the HTML content
              $pdf->writeHTML($html, true, false, true, false, '');

              $pdf->Output('example_061.pdf', 'I');
	}
}
