<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use PhpOffice;

class WordController extends Controller
{
    public function index(Request $request)
    {

        $path = $request->file('file')->store('public');
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/' . $path));
        //$outFileDir = $path;
       $phpWord->setValue('brand', $request->brand);
       $phpWord->setValue('area', $request->area);
       $phpWord->saveAs(storage_path('app/public/new.docx'));


//Load export library
$domPdfPath = base_path('vendor/dompdf/dompdf');
\PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
\PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

//load generated file
	$phpWord1 = \PhpOffice\PhpWord\IOFactory::load(storage_path('app/public/new.docx'));
	//generate the pdf converter class
	$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord1 , 'PDF');
	//save generated File
	$pdfLocation = storage_path('app/public/converted.pdf');
	$xmlWriter->save($pdfLocation, true);
	//return the file from controller
	//return response()->download($pdfLocation);


        return $path;
        //return view('Ctdt.ctdt_create_document', ['nameCustomer2' =>  $request->nameCustomer]);
    }
        //Load the template docx located in public storage
}
/*
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/template/' . $fileName));
	//this replace your ${keyword}
    $templateProcessor->setValue('keyword', "NEW VALUE");
    //store the generated file
	$fileStorage = storage_path('app/public/processed/' . $fileName);
	$templateProcessor->saveAs($fileStorage);

    //to PDF

	//Load export library
	$domPdfPath = base_path( 'vendor/dompdf/dompdf');
	\PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
	\PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

	//load generated file
	$phpWord = \PhpOffice\PhpWord\IOFactory::load($fileStorage);
	//generate the pdf converter class
	$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
	//save generated File
	$pdfLocation = storage_path('app/public/converted/converted.pdf');
	$xmlWriter->save($pdfLocation, true);
	//return the file from controller
	return response()->download($pdfLocation);
    }*/

