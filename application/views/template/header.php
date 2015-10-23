<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotel Management Application</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Hotel Room Booking</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>welcome/">Home</a>
                    </li>
                   
                    <li>
                        <a class="page-scroll" href="<?php echo base_url()?>welcome/booking_page">Your Booking</a>
                    </li>
                   
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>welcome/service">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <?php
                    if($this->session->userdata('customer_id') !== NULL)
                    {
                        ?>
                        <li>
                        <a class="page-scroll" href="<?php echo base_url();?>auth/logout/">Sign Out</a>
                        </li>
                        <?php 
                    }
                    ?>
                    <?php
                    if($this->tank_auth->get_user_id() == 1)
                    {
                    ?>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>welcome/">Admin Page</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        
                    <?php if(isset($other_page) == true)
                    {
                        ?>
                        <div class="header-content" style="top:30%">
                            <div class="header-content-inner">
                                <div class="container">
                <?php 
                        $this->load->view($page);
                    }
                        else
                        { ?>
        <div class="header-content">
            <div class="header-content-inner">
                <div class="container">
                    <div class="col-md-6">
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
                        
                    </div>
                    <div class="col-md-6">
                        <?php if(isset($login_page)){
                            $this->load->view($login_page);
                      }
                      if(isset($register_form)){
                            $this->load->view($register_form);
                      }
                      
                      ?>
                    </div>
                    <?php
                    
                        }?>
                </div>
                
                <!--                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
            </div>
        </div>
    </header>

    