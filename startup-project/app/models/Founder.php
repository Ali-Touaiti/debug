<?php
class FounderModel {
    protected $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function store($data) {
        $stmt = $this->db->prepare("INSERT INTO founders 
                                    (name, email, bio) 
                                    VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['bio']
        ]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM founders");
        return $stmt->fetchAll();
    }
}