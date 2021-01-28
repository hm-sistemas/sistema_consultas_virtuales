<?php

namespace App\Actions;

use App\Models\Patient;
use FormFiller\PDF\Converter\Converter;
use FormFiller\PDF\Field;
use FormFiller\PDF\PDFGenerator;
use Illuminate\Support\Facades\Storage;

class FillFirstTimePatientFormPDF
{
    private $coordinates = '';

    private $patient;
    private $data;
    private $patient_data;

    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
        $this->getPatientData();
    }

    public function fill($output)
    {
        $this->getPatientData();
        $form = storage_path('app/pdf/forms/FirstTimePatientForm.pdf');
        $this->fillPage($form);
        $merge = new MergePDFs(1);
        $merge->merge($this->patient->full_name, $output);
    }

    public function saveFill()
    {
        $this->getPatientData();
        $pages = ceil(count($this->patient->services2) / 6);
        $directory = 'pdf/patients/'.$this->patient->patient_id.'/invoices/';

        Storage::put($directory.$this->patient->code.'PaymentForm.pdf', '');

        $form = storage_path('app/pdf/form.pdf');
        for ($i = 0; $i < $pages; ++$i) {
            $services = $this->patient->services2->slice($i * 6, 6)->values();
            $this->fillPage($form, $services, $i);
        }
        $merge = new MergePDFs($pages);
        $merge->saveMerge('app/'.$directory.$this->patient->code.'PaymentForm.pdf');
    }

    private function fillPage($form)
    {
        $data = $this->patient_data;
        $coordinates = $this->coordinates;

        $converter = new Converter($coordinates);
        $converter->loadPagesWithFieldsCount();
        $coords = $converter->formatFieldsAsJSON();
        $fields = json_decode($coords, true);
        $fieldEntities = [];

        foreach ($fields as $field) {
            $fieldEntities[] = Field::fieldFromArray($field);
        }

        $path = 'app/pdf/temp/newFirstTimePatientForm.pdf';
        Storage::put($path, '');
        $newForm = storage_path($path);
        $pdfGenerator = new PDFGenerator($fieldEntities, $data, 'P', 'pt', 'A4');

        try {
            $pdfGenerator->start($form, $newForm);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function getPatientData()
    {
        $age = $this->patient->created_at->diffInYears(${$this}->patient->birth_date);
        $this->patient_data = [
            'PatientFullName' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->full_name,
            ],
            'DateMonth' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->created_at->format('m'),
            ],
            'DateDay' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->created_at->format('d'),
            ],
            'DateYear' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->created_at->format('y'),
            ],
            'DateTime' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->created_at->toTimeString(),
            ],
            'BirthMonth' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->birth_date->format('m'),
            ],
            'BirthDay' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->birth_date->format('d'),
            ],
            'BirthYear' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->birth_date->format('y'),
            ],
            'Age' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $age,
            ],
            'Sex' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->gender(),
            ],
            'PatientEmail' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->email,
            ],
            'PatientPhoneArea' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->phone_number, 0, strpos($this->patient->phone_number, ' ')),
            ],
            'PatientPhone' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->phone_number, 4, 7),
            ],
            'PatientStreet' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->street,
            ],
            'PatientStreetNumber' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->streer_number,
            ],
            'PatientZIP' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->zip_code,
            ],
            'PatientCity' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->city,
            ],
            'PatientState' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->state,
            ],
            'PatientCountry' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->country,
            ],
            'PatientBirthCity' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->birth_city,
            ],
            'PatientBirthState' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->birth_state,
            ],
            'PatientBirthCountry' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->birth_country,
            ],
            'PatientOccupation' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->occupation(),
            ],
            'PatientCivilStatus' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->status(),
            ],
            'FirstConsultYes' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (1 == $this->patient->firstTimePatientForm->first_consult) ? 'X' : '',
            ],
            'FirstConsultNo' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (0 == $this->patient->firstTimePatientForm->first_consult) ? 'X' : '',
            ],
            'FirstVisitYes' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (1 == $this->patient->firstTimePatientForm->first_visit) ? 'X' : '',
            ],
            'FirstVisitNo' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (0 == $this->patient->firstTimePatientForm->first_visit) ? 'X' : '',
            ],
            'ChildrenYes' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (0 < $this->patient->firstTimePatientForm->children) ? 'X' : '',
            ],
            'ChildrenNo' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (0 == $this->patient->firstTimePatientForm->children) ? 'X' : '',
            ],
            'ChildrenAmount' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->children,
            ],
            'DrugStore' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (0 == $this->patient->firstTimePatientForm->referral) ? 'X' : '',
            ],
            'Family' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (1 == $this->patient->firstTimePatientForm->referral) ? 'X' : '',
            ],
            'Friend' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (2 == $this->patient->firstTimePatientForm->referral) ? 'X' : '',
            ],
            'Nobody' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (3 == $this->patient->firstTimePatientForm->referral) ? 'X' : '',
            ],
            'Sign' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (4 == $this->patient->firstTimePatientForm->referral) ? 'X' : '',
            ],
            'Other' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (5 == $this->patient->firstTimePatientForm->referral) ? 'X' : '',
            ],
            'ReferrerName' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->referrer_name ?? '',
            ],
            'ContactName' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->contact_name ?? '',
            ],
            'ContactEmail' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->contact_email ?? '',
            ],
            'ContactPhoneArea' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->firstTimePatientForm->contact_phone_number, 0, strpos($this->patient->firstTimePatientForm->contact_phone_number, ' ')),
            ],
            'ContactPhone' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->firstTimePatientForm->contact_phone_number, 4, 7),
            ],
            'InsurancePhoneArea' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->firstTimePatientForm->insurer_phone_number, 0, strpos($this->patient->firstTimePatientForm->insurer_phone_number, ' ')),
            ],
            'InsurancePhone' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->firstTimePatientForm->insurer_phone_number, 4, 7),
            ],
            'WorkPhoneArea' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->firstTimePatientForm->work_phone_number, 0, strpos($this->patient->firstTimePatientForm->work_phone_number, ' ')),
            ],
            'WorkPhone' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => substr($this->patient->firstTimePatientForm->work_phone_number, 4, 7),
            ],
            'InsuredName' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->insured_name,
            ],
            'SSN' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->insured_ssn,
            ],
            'Spouse' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (2 == $this->patient->firstTimePatientForm->insured_relationship) ? 'X' : '',
            ],
            'Son' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (1 == $this->patient->firstTimePatientForm->insured_relationship) ? 'X' : '',
            ],
            'Myself' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => (3 == $this->patient->firstTimePatientForm->insured_relationship) ? 'X' : '',
            ],
            'InsuranceName' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->insured_name,
            ],
            'WorkName' => [
                'size' => 9,
                'family' => 'Arial',
                'style' => 'B',
                'value' => $this->patient->firstTimePatientForm->insured_ssn,
            ],
        ];
    }
}