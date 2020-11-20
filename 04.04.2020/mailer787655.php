<?php

set_time_limit(0);

if($_POST['Manda'])
{

    //EMAIL DO DESTINAT?RIO
    $FromName = $_POST['FromName'];
    $FromMail = $_POST['FromMail'];
    
    //ASSUNTO DO EMAIL
    $assunto = $_POST['assunto'];
    
    //MENSAGEM DO EMAIL
    $mensagem = $_POST['html'];
    $mensagem = stripslashes($mensagem);
    //CABE?ALHO DO EMAIL
    $headers  = "From: " . $FromName . " <" . $FromMail . ">\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "Content-Transfer-encoding: 8bit\n";
    $headers .= "Reply-To: " . $FromName . " <" . $FromMail . ">\n";
    $headers .= "Return-Path: " . $FromMail . "\n";
    $headers .= "Message-ID: <".md5(uniqid(time()))."@$mailserver>\n";
    $headers .= "X-Priority: 1\n";
    $headers .= "X-MSmail-Priority: High\n";
    $headers .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\n";
    $headers .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1441";
    
    //ARQUIVO COM OS EMAILS
    $arquivo = $_POST['lista'];
    
    //GERANDO UM ARRAY COM A LISTA
    $file = explode("\n", $arquivo);
    $i = 1;

}
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<style type="text/css">
td {
    font-family:verdana;
    color:#000000;
    font-size:10px;
}
</style>
<?
if($_POST['Manda']) { ?>
<table width="59%" height="30" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#333333">
  <tr>
    <td bgcolor="#f5f5f5"> 
      <?
            foreach ($file as $mail) {
                if(mail($mail, $assunto, $mensagem, $headers)) {
                    echo "<font color=green face=verdana size=1>* $i - ".$mail."</font> <font color=green face=verdana size=1>OK</font><br>";
                } else {
                    echo "* $i  ".$mail[$i]." <font color=red>NO</font><br><hr>";
                    $i++;
                }
            }
       ?>
    </td>
  </tr>
</table>
<? } ?>
<form name="form1" method="post" action="">
  <table width="47%" height="202" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#F4F4F4">
         <tr> 
            <td colspan="2" align="center"><b>$ MASS EMAIL - $ </b></td>
          </tr>
          <tr> 
            <td width="34%" align="center"><b>Sujet :</b></td>
            <td width="66%"><input name="assunto" type="text" id="assunto3" value="Example Sujet" size="50"></td>
          </tr>
          <tr> 
            <td align="center"><b>Votre Nom:</b></td>
            <td><input name="FromName" type="text" value="Exemple nom" size="50"></td>
          </tr>
          <tr> 
            <td align="center"><b>Votre Adresse mail :</b></td>
            <td><input name="FromMail" type="text" value="mymail@mail.asia" size="50"></td>
          </tr>
          <tr> 
            <td><b>Message :</b></td>
            <td><textarea name="html" cols="38" rows="10" id="textarea2">blablablablabla</textarea></td>
          </tr>
          <tr> 
            <td><b>Liste d'adresse mail:</b></td>
            <td><textarea name="lista" cols="38" rows="10" id="textarea3"></textarea></td>
          </tr>
          <tr> 
            <td align="center" colspan="2"><input name="Manda" type="submit" id="Manda" value="Envoyer"></td>
          </tr>
        </table>

</form>


<br /><br />

</body>
