<?php
class Church extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ChurchModel');
    }

    // public function insertChurch()
    // {
    //     $churchData = [
    //         'churchName' => $this->input->post('churchName'),
    //         'churchSlug' => $this->input->post('churchSlug'),
    //         'churchLocation' => $this->input->post('churchLocation'),
    //         'pastorName' => $this->input->post('pastorName'),
    //         'mobileNumber' => $this->input->post('mobileNumber'),
    //     ];

    //     $churchId = $this->ChurchModel->insertChurch($churchData);

    //     $contactNames = $this->input->post('contactName');
    //     $contactPhones = $this->input->post('contactPhone');
    //     if (!empty($contactNames)) {
    //         foreach ($contactNames as $index => $name) {
    //             $contactData = [
    //                 'churchId' => $churchId,
    //                 'contactName' => $name,
    //                 'contactPhone' => $contactPhones[$index],
    //             ];
    //             $this->ChurchModel->insertContactPerson($contactData);
    //         }
    //     }

    //     echo json_encode(['success' => true, 'message' => 'Church added successfully!']);

    // }

    public function insertChurch()
    {

        $churchData = [
            'churchName' => $this->input->post('churchName'),
            'churchSlug' => $this->input->post('churchSlug'),
            'churchLocation' => $this->input->post('churchLocation'),
            'pastorName' => $this->input->post('pastorName'),
            'mobileNumber' => $this->input->post('mobileNumber'),
        ];

        $staffId = $this->input->cookie('staffId', true);
        $stationId = $this->input->cookie('stationId', true);


        $churchData['staffId'] = $staffId;
        $churchData['stationId'] = $stationId;


        $churchId = $this->ChurchModel->insertChurch($churchData);


        $contactNames = $this->input->post('contactName');
        $contactPhones = $this->input->post('contactPhone');


        if (!empty($contactNames)) {
            foreach ($contactNames as $index => $name) {
                $contactData = [
                    'churchId' => $churchId,
                    'contactName' => $name,
                    'contactPhone' => $contactPhones[$index],
                ];
                $this->ChurchModel->insertContactPerson($contactData);
            }
        }


        echo json_encode(['success' => true, 'message' => 'Church added successfully!']);
    }
}
