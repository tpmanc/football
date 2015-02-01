$(function(){
	$('#matches-onlytime').clockpicker({donetext: 'Готово'});

	$('#matches-onlydate').datepicker({
		format: "dd.mm.yyyy",
	    todayBtn: "linked",
	    language: "ru",
	    forceParse: false,
	    autoclose: true
	});
});