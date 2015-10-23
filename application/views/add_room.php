  <header>
        <div class="header-content" style="top:30%">
            
                <div class="container">
                   
                    <div class="col-md-6">
                        <h1>ADD NEW ROOM</h1>
                        <br/>
                        <?php echo validation_errors(); ?>

                        <form action="<?php echo base_url();?>welcome/add_room" method="post">
                            
                            <table>
                                <tr> <td class="col-md-3"> Number of Room </td><td class="col-md-3">Room Type</td> <td class="col-md-3"> Amount</td></tr>
                                <tr> <td> <input type="text" class="form-control" style="width:90%" name="number_of_room"></td><td><input type="text" class="form-control" style="width:90%" name="room_type"></td><td><input type="text" class="form-control" style="width:90%" name="room_price"></td></tr>
                                <tr> <td colspan="3"> <input type="submit" class="btn btn-primary btn-xl page-scroll" value="ADD ROOM"></td> </tr>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h1> Rooms </h1>
                       
                        <table class="table table-condensed">
                            <tr> <td class="col-md-3"> Number of Room </td><td class="col-md-3">Room Type</td> <td class="col-md-3"> Amount</td></tr>
                             <?php
                        if(isset($get_rooms))
                        {
                            foreach($get_rooms->result() as $row)
                            {
                                
                        ?>
                           <tr> <td class="col-md-3"><?php echo $row->number_of_room;?> </td><td class="col-md-3"><?php echo $row->room_type;?></td> <td class="col-md-3"> Rs.<?php echo $row->room_price;?> </td></tr>
                        <?php
                            }
                        }
                        
                        ?>
                        </table>
                    </div>
                </div>
                
                <!--                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
           
        </div>
    </header>
