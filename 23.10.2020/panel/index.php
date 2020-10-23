<?php
error_reporting(0);
session_start();

require_once('../antibot.php');
require_once('../antibot-config.php');

$Antibot = new Antibot;

if($_GET['cookies'] == 'delete'){ 

session_destroy();

?>

<script type="text/javascript">
	alert('Cookies Delete Success');
	window.location.href="/panel";
</script>

<?php }
if(isset($_POST['username']) && isset($_POST['password']) && $_POST['password'] == $config['password_panel']  && $_POST['username'] == $config['username_panel'] ){
	$_SESSION['login'] = true;
?>
	<script type="text/javascript">
		alert('Login Success');
		window.location.href="/panel";
	</script>
<?php } ?>
<!DOCTYPE html>
<html>
<head>
	<title>PANEL ANTIBOT</title>
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
	<?php
	if($_SESSION['login'] == false){ ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>DASHBOARD (V.2.6)</h1>
					<small>Real Visitor Detection Manager.</small><br>
					<hr>
				</div>
			</div> 
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color: #090;color: white;">Login</div>
					    <div class="panel-body">
							<form action="" method="post">
							  <div class="form-row">
							    <div class="form-group col-md-12">
							      <label for="inputEmail4">Username</label>
							      <input type="text" class="form-control" name="username">
							    </div>
							    <div class="form-group col-md-12">
							      <label for="inputEmail4">Password</label>
							      <input type="password" class="form-control" name="password">
							    </div>
							    <div class="form-group col-md-6">
							    	<label for="inputEmail4">-</label> 
							  		<input type="submit" value="Login" id="submit" class="form-control" />
							    </div>
							  </div>
							</form>
					    </div>
					</div>
				</div>
			</div>
		</div>
	<?php }else{ ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>DASHBOARD (V.2.6)</h1>
				<small>Real Visitor Detection Manager.</small><br>
				<small>** Full Manage In <a href="https://www.antibot.pw">https://www.antibot.pw</a> **</small>
				<hr>
			</div>
			<div class="col-md-2">
				<a href="https://antibot.pw" class="form-control">Goto Full Control</a>
				<br>
			</div>
			<div class="col-md-1">
				<a href="/panel/?cookies=delete" class="form-control">Logout</a>
				<br>
			</div>
		</div> 
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #090;color: white;">Generate Short URL</div>
				    <div class="panel-body">
						<form action="#" method="post">
						  <div class="form-row">
						    <div class="form-group col-md-12">
						      <label for="inputEmail4">URL / Domain</label>
						      <input type="text" class="form-control" placeholder="https://google.com" name="url" id="url">
						    </div>
						    <div class="form-group col-md-6">
						    	<label for="inputEmail4">-</label> 
						  		<input type="button" value="Create shortlink" id="submit" onclick="GenerateURL()" class="form-control" />
						    </div>
						  </div>
						</form>
				    </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #090;color: white;">Information</div>
				    <div class="panel-body">
						<p>To set type blocker / type device / change url. please go to antibot.pw</p>
						<hr>
				    </div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #090;color: white;">LIST URL SHORTLINK</div>
				    <div class="panel-body"> 
				    	<table id="data-domain" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                              <tr>
                                <th>KEYNAME</th>
                                <th>URL SHORTLINK</th>
                                <th>URL/DOMAIN</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                       </table>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-1.4.4.min.js"></script>
	 <script>
        GetAllShortlink();
        function loadTable(tableId, fields, data) {
        	var hostme = '<?= $_SERVER['HTTP_HOST'];?>/';
            var rows = '';
            $.each(data, function(index, item) {
              var row = '<tr>';

              $.each(fields, function(index, field) {
                row += '<td>' + item[field + ''] + '</td>';
                if(item[field + ''].length == 7){
                	row += '<td>' + 'https://<?= $_SERVER['HTTP_HOST'];?>/'+ item[field + ''] + '</td>';
                }
              });
              rows += row + '<tr>';
            });
            $('#' + tableId + ' tbody').html(rows);
        }
        function GetAllShortlink(){ 
        	$.get( "https://antibot.pw/api/users-shortlink?apikey=<?= $config['apikey'];?>", function( data ) {
			   loadTable('data-domain', ['keyname','url'], JSON.parse(data)['list']);
			});
        }
        function GenerateURL(){ 
        	var url 		= document.getElementById("url").value;
        	$.get( "https://antibot.pw/api/users-generate?apikey=<?= $config['apikey'];?>&url="+url, function( data ) {
			   if(JSON.parse(data)['status'] == true){
			   		alert(JSON.parse(data)['message']);
			   		window.location.href="/panel";
			   }else{
			   		alert(JSON.parse(data)['message']);
			   }
			});
        }
  	</script>
	<?php }?>
</body>
</html>