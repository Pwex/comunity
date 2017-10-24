<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

class Export_excel{

    function to_excel($array, $filename) {
        header('Content-Disposition: attachment; filename='.$filename.'.xls');
        header('Content-type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');
        print "\xEF\xBB\xBF"; // UTF-8 BOM
        echo "
            <style>
                table{
                    width:100%;
                }
                table td, table th{
                    white-space: nowrap;
                }
                table td:last-child{
                    width:100%;
                }
            </style>
        ";
        $h = array();
        # Estructura de las columnas
        $excel = array(
            'mainfunction_devices.opt1065926'           => 'Dispositivos de funciones principales',
            'company_name'                              => 'Nombre Empresa',
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
        foreach($array as $key => $row){
            $hdata[$key]['company_name']                              = $row['company_name'];
            $hdata[$key]['contact_name']                              = $row['contact_name'];
            $hdata[$key]['country']                                   = $row['country'];
            $hdata[$key]['language']                                  = $row['language'];
            $hdata[$key]['webpage']                                   = $row['webpage'];
            $hdata[$key]['email_address']                             = $row['email_address'];
            $hdata[$key]['phone']                                     = $row['phone'];
            $hdata[$key]['health_category.opt1065926']                = $row['health_category.opt1065926'];
            $hdata[$key]['beauty_category.opt1065926']                = $row['beauty_category.opt1065926'];
            $hdata[$key]['nutrition_category.opt1065926']             = $row['nutrition_category.opt1065926'];
            $hdata[$key]['dietary_category.opt1065926']               = $row['dietary_category.opt1065926'];
            $hdata[$key]['devices_category.opt1065926']               = $row['devices_category.opt1065926'];
            $hdata[$key]['another_category']                          = $row['another_category'];
            $hdata[$key]['iso9001_certification.opt1065926']          = $row['iso9001_certification.opt1065926'];
            $hdata[$key]['iso14001_certification.opt1065926']         = $row['iso14001_certification.opt1065926'];
            $hdata[$key]['ohsas18001_certification.opt1065926']       = $row['ohsas18001_certification.opt1065926'];
            $hdata[$key]['none_certifications.opt1065926']            = $row['none_certifications.opt1065926'];
            $hdata[$key]['others_certification']                      = $row['others_certification'];
            $hdata[$key]['fda_standards.opt1065926']                  = $row['fda_standards.opt1065926'];
            $hdata[$key]['european_standards.opt1065926']             = $row['european_standards.opt1065926'];
            $hdata[$key]['claims_documentation.opt1065926']           = $row['claims_documentation.opt1065926'];
            $hdata[$key]['effectiveness_documentation.opt1065926']    = $row['effectiveness_documentation.opt1065926'];
            $hdata[$key]['stability_documentation.opt1065926']        = $row['stability_documentation.opt1065926'];
            $hdata[$key]['toxicological_documentation.opt1065926']    = $row['toxicological_documentation.opt1065926'];
            $hdata[$key]['allergen_documentation.opt1065926']         = $row['allergen_documentation.opt1065926'];
            $hdata[$key]['manufacturing_documentation.opt1065926']    = $row['manufacturing_documentation.opt1065926'];
            $hdata[$key]['msds_documentation.opt1065926']             = $row['msds_documentation.opt1065926'];
            $hdata[$key]['datasheet_documentation.opt1065926']        = $row['datasheet_documentation.opt1065926'];
            $hdata[$key]['triangle_documentation.opt1065926']         = $row['triangle_documentation.opt1065926'];
            $hdata[$key]['safety_documentation.opt1065926']           = $row['safety_documentation.opt1065926'];
            $hdata[$key]['sanitary_documentation.opt1065926']         = $row['sanitary_documentation.opt1065926'];
            $hdata[$key]['tvu_devices.opt1065926']                    = $row['tvu_devices.opt1065926'];
            $hdata[$key]['msds_devices.opt1065926']                   = $row['msds_devices.opt1065926'];
            $hdata[$key]['warranty_devices.opt1065926']               = $row['warranty_devices.opt1065926'];
            $hdata[$key]['message']                                   = $row['message'];
            foreach($hdata as $key => $val){
                foreach ($val as $item => $item_val) {
                    if(!in_array($item, $h)){
                        $h[] = $excel[$item];   
                    }
                }
            }
        }
        $header = array_unique($h);
        echo '<table style="font-family:verdana;"><tr>';
        foreach($header as $key) {
            $key = ucwords($key);
            echo '<th style="border:1px #e6e6e6 solid;background-color:#00aecc;color:white; padding: 5px;">'.$key.'</th>';
        }
        echo '</tr>';
        foreach($hdata as $row){
            echo '<tr>';
            foreach($row as $val) {
                $this->writeRow($val);   
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    function writeRow($val) {
        echo '<td style="border:1px #ececec solid;color:#555;">'.$val.'</td>';              
    }

}
?>