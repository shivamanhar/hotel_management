<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class My_hotel
{
    public function type_hotel()
    {
        $ci =& get_instance();
        $ci->load->model('logic');
        
        $get_record = $ci->logic->global_get('hotel_room');
        echo "<select name='room_type' class='form-control'>";
        echo "<option value=''> Select </option>";
        foreach($get_record->result() as $row)
        {
            echo "<option value='".$row->id."'>".$row->room_type." ( Rs." .$row->room_price." )</option>";
        }
        echo "</select>";
    }
}
?>