(function($) {
    $.fn.menumaker = function(options) {
        var cssmenu = $(this),
            settings = $.extend({
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function() {
            $(this).find(".button").on('click', function() {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function() {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function() {
                var mediasize = 767;
                if ($(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);
(function($) {
    $("#cssmenu").menumaker({
        format: "multitoggle"
    });
	 $('.spinner .btn:first-of-type').on('click', function() {
        var btn = $(this);
        var input = btn.closest('.spinner').find('input');
        if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
            input.val(parseInt(input.val(), 10) + 1);
        } else {
            btn.next("disabled", true);
        }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
   
        var btn = $(this);
        var input = btn.closest('.spinner').find('input');
        if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
            input.val(parseInt(input.val(), 10) - 1);
        } else {
            btn.prev("disabled", true);
        }
    });
	 $('#MyPET').submit(function(event) {
		$('#Loader').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var formdata = $(this).serialize();
			$.ajax({     
				type: "POST",
				url: 'ajax/add-pet.php',
				data: formdata,
				success: function (data) {
				$('#Loader').html('<p> Pet information inserted successfully.</p>');
				setTimeout(function(){ 					
						location.reload();
					window.location.href = '/profile.php?pid='+data; //Will take you to Google.
				}, 1000)
			},
		});
	 });
	 
	  $('#EditPro').submit(function(event) {
		$('#Loaderpro').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var formdata = $(this).serialize();
			$.ajax({     
				type: "POST",
				url: 'ajax/edit-profile.php',
				data: formdata,
				success: function (data) {
				$('#Loaderpro').html('<p>'+ data +'</p>');
				setTimeout(function(){ 					
						location.reload();
				}, 1000)
			},
		});
	 });
	 
	  $('#EditMarking').submit(function(event) {
		$('#Loadermark').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var formdata = $(this).serialize();
			$.ajax({     
				type: "POST",
				url: 'ajax/edit-marking.php',
				data: formdata,
				success: function (data) {
				$('#Loadermark').html('<p>'+ data +'</p>');
				setTimeout(function(){ 					
						location.reload();
				}, 1000)
			},
		});
	 });
	 
	$('#AddMarking').submit(function(event) {
		$('#LoaderAddmark').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var formdata = $(this).serialize();
			$.ajax({     
				type: "POST",
				url: 'ajax/add-marking.php',
				data: formdata,
				success: function (data) {
				$('#LoaderAddmark').html('<p>'+ data +'</p>');
				setTimeout(function(){ 					
						location.reload();
				}, 1000)
			},
		});
	 });
	 
	$('#Myvacc').submit(function(event) {
		$('#Loadervacc').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var formdata = $(this).serialize();
			$.ajax({     
				type: "POST",
				url: 'ajax/edit-vaccination.php',
				data: formdata,
				success: function (data) {
				$('#Loadervacc').html('<p>'+ data +'</p>');
				setTimeout(function(){ 					
						location.reload();
				}, 1000)
			},
		});
	 });
	 
	 $('#Mydesc').submit(function(event) {
		$('#Loaderdesc').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var formdata = $(this).serialize();
			$.ajax({     
				type: "POST",
				url: 'ajax/edit-description.php',
				data: formdata,
				success: function (data) {
				$('#Loaderdesc').html('<p>'+ data +'</p>');
				setTimeout(function(){ 					
						location.reload();
				}, 1000)
			},
		});
	 });
	 for(var i=1;i<=20;i++){
		  $('#EditMarking'+i).submit(function(event) {
			$('.LoaderEditmark').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
			event.preventDefault();
			var formdata = $(this).serialize();
				$.ajax({     
					type: "POST",
					url: 'ajax/edit-markingField.php',
					data: formdata,
					success: function (data) {
					$('.LoaderEditmark').html('<p>'+ data +'</p>');
					setTimeout(function(){ 					
						location.reload();
				}, 1000)
				},
			});
		 });
	 }
	 
	 for(var i=1;i<=200;i++){
		 $('#MYEvent'+i).submit(function(event) {
			$('.Loadee').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
			event.preventDefault();
			var formdata = $(this).serialize();
				$.ajax({     
					type: "POST",
					url: 'ajax/add-event.php',
					data: formdata,
					success: function (data) {
					$('.Loadee').html('Pupdate logged successfully.');
					$('.event-table').html(data);
					setTimeout(function(){ 					
						location.reload();
				}, 1000)
				},
			});
		 });
	 }
	 
	 
	$('#delete-vaccination').on('click', function() {
		var id = $(this).attr('data-value');
		if(id){
			var checkstr =  confirm('Are you sure you want to delete this vaccination?');
			if(checkstr == true){
					$.ajax({     
						type: "POST",
						url: 'ajax/delete-vaccination.php',
						data: { 'vid': id },
						success: function (data) {
						
						},
					});
				}else{
				return false;
			} 
		}
	});
	
	
	$('#delete-markingField').on('click', function() {
		var id = $(this).attr('data-value');
		if(id){
			var checkstr =  confirm('Are you sure you want to delete this marking field?');
			if(checkstr == true){
					$.ajax({     
						type: "POST",
						url: 'ajax/delete-markfield.php',
						data: { 'mid': id },
						success: function (data) {
						
						},
					});
				}else{
				return false;
			} 
		}
	});
	
	 $('.del-profile').on('click', function() {
		var id = $(this).attr('id');
		$('#Loaderdelete').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		
		if(id){
			var checkstr =  confirm('Are you sure you want to delete this profile?');
			if(checkstr == true){
					$.ajax({     
						type: "POST",
						url: 'ajax/delete-profile.php',
						data: { 'pet_id': id },
						success: function (data) {
							$('#Loaderdelete').html('<p>'+ data +'</p>');
							setTimeout(function(){ 					
								window.location.href="/dashboard.php";
							}, 1000)
						},
					});
				}else{
				return false;
			} 
		}
	});
		 
	 $('.del-event').on('click', function() {
		var id = $(this).attr('id');
		var pid = $("#pid").val();
		
		if(id){
			var checkstr =  confirm('Are you sure you want to delete this event?');
			if(checkstr == true){
					$.ajax({     
						type: "POST",
						url: 'ajax/delete-event.php',
						data: { 'id': id, 'pid': pid },
						success: function (data) {
							$('.event-table').html(data);
							
						},
					});
				}else{
				return false;
			} 
		}
	});
	
	$('.event-button').on('click', function() {
		var id = $(this).attr('data-value');
		 $("#pid").val(id);
	});	
	
	$('.event-recent').on('click', function() {
		var id = $(this).attr('data-value');
		 $("#pid").val(id);
		 $.ajax({     
				type: "POST",
				url: 'ajax/all-events.php',
				data: {
				page: 1, pid: id
			},
			success: function(res){
				$('.load_data').html(res);
			}
		});
	});
	
	$('.event-form').on('click', function() {
		var id = $(this).attr('data-value');
		 $("#pid").val(id);
	});	
	
	function addZero(i) {
			if (i < 10) {
			i = "0" + i;
			}
			return i;
	}
	$('.nav-link').on('click', function() {
		var pid = $("#pid").val();	
		
		$(this).addClass('active');
		var event_type = $(this).attr('data-value');
		
		if(event_type){	
			$('.Loadernav').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		
			var param1 = new Date();
			
			var h = addZero(param1.getHours());
			var m = addZero(param1.getMinutes());
			
			 if(h == 12){
				var _time = (h + ':' + m +' PM');
			 }else if(h == 0){
				 var _time = (12 + ':' + m +' AM');
			 }else{			 
				var _time = (h > 12) ? (h-12 + ':' + m +' PM') : (h + ':' + m +' AM');
			 }
			
			$.ajax({     
					type: "POST",
					url: 'ajax/add-event.php',
					data: { 'event_type': event_type, 'event_time': _time ,'pid':pid },
					success: function (data) {
					$('.Loadernav').html('<p>Pupdate logged successfully!</p>');					
					$('.event-table').html(data);
					setTimeout(function(){ 					
						$('.cl-nav').trigger('click');
						location.reload();
					}, 500)
							
				},
			});
		}
		
	});
	// TILES OTHERS LINK TOGGLE CLICK FUNCTION...
	$('.others-titles').on('click', function() {
		
		if($('.icon-down').hasClass('fa-angle-down')) {
			$('.icon-down').removeClass('fa-angle-down');
			$('.icon-down').addClass('fa-angle-up');
		} else {
			$('.icon-down').addClass('fa-angle-down');
			$(this).removeClass('active');
		}
		$('#more-tiles').toggle();
		 for(var i=1;i<=200;i++){
			$('#more-tiles'+i).toggle();
		 }
	});
	
	
	$("#pet_dob").datepicker({
		dateFormat: 'mm/dd/yy',
		changeMonth: true,
		changeYear: true,
		maxDate: '-1d'
	});
	$("#petdob").datepicker({
		dateFormat: 'mm/dd/yy',
		changeMonth: true,
		changeYear: true,
		maxDate: '-1d'
	});
	$("#date_of_application").datepicker({
		dateFormat: 'mm/dd/yy',
		changeMonth: true,
		changeYear: true,
		
		
	});
	$("#datevacc").datepicker({
		dateFormat: 'mm/dd/yy',
		changeMonth: true,
		changeYear: true,
		
		
	});
	$("#datevalid").datepicker({
		dateFormat: 'mm/dd/yy',
		changeMonth: true,
		changeYear: true,
		
		
	});
	for(var i=1;i<=200;i++){
	$('#datetimepicker'+i).datetimepicker({
                    format: 'LT'
                });	
	}
	

		var resize = $('#upload-demo').croppie({
			enableExif: true,
			enableOrientation: true,    
			viewport: { // Default { width: 100, height: 100, type: 'square' } 
				width: 200,
				height: 200,
				type: 'circle' //square
			},
			boundary: {
				width: 300,
				height: 300
			}
		});


		$('#image').on('change', function () { 
		$('#imagePreview').html('<img style="width: 80px;bottom: 0px;position: absolute;left: 50px;" src="./images/loading.gif" alt="loading"/>');
		var pid = $("#pid").val();
		  var reader = new FileReader();
			reader.onload = function (e) {
			  resize.croppie('bind',{
				url: e.target.result
			  }).then(function(){
				console.log('jQuery bind complete');
				resize.croppie('result', {
					type: 'canvas',
					size: 'viewport'
				  }).then(function (img) {
					$('#upload-demo').hide();  
					$.ajax({
					  url: "ajaxImageUpload.php",
					  type: "POST",
					  data: {"image":img, "pid":pid},
					  success: function (data) {	
						$('#imagePreview').html('');					  
						$("#imagePreview").attr('style', 'background-image: url('+ data +')');
					  }
					});
				  });
			  });
			}
			reader.readAsDataURL(this.files[0]);
		});
	
 for(var i=1;i<=200;i++){
	  $('#Myweight'+i).submit(function(event) {
		$('.Loaderweight').html('<img style="width: 40px;" src="./images/loading.gif"> saving...');
		event.preventDefault();
		var weight = $(this).find('.weight').val();
		var pid = $("#pid").val();	
			var param1 = new Date();
			
			var h = addZero(param1.getHours());
			var m = addZero(param1.getMinutes());
			
			 if(h == 12){
				var _time = (h + ':' + m +' PM');
			 }else if(h == 0){
				 var _time = (12 + ':' + m +' AM');
			 }else{			 
				var _time = (h > 12) ? (h-12 + ':' + m +' PM') : (h + ':' + m +' AM');
			 }
		
			$.ajax({     
				type: "POST",
				url: 'ajax/add-weight.php',
				data: { 'weight': weight, 'event_time': _time ,'pid':pid },
				success: function (data) {
				$('.Loaderweight').html('<p>'+ data +'</p>');
				setTimeout(function(){ 					
					location.reload();
				}, 1000)
			},
		});
	 });	
 }
	// RECENT EVENTS PAGINATION...
	load_data();
	function load_data(page){
		var pid = $("#pid").val();	
		$.ajax({
			url: 'ajax/all-events.php',
			method: 'POST',
			data: {
				page: page, pid: pid
			},
			success: function(res){
				$('.load_data').html(res);
			}
		});
	}
	
	$(document).on('click', '.pagination', function(){
		$page = $(this).attr('id');
		load_data($page);
	});
	
	
	$('.tiles-type').on('click', function() {
		
		var event_type = $(this).attr('data-value');
		
		if(event_type){	
			
			var checkstr =  confirm('Are you sure you want to update tiles?');			
			if(checkstr == true){
				var pid = $("#pid").val();			
				$(this).addClass('active');
							
				var param1 = new Date();
				var h = addZero(param1.getHours());
				var m = addZero(param1.getMinutes());
				
				 if(h == 12){
					var _time = (h + ':' + m +' PM');
				 }else if(h == 0){
					 var _time = (12 + ':' + m +' AM');
				 }else{			 
					var _time = (h > 12) ? (h-12 + ':' + m +' PM') : (h + ':' + m +' AM');
				 }
				
				$.ajax({     
						type: "POST",
						url: 'ajax/add-event.php',
						data: { 'event_type': event_type, 'event_time': _time ,'pid':pid },
						success: function (data) {
											
						setTimeout(function(){ 					
							
							location.reload();
						}, 500)
								
					},
				});
				
			}else{
				return false;
			} 
		}
		
	});
	
	
	
})(jQuery);
