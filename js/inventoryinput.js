function category(){

	var fm = document.getElementById('inventoryform');
	var type = document.getElementById('componenttype');
	var accessorytype = document.getElementById('accessorytype');
	var modificationtype = document.getElementById('modificationtype');
	var productname = document.getElementById('productname');
	var brand = document.getElementById('brand');
	var formfactor = document.getElementById('formfactor');
	var description = document.getElementById('description');
	var socket = document.getElementById('socket');
	var memory = document.getElementById('memory');
	var memslots = document.getElementById('memslots');
	var pcieslots = document.getElementById('pcieslots');
	var nosata = document.getElementById('nosata');
	var power = document.getElementById('power');
	var price = document.getElementById('price');
	var pic = document.getElementById('pic');
	var submit = document.getElementById('submit');

	




		

	if(type.value==''){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="hidden";//productname.setAttribute('type','hidden');
		brand.style.visibility="hidden";
		formfactor.style.visibility="hidden";
		description.style.visibility="hidden";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="hidden";
		price.style.visibility="hidden";

		productname.style.display="none";//productname.setAttribute('type','none');
		brand.style.display="none";
		formfactor.style.display="none";
		description.style.display="none";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="none";
		price.style.display="none";
		submit.style.visibility="hidden";
		submit.style.display="none";
		pic.style.visibility="hidden";
		pic.style.display="none";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";


	
	}else if(type.value=='mbd'){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','visible');
		brand.style.visibility="visible";
		formfactor.style.visibility="visible";
		description.style.visibility="visible";
		socket.style.visibility="visible";
		memory.style.visibility="visible";
		memslots.style.visibility="visible";
		pcieslots.style.visibility="visible";
		nosata.style.visibility="visible";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="block";
		description.style.display="block";
		socket.style.display="block";
		memory.style.display="block";
		memslots.style.display="block";
		pcieslots.style.display="block";
		nosata.style.display="block";
		power.style.display="block";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	
	}else if(type.value=='ram'){

		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="visible";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="block";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="block";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=='cab'){

		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="visible";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="hidden";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="block";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="none";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";


	}else if(type.value=='cpu'){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="visible";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="block";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="block";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=='gpu'){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="block";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=='hdd'){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="none";
		description.style.visibility="visible";
		socket.style.visibility="none";
		memory.style.visibility="none";
		memslots.style.visibility="none";
		pcieslots.style.visibility="none";
		nosata.style.visibility="none";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="block";
		price.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=='opd'){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="block";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=='psu'){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="visible";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="block";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=="acc"){
		accessorytype.style.visibility="visible";
		accessorytype.style.display="block";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="hidden";
		price.style.visibility="visible";

		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="none";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="hidden";
		modificationtype.style.display="none";

	}else if(type.value=="mod"){
		accessorytype.style.visibility="hidden";
		accessorytype.style.display="none";
		productname.style.visibility="visible";//productname.setAttribute('type','hidden');
		brand.style.visibility="visible";
		formfactor.style.visibility="hidden";
		description.style.visibility="visible";
		socket.style.visibility="hidden";
		memory.style.visibility="hidden";
		memslots.style.visibility="hidden";
		pcieslots.style.visibility="hidden";
		nosata.style.visibility="hidden";
		power.style.visibility="hidden";
		price.style.visibility="visible";
		
		productname.style.display="block";//productname.setAttribute('type','block');
		brand.style.display="block";
		formfactor.style.display="none";
		description.style.display="block";
		socket.style.display="none";
		memory.style.display="none";
		memslots.style.display="none";
		pcieslots.style.display="none";
		nosata.style.display="none";
		power.style.display="none";
		price.style.display="block";
		submit.style.visibility="visible";
		submit.style.display="block";
		pic.style.visibility="visible";
		pic.style.display="block";
		modificationtype.style.visibility="visible";
		modificationtype.style.display="block";

	}
}
