var cache = {};
			$(function ()
			{
				$("#ville").autocomplete({
					source: function (request, response)
					{
						//Si la réponse est dans le cache
						if (('FR' + '-' + request.term) in cache)
						{
							response($.map(cache['FR' + '-' + request.term], function (item)
							{

								return {
									label: item.Ville + " (" + item.dep + ")",
									value: function ()
									{
											return item.Ville;
									}
								}
							}));
						}
						//Sinon -> Requete Ajax
						else
						{
							var objData = {};
							if ($(this.element).attr('id') == 'cp')
							{
								objData = { dep: request.term, pays: 'FR', maxRows: 10 };
							}
							else
							{
								objData = { ville: request.term, pays: 'FR', maxRows: 10 };
							}
							$.ajax({
								url: "inc/RemplissageAuto_Ville_Depcom.php",
								dataType: "json",
								data: objData,
								type: 'POST',
								success: function (data)
								{
									//Ajout de reponse dans le cache
									cache[('FR' + '-' + request.term)] = data;
									response($.map(data, function (item)
									{

										return {
											label: item.Ville + " (" + item.dep + ")",
											value: function ()
											{
													$('#Depcom').val(item.Depcom);
													return item.Ville  + " (" + item.dep + ")";
											}
										}
									}));
								}
							});
						}
					},
					minLength: 3,
					delay: 600
				});
			});