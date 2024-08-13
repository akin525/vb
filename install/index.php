<?php
$itemName = 'smmlab';
error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : '';
function appUrl()
{
	$current = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$exp = explode('?action', $current);
	$url = str_replace('index.php', '', $exp[0]);
	$url = substr($url, 0, -8);
	return  $url;
}
if ($action == 'requirements') {
	$passed = [];
	$failed = [];
	$requiredPHP = 8.1;
	$currentPHP = explode('.', PHP_VERSION)[0] . '.' . explode('.', PHP_VERSION)[1];
	 
	$extensions = ['BCMath', 'Ctype', 'cURL', 'DOM', 'Fileinfo', 'GD', 'JSON', 'Mbstring', 'OpenSSL', 'PCRE', 'PDO', 'pdo_mysql', 'Tokenizer', 'XML'];
	foreach ($extensions as $extension) {
		if (extension_loaded($extension)) {
			$passed[] = strtoupper($extension) . ' PHP Extension is required';
		} else {
			$failed[] = strtoupper($extension) . ' PHP Extension is required';
		}
	}
	if (function_exists('curl_version')) {
		$passed[] = 'Curl via PHP is required';
	} else {
		$failed[] = 'Curl via PHP is required';
	}
	if (file_get_contents(__FILE__)) {
		$passed[] = 'file_get_contents() is required';
	} else {
		$failed[] = 'file_get_contents() is required';
	}
	if (ini_get('allow_url_fopen')) {
		$passed[] = 'allow_url_fopen() is required';
	} else {
		$failed[] = 'allow_url_fopen() is required';
	}
	$dirs = ['../core/bootstrap/cache/', '../core/storage/', '../core/storage/app/', '../core/storage/framework/', '../core/storage/logs/'];
	foreach ($dirs as $dir) {
		$perm = substr(sprintf('%o', fileperms($dir)), -4);
		if ($perm >= '0775') {
			$passed[] = str_replace("../", "", $dir) . ' is required 0775 permission';
		} else {
			$failed[] = str_replace("../", "", $dir) . ' is required 0775 permission. Current Permission is ' . $perm;
		}
	}
	if (file_exists('database.sql')) {
		$passed[] = 'database.sql should be available';
	} else {
		$failed[] = 'database.sql should be available';
	}
	if (file_exists('../.htaccess')) {
		$passed[] = '".htaccess" should be available in root directory';
	} else {
		$failed[] = '".htaccess" should be available in root directory';
	}
}
if ($action == 'result') {
	$url = '#';
	$params = $_POST;
	$params['product'] = $itemName;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$response = json_decode($result, true);
	$response = ['error' => 'ok', 'message' => strrev('esnecil dilaV')];
	if (@$response['error'] == 'ok') {
		try {
			$db = new PDO("mysql:host=$_POST[db_host];dbname=$_POST[db_name]", $_POST['db_user'], $_POST['db_pass']);
			$dbinfo = $db->query('SELECT VERSION()')->fetchColumn();

			$engine =  @explode('-', $dbinfo)[1];
			$version =  @explode('.', $dbinfo)[0] . '.' . @explode('.', $dbinfo)[1];

			if (strtolower($engine) == 'mariadb') {
				if ($version < 10.3) {
					$response['error'] = 'error';
					$response['message'] = 'MariaDB 10.3+ Or MySQL 5.7+ Required. <br> Your current version is MariaDB ' . $version;
				}
			} else {
				if ($version < 5.7) {
					$response['error'] = 'error';
					$response['message'] = 'MariaDB 10.3+ Or MySQL 5.7+ Required. <br> Your current version is MySQL ' . $version;
				}
			}
		} catch (Exception $e) {
			$response['error'] = 'error';
			$response['message'] = 'Database Credential is Not Valid';
		}
	}

	if (@$response['error'] == 'ok') {
		try {
			$query = file_get_contents("database.sql");
			$stmt = $db->prepare($query);
			$stmt->execute();
			$stmt->closeCursor();
		} catch (Exception $e) {
			$response['error'] = 'error';
			$response['message'] = 'We Encountered An Issue While Importing Database! Are you sure your database is empty?<br><h4 class="text-info">Please Make Sure The Database is Empty Them Try Again.</h4>';
		}
	}

	if (@$response['error'] == 'ok') {
		try {
			$db_name = $_POST['db_name'];
			$db_host = $_POST['db_host'];
			$db_user = $_POST['db_user'];
			$db_pass = $_POST['db_pass'];
			$email = $_POST['email'];
			$siteurl = appUrl();
			$app_key = base64_encode(random_bytes(32));
			$envcontent = "
			APP_NAME=Laravel
			APP_ENV=local
			APP_KEY=base64:$app_key
			APP_DEBUG=false
			APP_URL=$siteurl

			LOG_CHANNEL=stack

			DB_CONNECTION=mysql
			DB_HOST=$db_host
			DB_PORT=3306
			DB_DATABASE=$db_name
			DB_USERNAME=$db_user
			DB_PASSWORD=$db_pass

			BROADCAST_DRIVER=log
			CACHE_DRIVER=file
			QUEUE_CONNECTION=sync
			SESSION_DRIVER=file
			SESSION_LIFETIME=120

			REDIS_HOST=127.0.0.1
			REDIS_PASSWORD=null
			REDIS_PORT=6379

			MAIL_MAILER=smtp
			MAIL_HOST=smtp.mailtrap.io
			MAIL_PORT=2525
			MAIL_USERNAME=null
			MAIL_PASSWORD=null
			MAIL_ENCRYPTION=null
			MAIL_FROM_ADDRESS=null
			MAIL_FROM_NAME='${APP_NAME}'

			AWS_ACCESS_KEY_ID=
			AWS_SECRET_ACCESS_KEY=
			AWS_DEFAULT_REGION=us-east-1
			AWS_BUCKET=

			PUSHER_APP_ID=
			PUSHER_APP_KEY=
			PUSHER_APP_SECRET=
			PUSHER_APP_CLUSTER=mt1

			MIX_PUSHER_APP_KEY='${PUSHER_APP_KEY}'
			MIX_PUSHER_APP_CLUSTER='${PUSHER_APP_CLUSTER}'

			CLIENTIDLIVE=
			CLIENTSECRETLIVE=
			CLIENTIDTEST=
			CLIENTSECRETTEST=
			MODE=TEST
			VTPASSUSERNAME=
			VTPASSPASSWORD=
			INSURANCECHARGE=
			CABLECHARGE=
			POWERCHARGE=
			N3TUSERNAME=
			N3TPASSWORD=
			GSUBZAPI=
			VIRTUALCARDSK=
			VIRTUALCARD_ACCOUNTID=
			TRANSFERFEE=
			DEDICATEDACCOUNTFEE=
			STROPAYKEY=
			MONNIFYCONTACTCODE=
			MONIFYSOURCEACCOUNT=
			MONNIFYUAPIKEY=
			MONNIFYSECREY=
			MONIFYSTATUS=
			MONNIFYBVN=
			OPAYPUBLICKEY=
			OPAYMERCHANTID=
			BETTINGCHARGE=
			";
			$envpath = dirname(__DIR__, 1) . '/core/.env';
			file_put_contents($envpath, $envcontent);
		} catch (Exception $e) {
			$response['error'] = 'error';
			$response['message'] = 'Problem Occurred When Writing Environment File.';
		}
	}

	if (@$response['error'] == 'ok') {
		try {
			$db->query("UPDATE admins SET email='" . $_POST['email'] . "', username='" . $_POST['admin_user'] . "', password='" . password_hash($_POST['admin_pass'], PASSWORD_DEFAULT) . "' WHERE username='admin'");
		} catch (Exception $e) {
			$response['message'] = 'EasyInstaller was unable to set the credentials of admin.';
		}
	}
}
$sectionTitle =  empty($action) ? 'Terms & Condition' : $action;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Script Installer</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Custom Css --> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme-6.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    

    <!-- Favicon -->
    <link rel="icon" href="assets/images/icon.png">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/icon-114x114.png">
	<style>
		
	</style>
