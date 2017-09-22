<?php 
class CertificationsModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de los certificados
    public function full_listing()
    {
        return $this->db
        ->from('certifications')
        ->select('id_certifications, name_certifications')
        ->get()
        ->result_array();
    }

    # Informacion de los cetificados
    public function information_certifications($id)
    {
        return $this->db->where('id_certifications', $id)->get('certifications')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('certifications', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_certifications', $id)->update('certifications', $data);
    }

    # Eliminar certificados
    public function delete($id)
    {
        $this->db->where('id_certifications', $id)->delete('certifications');
    }
    # Lista de certificados
    public function certifications_listing()
    {
        $certifications = array();
        foreach ($this->db->select('id_certifications, name_certifications')->order_by('name_certifications', 'ASC')->get('certifications')->result_array() as $key => $value) {
            $certifications[$value['id_certifications']] = $value['name_certifications'];
        }
        return $certifications;
    }
}