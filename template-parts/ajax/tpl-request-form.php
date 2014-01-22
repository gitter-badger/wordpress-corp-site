<form id="request-form" role="form" method="post">
	<input type="hidden" name="data-context" value="<?php echo $_POST['dataContext']; ?>">
<div id="request-modal" class="modal fade">
  <div class="modal-dialog" role="dialog">
    <div class="modal-content section">
      <div class="modal-header theme_bg_light">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php _e('Get this data sheet'); ?></h4>
        <h5><?php _e('Please leave your information, and we will send you a copy of this data sheet'); ?></h5>
      </div>
      <div class="modal-body form-body">

      		  <div class="form-group" id="companySection">
			    <label for="inputCompany"><?php _e('Company'); ?></label>
			    <span class="error"></span>
			    <input type="text" class="form-control" id="inputCompany" placeholder="Your company name">
			  </div>

			  <div class="form-group" id="emailSection">
			    <label for="inputEmail"><?php _e('Email address'); ?></label>
			    <span class="error"></span>
			    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
			  </div>

			  <div class="form-group" id="nameSection">
			    <label for="inputName"><?php _e('Full name'); ?></label>
			    <span class="error"></span>
			    <input type="text" class="form-control" id="inputName" placeholder="Your name">
			  </div>

			  <div class="form-group" id="phoneSection">
			    <label for="inputName"><?php _e('Phone number'); ?></label>
			    <span class="error"></span>
			    <input type="phone" class="form-control" id="inputPhone" placeholder="Phone number">
			  </div>

      </div>
      <div class="modal-body thank-you-message">
			Thank you!
      </div>
      <div class="modal-footer theme_bg_darker">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close'); ?></button>
        <a id="submit-request" href="#" class="bg-orange btn "><?php _e('Get this data sheet'); ?></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>