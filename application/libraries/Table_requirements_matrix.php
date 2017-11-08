<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

class Table_requirements_matrix{

    function to_excel($array, $filename) {
        // header('Content-Disposition: attachment; filename='.$filename.'.xls');
        // header('Content-type: application/force-download');
        // header('Content-Transfer-Encoding: binary');
        // header('Pragma: public');
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
            'company_name'           => 'Nombre de la empresa',
            'product_name'           => 'Nombre del producto',
            'email'                  => 'Correo electrónico',
            'language'               => 'Lenguaje',
            'categories'             => 'Categoría',
            'claims1'                => 'Claims/Beneficio 1',
            'claims2'                => 'Claims/Beneficio 2',
            'claims3'                => 'Claims/Beneficio 3',
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
            'opt_toxicity'           => 'Estudios de toxicidad',
            'file_toxicity'          => 'Archivo de estudios de toxicidad',
            'opt_other'              => 'Otros',
            'file_other'             => 'Archivo de otros',
        );
        foreach($array as $key => $row){
            $hdata[$key]['company_name']           = $row['company_name'];
            $hdata[$key]['product_name']           = $row['product_name'];
            $hdata[$key]['categories']             = $row['categories'];
            $hdata[$key]['claims1']                = $row['claims1'];
            $hdata[$key]['claims2']                = $row['claims2'];
            $hdata[$key]['claims3']                = $row['claims3'];
            $hdata[$key]['active1']                = $row['active1'];
            $hdata[$key]['active2']                = $row['active2'];
            $hdata[$key]['active3']                = $row['active3'];
            $hdata[$key]['service_life']           = $row['service_life'];
            $hdata[$key]['content']                = $row['content'];
            $hdata[$key]['fda_clasification']      = $row['fda_clasification'];
            $hdata[$key]['derived_animals']        = $row['derived_animals'];
            $hdata[$key]['animal_matters']         = $row['animal_matters'];
            $hdata[$key]['test_animals']           = $row['test_animals'];
            $hdata[$key]['private_label']          = $row['private_label'];
            $hdata[$key]['certification_product']  = $row['certification_product'];
            $hdata[$key]['other_certifications']   = $row['other_certifications'];
            $hdata[$key]['opt_datasheet']          = $row['opt_datasheet'];
            $hdata[$key]['file_datasheet']         = !empty($row['file_datasheet']) ? "<a target='_blanck' href='".$row['file_datasheet']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_safety']             = $row['opt_safety'];
            $hdata[$key]['file_safety']            = !empty($row['file_safety']) ? "<a target='_blanck' href='".$row['file_safety']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_msds']               = $row['opt_msds'];
            $hdata[$key]['file_msds']              = !empty($row['file_msds']) ? "<a target='_blanck' href='".$row['file_msds']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_stability']          = $row['opt_stability'];
            $hdata[$key]['file_stability']         = !empty($row['file_stability']) ? "<a target='_blanck' href='".$row['file_stability']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_image']              = $row['opt_image'];
            $hdata[$key]['file_image']             = !empty($row['file_image']) ? "<a target='_blanck' href='".$row['file_image']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_effectiveness']      = $row['opt_effectiveness'];
            $hdata[$key]['file_effectiveness']     = !empty($row['file_effectiveness']) ? "<a target='_blanck' href='".$row['file_effectiveness']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_use_mode']           = $row['opt_use_mode'];
            $hdata[$key]['file_use_mode']          = !empty($row['file_use_mode']) ? "<a target='_blanck' href='".$row['file_use_mode']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_regulatory']         = $row['opt_regulatory'];
            $hdata[$key]['file_regulatory']        = !empty($row['file_regulatory']) ? "<a target='_blanck' href='".$row['file_regulatory']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_label']              = $row['opt_label'];
            $hdata[$key]['file_label']             = !empty($row['file_label']) ? "<a target='_blanck' href='".$row['file_label']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_toxicity']           = $row['opt_toxicity'];
            $hdata[$key]['file_toxicity']          = !empty($row['file_toxicity']) ? "<a target='_blanck' href='".$row['file_toxicity']."'>Adjunto</a>" : '';
            $hdata[$key]['opt_other']              = $row['opt_other'];
            $hdata[$key]['file_other']             = !empty($row['file_other']) ? "<a target='_blanck' href='".$row['file_other']."'>Adjunto</a>" : '';
            $hdata[$key]['language']               = $row['language'];
            $hdata[$key]['email']                  = $row['email'];
            foreach($hdata as $key => $val){
                foreach ($val as $item => $item_val) {
                    if(!in_array($item, $h)){
                        $h[] = $excel[$item];   
                    }
                }
            }
        }
        $header = array_unique($h);
        echo '<table class="table table-responsive table-hover table condensed" style="font-family: century gothic; font-size:20px; border:none"><tr>';
        foreach($header as $key) {
            $key = ucwords($key);
            echo '<th style="border:none;padding: 5px; padding-right: 25px;">'.$key.'</th>';
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
        echo '<td style="border:none;color:#555;">'.$val.'</td>';              
    }

}
?>