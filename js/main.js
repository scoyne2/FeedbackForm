$(function () {
	//input[type=radio][name=stars]:checked
	var form = $('form');
	var ratingInput = $('.rating-input');
	ratingInput.on('change', 'input[type=radio]', function () {
		ratingInput.removeClass('invalid');
	});
	function submit(e) {
		var stars = $('input[type=radio][name=rating]:checked').val();
		if (stars < 1) {
			ratingInput.addClass('invalid');
			e.preventDefault();
		}
	}
	form.on('submit', submit);
});