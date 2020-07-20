<?php

namespace App\Exports;

use App\Pago;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


use DB;

class PagosExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pago::select('alum_dni','alum_ape','alum_nom','montoanual','descuento','inicial','marzo',
                        'abril','mayo','junio','julio','agosto','setiembre','octubre','noviembre','diciembre')
                ->join('alumno','alumno.alum_id','pagos.idalumno')
                ->where('pagos.año','=','2020')
                ->orderBy('alumno.alum_ape','asc')
                ->get();
    	// $data = DB::table('pagos')
    	// 		->select('alum_dni','alum_ape','alum_nom','montoanual','descuento','inicial','marzo',
    	// 				'abril','mayo','junio','julio','agosto','setiembre','octubre','noviembre','diciembre')
    	// 		->join('alumno','alumno.alum_id','pagos.idalumno')
    	// 		->where('pagos.año','=','2020')
    	// 		->orderBy('alumno.alum_ape','asc')
    	// 		->get();
    	// return $data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $cellRange = 'A1:W1'; //toda la cabecera
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function headings(): array
    {
        // $data = DB::table('pagos')
        //     ->select('alum_dni','alum_ape','alum_nom','montoanual','descuento','inicial','marzo',
        //                 'abril','mayo','junio','julio','agosto','setiembre','octubre','noviembre','diciembre')
        //     ->get();
        //     return $data
        


        return   [
            'DNI',
            'Apellidos',
            'Nombres',
            'MontoAnual',
            'Descuento',
            'Inicial',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Setiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'

        ];

    }
}
