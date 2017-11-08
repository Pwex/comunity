<?php 
class InnovationModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado de proveedores registrados
    public function registered_suppliers()
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        $query = $con
        ->select('id, datestamp, email_sending_status, sending_email_rejected_provider')
        ->like('form_id', 'CF5968f76256174')   
        ->or_like('form_id', 'CF597122cccd306') 
        ->order_by('id', 'DESC')
        ->get('wp_cf_form_entries')
        ->result_array();
        foreach ($query as $key => $value) {
            # Nombre de la empresa
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'company_name'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['company_name'] = $temp[0]['value'];
            # Registro de la empresa
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'company_register'))->get('wp_cf_form_entry_values')->result_array();
            if (!empty($temp[0]['value'])) {
                $query[$key]['company_register'] = $temp[0]['value'];
            } else {
                $query[$key]['company_register'] = '';
            }
            # Nombre del contacto
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'contact_name'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['contact_name'] = $temp[0]['value'];
            # Correo electronico
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'email_address'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['email_address'] = $temp[0]['value'];
            # Lenguaje
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'language'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['language'] = $temp[0]['value'];
            # Pais
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'country'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['country'] = $temp[0]['value'];
        }
        return $query;
    }

    # Listado de proveedores registrados por la pagina de pwex proveedor
    public function list_page_provider()
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        # Buscar todos los registros principales de los formularios envios | Español
        $form_entry = $con
        ->select('id, form_id')
        ->order_by('id', 'DESC')
        ->like('form_id', 'CF5968f76256174')    # Id en ingles
        ->or_like('form_id', 'CF597122cccd306') # Id en español
        ->get('wp_cf_form_entries')
        ->result_array();
        # Buscar todos los registros asociados al envio de formularios principales | Español
        $not_values = array(
            'submit',
            'mainfunction_devices',
            'health_category',
            'devices_category',
            'beauty_category',
            'dietary_category',
            'nutrition',
            'nutrition.opt1065926',
            'nutrition_category',
            'iso9001_certification',
            'ohsas18001_certification',
            'none_certifications',
            'iso14001_certification',
            'fda_standards',
            'european_standards',
            'claims_documentation',
            'effectiveness_documentation',
            'stability_documentation',
            'toxicological_documentation',
            'allergen_documentation',
            'manufacturing_documentation',
            'msds_documentation',
            'datasheet_documentation',
            'triangle_documentation',
            'safety_documentation',
            'sanitary_documentation',
            'tvu_devices',
            'msds_devices',
            'warranty_devices'
        );
        $form_entry_values = $con
        ->select()
        ->where_not_in('slug', $not_values)
        ->order_by('wp_cf_form_entry_values.entry_id', 'DESC')
        ->get('wp_cf_form_entry_values')
        ->result_array();
        # Estructura del formulario
        foreach ($form_entry as $key => $value) {
            # Recorrer el detalles del formulario
            foreach ($form_entry_values as $details => $details_value) {
                if ($details_value['entry_id'] == $value['id']) {
                    if (!isset($value['id'])) { $data[$value['id']] = []; }
                    $data[$value['id']][$details_value['slug']] = $details_value['value'];
                    unset($form_entry_values[$details]);
                }
            }
        }
        # Completar las columnas que no existen y rellenar sus valores
        foreach ($data as $key => $value) {
            # Estructura de las columnas
            $excel = array(
                'mainfunction_devices.opt1065926'           => 'Dispositivos de funciones principales',
                'company_name'                              => 'Nombre Empresa',
                'company_register'                          => 'Registro de la Empresa',
                'webpage'                                   => 'Página web',
                'email_address'                             => 'Correo electrónico',
                'country'                                   => 'País',
                'contact_name'                              => 'Nombre de contacto',
                'phone'                                     => 'Teléfono',
                'health_category.opt1065926'                => 'Categoría salud',
                'devices_category.opt1065926'               => 'Categoría aparatologia',
                'beauty_category.opt1065926'                => 'Categoría belleza',
                'dietary_category.opt1065926'               => 'Categoría suplmentos dietarios',
                'nutrition_category.opt1065926'             => 'Categoría nutrición',
                'another_category'                          => 'Otra categoría',
                'iso9001_certification.opt1065926'          => 'Certificación iso 9001',
                'ohsas18001_certification.opt1065926'       => 'Certificación ohsas 18001',
                'none_certifications.opt1065926'            => 'Ninguna certificación',
                'iso14001_certification.opt1065926'         => 'Certificación iso 14001',
                'others_certification'                      => 'Otras certificaciones',
                'fda_standards.opt1065926'                  => 'Estándares fda',
                'european_standards.opt1065926'             => 'Normas europeas',
                'claims_documentation.opt1065926'           => 'Documentación de reclamaciones',
                'effectiveness_documentation.opt1065926'    => 'Documentación de efectividad',
                'stability_documentation.opt1065926'        => 'Documentación de estabilidad',
                'toxicological_documentation.opt1065926'    => 'Documentación toxicológica',
                'allergen_documentation.opt1065926'         => 'Documentación de alérgenos',
                'manufacturing_documentation.opt1065926'    => 'Documentación de fabricación',
                'msds_documentation.opt1065926'             => 'Documentación de msds',
                'datasheet_documentation.opt1065926'        => 'Documentación de la hoja de datos',
                'triangle_documentation.opt1065926'         => 'Documentación triangular',
                'safety_documentation.opt1065926'           => 'Documentación de seguridad',
                'sanitary_documentation.opt1065926'         => 'Documentación sanitaria',
                'tvu_devices.opt1065926'                    => 'Dispositivos tvu',
                'msds_devices.opt1065926'                   => 'Dispositivos msds',
                'warranty_devices.opt1065926'               => 'Dispositivos de garantía',
                'message'                                   => 'Mensaje',
                'language'                                  => 'Idioma', 
            );
            foreach ($value as $item => $items) {
                # Verificar que columnas no existen
                if (array_key_exists($item, $excel)) {
                    unset($excel[$item]); 
                }
            }
            # Limpiar las columnas faltantes
            foreach ($excel as $key_excel => $value_excel) {
                $excel[$key_excel] = '';
            }
            $data[$key] = array_merge($data[$key], $excel);
            unset($excel);
            ksort($data[$key]);
        }
        return $data;
    }

    # Cambiar el estatus del primer formulario enviado por los proveedores cuando se envia la encuesta
    public function email_sending_status($id)
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        $con->set('email_sending_status', 1)->where('id', $id)->update('wp_cf_form_entries');
    }

    public function sending_email_rejected_provider($id)
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        $con->set('sending_email_rejected_provider', 1)->where('id', $id)->update('wp_cf_form_entries');
    }

    public function shipping_email_supplier_rejection_matrix($id)
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        $con->set('shipping_email_supplier_rejection_matrix', 1)->where('id', $id)->update('wp_cf_form_entries');
    }

    # Listado matriz de requerimientos de proveedores
    public function requirements_matrix()
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        $query = $con
        ->select('id, email_sending_status, shipping_email_supplier_rejection_matrix')
        ->like('form_id', 'CF59e0dee722faf') # Ingles    
        ->or_like('form_id', 'CF59ee0a56cd7a3') # Español    
        ->order_by('id', 'DESC')
        ->get('wp_cf_form_entries')
        ->result_array();
        foreach ($query as $key => $value) {
            # Nombre de la empresa
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'company_name'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['company_name'] = $temp[0]['value'];
            # Correo electronico
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'email'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['email'] = $temp[0]['value'];
            # Producto
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'product_name'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['product_name'] = $temp[0]['value'];
            # Categoria
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'categories'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['categories'] = $temp[0]['value'];
            # Lenguaje
            $temp = $con->select('value')->where(array('entry_id' => $value['id'], 'slug' => 'language'))->get('wp_cf_form_entry_values')->result_array();
            $query[$key]['language'] = $temp[0]['value'];
        }
        foreach ($query as $key => $value) {
            $q = $con->select('datestamp, ')->where('id', $value['id'])->get('wp_cf_form_entries')->result_array();
            $query[$key]['creation_date'] = $q[0]['datestamp'];
        }
        return $query;
    }

    # Excel de la matriz de requerimientos
    public function list_requirements_matrix()
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        # Buscar todos los registros principales de los formularios envios | Español
        $form_entry = $con
        ->select('id, form_id, email_sending_status')
        ->order_by('id', 'DESC')
        ->like('form_id', 'CF59e0dee722faf') # Ingles    
        ->or_like('form_id', 'CF59ee0a56cd7a3') # Español  
        ->get('wp_cf_form_entries')
        ->result_array();
        # Buscar todos los registros asociados al envio de formularios principales | Español
        $not_values = array(
            'Submitted',
            'submit',
        );
        $form_entry_values = $con
        ->select()
        ->where_not_in('slug', $not_values)
        ->order_by('wp_cf_form_entry_values.entry_id', 'DESC')
        ->get('wp_cf_form_entry_values')
        ->result_array();
        # Estructura del formulario
        foreach ($form_entry as $key => $value) {
            # Recorrer el detalles del formulario
            foreach ($form_entry_values as $details => $details_value) {
                if ($details_value['entry_id'] == $value['id']) {
                    if (!isset($value['id'])) { $data[$value['id']] = []; }
                    $data[$value['id']][$details_value['slug']] = $details_value['value'];
                    unset($form_entry_values[$details]);
                }
            }
        }
        foreach ($data as $key => $value) {
            $q = $con->select('email_sending_status')->where('id', $key)->get('wp_cf_form_entries')->result_array();
            if ($q[0]['email_sending_status'] == 1) {
                $data[$key]['email_sending_status'] = 'Enviado';
            } else {
                $data[$key]['email_sending_status'] = 'Sin Enviar';
            }
        }
        # Completar las columnas que no existen y rellenar sus valores
        foreach ($data as $key => $value) {
            # Estructura de las columnas
            $excel = array(
                'company_name'           => 'Nombre de la empresa',
                'product_name'           => 'Nombre del producto',
                'email'                  => 'Correo electrónico',
                'language'               => 'Lenguaje',
                'categories'             => 'Categoría',
                'claims1'                => 'Reclamaciones 1',
                'claims2'                => 'Reclamaciones 2',
                'claims3'                => 'Reclamaciones 3',
                'active1'                => 'Activo 1',
                'active2'                => 'Activo 2',
                'active3'                => 'Activo 3',
                'service_life'           => 'Vida Útil',
                'content'                => 'Contenido',
                'fda_clasification'      => 'Clasificación FDA',
                'derived_animals'        => 'Alguna de las materias primas es derivada de animales',
                'animal_matters'         => 'Cuales animales',
                'test_animals'           => 'El producto ha sido testeado en animales',
                'private_label'          => 'Producto de marca blanca',
                'certification_product'  => 'Normatividad con las que cumple el producto',
                'other_certifications'   => 'Otras normatividades con las que cumple el producto',
                'opt_datasheet'          => 'Ficha técnica del producto',
                'file_datasheet'         => 'Archivo de ficha técnica del producto',
                'opt_safety'             => 'Estudio de seguridad',
                'file_safety'            => 'Archivo de estudio de seguridad',
                'opt_msds'               => 'Hoja de seguridad',
                'file_msds'              => 'Archivo de hoja de seguridad',
                'opt_stability'          => 'Estudio de estabilidad',
                'file_stability'         => 'Archivo de estudio de estabilidad',
                'opt_image'              => 'Imágenes del producto',
                'file_image'             => 'Archivo de imágenes del producto',
                'opt_effectiveness'      => 'Estudio de eficiencia',
                'file_effectiveness'     => 'Archivo de estudio de eficiencia',
                'opt_use_mode'           => 'Modo de uso',
                'file_use_mode'          => 'Archivo de modo de uso',
                'opt_regulatory'         => 'Certificados de Normatividad del producto',
                'file_regulatory'        => 'Archivo certificados de normatividad del producto',
                'opt_label'              => 'Lista de ingredientes y rotulado',
                'file_label'             => 'Archivo de lista de ingredientes y rotulado',
                'opt_certificate'        => 'Certificados de la empresa',
                'file_certificate'       => 'Archivo de certificados de la empresa',
                'opt_toxicity'           => 'Estudios de toxicidad',
                'file_toxicity'          => 'Archivo de estudios de toxicidad',
                'opt_other'              => 'Otros',
                'file_other'             => 'Archivo de otros',
                'email_sending_status'   => 'Estatus del envio de correo electrónico',
            );
            foreach ($value as $item => $items) {
                # Verificar que columnas no existen
                if (array_key_exists($item, $excel)) {
                    unset($excel[$item]); 
                }
            }
            # Limpiar las columnas faltantes
            foreach ($excel as $key_excel => $value_excel) {
                $excel[$key_excel] = '';
            }
            $data[$key] = array_merge($data[$key], $excel);
            unset($excel);
            ksort($data[$key]);
        }
        return $data;
    }

    # Mostar la informacion de la matriz de productos
    public function view_requirements($id)
    {
        # Cambiar de conexion de base de datos
        $config['hostname'] = 'mysql1409.ixwebhosting.com';
        $config['username'] = 'C350257_admin';
        $config['password'] = 'ticWA2011';
        $config['database'] = 'C350257_pwex';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $con = $this->load->database($config, TRUE);
        # Buscar todos los registros principales de los formularios envios | Español
        $form_entry = $con
        ->select('id, form_id')
        ->where(array('id' => $id))
        /*->like('form_id', 'CF59e0dee722faf') # Ingles    
        ->or_like('form_id', 'CF59ee0a56cd7a3') # Español*/
        ->order_by('id', 'DESC')  
        ->get('wp_cf_form_entries')
        ->result_array();
        # Buscar todos los registros asociados al envio de formularios principales | Español
        $not_values = array(
            'Submitted',
            'submit',
            'mainfunction_devices',
            'health_category',
            'devices_category',
            'beauty_category',
            'dietary_category',
            'nutrition',
            'nutrition.opt1065926',
            'nutrition_category',
            'iso9001_certification',
            'ohsas18001_certification',
            'none_certifications',
            'iso14001_certification',
            'fda_standards',
            'european_standards',
            'claims_documentation',
            'effectiveness_documentation',
            'stability_documentation',
            'toxicological_documentation',
            'allergen_documentation',
            'manufacturing_documentation',
            'msds_documentation',
            'datasheet_documentation',
            'triangle_documentation',
            'safety_documentation',
            'sanitary_documentation',
            'tvu_devices',
            'msds_devices',
            'warranty_devices'
        );
        $form_entry_values = $con
        ->select()
        ->where_not_in('slug', $not_values)
        ->order_by('wp_cf_form_entry_values.entry_id', 'DESC')
        ->get('wp_cf_form_entry_values')
        ->result_array();
        # Estructura del formulario
        foreach ($form_entry as $key => $value) {
            # Recorrer el detalles del formulario
            foreach ($form_entry_values as $details => $details_value) {
                if ($details_value['entry_id'] == $value['id']) {
                    if (!isset($value['id'])) { $data[$value['id']] = []; }
                    $data[$value['id']][$details_value['slug']] = $details_value['value'];
                    unset($form_entry_values[$details]);
                }
            }
        }
        # Completar las columnas que no existen y rellenar sus valores
        foreach ($data as $key => $value) {
            # Estructura de las columnas
            $excel = array(
                'company_name'           => 'Nombre de la empresa',
                'product_name'           => 'Nombre del producto',
                'email'                  => 'Correo electrónico',
                'language'               => 'Lenguaje',
                'categories'             => 'Categoría',
                'claims1'                => 'Reclamaciones 1',
                'claims2'                => 'Reclamaciones 2',
                'claims3'                => 'Reclamaciones 3',
                'active1'                => 'Activo 1',
                'active2'                => 'Activo 2',
                'active3'                => 'Activo 3',
                'service_life'           => 'Vida Útil',
                'content'                => 'Contenido',
                'fda_clasification'      => 'Clasificación FDA',
                'derived_animals'        => 'Alguna de las materias primas es derivada de animales',
                'animal_matters'         => 'Cuales animales',
                'test_animals'           => 'El producto ha sido testeado en animales',
                'private_label'          => 'Producto de marca blanca',
                'certification_product'  => 'Normatividad con las que cumple el producto',
                'other_certifications'   => 'Otras normatividades con las que cumple el producto',
                'opt_datasheet'          => 'Ficha técnica del producto',
                'file_datasheet'         => 'Archivo de ficha técnica del producto',
                'opt_safety'             => 'Estudio de seguridad',
                'file_safety'            => 'Archivo de estudio de seguridad',
                'opt_msds'               => 'Hoja de seguridad',
                'file_msds'              => 'Archivo de hoja de seguridad',
                'opt_stability'          => 'Estudio de estabilidad',
                'file_stability'         => 'Archivo de estudio de estabilidad',
                'opt_image'              => 'Imágenes del producto',
                'file_image'             => 'Archivo de imágenes del producto',
                'opt_effectiveness'      => 'Estudio de eficiencia',
                'file_effectiveness'     => 'Archivo de estudio de eficiencia',
                'opt_certification'      => 'Certificado de análisis',
                'file_certification'     => 'Archivo de certificado de análisis',
                'opt_use_mode'           => 'Modo de uso',
                'file_use_mode'          => 'Archivo de modo de uso',
                'opt_microbiologica'     => 'Estudio microbiologico',
                'file_microbiological'   => 'Archivo de estudio microbiologico',
                'opt_regulatory'         => 'Certificados de Normatividad del producto',
                'file_regulatory'        => 'Archivo certificados de normatividad del producto',
                'opt_label'              => 'Lista de ingredientes y rotulado',
                'file_label'             => 'Archivo de lista de ingredientes y rotulado',
                'opt_certificate'        => 'Certificados de la empresa',
                'file_certificate'       => 'Archivo de certificados de la empresa',
                'opt_toxicity'           => 'Estudios de toxicidad',
                'file_toxicity'          => 'Archivo de estudios de toxicidad',
                'opt_other'              => 'Otros',
                'file_other'             => 'Archivo de otros',
            );
            foreach ($value as $item => $items) {
                # Verificar que columnas no existen
                if (array_key_exists($item, $excel)) {
                    unset($excel[$item]); 
                }
            }
            # Limpiar las columnas faltantes
            foreach ($excel as $key_excel => $value_excel) {
                $excel[$key_excel] = '';
            }
            $data[$key] = array_merge($data[$key], $excel);
            unset($excel);
            ksort($data[$key]);
        }
        return $data;   
    }

}