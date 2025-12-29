<?php

namespace Core\Service;

class StatusService
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function approveRecipe($id)
    {

        $this->db->query("UPDATE recipes SET status = :status WHERE id= :id", [':status' => 'approved', ':id' => $id]);
    }
    public function rejectRecipe($id)
    {
        $this->db->query("UPDATE recipes SET status = :status WHERE id= :id", [':status' => 'rejected', ':id' => $id]);
    }
    public function approveComment($id)
    {

        $this->db->query("UPDATE comments SET status = :status WHERE id= :id", [':status' => 'approved', ':id' => $id]);
    }
    public function rejectComment($id)
    {
        $this->db->query("UPDATE comments SET status = :status WHERE id= :id", [':status' => 'rejected', ':id' => $id]);
    }
    public function generatePDF($id)
    {
        $this->db->query("SELECT * FROM recipes WHERE id = :id", [':id' => $id]);
    }
}
