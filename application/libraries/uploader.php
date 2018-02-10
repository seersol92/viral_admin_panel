<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class uploader {

    private $CI;
    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->helper(array('form', 'url'));
    }
    public  function uploadImages($img, $upload_path)
    {
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg|PNG';
        $config['file_name'] = $_FILES[$img]['name'];
        $config['max_size']	= 20480;   // Max size of 20 Mb.
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        //load upload class library
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload($img)){
            // case - failure
            return $upload_error = array('error' => $this->CI->upload->display_errors());
        }
        else{
            // case - success
            $upload_data = array('success'=> $this->CI->upload->data());

            return $upload_data;
        }
    }

    public  function uploadFile($config, $file)
    {
        //load upload class library
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload($file)){
            // case - failure
            return $upload_error = array('error' => $this->CI->upload->display_errors());
        }
        else{
            // case - success
            $upload_data = array('success'=> $this->CI->upload->data());

            return $upload_data;
        }
    }


}
