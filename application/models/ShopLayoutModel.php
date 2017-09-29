<?php 
class ShopLayoutModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Información almacenada en la base de datos
    public function information()
    {
        return $this->db->where('id', 1)->get('ec_shop_layout')->result_array();
    }

    # Almacenar información en la base de datos
    public function save($data)
    {
        $this->db->where('id', 1)->update('ec_shop_layout', $data);
    }

    public function navbar_full_listing()
    {
        return $this->db
        ->from('ec_navbar')
        ->select('id_navbar, navbar, position, url, status')
        ->join('ec_navbar_position', 'ec_navbar_position.id = ec_navbar.id_position_navbar')
        ->get()
        ->result_array();
    }

    public function nav_position()
    {
        $nav = array();
        foreach ($this->db->select('id, position')->order_by('position', 'ASC')->get('ec_navbar_position')->result_array() as $key => $value) {
            $nav[$value['id']] = $value['position'];
        }
        return $nav;
    }

    # Almacenar información en la base de datos
    public function save_navbar($data)
    {
        $this->db->insert('ec_navbar', $data);
    }

    public function information_edit_navbar($id)
    {
        return $this->db->select()->where('id_navbar', $id)->get('ec_navbar')->result_array();
    }

    public function edit_navbar($id, $data)
    {
        $this->db->where('id_navbar', $id)->update('ec_navbar', $data);
    }

    # Eliminar menús
    public function navbar_delete($id)
    {
        $this->db->where('id_navbar', $id)->delete('ec_navbar');
    }

    # Organizar los item del menu
    public function navbar_position()
    {
        $navbar = array();
        foreach ($this->db->select('id, position')->order_by('position', 'ASC')->get('ec_navbar_position')->result_array() as $key => $value) {
            $navbar[$value['id']] = $value['position'];
        }
        return $navbar;
    }

    # Contenido de los item del menu
    public function container_item_navbar($navbar_position)
    {
        return $this->db->select('id_navbar, navbar')->where('id_position_navbar', $navbar_position)->order_by('location', 'ASC')->get('ec_navbar')->result_array();
    }

    # Almacenar item del menu modificado
    public function organize_save_item_navbar($positions)
    {
        foreach ($positions as $key => $value) {
            $data = array(
                'location' => $key
            );
            $this->db->set('location')->where('id_navbar', $value)->update('ec_navbar', $data);
        }
    }

    # Listado de filtros y busqueda
    public function filter_full_listing()
    {
        return $this->db
        ->from('ec_filter_categories')
        ->select('ec_filter_categories.id, ec_filter_categories.name_filter, catalogue.name_catalogue')
        ->order_by('name_filter', ' ASC')
        ->join('catalogue', 'catalogue.id = ec_filter_categories.id_catalogue')
        ->get()
        ->result_array();
    }


    # Listado de categorias princiapales
    public function list_catalogue()
    {
        $catalogue = array();
        foreach ($this->db->select('id, name_catalogue')->order_by('name_catalogue', 'ASC')->get('catalogue')->result_array() as $key => $value) {
            $catalogue[$value['id']] = $value['name_catalogue'];
        }
        return $catalogue;
    }

    # Almacenar información en la base de datos
    public function save_filter($data)
    {
        $this->db->insert('ec_filter_categories', $data);
    }

    public function information_edit_filter($id)
    {
        return $this->db->select()->where('id', $id)->get('ec_filter_categories')->result_array();
    }

    public function edit_filter($id, $data)
    {
        $this->db->where('id', $id)->update('ec_filter_categories', $data);
    }

    # Eliminar menús
    public function filter_delete($id)
    {
        $this->db->where('id', $id)->delete('ec_filter_categories');
    }

    # Listado de filtros y busqueda
    public function filter_item_full_listing()
    {
        return $this->db
        ->from('ec_settings_filter_categories')
        ->select('ec_settings_filter_categories.id, ec_settings_filter_categories.settings, ec_filter_categories.name_filter')
        ->join('ec_filter_categories', 'ec_filter_categories.id = ec_settings_filter_categories.id_filter_categories')
        ->get()
        ->result_array();
    }

    # Listado de filtros
    public function list_filter()
    {
        $filter = array();
        foreach ($this->db->select('id, name_filter')->order_by('name_filter', 'ASC')->get('ec_filter_categories')->result_array() as $key => $value) {
            $filter[$value['id']] = $value['name_filter'];
        }
        return $filter;
    }

    # Almacenar información en la base de datos
    public function save_filter_item($data)
    {
        $this->db->insert('ec_settings_filter_categories', $data);
    }

    public function information_edit_filter_item($id)
    {
        return $this->db->select()->where('id', $id)->get('ec_settings_filter_categories')->result_array();
    }

    public function edit_filter_item($id, $data)
    {
        $this->db->where('id', $id)->update('ec_settings_filter_categories', $data);
    }

    # Eliminar menús
    public function filter_item_delete($id)
    {
        $this->db->where('id', $id)->delete('ec_settings_filter_categories');
    }

}