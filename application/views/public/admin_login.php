<?php  include('public_header.php'); ?>
<div class="container">
<!--form class="form-horizontal"-->
<?php echo form_open('login/admin_login', ['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Admin Login</legend>
    <?php if($error = $this->session->flashdata('login_failed')): ?>
         <div class="row">
            <div class="col-lg-6">
                <div class="alert alert-dismissible alert-danger">
                    <?= $error; ?>
                </div>
            </div>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                    <!--input type="text" class="form-control" id="inputEmail" placeholder="Email"-->
                    <?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php echo form_error('username','<p class="text-danger">','</p>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
                    <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
        </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <!--button type="submit" class="btn btn-primary">Submit</button-->
        <?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']) ?>
        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login']) ?>
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php  include('public_footer.php');  ?>