<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    public function generate($html, $filename = '', $paper = 'A6', $orientation = 'portrait', $stream = TRUE)
    {
        $options = new Options();
        $options->set('chroot', realpath(''));
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf = new Dompdf($options, $contxt);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
            exit();
        } else {
            return $dompdf->output();
        }
    }
}
