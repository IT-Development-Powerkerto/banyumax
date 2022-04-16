"use strict";

// Class definition
var KTCreateAccount = function () {
	// Elements
	var modal;	
	var modalEl;

	var stepper;
	var form;
	var formSubmitButton;
	var formContinueButton;

	// Variables
	var stepperObj;
	var validations = [];

	// Private Functions
	var initStepper = function () {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);

		// Stepper change event
		stepperObj.on('kt.stepper.changed', function (stepper) {
			if (stepperObj.getCurrentStepIndex() === 3) {
				formSubmitButton.classList.remove('d-none');
				formSubmitButton.classList.add('d-inline-block');
				formContinueButton.classList.add('d-none');
			} else if (stepperObj.getCurrentStepIndex() === 4) {
				formSubmitButton.classList.add('d-none');
				formContinueButton.classList.add('d-none');
			} else {
				formSubmitButton.classList.remove('d-inline-block');
				formSubmitButton.classList.remove('d-none');
				formContinueButton.classList.remove('d-none');
			}
		});

		// Validation before going to next page
		stepperObj.on('kt.stepper.next', function (stepper) {
			// console.log('stepper.next');

			// Validate form before change stepper step
			var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					// console.log('validated!');

					if (status == 'Valid') {
						stepper.goNext();

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			} else {
				stepper.goNext();

				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepperObj.on('kt.stepper.previous', function (stepper) {
			// console.log('stepper.previous');

			stepper.goPrevious();
			KTUtil.scrollTop();
		});
	}

	var handleForm = function() {
		// console.log("HandleForm init")
		formSubmitButton.addEventListener('click', function (e) {
			// Validate form before change stepper step
			var validator = validations[1]; // get validator for last form

			validator.validate().then(function (status) {
				// console.log('validated!');

				if (status == 'Valid') {
					// Prevent default button action
					e.preventDefault();

					// Disable button to avoid multiple click 
					formSubmitButton.disabled = true;

					// Show loading indication
					formSubmitButton.setAttribute('data-kt-indicator', 'on');

					// console.log('clicked');

					const data = $('#kt_create_account_form').serializeArray();
					const rawName = data.find(element => element["name"] == "name")["value"].split(" ");
					const subsId = data.find(element => element["name"] == "paket_id")["value"];

					var itemDetails = {};
					var price = 0;
					if(subsId == 1) {
						itemDetails = {
							"id": 1,
							"price": 139000,
							"quantity": 1,
							"name": "Enterpreneur Plan"
						}
						price = 139000;
					}else if(subsId == 2) {
						itemDetails = {
							"id": 2,
							"price": 299000,
							"quantity": 1,
							"name": "Corporate Plan"
						}
						price = 299000;
					}

					/**
					 * 1
					 * Enterpreneur Plan
					 * 139.000
					 * 
					 * 2
					 * Corporate Plan
					 * 299.000
					 * 
					 * 3 Not Supported
					 * Flexible Plan
					 * 300/lead
					 * 
					 * "item_details": [{
						"id": "a1",
						"price": 50000,
						"quantity": 2,
						"name": "Apel",
						"brand": "Fuji Apple",
						"category": "Fruit",
						"merchant_name": "Fruit-store",
						"tenor": "12",i
						"code_plan": "000",
						"mid": "123456"
					}]
					 */

					$.ajax({
						url: 'https://app.banyumax.id/public/api/payment/orderid',
						method: 'GET',
						dataType: 'json',
						success: function(orderIdResult) {
							let parameter = {
								"transaction_details": {
									"order_id": orderIdResult,
									"gross_amount": price
								},
								"customer_details": {
									"first_name": rawName.shift(),
									"last_name": rawName.join(" "),
									"email": data.find(element => element["name"] == "email")["value"],
									"phone": data.find(element => element["name"] == "phone")["value"],
								},
								"item_details": [itemDetails]
							};
		
							$.ajax({
								url: '/api/payment/token',
								method: 'POST',
								data: {
									_token: data.find(element => element["name"] == "_token")["value"],
									trxData: parameter,
								},
								dataType: 'json',
								success: function(result) {
									// console.log("Udah sampe sini nih")
									window.snap.pay(result, {
										onSuccess: function(payResult) {
											console.log(payResult);
											// noncashCallback(payResult);
										},
										onPending: function(payResult) {
											console.log(payResult);
											// noncashCallback(payResult);
										}, 
										onClose: function(payResult) {
											console.log(payResult); 
											// submitButton.removeAttr("data-kt-indicator");
											// submitButton.disabled = !1;
										}
									});
		
									formSubmitButton.removeAttribute('data-kt-indicator');
		
									formSubmitButton.disabled = false;
		
									stepperObj.goNext();
								}
							});
						}
					});

				} else {
					Swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					paket_id: {
						validators: {
							notEmpty: {
								message: 'Subscription Package is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'name': {
						validators: {
							notEmpty: {
								message: 'Name is required'
							}
						}
					},
					'username': {
						validators: {
							notEmpty: {
								message: 'Username name is required'
							}
						}
					},
					'password': {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					},
					'email': {
						validators: {
							notEmpty: {
								message: 'Email Address is required'
							}
						}
					},
					'phone': {
						validators: {
							notEmpty: {
								message: 'Phone Number is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));
	}


	var handleFormSubmit = function() {
		// console.log("HandleFormTriggered");
	}

	return {
		// Public Functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_create_account');
			if (modalEl) {
				modal = new bootstrap.Modal(modalEl);	
			}					

			stepper = document.querySelector('#kt_create_account_stepper');
			form = stepper.querySelector('#kt_create_account_form');
			formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
			formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');

			initStepper();
			initValidation();
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCreateAccount.init();
});