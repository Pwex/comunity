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
        ->select('p.id_product, p.name_product, p.description_product, p.ean13_product, p.enabled_product, c.name_category, catalogue.name_catalogue')
        ->join('categories c', 'c.id_category = p.id_category', 'left')
        ->join('catalogue', 'catalogue.id = p.id_catalogue', 'left')
        ->get()
        ->result_array();
    }

    # Filtros de busqueda
    public function status_filter_products()
    {
        $filter = array();
        $filter[0] = 'NO APLICA NINGUNO';
        foreach ($this->db->select('id, name_filter')->order_by('name_filter', 'ASC')->get('ec_filter_categories')->result_array() as $key => $value) {
            $filter[$value['id']] = $value['name_filter'];
        }
        return $filter;
    }

    # Llenar select para filtro de parametros
    public function filter_settings($id)
    {
        return $this->db->select('id, settings')->where('id_filter_categories', $id)->order_by('settings', 'ASC')->get('ec_settings_filter_categories')->result_array();
    }

    # Informacion del productos
    public function information_product($id)
    {
        return $this->db->where('id_product', $id)->get('products')->result_array();
    }

    # Guardar informacion
    public function save($data, $image)
    {
    # Configuraciones globales
        unset($data['filtr-search']);
        $data['creation_date']      = date('Y-m-d H:i:s');    
    # Beneficios
        if (!empty($data['id_benefits'])) {
            $data_temp['id_benefits']   = $data['id_benefits'];
            unset($data['id_benefits']);
        }
    # Componentes
        if (!empty($data['id_component'])) {
            $data_temp['id_component']  = $data['id_component'];
            unset($data['id_component']);
        }
    # Sellos
        if (!empty($data['id_seals'])) {
            $data_temp['id_seals']      = $data['id_seals'];
            # Buscar las imagenes de los sellos
            if (isset($data['id_seals']) and count($data['id_seals']) > 0) {
                $data['images_seals'] = '';
                foreach ($data['id_seals'] as $key => $value) {
                    $temp = $this->db->select('images')->where('id_seals', $value)->get('seals')->result_array();
                    $data['images_seals'] .= ','.$temp[0]['images'];
                }
                $data['images_seals'] = substr($data['images_seals'], 1);
                $data['id_seals']           = implode(',', $data['id_seals']);
            }
            if (isset($data['filter_product'])) {
                $data['filter_product']     = implode(',', $data['filter_product']);
            }
            unset($data['id_seals']);
        }
    # Disponibilidad
        if (!empty($data['availability'])) {
            $data_temp['availability']      = $data['availability'];
            unset($data['availability']);
        }
    # Certificados
        if (!empty($data['id_certifications'])) {
            $data_temp['id_certifications'] = $data['id_certifications'];
            unset($data['id_certifications']);
        }

        $data['images']             = implode(',', $data['images']);      
        if (!is_null($image)) {
            $data['nutritional']    = $image['upload_data']['file_name'];
        } else {
            $data['nutritional']    = '';
        }

        # Insertar la informacion del producto
        $this->db->insert('products', $data);

        # Insertar los beneficios del producto
        if (!empty($data_temp['id_benefits']) and count($data_temp['id_benefits']) > 0) {
            foreach ($data_temp['id_benefits'] as $key => $benefits) {
                $query_string = array(
                    'id_product_benefits' => $data['id_product'],
                    'id_benefits'         => $benefits
                );
                $this->db->insert('products_benefits', $query_string);
            }
        }
        # Insertar los componentes del producto
        if (!empty($data_temp['id_component']) and count($data_temp['id_component']) > 0) {
            foreach ($data_temp['id_component'] as $key => $components) {
                $query_string = array(
                    'id_product_component' => $data['id_product'],
                    'id_component'         => $components
                );
                $this->db->insert('products_components', $query_string);
            }
        }
        # Insertar los sellos del producto
        if (!empty($data_temp['id_seals']) and count($data_temp['id_seals']) > 0) {
            foreach ($data_temp['id_seals'] as $key => $seals) {
                $query_string = array(
                    'id_product_seals' => $data['id_product'],
                    'id_seals'         => $seals
                );
                $this->db->insert('products_seals', $query_string);
            }
        }
        # Insertar la disponibilidad del producto
        if (!empty($data_temp['availability']) and count($data_temp['availability']) > 0) {
            foreach ($data_temp['availability'] as $key => $availability) {
                $query_string = array(
                    'id_product_availability' => $data['id_product'],
                    'id_availability'         => $availability
                );
                $this->db->insert('products_availability', $query_string);
            }
        }
        # Insertar certificados del producto
        if (!empty($data_temp['id_certifications']) and count($data_temp['id_certifications']) > 0) {
            foreach ($data_temp['id_certifications'] as $key => $certifications) {
                $query_string = array(
                    'id_product_certifications' => $data['id_product'],
                    'id_certifications'         => $certifications
                );
                $this->db->insert('products_certifications', $query_string);
            }
        }

    }

    # Editar la informacion
    public function edit($id, $data)
    {
        unset($data['filtr-search']);
        $data['id_benefits']    = explode(',', $data['id_benefits']);
        $data['id_component']   = explode(',', $data['id_component']);
        $data['id_seals']       = explode(',', $data['id_seals']);
        $data['images']         = explode(',', $data['images']);
        $data['filter_product'] = explode(',', $data['filter_product']);
        $data['availability']   = explode(',', $data['availability']);
        if (!empty($data['id_certifications'])) {
            $data['id_certifications']  = explode(',', $data['id_certifications']);
        } else {
            $data['id_certifications'] = '';
        }
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
        foreach ($this->db->select('id, name_catalogue')->order_by('location', 'ASC')->get('catalogue')->result_array() as $key => $value) {
            $catalogue[$value['id']] = $value['name_catalogue'];
        }
        return $catalogue;
    }

    # Lista de tipo de presentaciones de productos
    public function presentation_listing()
    {
        $presentation = array();
        foreach ($this->db->select('id_presentation, name_presentation')->order_by('name_presentation', 'ASC')->get('presentation')->result_array() as $key => $value) {
            $presentation[$value['id_presentation']] = $value['name_presentation'];
        }
        asort($presentation);
        return $presentation;
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

    # Lista de proveedores
    public function provider_listing()
    {
        $provider = array();
        foreach ($this->db->select('id_partner, name_partner')->order_by('name_partner', 'ASC')->get('partners')->result_array() as $key => $value) {
            $provider[$value['id_partner']] = $value['name_partner'];
        }
        asort($provider);
        return $provider;
    }

}