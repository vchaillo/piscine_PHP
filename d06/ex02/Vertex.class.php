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

	public function __construct( array $kwargs ) {
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
			if (array_key_exists('w', $kwargs))
				$this->_w = $kwargs['w'];
			else
				$this->_w = 1.00;
			if (array_key_exists('color', $kwargs))
				$this->_color = $kwargs['color'];
			else
				$this->_color = new Color( array ( 'rgb' => 0xffffff ) );

			if (self::$verbose == true)
				echo $this . " constructed" . PHP_EOL;
		}
		else
		{
			if (self::$verbose == true)
				echo 'Vertex construction failed !' . PHP_EOL;
			return (false);
		}
	}

	public function __destruct() {
		if (self::$verbose == true)
			echo $this . " destructed" . PHP_EOL;
	}

	public function __toString() {
		$str = 'Vertex( ' .
		'x: ' . number_format($this->_x, 2, '.', '') . ', ' .
		'y: ' . number_format($this->_y, 2, '.', '') . ', ' .
		'z:' . number_format($this->_z, 2, '.', '') . ', ' .
		'w:' . number_format($this->_w, 2, '.', '');

		if (self::$verbose == true)
			$str = $str . ', ' . $this->_color;
		$str = $str . ' )';

		return ($str);
	}

	// Getters
	public function getX()
	{
		return ($this->_x);
	}
	public function getY()
	{
		return ($this->_y);
	}
	public function getZ()
	{
		return ($this->_z);
	}
	public function getW()
	{
		return ($this->_w);
	}
	public function getColor()
	{
		return ($this->_color);
	}

	// Setters
	public function setX($x)
	{
		$this->_x = (float)$x;
	}
	public function setY($y)
	{
		$this->_y = (float)$y;
	}
	public function setZ($z)
	{
		$this->_z = (float)$z;
	}
	public function setW($w)
	{
		$this->_w = (float)$w;
	}
	public function setColor(Color $color)
	{
		$this->_color = $color;
	}

}

?>
