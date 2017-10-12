<?php 
class ModulesModel extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    # Listado completo 
    public function full_listing()
    {
        return $this->db
        ->from('modules')
        ->select('id_module, module_name')
        ->get()
        ->result_array();
    }
    # Informacion de la categoria
    public function information_modules($id)
    {
        return $this->db->where('id_module', $id)->get('modules')->result_array();
    }
    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('modules', $data);
    }
    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_module', $id)->update('modules', $data);
    }
    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_module', $id)->delete('modules');
    }
    # Lista de beneficios
    public function modules_listing()
    {
        $modules = array();
        foreach ($this->db->select('id_module, module_name')->order_by('module_name', 'ASC')->get('modules')->result_array() as $key => $value) {
            $modules[$value['id_module']] = $value['module_name'];
        }
         $modules[0] = '';
        asort($modules);
        return $modules;
    }
}