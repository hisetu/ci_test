<?php

/**
 * @property CI_Loader load
 * @property User_model user_model
 * @property CI_Input input
 * @property CI_Form_validation form_validation
 */
class Signup extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', '電子郵件', ['required', 'valid_email']);
        $this->form_validation->set_rules('password', '密碼', ['required','max_length[20]']);
        $this->form_validation->set_rules('name', '名稱', ['required','max_length[10]']);
        $this->form_validation->set_rules('address', '地址', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('signup');
            return;
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $address = $this->input->post('address');

        $this->load->model('user_model');
        if (User_model::create($email, $password, $name, $address)) {
            echo '註冊成功';
        } else {
            echo '註冊失敗';
        }
    }
}