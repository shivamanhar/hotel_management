  <header>
        <div class="header-content" style="top:20%">
            
                <div class="container">
                    <div class="col-md-9">
                        <h2> Employee List </h2>
                        <form action="<?php echo base_url();?>welcome/add_employee" method="post">
                        <table>
                            <tr><td class="col-md-4">Employee Name</td><td class="col-md-4">Designation</td><td class="col-md-1">Payment</td></tr>
                            
                            <?php
                            foreach($get_employee->result() as $row)
                            {
                                
                            ?>
                            <tr><td class="col-md-4"><?php echo $row->employee_name; ?></td>
                                <td class="col-md-4"><?php echo $row->designation; ?></td>
                                <td class="col-md-1"><?php echo $row->payment; ?></td></tr>
                            <?php
                            }
                            ?>
                            
                            <tr><td class="col-md-4">
                            <input type="text" class="form-control" name="employee_name" required></td><td class="col-md-4">
                            <select name="designation" class="form-control" required>
                                <option value=""> Select </option>
                                <option value="manager"> Manager</option>
                                <option value="supervisor"> Supervisor</option>
                                <option value="gardner"> Gardner</option>
                                <option value="executive"> Executive</option>                               
                            </select>
                            </td><td class="col-md-1"><input type="text" class="form-control" name="payment" required></td></tr>
                            <tr><td colspan="3"><br/><input type="submit" class="btn btn-primary btn-xl page-scroll" value="Add Employee"></td></tr>
                        </table>
                        </form>
                    </div>
                </div>
        </div>
  </header>