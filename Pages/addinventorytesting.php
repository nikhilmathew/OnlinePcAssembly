<?php
include("layoutret.php");
?>
<html>
<head>
<link rel="javascript" type="text/javascript" href="../js/inventoryinput.js">
<style>
#formbody{
	position: absolute;
	width:70%;
	margin-left: auto;
	margin-right: auto;
}
#formcontainer{
	position: absolute;
	text-align:center;
	margin-top:160px;
	width:90%;
	margin-right:auto;
	margin-left: auto;
	-webkit-border-image: url(../css/border.png) 15 30 round; /* Safari 3.1-5 */
    -o-border-image: url(../css/border.png) 15 30 round; /* Opera 11-12.1 */
    border-image: url(../css/border.png) 15 30 round;

}
.textdiv{
	position:relative;
	width:20%;
	max-width:60%;
	padding:10px;
	margin:5px auto 5px auto;
	border:2px solid  ;
	border-color: black;
	visibility:hidden;
	display:none;
	}

</style>
<script type="text/javascript" src="../js/inventoryinput.js"></script>
<title>Inventory Expansion</title>
</head>

<body>
<div id="formbody">
<div id="formcontainer">
<form action="addtoinventorytesting.php" method="post" id="inventoryform" enctype="multipart/form-data">
	<label for="type_of_component">enter the product type</label>
	<select id="componenttype" name="type_of_component" onchange="category()" >
		<option value="" selected>--</option>
		<option value="mbd">Motherboard </option>
		<option value="cab">Cpu Cabinet </option>
		<option value="cpu">Processor </option>
		<option value="ram">Ram Module</option>
		<option value="gpu">Graphic Card </option>
		<option value="hdd">Hard Disk </option>
		<option value="opd">Optical Drive</option>
		<option value="psu">Power Supply Units</option>
		<option value="acc">Accessories</option>
		<option value="mod">Modifications</option>
		
		
		
	</select>
	<br>
	<div class="textdiv" id="accessorytype">
	<label for="accessorytype">enter the accessory type</label>
	<select  name="typeofaccessory"  >
		<option value="key">Keyboard </option>
		<option value="mou">Mouse </option>
		<option value="hea">Headsets </option>
		<option value="gam">Gamepads </option>
	</select>
	</div>
	<br>
	<div class="textdiv" id="modificationtype">
	<label for="modificationtype">enter the Modification type</label>
	<select  name="typeofmod"  >
		<option value="lig">Lighting </option>
		<option value="coo">Cooling </option>
		<option value="bod">Bodypaint </option>
		<option value="bra">Braided Cables </option>
	</select>
	</div>

	<div class="textdiv" id="productname"><label for="productname">enter the product name</label><input type="text" name="productname"></div>
	
	<div class="textdiv" id="brand"><label for="brand">Brand</label><input type="text" name="brand" ></div>
	<!--<div class="textdiv" id="brand"><label for="brand">Brand</label><input name="brand"></select></div>
	<?php//  $b = msqli_query($conn,"select * from brands")</div>?>-->
	

	<div class="textdiv" id="formfactor"><label for="formfactor" >Form Factor</label><input type="text" name="formfactor"></div>
	

	<div class="textdiv" id="description"><label for="description">Product Description</label><textarea name="description"></textarea></div>
	

	<div class="textdiv" id="socket"><label for="socket">Socket Type</label><input type="text" name="socket"></div>
	

	<div class="textdiv" id="memory"><label for="memory">Memory Type</label><input type="text" name="memory" ></div>
	

	<div class="textdiv" id="memslots"><label for="memslots">No of Memory Slots</label><input type="text" name="memslots"></div>
	

	<div class="textdiv" id="pcieslots"><label for="pcieslots">No of PCIe Slots</label><input type="text" name="pcieslots"></div>
	

	<div class="textdiv" id="nosata"><label for="nosata">No of Sata Ports</label><input type="text" name="nosata"></div>
	

	<div class="textdiv" id="power"><label for="power">Power Consumption</label><input type="text" name="power"></div>
	

	<div class="textdiv" id="price"><label for="price">Product Price</label><input type="text" name="price"></div>
	

	<br>
	<div class="textdiv" id="pic"><label for="pic">Product Picture</label><input type="file" name="fileToUpload" id="fileToUpload"></div>
	<br>
	<div class="textdiv" id="submit"><input type="submit" name="submit" value="add to inventory"></div>

</form>
</div>
</div>
</body>
</html>
