<?php

// application/core/MY_Controller.php
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    protected function verify_token() {
        $headers = $this->input->request_headers();

        if (!isset($headers['Authorization'])) {
            $this->output->set_status_header(401);
            exit("Unauthorized Access");
        }

        $auth_header = $headers['Authorization'];
        $token = trim(str_replace("Bearer", "", $auth_header));

        // Your token verification logic here
        if ($token !== 'your_valid_token') {
            $this->output->set_status_header(401);
            exit("Invalid token");
        }
    }
}

// application/controllers/YourController.php
class YourController extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function your_method() {
        // Verify token before proceeding
        $this->verify_token();

        // Your method logic here
    }
}
