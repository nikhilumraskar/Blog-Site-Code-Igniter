<?php  include('admin_header.php'); ?>

<div class="container">
<!--form class="form-horizontal"-->
<?php echo form_open('admin/store_article', ['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Add Article</legend>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-4 control-label">Title</label>
                <div class="col-lg-8">
                    <!--input type="text" class="form-control" id="inputEmail" placeholder="Email"-->
                    <?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title')]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php echo form_error('title','<p class="text-danger">','</p>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputPassword" class="col-lg-4 control-label">Article Body</label>
                <div class="col-lg-8">
                    <!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
                    <?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Body','value'=>set_value('body')]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php echo form_error('body','<p class="text-danger">','</p>'); ?>
        </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <!--button type="submit" class="btn btn-primary">Submit</button-->
        <?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']) ?>
        <?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit']) ?>
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php  include('admin_footer.php'); ?>