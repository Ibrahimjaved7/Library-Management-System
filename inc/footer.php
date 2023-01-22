

<script type="text/javascript" src="inc/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
	function add_new_book()
	{	
			var file = document.getElementById("book_img").value;
			$file = file.substr(12);
			$.post("controller.php", {	
				bname : document.getElementById("b_name").value,
				isbn : document.getElementById("isbn").value,
				desc : document.getElementById("Description").value,
				author : document.getElementById("b_author").value,
				edition : document.getElementById("edition").value,
				publication : document.getElementById("publication").value,
				img : $file,
				action : 'adddata'
			}, function(result) {
				var retid = jQuery.parseJSON(result);
				alert("Data Added");
			});
	}

	function delete_book()
	{	
			$.post("controller.php", {	
				isbn : document.getElementById("isbn").value,
				action : 'removedata'
			}, function() {
				alert("Data Removed");
			});
	}

	function view_book()
	{
		$.post("controller.php", {
			action : 'getitems'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			var table_format = '<table class="table table-hover">';
			table_format+= '<tr>';
			table_format+= '<th>Book Id</th>';
			table_format+= '<th>Book ISBN</th>';
			table_format+= '<th>Book Name</th>';
			table_format+= '<th>Author</th>';
			table_format+= '<th>Edition</th>';
			table_format+= '<th>Year of Publication</th>';
			table_format+= '<th>Quantity</th>';
			table_format+= '</tr>';
			for (var i = 0; i < fres['b_id'].length; i++) {
				table_format+= '<tr>';
				table_format+= '<td>'+fres["b_id"][i]+'</td>';
				table_format+= '<td>'+fres["isbn"][i]+'</td>';
				table_format+= '<td>'+fres["bname"][i]+'</td>';
				table_format+= '<td>'+fres["author"][i]+'</td>';
				table_format+= '<td>'+fres["edition"][i]+'</td>';
				table_format+= '<td>'+fres["publication"][i]+'</td>';
				table_format+= '<td>'+fres["quantity"][i]+'</td>';
				table_format+= '<td>  <button class="btn btn-outline-primary" onclick="displayDesc('+fres["b_id"][i]+')">Read More</button></td>';
				table_format+= '</tr>';	
			}
			table_format+= "</table>";
			document.getElementById("myid").innerHTML += table_format;

		});
		
	}

	function displayDesc($b_id)
	{
		document.getElementById("myid").style.display = "none";
		document.getElementById("return_back").style.display = "none";
		document.getElementById("desc").style.display = "block";
		$.post("controller.php", {
				
				bId : $b_id,

				action : 'displayDesc'
				
			}, function(result)
			{
				var fres = jQuery.parseJSON(result);
				var body = '';
				body += '<h3>Book Name</h3>'
				body += '<p>'+fres["bname"][0]+'</p>'
				body += '<h3>Book ISBN</h3>'
				body += '<p>'+fres["isbn"][0]+'</p>'
				body += '<h3>Book Descrption</h3>'
				body += '<p>'+fres["bdesc"][0]+'</p>'
				body += '<h3>Book Author</h3>'
				body += '<p>'+fres["author"][0]+'</p>'
				body += '<h3>Book Edition</h3>'
				body += '<p>'+fres["edition"][0]+'</p>'
				body += '<h3>Publication</h3>'
				body += '<p>'+fres["publication"][0]+'</p>'
				alert(fres["img"][0]);
				document.getElementById("b_image").src = 'uploads/'+fres["img"][0]+'';
				document.getElementById("desc_body").innerHTML = body;
			});		
	}

	function display_book_table()
	{
		document.getElementById("myid").style.display = "block";
		document.getElementById("return_back").style.display = "block";
		document.getElementById("desc").style.display = "none";
	}

  function getbookName()
	{
		var selectBox = document.getElementById("selectBook");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		$.post("controller.php", {
			bname : selectedValue,
			action : 'getbookName'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			var opt_format = ''
			for (var i = 0; i < fres['bname'].length; i++) {
				opt_format+= '<option value="'+fres["bname"][i]+'">'+fres["bname"][i]+'</option>';
			}
			document.getElementById("selectBook").innerHTML += opt_format;
		});
		
	}

	function getAllotbookName()
	{
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		$.post("controller.php", {
			rollno : selectedValue,
			action : 'getAllotbookName'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			var opt_format = ''
			for (var i = 0; i < fres['bname'].length; i++) {
				opt_format+= '<option value="'+fres["bname"][i]+'">'+fres["bname"][i]+'</option>';
			}
			document.getElementById("bname").innerHTML += opt_format;
		});
		
	}

	function getisbn()
	{
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		$.post("controller.php", {
			bname : selectedValue,
			action : 'getisbn'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			document.getElementById("isbn").value = fres['isbn'];
		});
		
	}

	function getbookdata()
	{
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		$.post("controller.php", {
			bname : selectedValue,
			action : 'getBookData'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			document.getElementById("form_book_update").style.display = "block";
			document.getElementById("isbn").value = fres['isbn'];
			document.getElementById("Description").value = fres['b_desc'];
			document.getElementById("b_author").value = fres['author'];
			document.getElementById("edition").value = fres['edition'];
			document.getElementById("publication").value = fres['publication'];

		});
		
	}

	function updateBook()
	{
			event.preventDefault();
			var selectBox = document.getElementById("selectBox");
	    var bname = selectBox.options[selectBox.selectedIndex].value;
			var file = document.getElementById("book_img").value;
			$file = file.substr(12);
			$.post("controller.php", {	
				bname : bname,
				isbn : document.getElementById("isbn").value,
				desc : document.getElementById("Description").value,
				author : document.getElementById("b_author").value,
				edition : document.getElementById("edition").value,
				publication : document.getElementById("publication").value,
				quantity : document.getElementById("Quantity").value,
				img : $file,
				action : 'addUpdateBook'
			}, function() {
				alert("Data Update");
			});
	}

	function add_new_allot()
	{	
		var selectBox = document.getElementById("selectBox");
    var rollno = selectBox.options[selectBox.selectedIndex].value;
		var name = document.getElementById("std_name").value;
		var selectBox = document.getElementById("selectBook");
    var bname = selectBox.options[selectBox.selectedIndex].value;
		var date_allot = document.getElementById("allot_date").value;
		var selectBox = document.getElementById("status");
    var status_allot = selectBox.options[selectBox.selectedIndex].value;

			$.post("controller.php", {
				
				std_rollno : rollno,
				std_name : name,
				b_name : bname,
				date : date_allot,
				sat : status_allot,

				action : 'addallotdata'
				
			}, function() {
			
				alert("Data Added");
				
			});		
		
	}

	function getstdRoll()
	{
		$.post("controller.php", {
			
			action : 'getstdroll'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			var opt_format = ''
			for (var i = 0; i < fres['id'].length; i++) {
				opt_format+= '<option value="'+fres["id"][i]+'">'+fres["id"][i]+'</option>';
			}
			document.getElementById("selectBox").innerHTML += opt_format;
		});
		
	}

	function getstdName()
	{
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		$.post("controller.php", {
			roll : selectedValue,
			action : 'getstdName'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			document.getElementById("std_name").value = fres['name'];
		});
		
	}


	function change_status()
	{	
		var selectBox = document.getElementById("selectBox");
    var rollno = selectBox.options[selectBox.selectedIndex].value;
    var selectBox = document.getElementById("bname");
    var bname = selectBox.options[selectBox.selectedIndex].value;
		var selectBox = document.getElementById("status");
    var status_allot = selectBox.options[selectBox.selectedIndex].value;
			
			$.post("controller.php", {	
				input1 : rollno,
				input2 : bname,
				input3 : status_allot,

				action : 'changedata'
			}, function() {
				alert("Status Changed");
			});
	}


	function view_allot()
	{
		$.post("controller.php", {
			action : 'getallotitems'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			var table_format = '<table class="table table-hover">';
			table_format+= '<tr>';
			table_format+= '<th>Allotment Id</th>';
			table_format+= '<th>Student Roll No</th>';
			table_format+= '<th>Student Name</th>';
			table_format+= '<th>Book Name</th>';
			table_format+= '<th>Allotment Date</th>';
			table_format+= '<th>Allotment Status</th>';
			table_format+= '</tr>';
			for (var i = 0; i < fres['a_id'].length; i++) {
				table_format+= '<tr>';
				table_format+= '<td>'+fres["a_id"][i]+'</td>';
				table_format+= '<td>'+fres["rollno"][i]+'</td>';
				table_format+= '<td>'+fres["sname"][i]+'</td>';
				table_format+= '<td>'+fres["b_allot"][i]+'</td>';
				table_format+= '<td>'+fres["date"][i]+'</td>';
				table_format+= '<td>'+fres["a_status"][i]+'</td>';
				table_format+= '</tr>';	
			}
			table_format+= "</table>";
			document.getElementById("myid").innerHTML += table_format;

		});
		
	}


	function add_new_std()
	{	
			$.post("controller.php", {	
				rollno : document.getElementById("rollno").value,
				name : document.getElementById("std_name").value,
				email : document.getElementById("email").value,
				add : document.getElementById("pac-input").value,
				lat : document.getElementById("lattitude").value,
				lon : document.getElementById("longitude").value,
				action : 'addstddata'
			}, function() {
				alert("Data Added");
			});
	}


