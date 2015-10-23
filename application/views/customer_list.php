<header>
        <div class="header-content" style="top:30%">
            
                <div class="container">
                   <div class="row">
                    <div class="col-md-12">
                        <h1>Customer List</h1>
                        <br/>
                        <?php echo validation_errors(); ?>

                        <table>
                            <tr><td class="col-md-2">Sl.No.</td><td class="col-md-3">Customer Name </td><td class="col-md-3"> Address</td > <td class="col-md-1"> Booking Date</td></tr>
                            <?php
                            $i = 1;
                            foreach($get_customer->result() as $row)
                            {
                                ?>
                                <tr> <td class="col-md-2"><?php echo $i;?></td><td class="col-md-3"> <?php echo $row->customer_name;  ?></td> <td class="col-md-3"> <?php echo $row->customer_name;  ?></td> <td class="col-md-1"> <?php echo $row->customer_name;  ?></td></tr>
                                    <?php
                                    $i++;
                            }
                            ?>
                        </table>
                    </div>
                   </div>
                </div>
                
                <!--                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
           
        </div>
    </header>