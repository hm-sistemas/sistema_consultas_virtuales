<?php

namespace App\Actions;

use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;

class MergePDFs
{
    private $pages_count = 0;

    public function __construct($pages_count)
    {
        $this->pages_count = $pages_count;
    }

    public function merge($patient_name, $output)
    {
        $fpdi = new Fpdi();
        for ($i = 0; $i < $this->pages_count; ++$i) {
            $path = 'app/pdf/temp/newFirstTimePatientForm'.$i.'.pdf';

            $form = storage_path($path);

            $fpdi->setSourceFile($form);
            $tpl = $fpdi->importPage(1, '/MediaBox');
            $fpdi->addPage();
            $fpdi->useTemplate($tpl);
        }
        $directory = storage_path('app/pdf/temp');
        File::cleanDirectory($directory);

        return $fpdi->Output($output, $patient_name.'PrimeraVez.pdf');
    }

    public function saveMerge($destination)
    {
        $fpdi = new Fpdi();
        for ($i = 0; $i < $this->pages_count; ++$i) {
            $path = 'app/pdf/forms/newForm'.$i.'.pdf';

            $form = storage_path($path);

            $fpdi->setSourceFile($form);
            $tpl = $fpdi->importPage(1, '/MediaBox');
            $fpdi->addPage();
            $fpdi->useTemplate($tpl);
        }

        $directory = storage_path('app/pdf/forms');
        File::cleanDirectory($directory);
        $store = storage_path($destination);

        $fpdi->Output('F', $store);
    }
}