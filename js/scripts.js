$(document).ready(function() {

	// Invoice Type
	$('#invoice_type').change(function() {
		var invoiceType = $("#invoice_type option:selected").text();
		$(".invoice_type").text(invoiceType);
	});

	// Load dataTables
	$("#data-table").dataTable();

	// add product
	$("#action_add_product").click(function(e) {
		e.preventDefault();
	    actionAddProduct();
	});

	// password strength
	var options = {
        onLoad: function () {
            $('#messages').text('Start typing password');
        },
        onKeyUp: function (evt) {
            $(evt.target).pwstrength("outputErrorList");
        }
    };
    $('#password').pwstrength(options);

	// add user
	$("#action_add_user").click(function(e) {
		e.preventDefault();
	    actionAddUser();
	});
	// add Area
	$("#action_add_area").click(function(e) {
		e.preventDefault();
	if ($('.add_area_class').val()=='হালনাগাদ করুন'){
		 $('.action_value_area').val('update_area');
		 actionUpdateArea();
	    
	    } else {
		 $('.action_value_area').val('add_area');
		 actionAddArea();
	    }
	    
	});
	$("#action_add_cal").click(function(e) {
		e.preventDefault();
	    actionAddCal();
	});
	// add Member
	$("#action_add_member").click(function(e) {
	 e.preventDefault();
	 if ($('.xcf').val()=='হালনাগাদ করুন'){
		 $('.action_value_change').val('update_member');
		 actionUpdateMember();
	    
	    } else {
		 $('.action_value_change').val('add_member');
		 actionAddMember();
	    }
	    
	});
	
	


	// update customer
	$(document).on('click', "#action_update_user", function(e) {
		e.preventDefault();
		updateUser();
	});

	// delete user
	$(document).on('click', ".delete-user", function(e) {
        e.preventDefault();

        var userId = 'action=delete_user&delete='+ $(this).attr('data-user-id'); //build a post data structure
        var user = $(this);

	    $('#delete_user').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete', function() {
			deleteUser(userId);
			$(user).closest('tr').remove();
        });
   	});

   	// delete customer
	$(document).on('click', ".delete-customer", function(e) {
        e.preventDefault();

        var userId = 'action=delete_customer&delete='+ $(this).attr('data-customer-id'); //build a post data structure
        var user = $(this);

	    $('#delete_customer').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete', function() {
			deleteCustomer(userId);
			$(user).closest('tr').remove();
        });
   	});

	// update customer
	$(document).on('click', "#action_update_customer", function(e) {
		e.preventDefault();
		updateCustomer();
	});

	// update product
	$(document).on('click', "#action_update_product", function(e) {
		e.preventDefault();
		updateProduct();
	});

	// login form
	$(document).bind('keypress', function(e) {
		e.preventDefault;
		
        if(e.keyCode==13){
            $('#btn-login').trigger('click');
        }
    });

	$(document).on('click','#btn-login', function(e){
		e.preventDefault;
		actionLogin();
	});

	// download CSV
	$(document).on('click', ".download-csv", function(e) {
		e.preventDefault;

		var action = 'action=download_csv'; //build a post data structure
        downloadCSV(action);

	});

	// email invoice
	$(document).on('click', ".email-invoice", function(e) {
        e.preventDefault();

        var invoiceId = 'action=email_invoice&id='+$(this).attr('data-invoice-id')+'&email='+$(this).attr('data-email')+'&invoice_type='+$(this).attr('data-invoice-type')+'&custom_email='+$(this).attr('data-custom-email'); //build a post data structure
		emailInvoice(invoiceId);
   	});

	// delete invoice
	$(document).on('click', ".delete-invoice", function(e) {
        e.preventDefault();

        var invoiceId = 'action=delete_invoice&delete='+ $(this).attr('data-invoice-id'); //build a post data structure
        var invoice = $(this);

	    $('#delete_invoice').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete', function() {
			deleteInvoice(invoiceId);
			$(invoice).closest('tr').remove();
        });
   	});

	// delete product
	$(document).on('click', ".delete-product", function(e) {
        e.preventDefault();

        var productId = 'action=delete_product&delete='+ $(this).attr('data-product-id'); //build a post data structure
        var product = $(this);

	    $('#confirm').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete', function() {
			deleteProduct(productId);
			$(product).closest('tr').remove();
        });
   	});

	// create customer
	$("#action_create_customer").click(function(e) {
		e.preventDefault();
	    actionCreateCustomer();
	});

	$(document).on('click', ".item-select", function(e) {

   		e.preventDefault;

   		var product = $(this);

   		$('#insert').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {

		    var itemText = $('#insert').find("option:selected").text();
		    var itemValue = $('#insert').find("option:selected").val();

		    $(product).closest('tr').find('.invoice_product').val(itemText);
		    $(product).closest('tr').find('.invoice_product_price').val(itemValue);

		    updateTotals('.calculate');
        	calculateTotal();

   		});

   		return false;

   	});
   	

   	$(document).on('click', ".select-customerxxxxxx", function(e) {

   		e.preventDefault;

   		var customer = $(this);

   		$('#insert_customer').modal({ backdrop: 'static', keyboard: false });

   		return false;

   	});

   	$(document).on('click', ".customer-selectxxxx", function(e) {

		    var customer_name = $(this).attr('data-customer-name');
		    var customer_email = $(this).attr('data-customer-email');
		    var customer_phone = $(this).attr('data-customer-phone');

		    var customer_address_1 = $(this).attr('data-customer-address-1');
		    var customer_address_2 = $(this).attr('data-customer-address-2');
		    var customer_town = $(this).attr('data-customer-town');
		    var customer_county = $(this).attr('data-customer-county');
		    var customer_postcode = $(this).attr('data-customer-postcode');

		    var customer_name_ship = $(this).attr('data-customer-name-ship');
		    var customer_address_1_ship = $(this).attr('data-customer-address-1-ship');
		    var customer_address_2_ship = $(this).attr('data-customer-address-2-ship');
		    var customer_town_ship = $(this).attr('data-customer-town-ship');
		    var customer_county_ship = $(this).attr('data-customer-county-ship');
		    var customer_postcode_ship = $(this).attr('data-customer-postcode-ship');

		    $('#customer_name').val(customer_name);
		    $('#customer_email').val(customer_email);
		    $('#customer_phone').val(customer_phone);

		    $('#customer_address_1').val(customer_address_1);
		    $('#customer_address_2').val(customer_address_2);
		    $('#customer_town').val(customer_town);
		    $('#customer_county').val(customer_county);
		    $('#customer_postcode').val(customer_postcode);


		    $('#customer_name_ship').val(customer_name_ship);
		    $('#customer_address_1_ship').val(customer_address_1_ship);
		    $('#customer_address_2_ship').val(customer_address_2_ship);
		    $('#customer_town_ship').val(customer_town_ship);
		    $('#customer_county_ship').val(customer_county_ship);
		    $('#customer_postcode_ship').val(customer_postcode_ship);

		    $('#insert_customerxxxx').modal('hide');

	});
	
	$(document).on('click', ".select-customers_", function(e) {

   		e.preventDefault;

   		var product = $(this);
   		$('#insert_customer_').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {
			var itemText = $('#insert_customer_').find("option:selected").text();
		    	var itemValue = $('#insert_customer_').find("option:selected").val();
			$('#customer_name').val(itemText);
			$('#customer_id').val(itemValue);    
		    

	});
	return false;

   	});
	
	$(document).on('click', ".select-items", function(e) {

   		e.preventDefault;

   		var product = $(this);
   		$('#insert_items').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {
		    var item_name = $(this).attr('data-item-name');
		    var item_id = $(this).attr('data-item-id');
		    var item_type = $(this).attr('data-item-type');
		    var item_mrp = $(this).attr('data-item-mrp');

		    $(product).closest('tr').find('.invoice_product').val(item_name);
		    $(product).closest('tr').find('.invoice_product_price').val(item_mrp);
		   
		    
		    $('#insert_items').modal('hide');

	});
	return false;

   	});
   	

   	
   	//Selec Area
   	   $(document).on('click', ".select-area", function(e) {

   		e.preventDefault;

   		var area = $(this);
   		$('#insert_area').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {
		    var area_id = $(this).attr('data-area-code');
		    var area_name = $(this).attr('data-area-name');
		    var area_details =$(this).attr('data-area-details');

		    $('.area_code').val(area_id);
		    $('.area_name').val(area_name);
		    $('.area_details').val(area_details);
		    $('.add_area_class').val('হালনাগাদ করুন');
		    
		    $('#insert_area').modal('hide');

	});
	return false;

   	});
   	
   	//Select Member
	 $(document).on('click', ".select-members", function(e) {

   		e.preventDefault;

   		var area = $(this);
   		$('#insert_member').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {
		    var member_id = $(this).attr('data-member-id');
		    var member_name = $(this).attr('data-member-name');
		    var member_fathersname =$(this).attr('data-member-fathersname');
		    var member_address =$(this).attr('data-member-address');
		    var member_areaname =$(this).attr('data-member-areaname');
		    var member_areacode =$(this).attr('data-member-areacode');
		    var member_age =$(this).attr('data-member-age');
		    var member_mobile =$(this).attr('data-member-mobile');
		    var member_nationality =$(this).attr('data-member-nationality');
		    var member_occuption =$(this).attr('data-member-occuption');
		    var member_date =$(this).attr('data-member-date');
		    var member_nominated =$(this).attr('data-member-nominated');
		    var member_nominatedaddress =$(this).attr('data-member-nominatedaddress');
		    var member_nominatedmobile =$(this).attr('data-member-nominatedmobile');
		    var member_nominatedrelation =$(this).attr('data-member-nominatedrelation');

		    $('.member_id').val(member_id);
		    $('.member_name').val(member_name);
		    $('.fathers_name').val(member_fathersname);
		    $('.address').val(member_address);
		    $('.area_name').val(member_areaname);
		    $('.area_code').val(member_areacode);
		    $('.age').val(member_age);
		    $('.member_mobile').val(member_mobile);
		    $('.nationality').val(member_nationality);
		    $('.occuption').val(member_occuption);
		    $('.member_date').val(member_date);
		    $('.nominated_member').val(member_nominated);
		    $('.nominated_member_address').val(member_nominatedaddress);
		    $('.nominated_member_mobile').val(member_nominatedmobile);
		    $('.nominated_member_relation').val(member_nominatedrelation);
		    $('.xcf').val('হালনাগাদ করুন');
		    $('#insert_member').modal('hide');

	});
	return false;

   	});
		
	//Select Members Account
	 $(document).on('click', ".select-members-account", function(e) {

   		e.preventDefault;

   		var area = $(this);
   		$('#insert_member_account').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {
		    var member_id = $(this).attr('data-member-id');
		    var member_name = $(this).attr('data-member-name');
		    var member_address =$(this).attr('data-member-address');
		    var member_areaname =$(this).attr('data-member-areaname');
		    var member_areacode =$(this).attr('data-member-areacode');
		    var member_mobile =$(this).attr('data-member-mobile');
		    var member_savings =$(this).attr('data-member-savings');
		    var x_savings =$(this).attr('data-member-savings');
		    var member_investment =$(this).attr('data-member-investment');
		    var x_investment =$(this).attr('data-member-investment');
		    if (x_savings==''){
		    	x_savings=0;
		    }
		    if (member_investment==''){
		    	member_investment=0;
		    }
		    $('.member_id').val(member_id);
		    $('.member_name').val(member_name);
		    $('.address').val(member_address);
		    $('.area_name').val(member_areaname);
		    $('.area_code').val(member_areacode);
		    $('.member_mobile').val(member_mobile);
		    $('.x_sav').val(member_savings);
		    $('.b_savings_').val(x_savings);
		    
		    $('.b_investment').val(member_investment);
		    $('.x-inv').val(x_investment);
		    $('.xcf').val('হালনাগাদ করুন');
		    $('.r_savings').focus();
		    $('.r_savings').select();
		    $('#insert_member_account').modal('hide');
		    

	});
	return false;

   	});
	

	// create invoice
	$("#action_create_invoice").click(function(e) {
		e.preventDefault();
	    actionCreateInvoice();
	});

	// update invoice
	$(document).on('click', "#action_edit_invoice", function(e) {
		e.preventDefault();
		updateInvoice();
	});

	// enable date pickers for due date and invoice date
	var dateFormat = $(this).attr('data-vat-rate');
	$('#invoice_date, #invoice_due_date').datetimepicker({
		showClose: false,
		format: dateFormat
	});

	// copy customer details to shipping
    $('input.copy-input').on("input", function () {
        $('input#' + this.id + "_ship").val($(this).val());
    });
    
    // remove product row
    $('#invoice_table').on('click', ".delete-row", function(e) {
    	e.preventDefault();
       	$(this).closest('tr').remove();
        calculateTotal();
    });

    // add new product row on invoice
    var cloned = $('#invoice_table tr:last').clone();
    $(".add-row").click(function(e) {
        e.preventDefault();
        cloned.clone().appendTo('#invoice_table'); 
    });
    
    calculateTotal();
    
    $('#invoice_table').on('input', '.calculate', function () {
	    updateTotals(this);
	    calculateTotal();
	});

	$('#invoice_totals').on('input', '.calculate', function () {
	    calculateTotal();
	});

	$('#invoice_product').on('input', '.calculate', function () {
	    calculateTotal();
	});

	$('.remove_vat').on('change', function() {
        calculateTotal();
    });

	function updateTotals(elem) {

        var tr = $(elem).closest('tr'),
            quantity = $('[name="invoice_product_qty[]"]', tr).val(),
	        price = $('[name="invoice_product_price[]"]', tr).val(),
            isPercent = $('[name="invoice_product_discount[]"]', tr).val().indexOf('%') > -1,
            percent = $.trim($('[name="invoice_product_discount[]"]', tr).val().replace('%', '')),
	        subtotal = parseInt(quantity) * parseFloat(price);

        if(percent && $.isNumeric(percent) && percent !== 0) {
            if(isPercent){
                subtotal = subtotal - ((parseFloat(percent) / 100) * subtotal);
            } else {
                subtotal = subtotal - parseFloat(percent);
            }
        } else {
            $('[name="invoice_product_discount[]"]', tr).val('');
        }

	    $('.calculate-sub', tr).val(subtotal.toFixed(2));
	}

	function calculateTotal() {
	    
	    var grandTotal = 0,
	    	disc = 0,
	    	c_ship = parseInt($('.calculate.shipping').val()) || 0;

	    $('#invoice_table tbody tr').each(function() {
            var c_sbt = $('.calculate-sub', this).val(),
                quantity = $('[name="invoice_product_qty[]"]', this).val(),
	            price = $('[name="invoice_product_price[]"]', this).val() || 0,
                subtotal = parseInt(quantity) * parseFloat(price);
            
            grandTotal += parseFloat(c_sbt);
            disc += subtotal - parseFloat(c_sbt);
	    });

        // VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
	    var subT = parseFloat(grandTotal),
	    	finalTotal = parseFloat(grandTotal - c_ship),
	    	vat = parseInt($('.invoice-vat').attr('data-vat-rate'));

	    $('.invoice-sub-total').text(subT.toFixed(2));
	    $('#invoice_subtotal').val(subT.toFixed(2));
        $('.invoice-discount').text(disc.toFixed(2));
        $('#invoice_discount').val(disc.toFixed(2));

        if($('.invoice-vat').attr('data-enable-vat') === '1') {

	        if($('.invoice-vat').attr('data-vat-method') === '1') {
		        $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
		        $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
	            $('.invoice-total').text((finalTotal).toFixed(2));
	            $('#invoice_total').val((finalTotal).toFixed(2));
	        } else {
	            $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
	            $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
		        $('.invoice-total').text((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
		        $('#invoice_total').val((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
	        }
		} else {
			$('.invoice-total').text((finalTotal).toFixed(2));
			$('#invoice_total').val((finalTotal).toFixed(2));
		}

		// remove vat
    	if($('input.remove_vat').is(':checked')) {
	        $('.invoice-vat').text("0.00");
	        $('#invoice_vat').val("0.00");
            $('.invoice-total').text((finalTotal).toFixed(2));
            $('#invoice_total').val((finalTotal).toFixed(2));
	    }

	}

	function actionAddUser() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_user").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_user").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}
	function actionAddArea() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>ভুল</strong>:  মনে হচ্ছে, আপনার কিছু জায়গা সম্পন্ন করা ভুলে গিয়েছেন!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_area").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_area").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}
	
	
	function actionUpdateArea() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>ভুল</strong>:  মনে হচ্ছে, আপনার কিছু জায়গা সম্পন্ন করা ভুলে গিয়েছেন!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_area").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $(".update_area").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
					
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}
	
	
	function actionAddCal() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>ভুল</strong>:  মনে হচ্ছে, আপনার কিছু জায়গা সম্পন্ন করা ভুলে গিয়েছেন!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_cal").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				
				data: $("#add_cal").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
					location.reload();
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}
	
	
	function actionAddMember() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>ভুল</strong>:  মনে হচ্ছে, আপনার কিছু জায়গা সম্পন্ন করা ভুলে গিয়েছেন!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_member").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_member").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
					var value = $("form input[name='member_id']").val();
					var bang_numbers = {
						  '০': 0,
						  '১': 1,
						  '২': 2,
						  '৩': 3,
						  '৪': 4,
						  '৫': 5,
						  '৬': 6,
						  '৭': 7,
						  '৮': 8,
						  '৯': 9
						};
					var eng_numbers = {
						  0 : '০',
						  1 : '১',
						  2 : '২',
						  3 : '৩',
						  4 : '৪',
						  5 : '৫',
						  6 : '৬',
						  7 : '৭',
						  8 : '৮',
						  9 : '৯'
						};
						
						function replaceNumbers(input) {
						  var output = [];
						  for (var i = 0; i < input.length; ++i) {
						    if (bang_numbers.hasOwnProperty(input[i])) {
						      output.push(bang_numbers[input[i]]);
						    } else {
						      output.push(input[i]);
						    }
						  }
						  return output.join('');
						}
						function eng_replaceNumbers(inputx) {
						  var outputx = [];
						  for (var j = 0; j < inputx.length; ++j) {
						    if (eng_numbers.hasOwnProperty(inputx[j])) {
						      outputx.push(eng_numbers[inputx[j]]);
						    } else {
						      outputx.push(inputx[j]);
						    }
						  }
						  return outputx.join('');
						}
					var value_eng = replaceNumbers(value);
					var val_convert = parseInt(value_eng)+1;
					var n = val_convert.toString();
					var value_bang = eng_replaceNumbers(n);
					$("form")[0].reset();
					$('.member_id').val(value_bang);
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}
	
