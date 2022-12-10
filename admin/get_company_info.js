$(document).ready(function(){  
	// code to get all records from table via select box
	console.log("Hello");
	$("#company").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'id='+ id;    
		$.ajax({
			url: 'dropdowninfo.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(data) {
					$("#address").text(data.address);
					$("#phone").text(data.phone);
					$("#about").text(data.about);
					$("#companyName").text(data.name);
			} 
		});
 	}) 
});