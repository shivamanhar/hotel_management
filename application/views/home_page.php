
  <div style="background-color:#ac152c;color:#fff;">
   
    <div class="row">
        
        
        <div class="col-md-4">
            <table width="200" border=0>
                <tr>
                    <td>
		<marquee direction="down" align="top" width="200" height="450">
		<img src="<?php echo base_url();?>image/14hotels1.jpg" height=316 width=400>
		<img src="<?php echo base_url();?>image/pineapple.jpg" height=200 width=400>
		<img src="<?php echo base_url();?>image/gallery-thumb8.jpg" height=200 width=400>
		<img src="<?php echo base_url();?>image/room.jpg" height=200 width=400>
		<img src="<?php echo base_url();?>image/ALL-4.JPG" height=200 width=400>
		</marquee>	</td>
                    <td valign=top><font size=7 color="#7c0000"><b><i></td>
                </tr>
            </table>
            
        </div>
    
     
        <div class="col-md-8">
                <div class="col-md-8">
                        <h1>Book Your Rooms</h1>
                        <br/>
                        <form action="<?php echo base_url();?>welcome/add_customer" method="post">
                            <table>
                                <tr><td>Name </td><td> Address </td> <td>Userid</td><td> Password</td></tr>
                                <tr><td> <input type="text" name="name" class="form-control"  style="width:90%"> </td>
                                    <td> <input type="text" name="address"  style="width:90%" class="form-control"> </td>
                                    <td><input type="text" name="userid"  style="width:90%" class="form-control"> </td>
                                    <td><input type="text" name="password"  style="width:90%" class="form-control"> </td>
                                </tr>
                                <tr> <td colspan="3">
                                <br/>
                                <input type="submit" class="btn btn-primary btn-xl page-scroll" value="Book Room"> </td></tr>
                            </table>
                        </form>
                        
                  <?php echo $this->load->view('auth/login_form');?>
                </div>
                
        </div>
    </div>
    
  </div>
