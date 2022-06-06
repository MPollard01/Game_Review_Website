<div class="container mt-4">
   <div class="card">
        <h2 class="card-header">Register</h2>
        <div class="card-body">
                <form action="<?php echo base_url();?>register/validation" method="post">
                    <div class="form-group">
                        <label>Enter User Name</label>
                        <input type="text" name="user_name" value="<?php echo set_value('user_name');?>" class="form-control">
                        <span class="text-danger"><?php echo form_error('user_name');?></span>
                    </div>
                    <div class="form-group">   
                        <label>Enter Your Valid Email Adress</label>
                        <input type="text" name="user_email" value="<?php echo set_value('user_email');?>" class="form-control">
                        <span class="text-danger"><?php echo form_error('user_email');?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="user_password" value="<?php echo set_value('user_password');?>" class="form-control">
                        <span class="text-danger"><?php echo form_error('user_password');?></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="register">Register</button>
                    </div>
                </form>
            </div>
    </div>
</div>


