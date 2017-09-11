<?php 
class PriceProductModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de precios de productos
    public function full_listing()
    {
        return $this->db
        ->from('price_product')
        ->order_by('name_product', 'ASC')
        ->order_by('name_country', 'ASC')
        ->select('price_product.id as id_price_product, id_product_price, id_country_price, price, name_product, name_country, coin, name_list_price')
        ->join('products', 'price_product.id_product_price = products.id_product')
        ->join('countrys' , 'price_product.id_country_price = countrys.id_country')
        ->join('list_price' , 'price_product.id_list_price = list_price.id')
        ->get()
        ->result_array();
    }

    # Informacion de los precios de productos
    public function information_price_product($id)
    {
        return $this->db->where('id', $id)->get('price_product')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('price_product', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id', $id)->update('price_product', $data);
    }

    # Eliminar precios de productos
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('price_product');
    }

    # Listado de productos
    public function list_products()
    {
        $products = array();
        foreach ($this->db->select('id_product, name_product')->order_by('name_product', 'ASC')->get('products')->result_array() as $key => $value) {
            $products[$value['id_product']] = $value['name_product'];
        }
        asort($products);
        return $products;
    }

    # Listado de paises
    public function list_country()
    {
        $country = array();
        foreach ($this->db->select('id_country, name_country')->order_by('name_country', 'ASC')->get('countrys')->result_array() as $key => $value) {
            $country[$value['id_country']] = $value['name_country'];
        }
        asort($country);
        return $country;
    }

    # Listado de precios
    public function list_price()
    {
        $list_price = array();
        foreach ($this->db->select('id, name_list_price')->order_by('name_list_price', 'ASC')->get('list_price')->result_array() as $key => $value) {
            $list_price[$value['id']] = $value['name_list_price'];
        }
        asort($list_price);
        return $list_price;
    }

}