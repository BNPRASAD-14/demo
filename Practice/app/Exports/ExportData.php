<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
// class ExportData implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         //
//         $data=DB::select('select * from form');
//         return collect($data);
//     }
// }

class ExportData implements FromArray,WithHeadings
{
    /**
     * @return array
     */
    public function array(): array
    {
        // Fetch data from the "form" table
        $data = DB::select('select * from form');

        // Convert the array of objects to a simple associative array
        $dataArray = [];
        foreach ($data as $item) {
            $dataArray[] = (array) $item;
        }

        // Return the data as a 2D array
        return $dataArray;
    }

    public function headings(): array
    {
        // Define the column headings for the Excel file
        return [
            'ID',
            'fname',
            'lname',
            'address',
            'contact',
            'gender'
            // Add more headings as per your database table's columns
        ];
    }
}