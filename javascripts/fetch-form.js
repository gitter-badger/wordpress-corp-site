var App = {};
App.Classes = {};
App.Modules = {};
App.Models = {};

App.Classes.RequestResourceModel = Backbone.Model.extend({
	defaults: {

		urlRoot: CVO.ajaxurl,
		wp_fetch_action_method: 'get_request_form_template',
		wp_sync_action_method: 'submit_request_form_template',
		fields: {
			name: {
				isValid: false,
				msg: 'Please fill in your name',
				rule: null
			},
			company: {
				isValid: false,
				msg: 'Please fill in your company name',
				rule: null
			},
			position: {
				isValid: false,
				msg: 'There is a problem with the position field',
				rule: null
			},
			phone: {
				isValid: false,
				msg: 'Enter a valid phone number',
				rule: /^[0-9\+\-\*]{3,}$/
			},
			email: {
				isValid: false,
				msg: 'There is a problem with your "Email address"',
				rule: null
			}
		},
		isVerifiedUser: false,

		fetchStatus: null,
		fetchPromise: false,
		fetchContents: '',

		syncStatus: null,
		syncContents: '',
		syncPromise: false,

		company: null,
		industry: null,
		name: null,
		phone: null,
		email: null,
		position: null,
		context: null,
		itemId: null,
		isValid: true
	},

	initialize: function () {
		this.set('company', this.getCached('company') || '');
		this.set('name', this.getCached('name') || '');
		this.set('phone', this.getCached('phone') || '');
		this.set('email', this.getCached('email') || '');
		this.set('position', this.getCached('position') || '');
	},

	fetch: function () {
		var action = this.get('wp_fetch_action_method'),
			context = this.get('context');

		jQuery.ajax({
			type : "post",
			dataType : "json",
			url : CVO.ajaxurl,
			data : {action: action, context: context},
			success: _.bind(function(response) {
				this.set('fetchContents',response.content);
				this.set('fetchStatus', response.status);
				this.set('fetchPromise', true);
				this.set('fetchPromise', false, {silent: true});
			}, this)
		});
	},

	validate: function () {
		var fields = ['company','name', 'email', 'phone', 'position'];
		_.each(fields, _.bind(function (field) {
			if (_.isEmpty(this.attributes[field])) {
				this.get('fields')[field].isValid = false;
				this.set('isValid', false);
			} else {
				if (this.get('fields')[field].rule) {
					if (this.attributes[field].match(this.get('fields')[field].rule)) {
						this.get('fields')[field].isValid = true;
					} else {
						this.get('fields')[field].isValid = false;
					}
				} else {
					this.get('fields')[field].isValid = true;
				}

			}

		}, this));

		if (_.isUndefined(_.findWhere(this.get('fields'),{'isValid':false}))) {
			this.set('isValid', true);
		} else {
			this.set('isValid', false);
		}
	},

	sync: function () {

		var action = this.get('wp_sync_action_method'),
			context = this.get('context'),
			company = this.get('company'),
			email = this.get('email'),
			name = this.get('name'),
			phone = this.get('phone'),
			position = this.get('position');
			industry = this.get('industry');
			itemId = this.get('itemId');

		jQuery.ajax({
			type : "post",
			dataType : "json",
			url : CVO.ajaxurl,
			data : {
				action: action,
				context: context,
				itemId: itemId,
				inputEmail: email,
				inputCompany: company,
				inputName: name,
				inputPhone: phone,
				inputPosition: position,
				inputIndustry: industry,
			},

			success: _.bind(function(response) {

				if (response.status === 'success') {
					this.saveToCache({
						'isUserRegistered': 'true',
						'email': email,
						'company': company,
						'name': name,
						'phone': phone,
						'position': position,
						'industry': industry,
					});
				}
				this.set('syncContents',response.content);
				this.set('syncStatus', response.status);
				this.set('syncPromise', true);
				this.set('syncPromise', false, {silent: true});

			}, this)
		});
	},

	getCached: function (item) {
		return sessionStorage.getItem(item) || null;
	},

	saveToCache: function (keyOrObject, value) {
		if (_.isObject(keyOrObject)) {
			_.each(keyOrObject, function (value, key) {
				sessionStorage.setItem(key, value);
			});
		} else {
			sessionStorage.setItem(keyOrObject, value);
		}
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
		'click .edit-form': 'editFormSubmit',
		'click #submit-request': 'triggerFormSubmit',
		'keyup #request-form input': 'validate',
	},

	formTemplate: '',

	model: App.Models.RequestResourceModel,

	initialize: function() {
		this.listenTo(this.model, 'change:fetchPromise', this.render);
		this.listenTo(this.model, 'change:syncPromise', this.afterSubmit);
	},

	triggerFormRequest: function (e) {
		var $elem = jQuery(e.currentTarget);

		if (!$elem.find('.spinner').is('span')) {
			$elem.prepend('<span class="glyphicon glyphicon-refresh spinner preloader"></span>');
		}
		$elem.addClass('current');
		this.model.set('context', $elem.data('context'));
		this.model.set('itemId', $elem.data('item-id'));
		if(sessionStorage.getItem('isUserRegistered') === 'true') {
			$elem.addClass('disabled');
			this.model.submitForm();
		} else {
			this.model.getRequestForm();
		}
		return false;
	},

	editFormSubmit: function (e) {
		var $elem = jQuery(e.currentTarget);


		this.model.set('context', $elem.data('context'));
		this.model.set('itemId', $elem.data('item-id'));
		this.model.getRequestForm();
		e.preventDefault();
	},

	triggerFormSubmit: function (e) {
		var phone = this.$el.find('#inputPhone').val(),
			$elem = jQuery(e.currentTarget);
		phone = phone.replace(/\-/g,'');

		this.model.set({
			company: this.$el.find('#inputCompany').val(),
			email : this.$el.find('#inputEmail').val(),
			name : this.$el.find('#inputName').val(),
			phone : phone,
			position : this.$el.find('#inputPosition').val(),
			industry : this.$el.find('#inputIndustry').val(),
		});
		this.model.validate();
		if (this.model.get('isValid')){
			$elem.addClass('disabled');
			this.model.submitForm();
		} else {
			this.setClientErrors();
		}
		return false;
	},

	showForm: function() {
		jQuery('.modal').modal('show');
	},

	hideForm: function() {
		jQuery('.modal').modal('hide');
	},

	isNavigationDemoLink: function() {
		return this.model.get('itemId') === 'top-navigation-request-demo';
	},

	afterSubmit: function () {
		if (this.model.get('syncStatus') === 'error') {
			this.setErrors();
		}
		// success
		else {
			this.hideForm();
			$scope = this.$el.find('#request-form');
			var msg = '<span class="thank-you-message"><i class="fa fa-check"></i>Your request has been accepted. Thank you!';
				msg += '<a href="#" class="edit-form" data-context="' + this.model.get('context') + '">Edit</a></span>';
				if (this.isNavigationDemoLink()) {
					msg = '<i class="fa fa-check"></i><span class="dimmed" style="font-size: 12px;">Thank you!</span>';
				}
				this.$el.find('.demo-link').filter('.current').fadeOut(300, function() {
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
		if (errors.position) {
			$scope.find('#positionSection .error').text(errors.position);
		} else {
			$scope.find('#positionSection .error').text('');
		}
		if (errors.phone) {
			$scope.find('#phoneSection .error').text(errors.phone);
		} else {
			$scope.find('#phoneSection .error').text('');
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

	setClientErrors: function () {
		var $scope = this.$el.find('#request-form');

		if (!this.model.get('fields')['company'].isValid) {
			$scope.find('#companySection .error').text(this.model.get('fields')['company'].msg);
		} else {
			$scope.find('#companySection .error').text('');
		}

		if (!this.model.get('fields')['phone'].isValid) {
			$scope.find('#phoneSection .error').text(this.model.get('fields')['phone'].msg);
		} else {
			$scope.find('#phoneSection .error').text('');
		}

		if (!this.model.get('fields')['name'].isValid) {
			$scope.find('#nameSection .error').text(this.model.get('fields')['name'].msg);
		} else {
			$scope.find('#nameSection .error').text('');
		}

		if (!this.model.get('fields')['email'].isValid) {
			$scope.find('#emailSection .error').text(this.model.get('fields')['email'].msg);
		} else {
			$scope.find('#emailSection .error').text('');
		}

		if (!this.model.get('fields')['position'].isValid) {
			$scope.find('#positionSection .error').text(this.model.get('fields')['position'].msg);
		} else {
			$scope.find('#positionSection .error').text('');
		}
	},

	render: function (model) {
		var titleText = '',
			buttonText = '';

		this.formTemplate = jQuery(this.model.get('fetchContents'));

		if(!this.$el.find('#request-form').is('*')) {
			this.$el.append(this.formTemplate);
		}

		if (this.model.get('context') === 'request-demo') {
			titleText = 'Request a demo';
			buttonText = '<span class="glyphicon glyphicon-refresh spinner preloader"></span> Submit';

		} else {
			titleText = 'Get this PDF in your email inbox now!';
			buttonText = '<span class="glyphicon glyphicon-refresh spinner preloader"></span> Get Pdf';
		}

		jQuery('.modal-title').text(titleText);
		jQuery('#submit-request').html(buttonText);

		this.showForm();
	}
});

jQuery(document).ready(function(){
	App.Modules.RequestResource = new App.Classes.RequestResourceView();

});