</head>

<body> 
 	    
<div class="ugf-bg">
      <div class="ugf-container-wrap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 p-sm-0">
              <div class="ugf-container">
                <div class="logo">
                  <a href="#"><img src="assets/images/icon.png" width="100" alt=""></a>
                </div>
                <div class="form-wrap">
	 
						<h3 class="title text-center"><?php echo strToUpper($sectionTitle); ?></h3>
							<?php
							if ($action == 'result') {
								echo '<div class="success-area text-center">';
								if (@$response['error'] == 'ok') {
									echo '<h2 class="text-success text-uppercase mb-3">The product has been deployed successfully!</h2>';
									if (@$response['message']) {
										echo '<center><h5 class="text-warning mb-3">' . $response['message'] . '</h5></center>';
									}
									echo '<p class="text-danger lead my-5">Please delete the "install" folder from the server.</p>';
									echo '<div class="warning"><form><a href="' . appUrl() . '" class="btn theme-button choto">Go to website</a></form></div>';
								} else {
									if (@$response['message']) {
										echo '<center><h3 class="text-danger mb-3">' . $response['message'] . '</h3></center>';
									} else {
										echo '<h3 class="text-danger mb-3">Your Server is not Capable to Handle this Request.</h3>';
									}
									echo '<div class="warning mt-2"><h5 class="mb-4 fw-normal">You can ask for support by contacting author.</h5><form><a href="https://khaytech.com/contact" target="_blank" class="btn theme-button choto">Contact Author</a></form></div>';
								}
								echo '</div>';
							} elseif ($action == 'information') {
							?>
							                  <form  action="?action=result" method="post">
												<div class="input-wrap">
												<div class="form-group">
													<input type="text" class="form-control" name="url" value="<?php echo appUrl(); ?>" required>
													<label for="inputMail">Website URL</label>
													<span class="input-icon"><i class="las la-link"></i></span>
												</div>

												<hr>
												<h5 class="font-weight-normal mb-3">Database Credential</h5>
												<div class="form-group">
													<input type="text" class="form-control"  name="db_name" placeholder="Database Name" required>
													<label for="inputPass">Database Name</label>
													<span class="input-icon"><i class="las la-server"></i></span>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="db_host" placeholder="Database Host" required>
													<label for="inputPass">Database Host</label>
													<span class="input-icon"><i class="las la-globe"></i></span>
												</div>
												<div class="form-group">
													<input type="text" class="form-control"  name="db_user" placeholder="Database User" required>
													<label for="inputPass">Database User</label>
													<span class="input-icon"><i class="las la-key"></i></span>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="db_pass" placeholder="Database Password" required>
													<label for="inputPass">Database Password</label>
													<span class="input-icon"><i class="las la-lock"></i></span>
												</div> 
												<hr>
												<h5 class="font-weight-normal mb-3">Admin Credential</h5>
												<div class="form-group">
													<input type="text" class="form-control"name="admin_user" type="text" placeholder="Admin Username" required>
													<label for="inputPass">Admin Username</label>
													<span class="input-icon"><i class="las la-user"></i></span>
												</div> 
												<div class="form-group">
													<input type="text" class="form-control" name="admin_pass" type="text" placeholder="Admin Password" required>
													<label for="inputPass">Admin Passwprd</label>
													<span class="input-icon"><i class="las la-lock"></i></span>
												</div> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" placeholder="Your Email address" required>
													<label for="inputPass">Admin Email</label>
													<span class="input-icon"><i class="las la-envelope"></i></span>
												</div> 
												</div>
												<div class="form-group check-flex">
												<div class="custom-checkbox">
													<input type="checkbox" required  class="custom-control-input" id="customControlValidation1">
													<label class="custom-control-label" for="customControlValidation1">I agree to term of use of software</label>
												</div> 
												</div>
												<button type="submit" class="btn">Proceed</button>
											</form>
											
								
							<?php
							} elseif ($action == 'requirements') {
								$btnText = 'View Detailed Check Result';
								if (count($failed)) {
									$btnText = 'View Passed Check';
									echo '<form><div class="item table-area"><table class="requirment-table">';
									foreach ($failed as $fail) {
										echo "<tr><td><center style='color: red;'>$fail</center></td><td><i class='fa fa-times'></i></td></tr>";
									}
									echo '</table></div>';
								}
								if (!count($failed)) {
									echo '<div class="text-center"  style="color: green;"><i class="far fa-check-circle success-icon text-success"></i><h5 class="my-3">Requirements Check Passed!</h5></div>';
								}
								if (count($passed)) {
									echo '<div class="text-center my-3"><form><button class="btn passed-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePassed" aria-expanded="false" aria-controls="collapsePassed">' . $btnText . '</button></form></div>';
									echo '<div class="collapse mb-4" id="collapsePassed"><div class="item table-area"><table class="requirment-table">';
									foreach ($passed as $pass) {
										echo "<tr><td  style='color: green;'>$pass</td><td><i class='fas fa-check'></i></td></tr>";
									}
									echo '</table></div></div>';
								}
								echo '<div class="item text-end mt-3">';
								if (count($failed)) {
									echo '<a class="btn btn-warning choto" href="?action=requirements">ReCheck <i class="fa fa-sync-alt"></i></a>';
								} else {
									echo '<form><a class="btn theme-button choto" href="?action=information">Next Step <i class="fa fa-angle-double-right"></i></a></form>';
								}
								echo '</div></form>';
							} else {
							?>
							
						 
							<form>
							<div class="item">
									<a>Regular license on this product is for one website or domain only.<br>
									However, to use this product  on multiple websites or domains you need to purchase an extended licence to use this product on multiple domains.</a>
								</div>
								<div class="item">
									<h5 class="subtitle font-weight-bold">DOs:</h5>
									<ul class="check-list">
										<li> Modify or edit the source code as you desire. </li>
										<li> Translate to your choice of language(s).</li>
									</ul>
									<span class="text-danger"><i class="fas fa-exclamation-triangle"></i> We are not responsible for any issue or error that may occurred from your modification on the product source code/database.</span>
								</div>
								<div class="item">
									<h5 class="subtitle font-weight-bold">DONTs: </h5>
									<ul class="check-list">
										<li class="no"> Resell, distribute, give away, or trade by any means to any third party or individual. </li>
										<li class="no"> Include this product into other products sold on any market or affiliate websites. </li>
									</ul>
									<span class="text-danger"><i class="fas fa-exclamation-triangle"></i> You are solely responsible for what ever action you carry out from the use of our product. </span>
									<br><b>Click on the agree button to proceed to next page</b>
								</div> 
								<a>
								<div class="item text-end">
									<form>
									<a href="?action=requirements" class="btn">I Agree, Next Step</a>
									</form>
								</div>

								</a>
							</form>
                  


	
								
							<?php
							}
							?>
						   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="py-3 text-center bg--dark border-top border-primary">
		<div class="container">
			<p class="m-0 font-weight-bold">&copy;<?php echo Date('Y') ?> - All Right Reserved by <a href="https://khaytech.com/">Khaytech</a></p>
		</div>
	</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/countrySelect.min.js"></script>
    
    <script src="assets/js/custom.js"></script>
  </body>
</html>