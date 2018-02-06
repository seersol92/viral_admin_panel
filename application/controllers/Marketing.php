<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Marketing extends BaseController {

    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('marketing_model');
        $this->load->library('upload');
        $this->isLoggedIn();
    }

    public function landingPages()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['pages'] = $this->marketing_model->landingPages();
            $this->global['pageTitle'] = 'Viral Marketer : Landing Pages';
            $this->loadViews("marketing/landing_pages/index", $this->global, $data , NULL);

        }
    }

    public function newPages()
    {
        $data['pages'] = [];
        $this->global['pageTitle'] = 'Viral Marketer : Landing Pages';
        $this->loadViews("marketing/landing_pages/add", $this->global, $data , NULL);
    }

    public function addNewPages()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('page_title','Page Title','trim|required|max_length[30]');
            $this->form_validation->set_rules('min_level','Minimum Level','trim|required');
            $this->form_validation->set_rules('youtube_link','Youtube Video Link','trim|required|min_length[20]');
            $this->form_validation->set_rules('page_directory','Page Directory','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->newPages();
            }
            else
            {
                $page_title = $this->security->xss_clean($this->input->post('page_title'));
                $min_level = $this->security->xss_clean($this->input->post('min_level'));
                $youtube_link = $this->security->xss_clean($this->input->post('youtube_link'));
                $page_directory = $this->security->xss_clean($this->input->post('page_directory'));
                $userId = $this->session->userdata('userId');
                $data = array(
                        'page_name'=>$page_title,
                        'youtube_video'=>$youtube_link,
                        'min_level'=>$min_level,
                        'page_path'=>$page_directory,
                        'page_images'=>'',
                        'created_at'=>date('Y-m-d H:i:s'),
                        'added_by'=> $userId,
                        'is_active'=> '1'
                );
                $result = $this->marketing_model->addNewPage($data);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Landing Page Has Been Added successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Error, something went wrong!');
                }

                redirect('add-new-page');
            }
        }

    }
}
