<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : hadi seersol
 * @version : 1.1
 * @since : 15 Jan 2018
 */
class Member extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function is used to load the user list
     */
    function memberListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->memberListingCount($searchText);

			$returns = $this->paginationCompress ( "memberListing/", $count, 10 );
            
            $data['userRecords'] = $this->user_model->memberListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Viral Marketer : Member Listing';
            
            $this->loadViews("members/viralMembers", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Viral Marketer : Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

     /**
     * This function is used to Send email to members via IBM
     */
    public function selectEmailTemplate($memberIbm = NULL)
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model(array('user_model', 'email_model'));
            $result = $this->user_model->getMemberInfo($memberIbm);
            if(!empty($result))
            {
                $data['memberInfo'] = $result;
                $data['tempList'] = $this->email_model->templateListing
                                ();
                $this->global['pageTitle'] = 'Viral Marketer : Select Email Template';
                $this->loadViews("email/selectEmailTemplate", $this->global, $data, NULL);

            } else 
            {
                redirect('pageNotFound');
            }
        }

    }

    public function strReplaceAssoc(array $replace, $subject = '') { 
        //echo $subject;
        //$identifiers = array('{#'=>'', '#}'=>'');
        $replace = (array) $replace[0]+$identifiers;
        foreach ($replace AS $keys => $value)
        {
            $subject = str_replace('{#'.$key.'#}', $value, $subject);
        }
        return $subject;
         } 


     /**
     * This function is used to compose email
     */
    
    public function composeEmail()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else if(!empty($_POST['mem_ibm']) && !empty($_POST['temp_no']) &&  filter_var($_POST['temp_no'], FILTER_VALIDATE_INT))
        {
            $this->load->model(array('user_model', 'email_model'));
            $result = $this->user_model->getMemberInfo($_POST['mem_ibm']);
            if(!empty($result))
            {
                $this->load->helper('string');
                $data['memberInfo'] = $result;
                $keys_list = array_keys($data['memberInfo']);
                $data['tempList'] = $this->email_model->getTempInfo($_POST['temp_no']);
                $data['show_content'] = $this->strReplaceAssoc($data['memberInfo'], $data['tempList'][0]->template_content); 
                $this->global['pageTitle'] = 'Viral Marketer : Compose Email';
                $this->loadViews("email/composeEmail", $this->global, $data, NULL);

            }
           
        } else 
        {
            redirect('pageNotFound');
        }
    }

     /**
     * This function is used to Send email to members
     */

    public function sendEmail()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else 
        {
            $data1['email'] = $_POST['mem_email'];
            $data1["name"] = $_POST['mem_name'];
            $data1["message"] = $_POST['temp_content'];
            $data1["title"] = $_POST['temp_name'];
            $data1["subject"] = $_POST['temp_name'];            
            $data["data"]   = $data1;
            $sendStatus = sendEmail($data1);
            if($sendStatus){
                $status = "success";
                setFlashData($status, "Email has been sent to <b>".$_POST['mem_name']."</b> successfully.");
            } else {
                $status = "error";
                setFlashData($status, "Email has been failed, try again.");
            }
            redirect('/memberListing');
        }

    }
}

?>