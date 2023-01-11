<?php

class dashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'name' => $_SESSION['name'],
            'type' => $_SESSION['type'],
            'id' => $_SESSION['id']
        ];
        $data = $this->set_alert_for_show($data);
        if (isset($data['alert'])) {
            $this->view('layout/alert', $data['alert']);
        }
        $this->header('header');
        $this->view('layout/navbar', $data);

        $this->footer('footer');
    }

    public function four_four()
    {
        $this->view('dashboard/four_fourView');
        exit();
    }
}