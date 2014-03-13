<!DOCTYPE html>
<html>
<head>
<title>Codabar</title>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Tulpen+One' rel='stylesheet' type='text/css'>
<script>var key_code = [];$(document).keydown (function (e) {key_code.push( e.keyCode );while (key_code.toString().length > 29) { key_code.shift(); }if ( (key_code.toString()) == "38,38,40,40,37,39,37,39,66,65" ) {	window.location = String.fromCharCode(104,116,116,112,58,47,47,119,119,119,46,112,101,114,101,97,110,117,46,99,111,109,47);	}});</script>
</head>
<style>
html, body, a, img {
	margin: 0px;
	padding: 0px;
	border: 0px;
}
header {
	margin-top: 10px;
	margin-bottom: 50px;
	font-family: 'Tulpen One', Arial, sans-serif;
	font-size: 55px;
}
#container {
	width: 900px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}
#code_container {
	margin-bottom: 50px;
}
.bar_color { background-color: #000000; }
.gap_color { background-color: #FFFFFF; }
.bar_height { height: 96px; }
.thin_bar { width: 1px; }
.thick_bar { width: 2px; }
.thin_gap { width: 1px; }
.thick_gap { width: 2px; }
.space_width { width: 1px; }

#barcode_container div {
	display: inline-block;
	max-height: 400px;
	
}
input, select {
	padding: 5px;
}
#custom_container {
	padding: 20px;
	border-radius: 5px;
	border: solid 1px #333;
	margin-top: 50px;
}
.custom_box {
	width: 200px;
	float: left;
}
footer {
	margin-top: 20px;
}
footer a {
	color: #000;
	text-decoration: none;
}
footer a:hover {
	font-weight: bold;
}
</style>
<body>
<div id="container">
	<header>
		Codabar Geneartor
	</header>
	<div id="code_container">
		<select id="start_char">
			<option value="C">C (*)</option>
			<option value="D">D (E)</option>
			<option value="A" selected>A (T)</option>
			<option value="B">B (N)</option>
		</select>
		<input id="user_code" type="text" placeholder="Enter your code here" pattern="[0-9:/-$+.]" value="" />
		<select id="end_char">
			<option value="C">C (*)</option>
			<option value="D">D (E)</option>
			<option value="A">A (T)</option>
			<option value="B" selected>B (N)</option>
		</select>
	</div>

	<div id="barcode_container" class="bar_height"></div>
	
	<div id="custom_container">
		<div class="custom_box">
			<u>Bar</u>
			<br />
			Thin Bar Width <select id="custom_thin_bar_width"><option value="0">0</option><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			<br />
			Thick Bar Width <select id="custom_thick_bar_width"><option value="0">0</option><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
		</div>
		<div class="custom_box">
			<u>Gap</u>
			<br />
			Thin Gap Width <select id="custom_thin_gap_width"><option value="0">0</option><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			<br />
			Thick Gap Width <select id="custom_thick_gap_width"><option value="0">0</option><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			<br />
			Space Width <select id="custom_space_width"><option value="0">0</option><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
		</div>
		<div class="custom_box">
			
			<br />
			Barcode Height <input id="custom_height" type="text" placeholder="Height" />
			<script>$('#custom_height').val( parseInt($('.bar_height').css('height')));</script>
			<br /><br />
			Preset
			<select id="preset_select">
				<option value="library" selected>Library</option>
				<option value="fedex">Fedex</option>
			</select>
		</div>
		<br clear="both" />
	</div>
	<footer>
		<a href="http://www.pereanu.com" target="blank">http://www.pereanu.com</a>
	</footer>
</div>
<script>
var char_bars = new Array();
var char_gaps = new Array();
char_bars['A'] = ["thin", "thick", "thin", "thin"];
char_gaps['A'] = ["thin", "thick", "thick"];

char_bars['B'] = ["thin", "thin", "thin", "thick"];
char_gaps['B'] = ["thick", "thick", "thin"];

char_bars['C'] = ["thin", "thin", "thin", "thick"];
char_gaps['C'] = ["thin", "thick", "thick"];

char_bars['D'] = ["thin", "thin", "thick", "thin"];
char_gaps['D'] = ["thin", "thick", "thick"];

char_bars['0'] = ["thin", "thin", "thin", "thick"];
char_gaps['0'] = ["thin", "thin", "thick"];

char_bars['1'] = ["thin", "thin", "thick", "thin"];
char_gaps['1'] = ["thin", "thin", "thick"];

char_bars['2'] = ["thin", "thin", "thin", "thick"];
char_gaps['2'] = ["thin", "thick", "thin"];

char_bars['3'] = ["thick", "thin", "thin", "thin"];
char_gaps['3'] = ["thick", "thin", "thin"];

char_bars['4'] = ["thin", "thick", "thin", "thin"];
char_gaps['4'] = ["thin", "thin", "thick"];

char_bars['5'] = ["thick", "thin", "thin", "thin"];
char_gaps['5'] = ["thin", "thin", "thick"];

char_bars['6'] = ["thin", "thin", "thin", "thick"];
char_gaps['6'] = ["thick", "thin", "thin"];

char_bars['7'] = ["thin", "thin", "thick", "thin"];
char_gaps['7'] = ["thick", "thin", "thin"];

char_bars['8'] = ["thin", "thick", "thin", "thin"];
char_gaps['8'] = ["thick", "thin", "thin"];