function getstd()
	{
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

		$.post("controller.php", {
			roll : selectedValue,
			action : 'getstd'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			document.getElementById("std_name").removeAttribute('disabled');
			document.getElementById("pac-input").removeAttribute('disabled');

			document.getElementById("sbtbtn").style.display = 'none';
			document.getElementById("sbtbtn1").style.display = 'block';

			document.getElementById("std_name").value = fres['name'][0];
			document.getElementById("pac-input").value = fres['std_add'][0];
			document.getElementById("lattitude").value = fres['lat'][0];
			document.getElementById("longitude").value = fres['lon'][0];
		});
		
	}

	function updateStdData()
	{	
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
			$.post("controller.php", {	
				rollno : selectedValue,
				name : document.getElementById("std_name").value,
				add : document.getElementById("pac-input").value,
				lat : document.getElementById("lattitude").value,
				lon : document.getElementById("longitude").value,
				action : 'updateStdData'
			}, function() {
				alert("Data Updated");
				document.getElementById("sbtbtn").style.display = 'block';
				document.getElementById("sbtbtn1").style.display = 'none';
			});
	}

	function delete_std()
	{	
		var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
			$.post("controller.php", {	
				roll : selectedValue,
				action : 'removeStd'
			}, function() {
				alert("Data Removed");
			});
	}


	function view_std()
	{
		$.post("controller.php", {
			action : 'getstditems'
			
		}, function(result) {
			var fres = jQuery.parseJSON(result);
			var table_format = '<table class="table table-hover">';
			table_format+= '<tr>';
			table_format+= '<th>Student Id</th>';
			table_format+= '<th>Student Roll No</th>';
			table_format+= '<th>Student Name</th>';
			table_format+= '<th>Student Address</th>';
			table_format+= '</tr>';
			for (var i = 0; i < fres['std_id'].length; i++) {
				table_format+= '<tr>';
				table_format+= '<td>'+fres["std_id"][i]+'</td>';
				table_format+= '<td>'+fres["rollno"][i]+'</td>';
				table_format+= '<td>'+fres["sname"][i]+'</td>';
				table_format+= '<td>'+fres["s_add"][i]+'</td>';
				table_format+= '</tr>';	
			}
			table_format+= "</table>";
			document.getElementById("myid").innerHTML += table_format;

		});
		
	}

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('number');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}	


