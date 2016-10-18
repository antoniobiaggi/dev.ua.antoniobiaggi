//ютф
$(document).ready(function() {
	if ($("#cart_id").val()){
		if($("#ac").val() == 1){
			if($("#fill").val()) {
				$("#city").val($("#id_city_delivery  option:selected").text());
				$("#delivery_city").val($("#id_city_delivery  option:selected").text());
				$("#address1").val($("#id_ware_delivery  option:selected").text());
				$("#delivery_address1").val($("#id_ware_delivery  option:selected").text());
			}
			// var selected1 = $('#opc-left-content');
			// if ($("div").is("#opc-left-content"))$.scrollTo(selected1, 1500);
			// var selected2 = $('#onepagecheckoutps_contenedor');
			// if ($("div").is("#onepagecheckoutps_contenedor"))$.scrollTo(selected2, 1500);

		}
		else{
			// var selected = $('#HOOK_BEFORECARRIER');
			// if ($("div").is("#HOOK_BEFORECARRIER"))$.scrollTo(selected, 1500);
		}
	}
});

function gettrueurl(){
	return $("#module_dir").val()+"/classes/refresh.php";
}

function clearJSON(result){
	var position = result.indexOf("{");
	console.warn(result.substring(0,position));
	return jQuery.parseJSON(result.substring(position));
}


function changecarrier(id_order) {
	var url = gettrueurl();
	var data = {mode: "changecarrier", id_order:id_order};
	if (!!$.prototype.fancybox){
		$.fancybox({
			title  : null,
			padding: 25,
			type   : 'ajax',
			href   : url+"?mode=changecarrier&id_order="+id_order,
			ajax   :{
			},
			helpers: {
				overlay: {
					locked: false
				}
			},
    		afterClose: function () {
                parent.location.reload();
            }
		});
	}
}

function changecarr(id_order, carrier) {
	var url = gettrueurl();
	var data = {mode: "changecarr", id_order:id_order, carrier:carrier};
	$.ajax({data:data, url:url,});
}

function changecarrier_np(id_order) {
	var url = gettrueurl();
	var data = {mode: "changecarr_np", id_order:id_order};
	$.ajax({data:data, url:url,});
	parent.location.reload();
}

function refreshdelivery(cart) {
	var url = gettrueurl();
	var cart_qties = $("#cart_qty").val();
	var size = [];
	if($("#nal").attr("checked") == 'checked'){
		var nal = 1;
	}else{
		var nal = 0;
	}
	if($("#customsize").attr("checked") == 'checked'){
		var customsize = 1;
		size[0] =[];
		size[0][0] = $("#width").val();
		size[0][1] = $("#height").val();
		size[0][2] = $("#depth").val();
		size[0][3] = $("#weight").val();
		size[0][4] = $("#qty").val();
		size[0][5] = $("#price").val();
	}else{
		var customsize = 0;
		for (var i = 0; i < cart_qties; i++) {
			size[i] =[];
			size[i][0] = $("#width"+i).val();
			size[i][1] = $("#height"+i).val();
			size[i][2] = $("#depth"+i).val();
			size[i][3] = $("#weight"+i).val();
			size[i][4] = $("#qty"+i).val();
			size[i][5] = $("#price"+i).val();
		}
	}
	var data = {
		mode      :"refreshdelivery", 
		customer  :$("#customer").val(),
		area      :$("#id_area_delivery").val(),
		city      :$("#id_city_delivery").val(),
		ware      :$("#id_ware_delivery").val(),
		nal       :nal,
		customsize:customsize,
		cart_qties:cart_qties, 
		sizes     :JSON.stringify(size),
		cart      :cart,
	};
	$.ajax({		
		data:data, url:url,allow_refresh:1,
		success: function(html) {
			$("#refreshdelivery").html(html);
			if($("#ac").val() != 1){
				//window.location = window.location.href.toString().replace("?step=2", "") + "?step=2";
			}
		}
	});
}


function refreshcity() {
	var url = gettrueurl();
	var data = {
		mode: "city", 
		area: $("#id_area_delivery").val(), 
	};
	$.ajax({
		datatype: "json",
		data: data, url: url, async:false,
		success: function(result) {
			a = clearJSON(result);
			var objSel = document.getElementById("id_city_delivery"); 
			objSel.options.length = 0;
			for (key in a) {
				objSel.options[objSel.options.length] = new Option(a[key], key);
			}
			var obj = objSel.previousElementSibling;
			if (obj.tagName == 'SPAN')
				obj.innerHTML = objSel.options[0].text;
			refreshware();
			delaysave(4000);
		}
	});
}


