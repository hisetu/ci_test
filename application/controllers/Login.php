<?php

/**
 * @property CI_Loader load
 * @property User_model user_model
 * @property CI_Input input
 * @property CI_Form_validation form_validation
 */
class Login extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', '電子郵件', ['required', 'valid_email']);
        $this->form_validation->set_rules('password', '密碼', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('login');
            return;
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        if (User_model::verification_by_email($email, $password)) {
            echo '登入成功';
        } else {
            echo 'email或密碼錯誤';
        }
    }
}