$(document).ready(function(){
	if($(".fecha").length){
		$( ".fecha" ).datepicker();
		$.datepicker.regional['es']
		$( ".fecha" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
		$( ".fecha" ).datepicker('option', 'firstDay', 1);
	}
})