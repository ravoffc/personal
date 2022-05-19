<?php

class Portofolio extends Controller
{
    public function index()
    {
        
        $data['profile'] = $this->model('PortofolioModel')->getProfile();

        
        $data['about'] = $this->model('PortofolioModel')->getAbout();

        
        $data['project'] = $this->model('PortofolioModel')->getProject();



        $this->view('portofolio/index',$data);
    
    }
    public function pesan()
    {
        if ($this->model('PortofolioModel')->tampungPesan($_POST)>0) {
            echo"
            <script>
            alert('Data berhasil dikirim')
            window.location.href= 'http://localhost/03058/ujikomrav/public'
            </script>";
        }
        else{
            echo"gagal terkirim
            window.location.href= 'http://localhost/03058/ujikomrav/public'
            ";
        }
    }
}
