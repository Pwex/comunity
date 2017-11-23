<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

class Calendar_partners{
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
                    text-align: left;
                    font-size: 12px;
                }
                table td:last-child{
                    width:100%;
                }
            </style>
        ";
        foreach ($array as $key => $value) {
            if (isset($array[$key]['status']) and isset($array[$key]['id'])) {
                unset($array[$key]['status']);
                unset($array[$key]['id']);
            }
        }
        $h = array();
        foreach($array as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                    $h[] = $key;   
                }
            }
        }
        //echo the entire table headers
        echo '<table style="font-family:calibri;"><tr>';
        foreach($h as $key) {
            $key = ucwords($key);
                echo '<th>'.$key.'</th>';
            }
        echo '</tr>';        
        foreach($array as $row){
            echo '<tr>';
                foreach($row as $val)
                $this->writeRow($val);   
        }
        echo '</tr>';
        echo '</table>';               
    }
    function writeRow($val) {
        echo '<td style="border:1px #ececec solid;color:#555;">'.$val.'</td>';              
    }
}
?>