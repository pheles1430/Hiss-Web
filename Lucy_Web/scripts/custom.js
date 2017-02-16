$(document).ready(function() {
    
	urlPop();
	
	$('div.content').html(Ajax2('POST', 'config/config.php', { action: 'index' }));
	
	window.location.href = '#home';
	
	$('.parallax').addClass('animated fadeIn');

	startCarousel();
	
	$('.content, nav, footer').css('transition', 'all ease-in-out 0.3s');
	
    /* form submit */
	$(document).on('submit', 'form', function(e) {
		
		e.preventDefault();
		
		var data = $(this).serialize() + '&' + $.param({ action: $(this).attr('data-action'), controller: $(this).attr('data-controller') });
		
		var temp = $(this).find('.send').html();
		var check = false;
        var login;
        
        if($(this).attr('id') == 'logout-form') {
			
            login = Ajax2('POST', 'config/config.php', data);
            
            if(login == "Logout Successful") {

                $('nav.navbar').remove();

                $('div.content').before(Ajax2('GET', 'views/nav.php'));

            }
            
            return false;

        }
        
		check = checkEmpty($(this));
		
		if (check == true) {
			
			$(this).find('.send').html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');

			login = Ajax2('POST', 'config/config.php', data);
			
			alert(login);
			
			$(this).find('.send').html(temp);
			
			if($(this).attr('id') == 'login-form') {
			
				if(login == "Login Successful") {

					$('nav.navbar').remove();

					$('div.content').before(Ajax2('GET', 'views/nav.php'));

				}
				
			}
			
		
		} else {
			
			alert('Fields Empty');
			
		}

		return false;

	});
	
	/* parallax effect */
	$(window).scroll(function() {
		
		$('.parallax').bind('inview', function (event, visible) {
		
			if (visible) {
				
				if($(this).not('.animated.fadeIn')) {
				
					$(this).removeClass('animated fadeOut');
					$(this).addClass('animated fadeIn');
					$(this).css('visibility', 'visible');
					
				}

			} else {
				
				if($(this).not('.animated.fadeOut')) {
				
					$(this).removeClass('animated fadeIn');
					$(this).addClass('animated fadeOut');
					$(this).css('visibility', 'hidden');

				}
				
			}

		});
		
	});

	/* fetching page */
	$(document).on('click', 'a', function(e) {

		e.preventDefault();
		
		var data = $(this).attr('data-action');
		var url = window.location.href;
		var parts = '';

		if(data != undefined) {

			fetchPage($(this));
			
			window.location.href = '#' + $(this).attr('data-link').toLocaleLowerCase();
			
			$('.parallax').addClass('animated fadeIn');

			startCarousel();

		} else {
			
			if((window.location.href.match(new RegExp("#", "g")) || []).length > 1) {
			
				parts = url.split('/');
				parts.pop();
				url = parts.join('/');
				
				window.location.href = url;
				
			}
			
			window.location.href += '/#' + $(this).attr('title').toLowerCase();
			
		}
		
		return false;

	});
	
	/* modal blur */
	$('#myModal').on('shown.bs.modal', function() {
		
		$('.content, nav, footer').css('-webkit-filter', 'blur(3px)').css('-moz-filter', 'blur(3px)').css('filter', 'blur(3px)');
		
	});
	
	$('#myModal').on('hidden.bs.modal', function () {
		
		$('.content, nav, footer').css('-webkit-filter', 'none').css('-moz-filter', 'none').css('filter', 'none');
		
	});
    
    //tab system
    
    $(document).on('click', '.nav-tab li', function() {
        
        tabSystem(this);
        
    });
    
    $(document).on('mouseover', '.DContent', function() {
        
       $(this).find('.DSlide').css('height', '150px');
        
    });
    
    $(document).on('mouseleave', '.DContent', function() {
        
       $(this).find('.DSlide').css('height', '0px');
        
    });
    
    //calling modal
    $(document).on('click', '.modal-call', function(e) {
       
        e.preventDefault();
        
        modalCustom($(this), '', '', '')
        
    });

});