function actionUpdateMember() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>ভুল</strong>:  মনে হচ্ছে, আপনার কিছু জায়গা সম্পন্ন করা ভুলে গিয়েছেন!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_member").button("loading");
			
			$.ajax({
			 
			

				url: 'response.php',
				type: 'POST',
				data: $(".update_member").serialize(),
				dataType: 'json',
				
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
					
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}
	function actionAddProduct() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_product").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_product").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}

	function actionCreateCustomer(){

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			var $btn = $("#action_create_customer").button("loading");

			$(".required").parent().removeClass("has-error");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#create_customer").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$("#create_customer").before().html("<a href='/customer-add.php' class='btn btn-primary'>Create new customer</a>");
					$("#create_cuatomer").remove();
					$btn.button("reset");
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				} 

			});
		}

	}

	function actionCreateInvoice(){

		var errorCounter = validateForm();

		if (errorCounter > 0) {
		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			var $btn = $("#action_create_invoice").button("loading");

			$(".required").parent().removeClass("has-error");
			$("#create_invoice").find(':input:disabled').removeAttr('disabled');

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#create_invoice").serialize(),
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$("#create_invoice").before().html("<a href='/invoice-add.php' class='btn btn-primary'>Create new invoice</a>");
					$("#create_invoice").remove();
					$btn.button("reset");
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				} 

			});
		}

	}

   	function deleteProduct(productId) {

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: productId,
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}

   	function deleteUser(userId) {

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: userId,
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}

	function deleteCustomer(userId) {

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: userId,
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			} 
    	});

   	}

   	function emailInvoice(invoiceId) {

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: invoiceId,
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			} 
    	});

   	}

   	function deleteInvoice(invoiceId) {

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: invoiceId,
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}

   	function updateProduct() {

   		var $btn = $("#action_update_product").button("loading");

        jQuery.ajax({

        url: 'response.php',
           type: 'POST', 
            data: $("#update_product").serialize(),
           dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}
   	
   	

   	function updateUser() {

   		var $btn = $("#action_update_user").button("loading");

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: $("#update_user").serialize(),
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}

   	function updateCustomer() {

   		var $btn = $("#action_update_customer").button("loading");

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: $("#update_customer").serialize(),
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}

   	function updateInvoice() {

   		var $btn = $("#action_update_invoice").button("loading");
   		$("#update_invoice").find(':input:disabled').removeAttr('disabled');

        jQuery.ajax({

        	url: 'response.php',
            type: 'POST', 
            data: $("#update_invoice").serialize(),
            dataType: 'json', 
            success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			} 
    	});

   	}

   	function downloadCSV(action) {

   		jQuery.ajax({

   			url: 'response.php',
   			type: 'POST',
   			data: action,
   			dataType: 'json',
   			success: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			},
			error: function(data){
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			} 
   		});

   	}

   	// login function
	function actionLogin() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {

		    $("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
		    $("#response .message").html("<strong>ভুল</strong>: চেক করুন এবং আবার চেষ্টা করুন!");
		    $("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);

		} else {

			var $btn = $("#btn-login").button("loading");

			jQuery.ajax({
				url: 'response.php',
				type: "POST",
				data: $("#login_form").serialize(), // serializes the form's elements.
				dataType: 'json',
				success: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");

					window.location = "ড্যাসবোর্ড.php";
				},
				error: function(data){
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});

		}
		
	}

   	function validateForm() {
	    // error handling
	    var errorCounter = 0;

	    $(".required").each(function(i, obj) {

	        if($(this).val() === ''){
	            $(this).parent().addClass("has-error");
	            errorCounter++;
	        } else{ 
	            $(this).parent().removeClass("has-error"); 
	        }


	    });

	    return errorCounter;
	}

});