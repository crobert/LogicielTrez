<?php
class facture_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_facture($id)
    {
        $sql = 'SELECT * FROM facture WHERE fac_id = ?';
		$facture = $this->db->query($sql, array($id))->row();

        if (! is_null($facture->fac_date)) {
            $fac_date = new DateTime($facture->fac_date);
            $facture->fac_date = $fac_date->format('d/m/Y');
        }

        if (! is_null($facture->fac_date_paiement)) {
            $fac_date_paiement = new DateTime($facture->fac_date_paiement);
            $facture->fac_date_paiement = $fac_date_paiement->format('d/m/Y');
        }

        return $facture;
    }
    public function get_facture_by_ligne($id)
    {
        $sql = 'SELECT * FROM facture WHERE fac_id_ligne = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_facture()
    {
        $sql = 'SELECT * FROM facture';
        return $this->db->query($sql)->result();
    }
    public function add_facture($data)
    {
        $this->db->insert('facture', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_facture($id, $data)
    {
        $this->db->where('fac_id', $id)->update('facture', $data);
        return $id;
    }
    public function delete_facture($id)
    {
        $this->db->delete('facture', array('fac_id' => $id));
        return $id;
    }

	public function getNumeroFacture($budget, $type)
	{
        $sql = 'SELECT COUNT(*) as val
                FROM budget
                JOIN categorie ON categorie.cat_id_budget = budget.bud_id
                JOIN souscategorie ON souscategorie.sct_id_categorie = categorie.cat_id
                JOIN ligne ON ligne.lig_id_souscategorie = souscategorie.sct_id
                JOIN facture on facture.fac_id_ligne = ligne.lig_id
                WHERE budget.bud_id = ?
                AND facture.fac_type = ?';
        return $this->db->query($sql, array($budget, $type))->result();
                
	}

}
