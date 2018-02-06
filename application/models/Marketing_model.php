<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Marketing_model extends CI_Model
{
    /**
     * This function is used to add new landing page to system
     * @return number $insert_id : This is last inserted id
     */

    function addNewPage($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_landing_pages', $data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function landingPages()
    {
        $this->db->select('id, page_name, youtube_video, min_level, page_path, page_images, created_at');
        $this->db->from('tbl_landing_pages');
        $this->db->where('is_active', '1');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
