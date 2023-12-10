<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Commentmodel
 *
 * @author feher
 */
class Commentmodel extends CI_Model{
    
    public function getCommentsByEntryId($id) {
        
        $this->db->select('id, email, szoveg, datum');
        $this->db->from('hozzaszolas2');
        $this->db->where('bejegyzes_id', $id);
        $this->db->order_by('datum', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return [];
    }
    
    
    public function saveComment($bejegyzesId, $email, $comment) {
        $data = array(
                'bejegyzes_id' => "'$bejegyzesId'",
                'szoveg' => "'$comment'",
                'datum' => 'NOW()',
                'email' => "'$email'"
        );

        $this->db->insert('hozzaszolas2', $data, false);
    }
    
    
}
