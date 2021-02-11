<?php

namespace App\Actions;

use App\Models\Patient;
use FormFiller\PDF\Converter\Converter;
use FormFiller\PDF\Field;
use FormFiller\PDF\PDFGenerator;
use Illuminate\Support\Facades\Storage;

class FillFirstTimePatientFormPDF
{
    private $coordinates = '53 widget annotations found on page 1.
----------------------------------------------

PatientFullName: 
     llx: 34.0365
     lly: 575.563
     urx: 316.801
     ury: 592.145
   width: 282.7645
  height: 16.582


DateMonth: 
     llx: 338.62
     lly: 580.799
     urx: 373.529
     ury: 593.89
   width: 34.909
  height: 13.091


DateDay: 
     llx: 385.747
     lly: 580.799
     urx: 414.547
     ury: 594.414
   width: 28.8
  height: 13.615


DateYear: 
     llx: 420.656
     lly: 581.672
     urx: 447.711
     ury: 594.763
   width: 27.055
  height: 13.091


DateTime: 
     llx: 483.493
     lly: 573.817
     urx: 551.566
     ury: 590.399
   width: 68.073
  height: 16.582


BirthMonth: 
     llx: 39.7982
     lly: 545.976
     urx: 74.7075
     ury: 559.067
   width: 34.9093
  height: 13.091


BirthDay: 
     llx: 86.9257
     lly: 545.976
     urx: 115.726
     ury: 559.59
   width: 28.8003
  height: 13.614


BirthYear: 
     llx: 121.835
     lly: 546.849
     urx: 148.89
     ury: 559.94
   width: 27.055
  height: 13.091


Age: 
     llx: 165.032
     lly: 540.655
     urx: 204.654
     ury: 555.317
   width: 39.622
  height: 14.662


Sex: 
     llx: 223.417
     lly: 540.917
     urx: 263.039
     ury: 555.579
   width: 39.622
  height: 14.662


PatientEmail: 
     llx: 279.358
     lly: 538.91
     urx: 427.549
     ury: 555.492
   width: 148.191
  height: 16.582


PatientPhoneArea: 
     llx: 439.155
     lly: 543.797
     urx: 466.209
     ury: 556.888
   width: 27.054
  height: 13.091


PatientPhone: 
     llx: 482.384
     lly: 545.077
     urx: 576.464
     ury: 557.644
   width: 94.08
  height: 12.567


PatientStreet: 
     llx: 34.5588
     lly: 508.801
     urx: 279.098
     ury: 521.194
   width: 244.5392
  height: 12.393


PatientStreetNumber: 
     llx: 282.326
     lly: 509.237
     urx: 376.406
     ury: 521.805
   width: 94.08
  height: 12.568


PatientZIP: 
     llx: 418.238
     lly: 509.994
     urx: 512.318
     ury: 522.561
   width: 94.08
  height: 12.567


PatientCity: 
     llx: 34.4574
     lly: 484.554
     urx: 278.997
     ury: 496.947
   width: 244.5396
  height: 12.393


PatientState: 
     llx: 282.225
     lly: 484.99
     urx: 376.305
     ury: 497.557
   width: 94.08
  height: 12.567


PatientCountry: 
     llx: 418.137
     lly: 485.747
     urx: 512.217
     ury: 498.314
   width: 94.08
  height: 12.567


PatientBirthCity: 
     llx: 86.2972
     lly: 434.809
     urx: 278.997
     ury: 447.201
   width: 192.6998
  height: 12.392


PatientBirthState: 
     llx: 342.966
     lly: 434.198
     urx: 424.479
     ury: 446.765
   width: 81.513
  height: 12.567


PatientBirthCountry: 
     llx: 484.115
     lly: 434.954
     urx: 578.195
     ury: 447.521
   width: 94.08
  height: 12.567


PatientOccupation: 
     llx: 378.587
     lly: 410.881
     urx: 571.286
     ury: 423.274
   width: 192.699
  height: 12.393


PatientCivilStatus: 
     llx: 112.348
     lly: 411.114
     urx: 273.629
     ury: 422.983
   width: 161.281
  height: 11.869


FirstConsultYes: 
     llx: 163.585
     lly: 367.578
     urx: 174.16
     ury: 377.28
   width: 10.575
  height: 9.702


FirstConsultNo: 
     llx: 145.586
     lly: 367.694
     urx: 156.16
     ury: 377.396
   width: 10.574
  height: 9.702


FirstVisitYes: 
     llx: 312.986
     lly: 367.418
     urx: 323.56
     ury: 377.12
   width: 10.574
  height: 9.702


FirstVisitNo: 
     llx: 294.986
     lly: 367.534
     urx: 305.56
     ury: 377.236
   width: 10.574
  height: 9.702


ChildrenYes: 
     llx: 448.986
     lly: 367.345
     urx: 459.56
     ury: 377.047
   width: 10.574
  height: 9.702


ChildrenNo: 
     llx: 430.986
     lly: 367.461
     urx: 441.561
     ury: 377.163
   width: 10.575
  height: 9.702


ChildrenAmount: 
     llx: 528.915
     lly: 371.827
     urx: 567.664
     ury: 384.394
   width: 38.749
  height: 12.567


DrugStore: 
     llx: 142.857
     lly: 333.987
     urx: 151.25
     ury: 341.07
   width: 8.393
  height: 7.083


Family: 
     llx: 228.058
     lly: 333.876
     urx: 236.451
     ury: 340.96
   width: 8.393
  height: 7.084


Friend: 
     llx: 312.058
     lly: 333.876
     urx: 320.451
     ury: 340.96
   width: 8.393
  height: 7.084


Nobody: 
     llx: 387.695
     lly: 333.73
     urx: 396.088
     ury: 340.814
   width: 8.393
  height: 7.084


Sign: 
     llx: 470.895
     lly: 333.876
     urx: 479.288
     ury: 340.96
   width: 8.393
  height: 7.084


Other: 
     llx: 539.695
     lly: 334.021
     urx: 548.088
     ury: 341.105
   width: 8.3929999999999
  height: 7.084


ReferrerName: 
     llx: 35.5851
     lly: 274.712
     urx: 574.669
     ury: 287.105
   width: 539.0839
  height: 12.393


ContactName: 
     llx: 31.6208
     lly: 207.332
     urx: 260.888
     ury: 219.725
   width: 229.2672
  height: 12.393


ContactEmail: 
     llx: 275.838
     lly: 207.477
     urx: 425.687
     ury: 219.87
   width: 149.849
  height: 12.393


ContactPhoneArea: 
     llx: 439.272
     lly: 214.751
     urx: 466.326
     ury: 227.842
   width: 27.054
  height: 13.091


ContactPhone: 
     llx: 483.615
     lly: 214.544
     urx: 577.695
     ury: 227.111
   width: 94.08
  height: 12.567


InsurancePhoneArea: 
     llx: 407.708
     lly: 80.4962
     urx: 434.762
     ury: 93.5872
   width: 27.054
  height: 13.091


InsurancePhone: 
     llx: 450.937
     lly: 81.7762
     urx: 575.999
     ury: 94.3432
   width: 125.062
  height: 12.567


WorkPhoneArea: 
     llx: 406.326
     lly: 42.3873
     urx: 433.38
     ury: 55.4783
   width: 27.054
  height: 13.091


WorkPhone: 
     llx: 449.555
     lly: 43.6674
     urx: 574.617
     ury: 56.2343
   width: 125.062
  height: 12.5669


InsuredName: 
     llx: 31.9844
     lly: 115.987
     urx: 340.233
     ury: 128.38
   width: 308.2486
  height: 12.393


SSN: 
     llx: 449.874
     lly: 117.441
     urx: 580.087
     ury: 129.834
   width: 130.213
  height: 12.393


Spouse: 
     llx: 351.331
     lly: 138.603
     urx: 359.724
     ury: 145.687
   width: 8.393
  height: 7.084


Son: 
     llx: 351.404
     lly: 125.875
     urx: 359.797
     ury: 132.959
   width: 8.393
  height: 7.084


Myself: 
     llx: 351.695
     lly: 113.585
     urx: 360.088
     ury: 120.669
   width: 8.393
  height: 7.084


InsuranceName: 
     llx: 33.1554
     lly: 71.6139
     urx: 377.448
     ury: 84.0069
   width: 344.2926
  height: 12.393


WorkName: 
     llx: 34.8275
     lly: 33.3405
     urx: 379.12
     ury: 45.7335
   width: 344.2925
  height: 12.393
';

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
        $form = storage_path('app/pdf/forms/FirstTimePatientForm.pdf');
        $this->fillPage($form);
        $merge = new MergePDFs(1);
        $merge->merge($this->patient->full_name, $output);
    }

    public function saveFill()
    {
        $directory = 'pdf/patients/'.$this->patient->patient_id.'/invoices/';

        Storage::put($directory.$this->patient->id.'PrimeraVez.pdf', '');

        $form = storage_path('app/pdf/forms/FirstTimePatientForm.pdf');
        $this->fillPage($form);
        $merge = new MergePDFs(1);

        $merge->saveMerge('app/'.$directory.$this->patient->id.'PrimeraVez.pdf');
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