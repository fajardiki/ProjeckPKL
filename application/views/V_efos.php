<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #DC143C;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  min-height: 420px;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home {background-color: #ffffff;}
#News {background-color: #ffffff;}
#Contact {background-color: #ffffff;}
#About {background-color: #ffffff;}
</style>
</head>
<body>

	<div class="container-fluid">
		<form>
			<div class="row form-group">
				<div class="col-sm-4 mb-2">
				  <select class="form-control" id="sel1">
				    <option>1</option>
				    <option>2</option>
				    <option>3</option>
				    <option>4</option>
				  </select>
				</div>
				<div class="col-sm-4 mb-2">
				  	<select class="form-control" id="sel1">
				    	<option>1</option>
				    	<option>2</option>
				    	<option>3</option>
				    	<option>4</option>
				  	</select>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-danger">Danger</button>
				</div>
			  
			</div>
		</form>
	</div>

	<button class="tablink" onclick="openPage('Home', this, '#ff6666')" id="defaultOpen">Home</button>
	<button class="tablink" onclick="openPage('News', this, '#ff6666')">Plane</button>
	<button class="tablink" onclick="openPage('Contact', this, '#ff6666')">PJP</button>
	<button class="tablink" onclick="openPage('About', this, '#ff6666')">Time</button>

	<div id="Home" class="tabcontent">
	  <?php $this->load->View('efos/V_efos1') ?>
	</div>

	<div id="News" class="tabcontent">
	  <?php $this->load->View('efos/V_plane') ?>
	</div>

	<div id="Contact" class="tabcontent">
	  <?php $this->load->View('efos/V_pjpcomply') ?>
	</div>

	<div id="About" class="tabcontent">
	  <?php $this->load->View('efos/V_timeinmarket') ?>
	</div>

	<script>
	function openPage(pageName,elmnt,color) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablink");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].style.backgroundColor = "";
	  }
	  document.getElementById(pageName).style.display = "block";
	  elmnt.style.backgroundColor = color;
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	</script>
   
</body>
</html>