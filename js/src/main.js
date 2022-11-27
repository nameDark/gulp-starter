require('./bootstrap');
Alpine.start();

document.querySelectorAll('.country-select').forEach(item => {
	window[item.name] = new TomSelect(item, {
		plugins: ['dropdown_input', 'clear_button'],
		placeholder: 'Country',
		allowEmptyOption: true,
		maxOptions:null,
		onInitialize:function(){},
		onType(str) {
			document.querySelectorAll(".ts-dropdown-content").forEach(function(i){
				i.scrollTop = 0;
			})
		}
	});
})

document.addEventListener("DOMContentLoaded", function () {
	var search_form = document.getElementById('search-form');
	if (search_form) {
		var search = new Pristine(
			search_form,
			PristineOptions
		);
		search_form.addEventListener('submit', function (e) {
			if (!search.validate()) e.preventDefault();
		});
	}
});

window.show_loader = function () {
	document.getElementById('page-inner').classList.add("loader-ready", "show-loader");
}
window.hide_loader = function () {
	setTimeout(function() {
		document.getElementById('page-inner').classList.remove("show-loader", "loader-ready");
	}, 500);
}