<?php

/**
 * Description of Blogmodel
 *
 * @author feher
 */
class Blogmodel extends CI_Model{
    
    public function getBlogBejegyzesek() {
        $this->db->select('id, cim, rovidtartalom, tartalom');
        $this->db->from('bejegyzes');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return [];
    }
    
    public function getBejegyzesById($id) {
        $this->db->select('id, cim, rovidtartalom, tartalom');
        $this->db->from('bejegyzes');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return [];
    }
    
    
}
