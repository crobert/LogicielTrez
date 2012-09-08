<?php
class budget_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_budget($id)
    {
        $sql = 'SELECT * FROM budget WHERE bud_id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function get_budget_by_exercice($id)
    {
        $sql = 'SELECT * FROM budget WHERE bud_id_exercice = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_budget()
    {
        $sql = 'SELECT * FROM budget';
        return $this->db->query($sql)->result();
    }
    public function add_budget($data)
    {
        $this->db->insert('budget', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_budget($id, $data)
    {
        $this->db->where('bud_id', $id)->update('budget', $data);
        return $id;
    }
    public function delete_budget($id)
    {
        $this->db->delete('budget', array('bud_id' => $id));
        return $id;
    }

    /*
     * Retourne un budget "à plat", cad avec ses catégories,
     * sous-cat, lignes, factures...
     */
    /*public function get_budget_flat($id)
    {
        $sql = <<<'EOT'
                SELECT budget.id AS budget_id, budget.nom AS budget_nom,
                categorie.id AS categorie_id, categorie.nom AS categorie_nom, categorie.description AS categorie_desc,
                souscategorie.id AS souscategorie_id,
                FROM budget
                JOIN categorie ON categorie.id_budget = budget.id
                JOIN souscategorie ON souscategorie.id_categorie = categorie.id
                WHERE budget.id = ?
EOT;
        return $this->db->query($sql, array($id))->result();
    }*/
}
