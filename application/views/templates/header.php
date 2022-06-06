<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Link CSS -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>  
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script>  -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="<?php echo base_url('application/scripts/chat.js');?>"></script>
    
    <title>Games-Reviews</title>
        
</head>
<body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                   
                <a class="navbar-brand" href="#">Games Reviews</a>
                </div>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Reviews</a>
                        <div class="dropdown-menu">
                        <?php
                            foreach ($result as $review_item)
                            {
                                echo "<a href='".base_url('reviews/'.$review_item->slug)."' class='dropdown-item'>".$review_item->GameName."</a>";
                            }
                        ?>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto mr-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Account<?php echo $this->session->userdata('userName') ? '('.$this->session->userdata('userName').')' : '' ;?></a>
                        <div class="dropdown-menu">
                        <?php
                            if(!$this->session->userdata('id')) {
                            echo "<a class='dropdown-item' href='".base_url()."register'><span class='glyphicon glyphicon-user'></span> Sign Up</a>";
                            echo "<a class='dropdown-item' href='".base_url()."login'><span class='glyphicon glyphicon-log-in'></span> Login</a>";
                            }
                            else{
                            echo "<a class='dropdown-item' href='".base_url()."logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a>";
                            }
                            
                            ?>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

   