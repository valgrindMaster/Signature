<?php $name = 'Oliver Haynes'; ?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SimpleSigna</title>
	<link href="https://fonts.googleapis.com/css?family=Quicksand|Rambla:700|Dancing+Script|Playball|Seaweed+Script|Yesteryear" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<style type="text/css">

		html, body{
			margin: 0;
			padding: 0;
		}
		#fullsize{
			height: 100%;
			width: 100%;
		}
		.name{
			border: none;
			background-color: white;
			padding: 5px 20px;
			margin: 10px 15px;
			font-size: 22px;
		}
		#nameinput{
			display: block;
			width: 100%;
			text-align: center;
			border: 2px solid #edeeef;
			border-radius: 5px;
			margin: 30px 0;
		}
		#nameheader{
			text-align: center;
			font-size: 40px;
			margin: 10px 0;
		}
		.font1{
			font-family: 'Dancing Script', cursive;
		}
		.font2{
			font-family: 'Yesteryear', cursive;
		}
		.font3{
			font-family: 'Playball', cursive;
		}
		.font4{
			font-family: 'Seaweed Script', cursive;
		}
		#sig_popup{
			background-color: white;
			transform: scale(0.8);
			max-width: 825px;
			display: none;
		}
		.popup_visible #sig_popup{
			transform: scale(1);
		}
		.flex{
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
			justify-content: space-evenly;
		}
		.tab{
			display: inline-block;
			min-height: 50px;
		}
		#bootstrap-overrides h5{
			font-family: 'Rambla', sans-serif;
		}
		#bootstrap-overrides button:not(#cancel):not(#ex):not(.name){
			border: none;
			border-radius: 3px;
			background-color: #95ce29;
			padding: 5px 20px;
			margin: 10px 15px;
			font-family: 'Quicksand', sans-serif;
			font-weight: bold;
			font-size: 12px;
			color: white;
		}
		#bootstrap-overrides button:not(#cancel):not(#ex):not(.name):hover{
			background-color: #132b40;
			transition: 0.1s;
		}
		#bootstrap-overrides .sig-nav{
			background-color: #e9e9e9;
			padding: 10px 15px;
			text-align: center;
		}
		#bootstrap-overrides .modal-footer{
			display: block;
			padding: 0;
			margin: 0;
		}
		#bootstrap-overrides .sig-content{
			position: relative;
			padding: 15px;
		}
		#bootstrap-overrides #sig-directions{
			color: #bdbebf;
			text-align: center;
			font-size: 18px;
		}
		body#bootstrap-overrides div#sig_popup div.sig-content div.tab button.clear{
			color:#474747 !important;
			background-color:#e0e1e2 !important;
			transition: 0.2s !important;
			margin: 0 !important;
			text-align: left;
		}
		body#bootstrap-overrides div#sig_popup div.sig-content div.tab button.clear:hover{
			background-color: #bfbfbf !important;
			transition: 0.4s !important;
		}
		body#bootstrap-overrides div#sig_popup div.sig-content div.tab button.clear-abs{
			position: absolute;
			color:#474747 !important;
			background-color:#e0e1e2 !important;
			transition: 0.2s !important;
			bottom: 5px;
			left: 5px;
		}
		body#bootstrap-overrides div#sig_popup div.sig-content div.tab button.clear-abs:hover{
			background-color: #bfbfbf !important;
			transition: 0.4s !important;
		}
		#demo{
			border: none;
			border-radius: 3px;
			background-color: #95ce29;
			position: absolute;
			padding: 5px 20px;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			font-family: 'Quicksand', sans-serif;
			font-size: 12px;
			color: white;
		}
		#cancel{
			background-color: white;
			border: none;
		}
		.wrapper{
			position: relative;
			width: 400px;
			height: 200px;
			margin: 15px auto;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		.signature-pad{
			position: absolute;
			left: 0;
			top: 0;
			width:400px;
			height:200px;
			background-color: white;
			border: 3px solid #e8e8e8;
			border-radius: 3px;
		}
		#target{
			outline: 2px dashed #e8e8e8;
			min-height: 100px;
			margin: 25px 0;
		}
		#img-center{
			display: block;
			margin: auto;
		}
		.fileUpload{
			display: inline;
			border: none;
			border-radius: 3px;
			padding: 10px 25px;
			margin: 10px 15px;
			font-family: 'Quicksand', sans-serif;
			font-weight: bold;
			font-size: 12px;
			color: white;
			position: relative;
			overflow: hidden;
			background-color: #132b40;
			transition: 0.2s;
		}
		.fileUpload:hover{
			background-color: #2d80bc;
			transition: 0.2s;
		}
		.fileUpload input#myFile{
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
	</style>

</head>

