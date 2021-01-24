<?php
//Studi kasus Proses Authetifikasi Login pada Framework Codeigniter v3
class Auth{

    //Sebelum di refactoring
    function _login(){
            $email=$this->input->post('email');
            //mengambil inputan email
            $password=$this->input->post('password');
            //mengambil inputan password

            $user=$this->db->get_where('user',['email'=>$email])->row_array();
            //Menampilkan semua data berdasarkan user yang login
            if($user){
                if($user['is_aktif']==1){
                    if(password_verify($password,$user['password'])){
                        $data=[
                            'email'=>$user['email'],
                            'level'=>$user['level']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');                     
                                    
                    }else{
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Wrong Password!
                        </div>');
                redirect('auth');
                    }

                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    This email has not been activated!
                    </div>');
                redirect('auth');
                }

            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert" >
                Email is not registered!
                </div>');
                redirect('auth');
            }
        }

    //Sesudah di refactoring
    function __login(){
        $email=$this->input->post('email');
         //mengambil inputan email
        $password=$this->input->post('password');
        //mengambil inputan password

        $user=$this->db->get_where('user',['email'=>$email])->row_array();
        //Menampilkan semua data berdasarkan user yang login
        if(!$user){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert" >
            Email is not registered!</div>');
            redirect('auth');
        }

        if($user['is_aktif']==0){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            This email has not been activated!</div>');
            redirect('auth');
        }

        if(!password_verify($password,$user['password'])){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Wrong Password!</div>');
            redirect('auth');
        }
        return
            $data=[
                'email'=>$user['email'],
                'level'=>$user['level']
            ];
            $this->session->set_userdata($data);
            redirect('admin');     
        
    }

}
?>