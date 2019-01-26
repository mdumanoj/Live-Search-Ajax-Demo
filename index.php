<?php include 'dbconnect.php' ?>
<html>
	<head>
		<title>Live Search</title>
		<script src="jquery-2.1.0.js"></script>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<script type="text/javascript">
		$(function() {
			$(".search").keyup(function() {
				var searchId = $(this).val();
				var datastring = 'search='+searchId;
				if(searchId != "") {
					$.ajax({
						type: "POST",
						url: "search.php",
						data: datastring,
						cache: false,
						success: function(html) {
							$('#suggest').html(html).show();
						}
					});  
				}
				return false;	
			});
		
	/*		jQuery("#suggest").live("click",function(e) {
				var $clicked = $(e.target);
				var $name = $clicked.find('name').html();
				var decode = $("<div/>").html($name).text();
				$('#searchid').val(decode);
			}); */
			
			jQuery(document).on("click",null,function(e) { 
				var $clicked = $(e.target);
				if (!$clicked.hasClass("search")){
					jQuery("#suggest").fadeOut(); 
				}
			}); 

			$("#searchid").click(function() {
				jQuery("#suggest").fadeIn();
			}); 
		});
	</script>
	
	<body>
		<hr>
		<h1>Live Search Engine Testing</h1>
		<hr>
		<div class="txt">
			<form method="post" action="index.php">
				<table cellpadding='5'>
					<tr>
						<td style="font-size:22px; text-align:center; font-weight:bold;">Enter Text</td>
					</tr>
					<tr>
						<td><input type="text" name="search" class="search" id="searchid" placeholder="Search by Name or Rollno." required></td>
						<td><input type=submit class="button" value="Search"/></td>
					</tr>
				</table>
			</form>
		</div>
		<div id="suggest">
		</div>
	</body>
</html>