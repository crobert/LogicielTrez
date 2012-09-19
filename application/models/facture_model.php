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

}
