function addCard() {
	$('#jaDatDing').append($('<div></div>')
		.addClass('col-lg-3 col-md-4 col-ms-12')
		.append($('<div></div>')
			.addClass('card text-white bg-info mb-3')
			.append($('<form></form>')
				.addClass('card-body')
				.append($('<div></div>')
					.addClass('form-group card-text')
					.append($('<input></input>')
						.attr({type: 'text',
								placeholder: 'Name'})
						.addClass('form-control')))
				.append($('<hr></hr>'))
				.append($('<div></div>')
					.addClass('form-group card-text')
					.append($('<textarea></textarea>')
						.addClass('form-control')
						.attr('placeholder', 'Info')))
				.append($('<div></div>')
					.addClass('form-group card-text')
					.append($('<button></button>')
						.addClass('btn btn-danger form-control')
						.attr('type','button')
						.html('Remove')
						.on('click', function() {
							$(this).parent().parent().parent().parent().remove();
						}))))));
}

$('#newCard').on('click', function() {
	addCard();
});