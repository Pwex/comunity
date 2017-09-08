<?php 
class ProductsModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de productos
    public function full_listing()
    {
        return $this->db
        ->from('products p')
        ->select('p.id_product, p.name_product, p.description_product, p.ean13_product, p.enabled_product, c.name_category')
        ->join('categories c', 'c.id_category = p.id_category', 'left')
        ->get()
        ->result_array();
    }

    # Informacion del productos
    public function information_product($id)
    {
        return $this->db->where('id_product', $id)->get('products')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        unset($data['filtr-search']);
        #echo "<pre>"; print_r($data)."</pre>"; exit();
        $data['id_benefits']    = implode(',', $data['id_benefits']);
        $data['id_component']   = implode(',', $data['id_component']);
        $data['id_seals']       = implode(',', $data['id_seals']);
        $data['images']         = implode(',', $data['images']);
        $this->db->insert('products', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_product', $id)->update('products', $data);
    }

    # Eliminar productos
    public function delete($id)
    {
        $this->db->where('id_product', $id)->delete('products');
    }

    # Lista de categorias
    public function categories_listing()
    {
        $category = array();
        foreach ($this->db->select('id_category, name_category')->order_by('name_category', 'ASC')->get('categories')->result_array() as $key => $value) {
            $category[$value['id_category']] = $value['name_category'];
        }
        $category[0] = '';
        asort($category);
        return $category;
    }

    # Listado de tipo de inventario
    public function typesinv_listing()
    {
        $typesinventory = array();
        foreach ($this->db->select('id_typeinventory, type_inventory')->order_by('type_inventory', 'ASC')->get('typesinventory')->result_array() as $key => $value) {
            $typesinventory[$value['id_typeinventory']] = $value['type_inventory'];
        }
        $typesinventory[0] = '';
        asort($typesinventory);
        return $typesinventory;
    }

    # Lista de beneficios
    public function benefits_listing()
    {
        $benefits = array();
        foreach ($this->db->select('id_benefit, name_benefit')->order_by('name_benefit', 'ASC')->get('benefits')->result_array() as $key => $value) {
            $benefits[$value['id_benefit']] = $value['name_benefit'];
        }
        return $benefits;
    }

    # Lista de componentes
    public function components_listing()
    {
        $components = array();
        foreach ($this->db->select('id_component, name_component')->order_by('name_component', 'ASC')->get('components')->result_array() as $key => $value) {
            $components[$value['id_component']] = $value['name_component'];
        }
        return $components;
    }

    # Lista de sellos
    public function seals_listing()
    {
        $seals = array();
        foreach ($this->db->select('id_seals, name_seals')->order_by('name_seals', 'ASC')->get('seals')->result_array() as $key => $value) {
            $seals[$value['id_seals']] = $value['name_seals'];
        }
        $seals[0] = '';
        asort($seals);
        return $seals;
    }

}