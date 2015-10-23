

            
                <div class="container">
                   
                    <div class="col-md-8">
                        <?php echo validation_errors(); ?>
                       <h1> Your Booking </h1>
                        <form action="<?php echo base_url();?>welcome/find_booking" method="post">
                       <table>
                        <tr><td class="col-md-4" class="col-md-4">
                        Your Id</td>
                            <td class="col-md-4"><input type="text" name="customer_id"  class="form-control" >
                        </td></tr>
                        <tr><td class="col-md-4"> Password </td><td class="col-md-4"><input type="password"  class="form-control"  name="password"></td></tr>
                        <tr> <td colspan="2"><br/><input type="submit" value="submit" class="btn btn-primary btn-xl page-scroll"> </td></tr>
                       </table>
                        </form>
                       
                    </div>
                </div>

