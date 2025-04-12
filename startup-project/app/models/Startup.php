<?php
class StartupModel {
    protected $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT s.*, f.name as founder_name 
                                  FROM startups s 
                                  JOIN founders f ON s.id_fondateur = f.id");
        return $stmt->fetchAll();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM startups WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function store($data) {
        $stmt = $this->db->prepare("INSERT INTO startups 
                                    (nom, secteur, id_fondateur, email, 
                                     description, siteweb, date_creation, 
                                     annonce, logo) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nom'],
            $data['secteur'],
            $data['id_fondateur'],
            $data['email'],
            $data['description'],
            $data['siteweb'],
            $data['date_creation'],
            $data['annonce'],
            $data['logo']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE startups SET 
                                    nom = ?, secteur = ?, id_fondateur = ?, 
                                    email = ?, description = ?, siteweb = ?, 
                                    date_creation = ?, annonce = ?, logo = ? 
                                    WHERE id = ?");
        return $stmt->execute([
            $data['nom'],
            $data['secteur'],
            $data['id_fondateur'],
            $data['email'],
            $data['description'],
            $data['siteweb'],
            $data['date_creation'],
            $data['annonce'],
            $data['logo'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM startups WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getFounders() {
        $stmt = $this->db->query("SELECT * FROM founders");
        return $stmt->fetchAll();
    }
}