function refreshware() {
	if($("#fill").val() &&  $("#ac").val()) {
		$("#city").val($("#id_city_delivery  option:selected").text());
		$("#delivery_city").val($("#id_city_delivery  option:selected").text());
	}
	var url = gettrueurl();
	var data = {
		mode: "ware", 
		city: $("#id_city_delivery").val(), 
	};
	$.ajax({
		datatype: "json",
		data: data, url: url, async:false,
		success: function(result) {
			a = clearJSON(result);
			var objSel = document.getElementById("id_ware_delivery"); 
			objSel.options.length = 0;
			for (key in a) {
				objSel.options[objSel.options.length] = new Option(a[key], key);
			}
			var obj = objSel.previousElementSibling;
			if (obj.tagName == 'SPAN')
				obj.innerHTML = objSel.options[0].text;
			delaysave(4000);
		}
	});
	
}

function delaysave(timeout){
	if($("#fill").val() &&  $("#ac").val()) {
		$("#address1").val($("#id_ware_delivery  option:selected").text());
		$("#delivery_address1").val($("#id_ware_delivery  option:selected").text());
	}
	if (typeof timeoutId !== 'undefined') clearTimeout(timeoutId);
	timeoutId = setTimeout('saveform(0)', timeout);
}

function saveform(updated) {
	if($("#fill").val() &&  $("#ac").val()) {
		$("#address1").val($("#id_ware_delivery  option:selected").text());
		$("#delivery_address1").val($("#id_ware_delivery  option:selected").text());
	}
	if (typeof timeoutId !== 'undefined') clearTimeout(timeoutId);
	var url = gettrueurl();
	if($("#nal").attr("checked") == 'checked'){
		var nal = 1;
	}else{
		var nal = 0;
	}
	if($("#customsize").attr("checked") == 'checked'){
		var customsize = 1;
	}else{
		var customsize = 0;
	}
	if ($("#np_lastname").val() == ""){$("#np_lastname").val($("#lastname").val())}
	if ($("#np_firstname").val() == ""){$("#np_firstname").val($("#firstname").val())}
	if ($("#np_phone").val() == ""){$("#np_phone").val($("#phone").val())}

	var data = {
		mode      :"saveform", 
		customer  :$("#customer").val(),
		cart      :$("#cart_id").val(),
		area      :$("#id_area_delivery").val(),
		city      :$("#id_city_delivery").val(),
		ware      :$("#id_ware_delivery").val(),
		total_wt  :$("#total_wt").val(),
		lastname  :$("#np_lastname").val(),
		firstname :$("#np_firstname").val(),
		phone     :$("#np_phone").val(),
		msg       :$("#msg").val(),
		nal       :nal,
		customsize:customsize,
		weight	  :$("#weight").val(),
		vweight   :$("#width").val()*$("#height").val()*$("#depth").val()/4000,
	};
	$.ajax({
		datatype: "json",
		data:data, url:url, async:false,
		success: function(result) {
			if ($("#customer").val() == -1) return;
			//if (updated) parent.location.reload();
			a = clearJSON(result);
			if (a['Cost'] != $("#npcost").val() && $("#fixcost").val() != 1) 
				if ($("#ac").val()==1 || $("div").is("#opc_delivery_methods")) location.reload();
				else window.location = window.location.href.toString().replace("?step=2", "") + "?step=2";
			$("#np_cost").text(a['Cost']);
			$("#npcost").val(a['Cost']);
			$("#np_costredelivery").text(a['CostRedelivery']);
			//fixaddress();
			
		}
	});

	
}

function fixaddress(){
	var url = gettrueurl();
	var data2 = {
		mode: "fixaddress", 
		cart: $("#cart_id").val(), 
	};
	$.ajax({
		datatype: "json", data: data2, url: url, async:false,
		success: function(result) {
			if(document.getElementById("id_address_delivery")){
				setTimeout('addresslist()', 50);
			}
		}
	});
}

function addresslist(){
	$("#city").val($("#id_city_delivery option:selected").text());
	$("#delivery_city").val($("#id_city_delivery  option:selected").text());
	$("#postcode").val("00000");
	$("textarea#address1").val($("#id_ware_delivery option:selected").text());
	$("#delivery_address1").val($("#id_ware_delivery  option:selected").text());
	var url = gettrueurl();
	var data2 = {
		mode: "addresslist", 
		cart: $("#cart_id").val(), 
		np:$("#np").val()
	};
	$.ajax({
		datatype: "json", data: data2, url: url,
		success: function(result) {
			if(document.getElementById("id_address_delivery")){
				a = clearJSON(result);
				var addresslist = a.list;
				var id_address_delivery = a.id_address_delivery;
				var objSel = document.getElementById("id_address_delivery"); 
				objSel.options.length = 0;
				for (key in addresslist) {
					objSel.options[objSel.options.length] = new Option(addresslist[key], key);
				}
				//$('select[name="id_address_delivery"]').find('option[value='+id_address_delivery+']').attr("selected",true);
				$(function() {
					$("#id_address_delivery").val(id_address_delivery);
				});
				var obj = objSel.previousElementSibling;
				if (obj.tagName == 'SPAN')
					obj.innerHTML = objSel.options[objSel.selectedIndex].text;
				//document.getElementById("address_delivery").style.display="none"; 
				//document.getElementById("address_invoice").style.display="none"; 
			}
		}
	});
}

