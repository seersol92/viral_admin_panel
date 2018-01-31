<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model
{
   /**
     * This function is used to add new email template to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewTemp($template)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_email_templates', $template);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function is used to get the template listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */

    public function templateListing($searchText = '', $page='', $segment='', $tempType = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.template_name, BaseTbl.time_delay, BaseTbl.template_type, BaseTbl.template_content, BaseTbl.created_at');
        $this->db->from('tbl_email_templates as BaseTbl');
        $this->db->order_by('BaseTbl.id ', 'DESC');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.template_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.template_content  LIKE '%".$searchText."%'
                           )";
            $this->db->where($likeCriteria);
        } else if (!empty($tempType)) {
            $likeCriteria = "(BaseTbl.template_type  LIKE '%".$tempType."%'
                           )";
            $this->db->where($likeCriteria);
            $this->db->where('BaseTbl.is_active', '1');
        }
        //$this->db->where('BaseTbl.isDeleted', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }

    function  deleteTemplate($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_email_templates', $data);

        return $this->db->affected_rows();
    }

    /**
     * This function used to get template information by id
     * @param number $templateId : This is templateId
     * @return array $result : This is template information
     */
    function getTempInfo($templateId)
    {
        $this->db->select('template_name, template_content');
        $this->db->from('tbl_email_templates');
        $this->db->where('id', $templateId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
}

?>