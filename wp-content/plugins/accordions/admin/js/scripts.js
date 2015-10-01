jQuery(document).ready(function($)
	{




		$(document).on('keyup', '#accordions_metabox .section-panel input', function()
			{
				var text = $(this).val();
				
				if(text == '')
					{
						$(this).parent().parent().children('.section-header').children('.accordions-title-preview').html('start typing');
					}
				else
					{
						$(this).parent().parent().children('.section-header').children('.accordions-title-preview').html(text);
					}
				
				
			
			})






		$(document).on('click', '#accordions_metabox .section-header', function()
			{	
				if($(this).parent().hasClass('active'))
					{
					$(this).parent().removeClass('active');
					}
				else
					{
						$(this).parent().addClass('active');
					}
				

			})





		$(document).on('click', '.accordions_icons_custom_plus', function()
			{	
			var icon_url = prompt("Please insert icon url","");
			if(icon_url != null && icon_url != '')
				{
						
							
					$(this).css("background-image",'url('+icon_url+')');
						
					$(".accordions_icons_custom_plus input").val(icon_url);
				}

			})
		
		
		$(document).on('click', '.accordions_icons_custom_minus', function()
			{	
			var icon_url = prompt("Please insert icon url","");
			if(icon_url != null && icon_url != '')
				{
						
							
					$(this).css("background-image",'url('+icon_url+')');
						
					$(".accordions_icons_custom_minus input").val(icon_url);
				}

			})		
		
		
		
		
		
		
		
		$(document).on('change', '.accordions_icons_list', function()
			{
				var val = $(this).val();
				
				if(val == 'custom')
					{
						$('.accordions_icons_custom').fadeIn();
					}
				else
					{
					$('.accordions_icons_custom').fadeOut();
					}

			})

		

		$(document).on('click', '.accordions-content-buttons .add-accordions', function()
			{	
				
				
				var row = $('.accordions-content tr').length;
	
				
				if($.isNumeric(row))
					{
						var row = parseInt(row)+1;
						
					}

				else
					{
						var row = 0;
					}
				
				
				$(".accordions-content").append('<tr index="'+row+'" valign="top"><td class="">&nbsp;</td><td class="tab-new" style="vertical-align:middle;"><br/><input width="100%" placeholder="accordions Header" type="text" name="accordions_content_title[row_'+row+']" value="" /><br /><br /><textarea placeholder="accordions Content" name="accordions_content_body[row_'+row+']" ></textarea></td></tr>');
				
				
				
				setTimeout(function(){
					
					$(".accordions-content tr:last-child td").removeClass("tab-new");
					
					}, 300);
				
				
				
			})	
		
		
		
		$(document).on('click', '#accordions_metabox .removeaccordions', function()
			{	
				
				if (confirm('Do you really want to delete this section ?')) {
					
					$(this).parent().parent().parent().remove();
				}
				
				
				
			})	
	
 		

	});