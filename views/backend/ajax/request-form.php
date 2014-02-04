<form id="request-form" role="form" method="post">
	<input type="hidden" name="data-context" value="<?php echo $_POST['context']; ?>">
<div id="request-modal" class="modal fade">
  <div class="modal-dialog" role="dialog">
    <div class="modal-content section">
      <div class="modal-header theme_bg_darker">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title title pink"></h4>
        <h5><?php _e('Please leave your information to receive white papers and other marketing material'); ?></h5>
      </div>
      <div class="modal-body form-body">
      			<div class="row">
					  <div class="form-group col-md-6" id="nameSection">
					    <label for="inputName"><span class="required">*</span><?php _e('Full name'); ?></label>
					    <span class="error"></span>
					    <input type="text" class="form-control" id="inputName" placeholder="Your name">
					  </div>

					  <div class="form-group col-md-6" id="companySection">
					    <label for="inputCompany"><span class="required">*</span><?php _e('Company'); ?></label>
					    <span class="error"></span>
					    <input type="text" class="form-control" id="inputCompany" placeholder="Your company name">
					  </div>
				</div>

				<div class="row">
				   <div class="form-group col-md-12" id="emailSection">
				    <label for="inputEmail"><span class="required">*</span><?php _e('Email address'); ?></label>
				    <span class="error"></span>
				    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
				  </div>
			   </div>


				<div class="row">
				   <div class="form-group col-md-6" id="positionSection">
				    <label for="inputPosition"><?php _e('Title'); ?></label>
				    <span class="error"></span>
				    <input type="text" class="form-control" id="inputPosition" placeholder="Your position">
				  </div>

				  <div class="form-group col-md-6" id="phoneSection">
				    <label for="inputPhone"><?php _e('Phone number'); ?></label>
				    <span class="error"></span>
				    <input type="phone" class="form-control" id="inputPhone" placeholder="Phone number">
				  </div>
			  </div>

			<div class="row">
				<div class="form-group col-md-12" id="phoneSection">
			    <label for="inputIndustry"><?php _e('Industry'); ?></label>
			    <select id="inputIndustry" class="form-control">
			    	<option value="Unspecified">--</option>
					<option value="Apparel">Apparel</option>
					<option value="Automotive">Automotive</option>
					<option value="Beauty">Beauty</option>
					<option value="CPG">CPG</option>
					<option value="Education">Education</option>
					<option value="Electronics">Electronics</option>
					<option value="Entertainment">Entertainment</option>
					<option value="Financial">Financial</option>
					<option value="Food">Food</option>
					<option value="Health">Health</option>
					<option value="Hospitality">Hospitality</option>
					<option value="Retail">Retail</option>
					<option value="Services">Services</option>
					<option value="Software">Software</option>
					<option value="Telecom">Telecom</option>
					<option value="Travel">Travel</option>
					<option value="Other">Other</option>
			    </select>
			  </div>

			</div>

      </div>

      <div class="modal-footer theme_bg_darker">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Cancel'); ?></button>
        <a id="submit-request" href="#" class="bg-pink btn "></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>