<body id="bootstrap-overrides">

	<!-- Open popup. -->
	<button class="sig_open" id="demo">CLICK HERE FOR DEMO</button>

	<!-- Popup. -->
	<div id="sig_popup">

		<div class="modal-header">

			<h5 class="modal-title">CAPTURE SIGNATURE</h5>

			<button type="button" class="sig_close close" id="ex">
				<span aria-hidden="true">&times;</span>
			</button>

		</div>

		<div class="sig-nav">
			<div class="flex" id="sig-btns">
				<button type="button" id="0" onclick="switchTab(this.id)">TYPE SIGNATURE</button>
				<button type="button" id="1" onclick="switchTab(this.id)">DRAW SIGNATURE</button>
				<button type="button" id="2" onclick="switchTab(this.id)">UPLOAD SIGNATURE</button>
			</div>
		</div>

		<div class="sig-content">
			<div class="tab" id="fullsize">
				<h1 class="font1" id="nameheader"><?php echo $name; ?></h1>
				<input type="text" id="nameinput" name="nameinput" placeholder="<?php echo $name; ?>">
				<hr>
				<button class="name font1" id="1" onclick="switchFont(this.id)">
					<?php echo $name; ?>
				</button>
				<button class="name font2" id="2" onclick="switchFont(this.id)">
					<?php echo $name; ?>
				</button>
				<button class="name font3" id="3" onclick="switchFont(this.id)">
					<?php echo $name; ?>
				</button>
				<button class="name font4" id="4" onclick="switchFont(this.id)">
					<?php echo $name; ?>
				</button>
			</div>
			<div class="tab">
				<div class="wrapper">
					<canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
				</div>
				<h4 id="sig-directions">Sign Above</h4>
				<button class="clear-abs">CLEAR</button>
			</div>
			<div class="tab">
				<div class="fileUpload">
					<span>CHOOSE IMAGE</span>
					<input type="file" id="myFile" multiple size="50" onchange="uploadFile(this.id)">
				</div>
				<span>Upload a picture of your signature (PNG, JPG, JPEG, BMP, or GIF)</span>
				<div id="target">
					<img id="img-center" src="drop.png" width="120" height="auto">
				</div>
				<button class="clear">CLEAR<span id="filenames"></span></button>
			</div>
		</div>

		<div class="sig-nav">
			<small>
				By clicking Capture Signature, I agree that the signature will be the electronic representation of my signature when I (or my agreement manager) use it on a memorandum of agreement, which is a legally binding document - just the same as a pen-and-paper signature.
			</small>
		</div>

		<button type="button" id="save-sig">CAPTURE SIGNATURE</button>
		<button type="button" class="sig_close" id="cancel">Cancel</button>

	</div>

	<!-- jQuery, Bootstrap, Popupoverlay, Signature_Pad CDN. -->
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

	<script>
		var curr_id = 0;

		$(document).ready(function(){

			$('#0').css('backgroundColor', '#132b40');
			$('.sig-content > div:not(:first)').css('display', 'none');
			$('#sig_popup').css('display','block').popup({
				openelement: '.sig_open',
				closeelement: '.sig_close',
				transition: 'all 0.3s',
				escape: false
			});

			$("#nameinput").keyup(function(){
				var val = $('#nameinput').val();
				$('.name').html(val);
				$('#nameheader').html(val);
			});

			$("#myFile").change(function(){
				$("#filenames").html(': ' + $("#myFile").val().replace(/^.*\\/, ""));
			});

			var canvas = document.getElementById('signature-pad');
			function resizeCanvas(){
				var ratio =  Math.max(window.devicePixelRatio || 1, 1);
				canvas.width = canvas.offsetWidth * ratio;
				canvas.height = canvas.offsetHeight * ratio;
				canvas.getContext("2d").scale(ratio, ratio);
			}
			window.onresize = resizeCanvas;
			$('#sig_popup').on('shown.bs.modal', function (e){
				resizeCanvas()
				drawSignature()
			});
			var signaturePad = new SignaturePad(canvas, {});
			document.getElementById('save-sig').addEventListener('click', function(){
				if (signaturePad.isEmpty()) {
					return alert("Please provide a signature first.");
				}
				var data = signaturePad.toDataURL('image/png');
				window.open(data);
			});
			$('.clear-abs,.clear').on('click', function(){
				if (curr_id === '1'){
					signaturePad.clear();
				}
				if (curr_id === '2'){
					clearFileUpload();
				}
			});
		});

		function clearFileUpload(){
			var input = $("input[type='file']");
			input.html(input.html()).val('');
			$("#filenames").html('');
		}

		function switchTab(id){
			$('#sig-btns button').css('backgroundColor', '#95ce29');
			$('#'+id).css('backgroundColor', '#132b40');
			$('.sig-content > div').css('display','none');
			$('.sig-content > div').eq(id).css('display', 'block');
			curr_id = id;
		}

		function switchFont(id){
			$('#nameheader').removeClass();
			$('#nameheader').addClass('font' + id);
		}

		function uploadFile(id){
			var x = document.getElementById(id);
			var txt = "";
			if ('files' in x) {
				if (x.files.length == 0) {
					txt = "Select one or more files.";
				} else {
					for (var i = 0; i < x.files.length; i++) {
						txt += "<br><strong>" + (i+1) + ". file</strong><br>";
						var file = x.files[i];
						if ('name' in file) {
							txt += "name: " + file.name + "<br>";
						}
						if ('size' in file) {
							txt += "size: " + file.size + " bytes <br>";
						}
					}
				}
			} 
			else {
				if (x.value == "") {
					txt += "Select one or more files.";
				} else {
					txt += "The files property is not supported by your browser!";
					txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
				}
			}
			document.getElementById("demo").innerHTML = txt;
		}
	</script>

</body>
</html>
