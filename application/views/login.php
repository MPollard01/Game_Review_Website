<div class="container mt-4">
   <div class="card">
        <h2 class="card-header">Login</h2>
        <div class="card-body">
        <?php
            if($this->session->flashdata('message'))
            {
                echo '<div class="alert alert-danger">'.$this->session->flashdata("message").'</div>';
            }
        ?>
            <form action="<?php echo base_url();?>login/validation" method="post">
                <div class="form-group">
                    <label>Enter User Name</label>
                    <input type="text" name="user_name" value="<?php echo set_value('user_name');?>" class="form-control">
                    <span class="text-danger"><?php echo form_error('user_name');?></span>
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="user_password" value="<?php echo set_value('user_password');?>" class="form-control">
                    <span class="text-danger"><?php echo form_error('user_password');?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
   </div>
</div>