function makettn(id_order,update) {
	if ($("#msg").val().length > $("#TrimMsg").val()){
		alert("Длинное описание! - "+$("#msg").val().length+ " символов");
		return;
	}
	if (update == 1) mode = "updatettn"; else mode = "makettn";
	var data = { 
		mode:mode, 
		id_order:id_order,
		firstname:$("#firstname").val(),
		lastname:$("#lastname").val(),
		phone:$("#phone").val(),
		ware:$("#id_ware_delivery").val(),
		city:$("#id_city_delivery").val(),
		area:$("#id_area_delivery").val(),
		data:$("#data").val(),
		nal_check:Number($("#nal_check").attr("checked") == 'checked'),
		pay_check:Number($("#pay_check").attr("checked") == 'checked'),
		nal_pay_check:Number($("#nal_pay_check").attr("checked") == 'checked'),
		weight:$("#weight").val(),
		vweight:$("#vweight").val(),
		insurance:$("#insurance").val(), 
		cod_value:$("#cod_value").val(), 
		description:$("#description").val(), 
		pack:$("#pack").val(),
		PackingNumber:$("#PackingNumber").val(),
		msg:$("#msg").val(),
		seats_amount:$("#seats_amount").val(),
	}
	
	$.ajax({		
		data:data, url:gettrueurl(),
		success: function(html) {
			$("#result").html(html);
			setTimeout('location.reload()', 2000);
		}
	});
//	location.reload();
}

function deletettn(id_order) {
	var url = gettrueurl();
	var data = {mode: "deletettn", id_order: id_order};
	$.ajax({		
		data:data, url:url,
		success: function(html) {
			//$("#ttn").empty();
			//$("#ttn").append(html);
			setTimeout('location.reload()', 500);
		}
	});
	
}

function cost() {
	if ($("#msg").val().length > $("#TrimMsg").val()){
		alert("Длинное описание! - "+$("#msg").val().length+ " символов");
		return;
	}
	var url = gettrueurl();
	var data = {
		mode: "cost", 
		id_order:$("#id_order").val(),
		firstname:$("#firstname").val(),
		lastname:$("#lastname").val(),
		phone:$("#phone").val(),
		ware:$("#id_ware_delivery").val(),
		city:$("#id_city_delivery").val(),
		area:$("#id_area_delivery").val(),
		nal_check:Number($("#nal_check").attr("checked") == 'checked'),
		pay_check:Number($("#pay_check").attr("checked") == 'checked'),
		nal_pay_check:Number($("#nal_pay_check").attr("checked") == 'checked'),
		weight:$("#weight").val(),
		vweight:$("#vweight").val(),
		insurance:$("#insurance").val(), 
		cod_value:$("#cod_value").val(), 
		description:$("#description").val(), 
		pack:$("#pack").val(),
		msg:$("#msg").val(),
		seats_amount:$("#seats_amount").val(),
	};
	console.warn(data);
	$.ajax({		
		data:data, url:url,
		success: function(html) {
			$("#result").html(html);
		}
	});
	setTimeout('location.reload()', 1000);
}

function splitorder(id_order) {
	var url = gettrueurl();
	var data = {mode: "splitorder", id_order: id_order};
	$.ajax({		
		data:data, url:url,	async:false,
		success: function(html) {
			$("#result").html(html);
		}
	});
	setTimeout('location.reload()', 1000);
}


function copy(item) {
	var item_od = item+"_od";
	var url = gettrueurl();
	var data = {mode: "copy", id_order: $("#id_order").val()};
	$.ajax({
		datatype: "json",
		async:false,
		data:data, 
		url:url,
		success: function(result) {
			a = clearJSON(result);
			$("#"+item).val(a[item_od]);
		}
	});
}

function copy2(item) {
	var item_od = item+"_od";
	var url = gettrueurl();
	var data = {mode: "copy2", id_order: $("#id_order").val()};
	$.ajax({
		datatype: "json",
		async:false,
		data:data, 
		url:url,
		success: function(result) {
			a = clearJSON(result);
			$("#"+item).val(a[item_od]);
		}
	});
}

function checkpackage(deklaracia,order) {
	var url = gettrueurl();
	$("#result").empty();
	var data = {mode: "checkpackage", deklaracia: deklaracia, order:order};
	$.ajax({		
		data:data, url:url,
		success: function(html) {
			$("#result").html(html);
		}
	});
}

function length_check(len_max, field_id, counter_id) {
    var len_current = $("#"+field_id).val().length;
    var rest = len_max - len_current;
	document.getElementById(counter_id).firstChild.data = rest;
}
