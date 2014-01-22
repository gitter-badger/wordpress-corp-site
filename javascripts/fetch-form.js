var App = {};
App.Classes = {};
App.Modules = {};
App.Models = {};

App.Classes.RequestResourceModel = Backbone.Model.extend({
	defaults: {

		urlRoot: CVO.ajaxurl,
		wp_fetch_action_method: 'get_request_form_template',
		wp_sync_action_method: 'submit_request_form_template',
		isVerifiedUser: false,

		fetchStatus: null,
		fetchPromise: false,
		fetchContents: '',

		syncStatus: null,
		syncContents: '',
		syncPromise: false,

		company: null,
		name: null,
		phone: null,
		email: null,
		dataContext: null,


	},

	fetch: function () {
		var action = this.get('wp_fetch_action_method'),
			dataContext = this.get('dataContext');

		jQuery.ajax({
			type : "post",
			dataType : "json",
			url : CVO.ajaxurl,
			data : {action: action, dataContext: dataContext},
			success: _.bind(function(response) {
				this.set('fetchContents',response.content);
				this.set('fetchStatus', response.status);
				this.set('fetchPromise', true);
				this.set('fetchPromise', false, {silent: true});
			}, this)
		});
	},

	sync: function () {
		var action = this.get('wp_sync_action_method'),
			dataContext = this.get('dataContext'),
			company = this.get('company'),
			email = this.get('email'),
			name = this.get('name'),
			phone = this.get('phone');

		jQuery.ajax({
			type : "post",
			dataType : "json",
			url : CVO.ajaxurl,
			data : {
				action: action,
				dataContext: dataContext,
				inputEmail: email,
				inputCompany: company,
				inputName: name,
				inputPhone: phone,
			},

			success: _.bind(function(response) {
				localStorage.setItem('isUserRegistered', 'true');
				this.set('syncContents',response.content);
				this.set('syncStatus', response.status);
				this.set('syncPromise', true);
				this.set('syncPromise', false, {silent: true});
			}, this)
		});
	},

	getRequestForm: function(){
		this.fetch();
	},

	submitForm: function () {
		this.sync();
	}
});

App.Models.RequestResourceModel = new App.Classes.RequestResourceModel();
App.Classes.RequestResourceView = Backbone.View.extend({
	el: 'body',

	events: {
		'click .request-form': 'triggerFormRequest',
		'click #submit-request': 'triggerFormSubmit'
	},

	formTemplate: '',

	model: App.Models.RequestResourceModel,

	initialize: function() {
		this.listenTo(this.model, 'change:fetchPromise', this.render);
		this.listenTo(this.model, 'change:syncPromise', this.afterSubmit);
	},

	triggerFormRequest: function (e) {
		jQuery(e.currentTarget).addClass('current');
		dataContext = jQuery(e.currentTarget).data('context');
		this.model.set('dataContext', dataContext);
		if(localStorage.getItem('isUserRegistered') === 'true') {
			this.model.submitForm();
		} else {
			this.model.getRequestForm();
		}
		return false;
	},

	triggerFormSubmit: function (e) {
		this.model.set({
			company: this.$el.find('#inputCompany').val(),
			email : this.$el.find('#inputEmail').val(),
			name : this.$el.find('#inputName').val(),
			phone : this.$el.find('#inputPhone').val(),
		});
		this.model.submitForm();
		e.preventDefault();
	},

	showForm: function() {
		jQuery('.modal').modal('show');
	},

	hideForm: function() {
		jQuery('.modal').modal('hide');
	},

	afterSubmit: function () {
		if (this.model.get('syncStatus') === 'error') {
			this.setErrors();
		} else {
			this.hideForm();
			$scope = this.$el.find('#request-form');
			var msg = '<span class="thank-you-message"><i class="fa fa-check"></i>Your request has been accepted. Thank you!';
				msg += '<a href="#" class="edit-form" data-context="' + this.model.get('dataContext') + '">Edit</a></span>';
			$scope.find('.form-body').hide();
			$scope.find('#submit-request').hide();
			$scope.find('.thank-you-message').fadeIn();
			this.$el.find('.request-form').filter('.current').fadeOut(300, function() {
				jQuery(this).replaceWith(msg).hide().fadeIn();
			});
		}
	},

	setErrors: function () {
		var errors = this.model.get('syncContents'),
			$scope = this.$el.find('#request-form');

		if (errors.company) {
			$scope.find('#companySection .error').text(errors.company);
		} else {
			$scope.find('#companySection .error').text('');
		}
		if (errors.email) {
			$scope.find('#emailSection .error').text(errors.email);
		} else {
			$scope.find('#emailSection .error').text('');
		}
		if (errors.name) {
			$scope.find('#nameSection .error').text(errors.name);
		} else {
			$scope.find('#nameSection .error').text('');
		}
	},

	render: function (model) {
		this.formTemplate = jQuery(this.model.get('fetchContents'));

		if(!this.$el.find('#request-form').is('*')) {
			this.$el.append(this.formTemplate);
		}
		this.showForm();
	}
});

jQuery(document).ready(function(){
	App.Modules.RequestResource = new App.Classes.RequestResourceView();

});