var map;

function initAutocomplete() {                            

		var map = new google.maps.Map(document.getElementById('map'), 
		{
			center : {
				lat : 30.3753,
				lng : 69.3451
			},
			zoom : 5
		});
	
	
		var options = {
		  componentRestrictions: {country: "pk"}
		};		
		
		var input = (document.getElementById('pac-input'));
		var autocomplete = new google.maps.places.Autocomplete(input, options);
		autocomplete.bindTo('bounds', map);
		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			draggable:true,
			map : map
			
		});

		autocomplete.addListener('place_changed', function() {
		var place = autocomplete.getPlace();
		var lattitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();	
		google.maps.event.addListener(marker, 'dragend', function (event) {
	    document.getElementById("lattitude").value = this.getPosition().lat();
	    document.getElementById("longitude").value = this.getPosition().lng();
		//Marker Location Changed
		document.getElementById("lattitude").value = this.getPosition().lat();
		document.getElementById("longitude").value = this.getPosition().lng();
});				

		//alert(lattitude + ' ' + longitude);
		document.getElementById("lattitude").value = lattitude;
		document.getElementById("longitude").value = longitude;		
			//Selected Place Changed
			
			//alert("Hello");

			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
				// Why 17? Because it looks good.
			}

			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			var address = '';
			if (place.address_components) {
				address = [(place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')].join(' ');
			}

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);

			// iterate through address_component array

		});
          
}	


</script>


