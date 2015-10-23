  <header>
        <div class="header-content" style="top:20%">
            
                <div class="container">
                    <div class="col-md-9">
                         <?php echo validation_errors(); ?>
                    <h1> Stock List </h1>
                    <form action="<?php echo base_url();?>welcome/update_stock" method="post">
                    <table>
                        <tr><td class="col-md-4">Product Name</td>
                            <td class="col-md-1">Total Stock</td><td class="col-md-1"> Current Use</td> <td class="col-md-1">Balance </td></tr>
                        <?php
                        foreach($stock_detail->result() as $row)
                        {?>
                            
                            <tr>
                                <td class="col-md-4"><?php echo $row->product_name;?></td>
                                <td class="col-md-1"><?php echo $row->stock;?></td>
                                <td class="col-md-1"><?php echo $row->current_use;?></td>
                                <td class="col-md-1"><?php
                                $balance = ($row->stock)-($row->current_use);
                                
                                if($balance >=0)
                                {
                                    echo $balance;
                                }
                                ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        
                        <tr><td class="col-md-4"><input type="text" class="form-control" name="product_name" required>
                        </td><td class="col-md-1"><input type="text" class="form-control" name="stock"></td>
                        <td class="col-md-1"> <input type="text" class="form-control" name="current_use"></td>
                        <td class="col-md-1"><input type="text" class="form-control" name="balance" readonly></td></tr>
                        <tr><td colspan="4"><br/><input type="submit" class="btn btn-primary btn-xl page-scroll" value="Add Stock"></td></tr>
                    </table>
                    </form>
                    </div>
                </div>
        </div>
  </header>