$(function() {
	
	/* Локализация */
	$.extend( $.validator.messages, {
		required: 'Это поле обязательно для заполнения',
		remote: 'Пожалуйста, введите правильное значение',
		email: 'Пожалуйста, введите корректный email',
		url: 'Адрес должен начинаться с http:// или https://',
		date: 'Пожалуйста, введите корректную дату',
		dateISO: 'Пожалуйста, введите корректную дату в формате ISO',
		number: 'Пожалуйста, введите число',
		digits: 'Пожалуйста, вводите только цифры',
		creditcard: 'Пожалуйста, введите правильный номер кредитной карты',
		equalTo: 'Пожалуйста, введите такое же значение ещё раз',
		extension: 'Пожалуйста, выберите файл с правильным расширением',
		maxlength: $.validator.format( 'Поле должно содержать максимум {0} символ(а)' ),
		minlength: $.validator.format( 'Поле должно содержать минимум {0} символа' ),
		rangelength: $.validator.format( 'Пожалуйста, введите значение длиной от {0} до {1} символов' ),
		range: $.validator.format( 'Пожалуйста, введите число от {0} до {1}' ),
		max: $.validator.format( 'Пожалуйста, введите число, меньшее или равное {0}' ),
		min: $.validator.format( 'Пожалуйста, введите число, большее или равное {0}' )
		} 
	);
	
	/* Валидация формы на главной */
	$('.js-form').validate({
		errorPlacement: function(error, element) {
			error.addClass('form__error').appendTo( element.closest('.form__group') );
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('form__input--' + errorClass).removeClass('form__input--' + validClass);
			$(element).closest('.form__group').addClass('form__group--' + errorClass).removeClass('form__group--' + validClass);
			$(element).closest('.form__group').find('.form__error').show();
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('form__input--' + errorClass).addClass('form__input--' + validClass);
			$(element).closest('.form__group').removeClass('form__group--' + errorClass).addClass('form__group--' + validClass);
			$(element).closest('.form__group').find('.form__error').hide();
		},
		rules: {
			name: {
				required: function(element) {
					return !$.trim($('#register__name').val()).length;
				}
			},
			email: {
				email: true
			},

			captcha_code: {
				number: true,
				minlength: 5
			},

			phone: {
				number: true
			}
		}
	});
});