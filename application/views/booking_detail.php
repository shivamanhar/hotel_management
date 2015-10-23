<h3> Booking Detail </h3>
<div class="row">
    <form action="<?php echo base_url();?>welcome/add_booking_detail" method="post">
<table class="table-bordered">
    
    <tr><td class="col-md-3">Name </td><td class="col-md-1">Gander </td><td class="col-md-2">Room Type</td>
        <td class="col-md-2">Date Start</td>
        <td class="col-md-3">Check Out Date</td></tr>
    <?php
    if(isset($get_record))
    {
        foreach($get_record->result() as $row)
        {
            ?>
             <tr><td class="col-md-3"><?php echo $row->name;?> </td>
                <td class="col-md-1"><?php echo $row->gander;?> </td>
                <td class="col-md-2"><?php echo $row->room_id;?> </td>
        <td class="col-md-2"><?php echo $row->start_date;?> </td>
        <td class="col-md-3"><?php echo $row->end_date;?> </td></tr>
             <?php 
        }
    }
    ?>
    <tr><td class="col-md-3"><input type="text" name="name" class="form-control"> </td>
        <td class="col-md-2"><select name="gander" class="form-control">
        <option value='' > Select  </option>
        <option value='male'> Male</option>
        <option value='female'> Female  </option>
        </select> </td>
      
        <td class="col-md-2"><?php $this->my_hotel->type_hotel();?> </td>
        <td class="col-md-2"><input type="date" name="start_date" class="form-control"> </td>
        <td class="col-md-3"><input type="date" name="check_out_date" class="form-control"> </td>
    </tr>
    <tr>
        <td colspan="6">
            <input type="submit" value="Book Know" class="btn btn-primary btn-xl page-scroll"> 
        </td>
    </tr>
</table>
    </form>
</div>