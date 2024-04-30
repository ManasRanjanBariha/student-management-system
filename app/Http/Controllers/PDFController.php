<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;



class PDFController extends Controller
{
    
    public function generatePdf()
    {
        
       

        $pdf = $this->createPdf();

        return $pdf->stream('document.pdf');
    }
    function gen()
    {
        return view('studentpdf',['students'=>Student::get()]);
    }
    private function createPdf()
    {
        $pdf = new Dompdf(array('enable_remote' => true));

        $options = new Options();  
        $options->set('chroot', 'c:/Users/manas/OneDrive/Desktop/Laravel-learning/student-management-system/public');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $pdf->setOptions($options);

        $html = view('studentpdf',['students'=>Student::orderBy('id')->get()])->render();
        $pdf->loadHtml($html);

        $pdf->render();

        return $pdf;
    }
}

