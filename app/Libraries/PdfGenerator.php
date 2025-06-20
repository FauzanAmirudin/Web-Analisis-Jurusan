<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
    protected $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isCssFloatEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        
        $this->dompdf = new Dompdf($options);
        $this->dompdf->setBasePath(FCPATH);
    }

    public function generate($html, $filename = 'document.pdf', $stream = true, $paper = 'A4', $orientation = 'portrait')
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paper, $orientation);
        $this->dompdf->render();

        if ($stream) {
            // Force exit after streaming to prevent output corruption
            $this->dompdf->stream($filename, [
                'Attachment' => true,
                'compress' => 1,
                'Content-Disposition' => 'attachment; filename="'.$filename.'"'
            ]);
            exit();
        } else {
            return $this->dompdf->output();
        }
    }

    public function generateFromView($view, $data, $filename = 'document.pdf', $stream = true)
    {
        // Set response headers untuk memastikan browser mengenali sebagai PDF
        if ($stream) {
            $response = service('response');
            $response->setContentType('application/pdf');
            $response->setHeader('Content-Disposition', 'attachment; filename="'.$filename.'"');
            $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        }
        
        $html = view($view, $data);
        return $this->generate($html, $filename, $stream);
    }
}