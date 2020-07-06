<?php
function biasa(){
	?><script type="text/javascript">
		var biasa1 = new Spry.Widget.ValidationTextField("biasa1","none",{validateOn:["blur"]});
		var biasa2 = new Spry.Widget.ValidationTextField("biasa2","none",{validateOn:["blur"]});
		var biasa3 = new Spry.Widget.ValidationTextField("biasa3","none",{validateOn:["blur"]});
		var biasa4 = new Spry.Widget.ValidationTextField("biasa4","none",{validateOn:["blur"]});
		var biasa5 = new Spry.Widget.ValidationTextField("biasa5","none",{validateOn:["blur"]});
		var biasa6 = new Spry.Widget.ValidationTextField("biasa6","none",{validateOn:["blur"]});
		var biasa7 = new Spry.Widget.ValidationTextField("biasa7","none",{validateOn:["blur"]});
		var biasa8 = new Spry.Widget.ValidationTextField("biasa8","none",{validateOn:["blur"]});
		var biasa9 = new Spry.Widget.ValidationTextField("biasa9","none",{validateOn:["blur"]});
		var biasa10 = new Spry.Widget.ValidationTextField("biasa10","none",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_biasa(){
	?>
		<span class="textfieldRequiredMsg">Harus diisi.</span>		
	<?php
}
function tgl(){
	?><script type="text/javascript">
		var tgl1 = new Spry.Widget.ValidationTextField("tgl1","date",{validateOn:["blur"]});
		var tgl2 = new Spry.Widget.ValidationTextField("tgl2","date",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_tgl(){
	?>
		<span class="textfieldRequiredMsg">Harus diisi.</span>
		<span class="textfieldInvalidFormatMsg">Masukan format nama.</span>
		
	<?php
}
function nama(){
	?><script type="text/javascript">
		var nama1 = new Spry.Widget.ValidationTextField("nama1","nama",{validateOn:["blur"]});
		var nama2 = new Spry.Widget.ValidationTextField("nama2","nama",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_nama(){
	?>
		<span class="textfieldRequiredMsg">Harus diisi.</span>
		<span class="textfieldInvalidFormatMsg">Masukan dengan format yang benar.</span>
		
	<?php
}
function email(){
	?><script type="text/javascript">
		var email1 = new Spry.Widget.ValidationTextField("email1","email",{validateOn:["blur"]});
		var email2 = new Spry.Widget.ValidationTextField("email2","email",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_email(){
	?>
		<span class="textfieldRequiredMsg">Harus diisi.</span>
		<span class="textfieldInvalidFormatMsg">Masukan format email.</span>
		
	<?php
}
function thn(){
	?><script type="text/javascript">
		var thn1 = new Spry.Widget.ValidationTextField("thn1","integer",{minChars:4,maxChars:4,validateOn:["blur"]});
		var thn2 = new Spry.Widget.ValidationTextField("thn2","integer",{minChars:4,maxChars:4,validateOn:["blur"]});
		var thn3 = new Spry.Widget.ValidationTextField("thn3","integer",{minChars:4,maxChars:4,validateOn:["blur"]});
		</script>
	<?php
}
function alert_thn(){
	?>
		<span class="textfieldRequiredMsg">Harus diisi.</span>
		<span class="textfieldInvalidFormatMsg">Masukan format tahun.</span>
		<span class="textfieldMaxCharsMsg">Maksimal 4 angka.</span>
		<span class="textfieldMinCharsMsg">Minimal 4 angka.</span>
	<?php	
}
function nomer(){
	?><script type="text/javascript">
		var nomer1 = new Spry.Widget.ValidationTextField("nomer1","integer",{validateOn:["blur"]});
		var nomer2 = new Spry.Widget.ValidationTextField("nomer2","integer",{validateOn:["blur"]});
		var nomer3 = new Spry.Widget.ValidationTextField("nomer3","integer",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_nomer(){
	?>
		<span class="textfieldRequiredMsg">Harus diisi.</span>
		<span class="textfieldInvalidFormatMsg">Masukan format angka.</span>
	<?php
}
function select(){
	?><script type="text/javascript">
		var select1 = new Spry.Widget.ValidationSelect("select1",{validateOn:["blur"]});
		var select2 = new Spry.Widget.ValidationSelect("select2",{validateOn:["blur"]});
		var select3 = new Spry.Widget.ValidationSelect("select3",{validateOn:["blur"]});
		var select4 = new Spry.Widget.ValidationSelect("select4",{validateOn:["blur"]});
		var select5 = new Spry.Widget.ValidationSelect("select5",{validateOn:["blur"]});
		var select6 = new Spry.Widget.ValidationSelect("select6",{validateOn:["blur"]});
		var select7 = new Spry.Widget.ValidationSelect("select7",{validateOn:["blur"]});
		var select8 = new Spry.Widget.ValidationSelect("select8",{validateOn:["blur"]});
		var select9 = new Spry.Widget.ValidationSelect("select9",{validateOn:["blur"]});
		var select10 = new Spry.Widget.ValidationSelect("select10",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_select(){
	?>
		<span class="selectRequiredMsg"> Harus diisi.</span>
	<?php
}
function radio(){
	?><script type="text/javascript">
		var radio1 = new Spry.Widget.ValidationConfirm("radio1",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_radio(){
	?>
		<span class="confirmRequiredMsg"><br/> Harus diisi.</span>
	<?php
}
function validasi(){
	?>

	<span class="textfieldRequiredMsg"><img src="../cancel_f2.png"width="10" height="10"> Bobot harus diisi.</span>
    <span class="textfieldInvalidFormatMsg"><img src="../cancel_f2.png"width="10" height="10"> Nilai harus berupa angka.</span>
    <!-- <span class="textfieldMaxCharsMsg"><img src="../cancel_f2.png"width="10" height="10"> Maksimal 3 angka.</span>
    <span class="textfieldMinValueMsg"><img src="../cancel_f2.png"width="10" height="10"> Minimal 1 persen.</span>
    <span class="textfieldMaxValueMsg"><img src="../cancel_f2.png"width="10" height="10"> Maksimal 100 persen.</span> -->
	<?php
}

function validasi1(){
?>
	<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2","integer");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11","integer",{maxChars:1,validateOn:["blur"]});

//-->
</script>
<?php
}
function textarea(){
	?><script type="text/javascript">
		var area1 = new Spry.Widget.ValidationTextarea("area1",{validateOn:["blur"]});
		var area2 = new Spry.Widget.ValidationTextarea("area2",{validateOn:["blur"]});
		var area3 = new Spry.Widget.ValidationTextarea("area3",{validateOn:["blur"]});
		var area4 = new Spry.Widget.ValidationTextarea("area4",{validateOn:["blur"]});
		</script>
	<?php
}
function alert_textarea(){
	?>
		<span class="textareaRequiredMsg">Harus diisi.</span>
	<?php
}
?>