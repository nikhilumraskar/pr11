<?php
/**
 * Created by PhpStorm.
 * User: nikhil
 * Date: 6/15/19
 * Time: 12:01 PM
 */

function pdf_merger_log($message)
{
    list($decimal_seconds, $int_seconds) = explode(' ',  microtime());
    $date_time = date('Y-m-d H:i:s', $int_seconds);
    $ms = ($decimal_seconds + $int_seconds) * 1000;
    return array( 'message' => $message . " : " . $date_time .  "\n", 'ms' =>  $ms);
}

$file_content = file_get_contents('pdf-link-list.txt');

$pdf_link_array = explode("\n", $file_content);
$pdf_link_array_count = count($pdf_link_array);
$pdf_link_array_count = 2;

require_once ('PdfManage.php');

$pdf = new Nextek\LaraPdfMerger\PdfManage;

$start_log =  pdf_merger_log("Starting PDF Fetching at");
echo $start_log['message'];

for($i = 0; $i < $pdf_link_array_count; $i++)
{
    $pdf->addPDFURL($pdf_link_array[$i]);
}

$end_log =  pdf_merger_log("PDF Fetch completed at");
echo $end_log['message'];

echo (int)($end_log['ms'] - $start_log['ms']) . "ms to fetch " . $pdf_link_array_count . " PDFs\n";

$start_log =  pdf_merger_log("Starting PDF Fetching at");
echo $start_log['message'];

$pdf->mergePDFURL('file', 'merged_pdf.pdf');

$end_log =  pdf_merger_log("Completed PDF merging at:");
echo $end_log['message'];

echo (int)($end_log['ms'] - $start_log['ms']) . "ms to fetch and merge " . $pdf_link_array_count . " PDFs\n";

echo "Open file merged_pdf.pdf\n";