function checkEmpty(element) {
	
	var temp = false;
	
	$(element).find('input').each(function(index, elem){

		if($(elem).val().length == 0) {

			temp = false;
			return false;

		} 
		
		temp = true;

	});
	
	return temp;
	
}

function urlPop() {
	
	var url = window.location.href;
	var parts = '';

	if((url.match(new RegExp("#", "g")) || []).length > 1) {

		parts = url.split('/');
		parts.pop();
		url = parts.join('/');

		window.location.href = url;

	}
	
}

//Dynamic Page
//Requires data-target
//Requires data-value { action: 'index', controller: 'controllerName' }

function fetchPage(element) {

    var action = $(element).attr('data-action');
    var controller = $(element).attr('data-controller');
    var value = { action: action, controller: controller };
	
	$('div.content').html(Ajax2('POST', 'config/config.php', value));
	
	if($(element).attr('title') == 'PET SECTION') {
	
		action = 'getList';
		value = { action: action, controller: controller };
		
		values = [];
		Avalues = [];

		Avalues[0] = 'dogname';
		Avalues[1] = 'dogage';
		Avalues[2] = 'dograce';
		Avalues[3] = 'doggender';
		Avalues[4] = 'dogweight';

		Ajax('POST', 'config/config.php', value);
        
		for(var i = 0; i < values.length; i += 5) {
            
			$('.PetPage').append('<div class= "DContent modal-call" data-target="views/home/index.php" data-title="'+ values[i] +'"><div class="Dinfo"><span>'+ values[i] +'</span></div> <div class="Dpic"><img src="images/testpic1.jpg" alt="Mountain View" style="width:304px;height:228px;"></div><div class="DSlide"><p>Name: '+ values[i] +'</p>\<p> Age: '+ values[i + 1] +'</p><p> Race: '+ values[i + 2] +'</p><p> Gender'+ values[i + 3] +'</p><p> Weight'+ values[i + 4] +'</p><p>testing the damn shit</p><p>testing the damn shit</p><p>testing the damn shit</p><p>testing the damn shit</p><p>testing the damn shit</p><p>testing the damn shit</p></div>');

		}
	
	}

}

function startCarousel() {
    
    $('.carousel').slick({

        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 2000,
        fade: true,
        cssEase: 'linear',

    });
    
}

//Function to execute ANY ajax and retrieve Json Data from controllers

var error = false;
var values = new Array(1000); //store the Json values after fetch
var Avalues = new Array(1000); //store the fields to be fetched from Json returned values

function Ajax(type, url, value) { //Ajax to fetch data

    var j = 0; //counter to save each values in a number of 2
	
    $.ajax({
		
        type: type,
        url: url,
        data: value, //{ get_param: 'value' }
        dataType: 'json',
        async: false,
        success: function (data) { //data should always be returned as a Json List
            
            var count = data.length;

            var j = 0;

            for (var i = 0; i < count; i++) { //looping through data having been fetched

                for (var k = 0; k < Avalues.length; k++) { //looping through fields having been fetched

                    values[j] = data[i][Avalues[k]]; //assigning id and field in different slots

                    j++

                }

            }

            return values;

        },
        error: function (jqXHR, textStatus, errorThrown) {

			alert(errorThrown);

            return false;

        }

    });

}

function Ajax2(type, url, value) { //Ajax to fetch page

    var result;

    $.ajax({

        type: type,
        url: url,
        async: false,
        data: value, //{ get_param: 'value' }
        success: function (data) {
			
            result = data;

        },
        error: function (result) {

            alert("Error");

            error = true;

            return false;

        },

    });

    return result;

}

function tabSystem(element) {

      $(element).tab('show');
    
}

//Dynamic Page Modal
//Requires data-title
//Requires data-target

function modalCustom(element, target, value, title) {

    var modal = $('#myModal');

    if (title == '' || title == null) {

        title = $(element).attr('data-title');

    }

    if (target == '' || target == null) {

        target = $(element).attr('data-target');

    }

    var content = Ajax2('Get', target, value);

    modal.find('.modal-title').text(title);
    modal.find('.modal-body').html(content);

    $('#myModal').modal();

}

