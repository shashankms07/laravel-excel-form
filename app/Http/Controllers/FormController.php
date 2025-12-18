<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $file = storage_path('app/form_data.xlsx');

        // Create file if not exists
        if (!file_exists($file)) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->fromArray(
                ['Name', 'Email', 'Phone', 'Created At'],
                null,
                'A1'
            );
        } else {
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
        }

        // Append new row
        $row = $sheet->getHighestRow() + 1;
        $sheet->fromArray([
            $request->name,
            $request->email,
            $request->phone,
            now()->format('Y-m-d H:i:s')
        ], null, 'A' . $row);

        // Save file
        $writer = new Xlsx($spreadsheet);
        $writer->save($file);

        return back()->with('success', 'Data saved to Excel');
    }
}
