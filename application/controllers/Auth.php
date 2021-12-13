<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        // $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function user_auth()
    {
        // mengatur form validation untuk email
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array('required' => 'Email tidak boleh kosong!')
        );

        // mengatur form validation untuk password
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => 'Password tidak boleh kosong!')
        );

        // mengatur delimiter error untuk form validation
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');

        // mengecek apakah form validation lolos
        // jika  tidak maka lari ke halaman login (menjalankan fungsi user_login())
        // jika ya maka proses login
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // menjalankan fungsi login lagi
        } else {
            // proses login

            // mengambil data inputan
            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));
            $where = ['email' => $email];
            // mengecek login
            $cek_login = $this->user->get_where($where)->row();
            // mengautentikasi
            if ($cek_login == FALSE) {
                $this->session->set_flashdata('error', 'Email yang Anda masukan tidak terdaftar.');
                redirect('login');
            } else {
                if (password_verify($pass, $cek_login->password)) {
                    // setting userdata
                    $this->session->set_userdata('status', 'user');
                    $this->session->set_userdata('id_user', $cek_login->id_user);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('name', $cek_login->name);
                    $this->session->set_userdata('logged_in', true);
                    redirect('user_aff/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Email atau password yang Anda masukan salah.');
                    redirect('login');
                }
            }
        }
    }

    public function admin_login()
    {
        $this->load->view('admin/login');;
    }

    public function admin_auth()
    {
        // mengatur form validasi email
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array('required' => 'Email tidak boleh kosong!')
        );
        // mengatur form validasi password
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => 'Password tidak boleh kosong!')
        );
        // mengatur error delimiter form validation
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');

        // mengecek apakah form validation lolos
        // jika  tidak maka lari ke halaman login (menjalankan fungsi user_login())
        // jika ya maka proses login
        if ($this->form_validation->run() == FALSE) {
            $this->admin_login();
        } else {
            // proses login

            // mengambil data inputan
            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));

            // mengecek login
            $cek_login = $this->Admin_model->cek_login($email);

            if ($cek_login == FALSE) {
                $this->session->set_flashdata('error', 'Email yang Anda masukan tidak terdaftar.');
                redirect('admin/login');
            } else {

                if (password_verify($pass, $cek_login->password)) {

                    // setting userdata
                    $this->session->set_userdata('status', 'admin');
                    $this->session->set_userdata('id', $cek_login->id_admin);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('name', $cek_login->name);

                    redirect('admin');
                } else {
                    $this->session->set_flashdata('error', 'Email atau password yang Anda masukan salah.');
                    redirect('admin/login');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
