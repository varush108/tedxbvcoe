$(document).ready(function(){
	
		var section = 1;
	
		$('header .mobile-section-number').html('Section ' + section + ' / 4');
	
		/*Nominate myself check interaction*/
		var check = 0;
		$('.checkbox').click(function(){
			if(check==0){
				$('.box').css('background','#d12838');
				$('.box').css('border','2px solid #d12838');
				$('.box .check').css('visibility','visible');
				$('.nominee-wrapper').addClass('disable');
				$('.sec-two-button').removeClass('disabled');
				$('#s-full-name').val($('#n-full-name').val());
				$('#s-email').val($('#n-email').val());
				$('#s-phone').val($('#n-phone').val());
				check = 1;
			}
			else{
				$('.box').css('background','none');
				$('.box').css('border','2px solid rgba(0,0,0,.3)');
				$('.box .check').css('visibility','hidden');
				$('.nominee-wrapper').removeClass('disable');
				$('.sec-two-button').addClass('disabled');
				$('#s-full-name').val('');
				$('#s-email').val('');
				$('#s-phone').val('');
				check = 0;
			}
		});
	
		/*Next Button Click Interactiion*/
		$('.sec-one-button').click(function(){
			$('.tab-one').addClass('check');
			$('.tab-one').removeClass('current');
			$('.tab-two').addClass('current');
			$('.tab-two').removeClass('disabled');
			$('.nominator').removeClass('active-section');
			$('.nominee').addClass('active-section');
			$('html, body').animate({ scrollTop: 0 },0);
			section++;
			$('header .mobile-section-number').html('Section ' + section + ' / 4');
			if($('#s-full-name').val()!="" || check==1)
				$('.sec-two-button').removeClass('disabled');
			else
				$('.sec-two-button').addClass('disabled');
		});
	
		$('.sec-two-button').click(function(){
			$('.tab-two').addClass('check');
			$('.tab-two').removeClass('current');
			$('.tab-three').addClass('current');
			$('.tab-three').removeClass('disabled');
			$('.nominee').removeClass('active-section');
			$('.details').addClass('active-section');
			$('html, body').animate({ scrollTop: 0 },0);
			section++;
			$('header .mobile-section-number').html('Section ' + section + ' / 4');
			if($('#s-city').val()!=""&&$('#s-country').val()!=""&&$('#s-brief').val()!=""&&$('#s-talk').val()!=""&&$('#s-experience').val()!="")
				$('.sec-three-button').removeClass('disabled');
			else
				$('.sec-three-button').addClass('disabled');
		});
	
		$('.sec-three-button').click(function(){
			$('.tab-three').addClass('check');
			$('.tab-three').removeClass('current');
			$('.tab-four').addClass('current');
			$('.tab-four').removeClass('disabled');
			$('.details').removeClass('active-section');
			$('.links').addClass('active-section');
			$('html, body').animate({ scrollTop: 0 },0);
			section++;
			$('header .mobile-section-number').html('Section ' + section + ' / 4');
		});
	
		$('.sec-four-button').click(function(){
			$('.tab-four').addClass('check');
			$('.tab-four').removeClass('current');
			$('.links').removeClass('active-section');
			$('.thanks').addClass('active-section');
			$('html, body').animate({ scrollTop: 0 },0);
			$('header .mobile-section-number').html('Form Submitted');
			$('.tab').addClass('disabled');
		});
	
		/*Tab click interaction*/
		$('.tab-one').click(function(){
			$('.tab').removeClass('current');
			$('.tab-one').addClass('current');
			$('section').removeClass('active-section');
			$('.nominator').addClass('active-section');
			section = 1;
		});
	
		$('.tab-two').click(function(){
			$('.tab').removeClass('current');
			$('.tab-two').addClass('current');
			$('section').removeClass('active-section');
			$('.nominee').addClass('active-section');
			section = 2;
		});
	
		$('.tab-three').click(function(){
			$('.tab').removeClass('current');
			$('.tab-three').addClass('current');
			$('section').removeClass('active-section');
			$('.details').addClass('active-section');
			section = 3;
		});
	
		$('.tab-four').click(function(){
			$('.tab').removeClass('current');
			$('.tab-four').addClass('current');
			$('section').removeClass('active-section');
			$('.links').addClass('active-section');
			section = 4;
		});
	
		/*Add more links*/
		var input_code1 = '<input type="text" id="';
		var input_code2 = '" placeholder="Enter link ';
		var video_l = 1;
		var article_l = 1;
	
		$('.add-more.videos').click(function(){
			video_l++;
			$('.video-links').append(input_code1 + 'vlink-' + video_l + input_code2 + video_l + '" name="nomineeVideoLink' + video_l + '">');
			if(video_l==5){
				$('.add-more.videos').css('display','none');
			}
		});
	
		$('.add-more.articles').click(function(){
			article_l++;
			$('.article-links').append(input_code1 + 'alink-' + article_l + input_code2 + '" name="nomineeArticleLink' + article_l + '">');
			if(article_l==5){
				$('.add-more.articles').css('display','none');
			}
		});
	
		/*Check what's filled*/
		$('.nominator input').keyup(function(){
			if($('#n-full-name').val()!=""&&$('#n-email').val()!=""&&$('#n-phone').val()!="")
				$('.sec-one-button').removeClass('disabled');
			else
				$('.sec-one-button').addClass('disabled');
		});
	
		$('.nominee input').keyup(function(){
			if($('#s-full-name').val()!="")
				$('.sec-two-button').removeClass('disabled');
			else
				$('.sec-two-button').addClass('disabled');
	
		});
	
		$('.details input').keyup(function(){
			if($('#s-city').val()!=""&&$('#s-country').val()!=""&&$('#s-brief').val()!=""&&$('#s-talk').val()!=""&&$('#s-experience').val()!="")
				$('.sec-three-button').removeClass('disabled');
			else
				$('.sec-three-button').addClass('disabled');
		});
	
		$('.details textarea').keyup(function(){
			if($('#s-city').val()!=""&&$('#s-country').val()!=""&&$('#s-brief').val()!=""&&$('#s-talk').val()!=""&&$('#s-experience').val()!="")
				$('.sec-three-button').removeClass('disabled');
			else
				$('.sec-three-button').addClass('disabled');
		});
	
	});