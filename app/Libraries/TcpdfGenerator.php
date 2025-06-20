<?php

namespace App\Libraries;

use TCPDF;

class TcpdfGenerator extends TCPDF
{
    public function __construct()
    {
        parent::__construct(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Set document information
        $this->SetCreator('Analisis Jurusan');
        $this->SetAuthor('Analisis Jurusan Platform');
        $this->SetTitle('Hasil Tes Analisis Jurusan');
        
        // Remove default header/footer
        $this->setPrintHeader(false);
        $this->setPrintFooter(false);
        
        // Set margins
        $this->SetMargins(15, 15, 15);
        
        // Set auto page breaks
        $this->SetAutoPageBreak(TRUE, 15);
        
        // Set font
        $this->SetFont('helvetica', '', 12);
    }

    public function generateFromView($view, $data, $filename = 'document.pdf')
    {
        // Add a page
        $this->AddPage();
        
        // Get HTML from view
        $html = view($view, $data);
        
        // Print text using writeHTMLCell()
        $this->writeHTML($html, true, false, true, false, '');
        
        // Close and output PDF document
        $this->Output($filename, 'D'); // D = Download
    }
}