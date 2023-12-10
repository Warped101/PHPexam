<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model(['blogmodel', 'commentmodel']);
    }
    
    public function index()
    {
        $data = [];
        $data['valtozo'] = 56;
        $data['bejegyzesek'] = $this->blogmodel->getBlogBejegyzesek();
        $this->load->view('home', $data);

    }

    public function item($id) 
    {
        $this->load->library('form_validation');
        $id = (int)$id;
        $data = [];
        $data['bejegyzes'] = $this->blogmodel->getBejegyzesById($id);
        $data['comments']  = $this->commentmodel->getCommentsByEntryId($id);
        $this->load->view('item', $data);
    }
    
    public function comment() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        $this->form_validation->set_rules('entry_id', 'Entry id', 'required|integer');
        
        if ($this->form_validation->run() === FALSE)
        {
            $data = [];
            $entry_id = (int)$this->input->post('entry_id');
            $data['bejegyzes'] = $this->blogmodel->getBejegyzesById($entry_id);
            if(empty($data['bejegyzes'])) {
                redirect('home/index');
            } else {
                $data['comments']         = $this->commentmodel->getCommentsByEntryId($entry_id);
                $this->load->view('item', $data);
            }
        }
        else
        {
            //mentést kell majd írni
            $entry_id   = (int)$this->input->post('entry_id');
            $email      = $this->input->post('email');
            $comment    = $this->input->post('comment');
            $this->commentmodel->saveComment($entry_id, $email, $comment);
            redirect('home/item/'.$entry_id);
        }
        
    }
}