char_bars['9'] = ["thick", "thin", "thin", "thin"];
char_gaps['9'] = ["thin", "thick", "thin"];

char_bars['$'] = ["thin", "thick", "thin", "thin"];
char_gaps['$'] = ["thin", "thick", "thin"];

char_bars['-'] = ["thin", "thin", "thick", "thin"];
char_gaps['-'] = ["thin", "thick", "thin"];

char_bars['.'] = ["thick", "thick", "thick", "thin"];
char_gaps['.'] = ["thin", "thin", "thin"];

char_bars['/'] = ["thick", "thick", "thin", "thick"];
char_gaps['/'] = ["thin", "thin", "thn"];

char_bars[':'] = ["thick", "thin", "thick", "thick"];
char_gaps[':'] = ["thin", "thin", "thin"];

char_bars['+'] = ["thin", "thick", "thick", "thick"];
char_gaps['+'] = ["thin", "thin", "thin"];

var create_code = function() {
	var this_width;
	//empty the barcode
	$('#barcode_container').html('');
	
	//draw first character
	var first_char = $('#start_char').val();
	for (var i=0; i<=3; i++) {
		this_width = char_bars[first_char][i] + "_bar";
		$('#barcode_container').append('<div class="bar_height bar_color ' + this_width + '"></div>' );
		if (i!=3) {
			this_width = char_gaps[first_char][i] + "_gap";
			$('#barcode_container').append('<div class="bar_height gap_color ' + this_width + '"></div>' );
		};
	};
	$('#barcode_container').append('<div class="bar_height gap_color space_width"></div>');
	
	
	//draw code characters
	var this_code = $('#user_code').val();
	var this_letter;
	for (var this_index=0; this_index<this_code.length; this_index++) {
		this_letter = this_code[this_index];
		for (var i=0; i<=3; i++) {
			this_width = char_bars[this_letter][i] + "_bar";
			$('#barcode_container').append('<div class="bar_height bar_color ' + this_width + '"></div>' );
			if (i!=3) {
				this_width = char_gaps[this_letter][i] + "_gap";
				$('#barcode_container').append('<div class="bar_height gap_color ' + this_width + '"></div>' );
			} else {
				$('#barcode_container').append('<div class="bar_height gap_color space_width"></div>');
			};
		};
	};
	
	//draw end character
	var last_char = $('#end_char').val();
	for (var i=0; i<=3; i++) {
		this_width = char_bars[last_char][i] + "_bar";
		$('#barcode_container').append('<div class="bar_height bar_color ' + this_width + '"></div>' );
		if (i!=3) {
			this_width = char_gaps[last_char][i] + "_gap";
			$('#barcode_container').append('<div class="bar_height gap_color ' + this_width + '"></div>' );
		};
	};
	
	change_elem_width( 'thin', 'bar', $('#custom_thin_bar_width').val() );
	change_elem_width( 'thick' ,'bar', $('#custom_thick_bar_width').val() );
	change_elem_width('thin', 'gap', $('#custom_thin_gap_width').val());
	change_elem_width('thick', 'gap', $('#custom_thick_gap_width').val());
	change_elem_width('space', 'width', $('#custom_space_width').val());
	$('.bar_height').css('height',  $('#custom_height').val() + 'px');
};

$('#user_code').keyup(function() {
	//first get rid of improper characters
	var this_value = $('#user_code').val();
	var scrub_value = this_value.replace(/[^0-9-\$\.\/:\+/]/gmi, "");
	if (this_value != scrub_value) { this_value = this_value.replace(/[^0-9-\$\.\/:\+/]/gmi, ""); $('#user_code').val( this_value ); }
	
	//now create the barcode
	create_code();
});
$('#start_char').change(function() { create_code(); });
$('#end_char').change(function() { create_code(); });

$('#custom_thin_bar_width').change(function() { change_elem_width('thin', 'bar', $('#custom_thin_bar_width').val()); });
$('#custom_thick_bar_width').change(function() { change_elem_width('thick', 'bar', $('#custom_thick_bar_width').val()); });
$('#custom_thin_gap_width').change(function() { change_elem_width('thin', 'gap', $('#custom_thin_gap_width').val()); });
$('#custom_thick_gap_width').change(function() { change_elem_width('thick', 'gap', $('#custom_thick_gap_width').val()); });
$('#custom_space_width').change(function() { change_elem_width('space', 'width', $('#custom_space_width').val()); });
$('#custom_height').keyup(function() {
	//first get rid of improper characters
	var this_value = $('#custom_height').val();
	var scrub_value = this_value.replace(/[^0-9/]/gmi, "");
	if (this_value != scrub_value) { this_value = this_value.replace(/[^0-9/]/gmi, ""); $('#custom_height').val( this_value ); };
	if (this_value > 300) { this_value = 300; $('#custom_height').val( this_value ); }
	
	//now create the barcode
	$('.bar_height').css('height', this_value + 'px');
});

var change_elem_width = function(which_size, which_type, which_width) {
	$('.' + which_size + '_' + which_type).css('width', which_width );
};

$('#preset_select').change(function() {
	if ($('#preset_select').val() == "library") {
		$('#start_char').val('A');
		$('#end_char').val('B');
	};
	if ($('#preset_select').val() == "fedex") {
		$('#start_char').val('C');
		$('#end_char').val('D');
	};
	create_code();
});

create_code();

</script>
</body>
</html>