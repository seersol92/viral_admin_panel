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
    public function sendEmailMembers($memberIbm = NULL)
    {

    }

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

            }
           
		}
    }
    
    public function composeEmail()
    {
        $this->dd($_POST);
    }
}

?>