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
        $data['id_benefits']    = implode(',', $data['id_benefits']);
        $data['id_component']   = implode(',', $data['id_component']);
        $data['id_seals']       = implode(',', $data['id_seals']);
        $data['images']         = implode(',', $data['images']);
        $this->db->insert('products', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        unset($data['filtr-search']);
        $data['id_benefits']    = implode(',', $data['id_benefits']);
        $data['id_component']   = implode(',', $data['id_component']);
        $data['id_seals']       = implode(',', $data['id_seals']);
        $data['images']         = implode(',', $data['images']);
        $this->db->where('id_product', $id)->update('products', $data);
    }

    # Eliminar productos
    public function delete($id)
    {
        $this->db->where('id_product', $id)->delete('products');
    }

    # Lista de linea de productos
    public function catalogue_listing()
    {
        $catalogue = array();
        foreach ($this->db->select('id, name_catalogue')->order_by('name_catalogue', 'ASC')->get('catalogue')->result_array() as $key => $value) {
            $catalogue[$value['id']] = $value['name_catalogue'];
        }
        asort($catalogue);
        return $catalogue;
    }

    # Lista de categorias
    public function categories_listing()
    {
        $category = array();
        foreach ($this->db->select('id_category, name_category')->order_by('name_category', 'ASC')->get('categories')->result_array() as $key => $value) {
            $category[$value['id_category']] = $value['name_category'];
        }
        asort($category);
        return $category;
    }

    # Listado de tipo de inventario
    public function typesinv_listing()
    {
        $typesinventory = array();
        foreach ($this->db->select('id_typeinventory, type_inventory')->order_by('type_inventory', 'ASC')->get('typesinventory')->result_array() as $key => $value) {
            $typesinventory[$value['id_typeinventory']] = $value['type_inventory'];
        }asort($typesinventory);
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
        asort($seals);
        return $seals;
    }

    # Lista de unidades de medida
    public function unitsmeasure_listing()
    {
        $unitsmeasure = array();
        foreach ($this->db->select('id_unit_measure, unit_measure')->order_by('unit_measure', 'ASC')->get('units_measure')->result_array() as $key => $value) {
            $unitsmeasure[$value['id_unit_measure']] = $value['unit_measure'];
        }
        asort($unitsmeasure);
        return $unitsmeasure;
    }

    # Lista de certificados
    public function certifications_listing()
    {
        $certifications = array();
        foreach ($this->db->select('id_certifications, name_certifications')->order_by('name_certifications', 'ASC')->get('certifications')->result_array() as $key => $value) {
            $certifications[$value['id_certifications']] = $value['name_certifications'];
        }
        asort($certifications);
        return $certifications;
    }

}