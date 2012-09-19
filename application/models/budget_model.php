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
    public function get_budget_detail($id)
    {
        $sql = <<<'EOT'
                SELECT bud_id, bud_nom,
                cat_id, cat_nom, cat_description,
                sct_id, sct_nom, sct_description,
                lig_id, lig_nom, lig_description, lig_debit, lig_credit
                FROM budget
                JOIN categorie ON categorie.cat_id_budget = budget.bud_id
                JOIN souscategorie ON souscategorie.sct_id_categorie = categorie.cat_id
                JOIN ligne ON ligne.lig_id_souscategorie = souscategorie.sct_id
                WHERE budget.bud_id = ?
                ORDER BY bud_id, cat_id, sct_id, lig_id
EOT;
        return $this->db->query($sql, array($id))->result();
    }
}
