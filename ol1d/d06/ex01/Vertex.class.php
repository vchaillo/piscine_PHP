<?php

require_once 'Color.class.php';

class Vertex {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = false;

	public static function doc() {
		print(file_get_contents('Vertex.doc.txt'));
		return;
	}

	function __construct( array $kwargs ) {
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1.00;
		if (array_key_exists('color', $kwargs))
			$this->color = $kwargs['color'];
		else
			$this->color = new Color( array ( 'rgb' => 0xffffff ) );;

		if (self::$verbose == true)
			printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed' . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		return;
	}

	function __destruct() {
		if (self::$verbose == true)
			printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed' . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		return;
	}

	function __toString() {
		if (self::$verbose == true)
			return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
		else
			return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f)', $this->_x, $this->_y, $this->_z, $this->_w));
	}

}

?>
