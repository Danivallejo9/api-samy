<?php

namespace App\Models\Invoice\Repositories;

use App\Models\Invoice\Interfaces\InvoiceInterface;
use App\Models\Invoice\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

final class InvoiceRepository implements InvoiceInterface
{
  // public function getInvoices(string $client): array
  // {
  //   $invoices = Invoice::select(
  //     'TIPO AS Fac_rec',
  //     'DOCUMENTO AS Consecutivo',
  //     DB::raw("CONVERT (VARCHAR(16), FECHA, 111) AS FEmision"),
  //     DB::raw("CONVERT (VARCHAR(16), FECHA_VENCE, 111) AS FVence"),
  //     'CONDICION_PAGO AS cond_pago',
  //     'DIAS_VENCIDO AS DAtraso',
  //     'SALDO AS saldo',
  //     'MONTO AS Valor',
  //     'LIMITE_CREDITO AS limite',
  //     'CONDICION_PAGO AS Plazo'
  //   )
  //     ->where('CLIENTE', $client)
  //     ->distinct()
  //     ->get()
  //     ->toArray();

  //   return $invoices;
  // }

  public function getInvoices(string $client): array
  {
    $invoices = Invoice::select(
      'TIPO_DOC  AS Fac_rec', // PENDIENTE CAMBIO
      'FACTURA AS Consecutivo',
      DB::raw("CONVERT (VARCHAR(16), FECHA, 111) AS FEmision"),
      DB::raw("CONVERT (VARCHAR(16), FECHA_VENCE, 111) AS FVence"),
      'COND_PAGO  AS cond_pago',
      'DIAS_VENCIDO AS DAtraso',
      'SALDO AS saldo', 
      'VLR_DOCTO AS Valor', //PENDIENTE CAMBIO
      'LIMITE_CREDITO AS limite',
      'VLR_ABONOS AS valorpago', //PENDIENTE CAMBIO
      DB::raw("'' AS Fpago"), //PENDIENTE CAMBIO
      'COND_PAGO AS Plazo'
    )
      ->where('CLIENTE', $client)
      ->get()
      ->toArray();

    return $invoices;
  }

}
