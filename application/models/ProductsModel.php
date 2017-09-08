<?php 
class ProductsModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de usuarios
    public function full_listing()
    {
        return $this->db
        ->from('products p')
        ->select('p.id_product, p.name_product, p.description_product,c.name_category')
        ->join('categories c', 'c.id_category = p.id_category', 'left')
        ->get()
        ->result_array();
    }

    # Informacion del usuario
    public function information_user($id)
    {
        return $this->db->where('id_product', $id)->get('products')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $product = array(
            'id_product' => $data['id_product'],
            'name_product' => $data['name_product'],
            'description_product' => $data['description_product'],
            'id_typeinventory' => $data['id_typeinventory'],
            'id_category' => $data['id_category']
        );
        $this->db->insert('products', $product);
 /*
        $benefit = array(
            'id_product' => $data['id_product'],
            'id_benefit' => $data['id_benefit']
        );
        $this->db->insert('products_benefits', $benefit);
        $component = array(
            'id_product' => $data['id_product'],
            'id_component' => $data['id_component']
        );
        $this->db->insert('products_benefits', $component);
*/
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_product', $id)->update('products', $data);
    }

    # Eliminar usuario
    public function delete($id)
    {
        $this->db->where('id_product', $id)->delete('products');
    }

}