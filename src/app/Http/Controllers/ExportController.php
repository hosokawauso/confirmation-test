<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export()
    {




        // CSVデータを生成
        $csvContent = fopen('php://output', 'w');
        foreach ($data as $row) {
            fputcsv($csvContent, $row);
        }
        fclose($csvContent);

        // CSVファイルをダウンロード
        return response()->streamDownload(function () use ($csvContent) {
            echo $csvContent;
        }, 'sample.csv', 
        ['Content-Type' => 'text/csv']);
    }
}
