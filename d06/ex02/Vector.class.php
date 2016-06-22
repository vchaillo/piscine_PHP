<?php

require_once 'Vertex.class.php';

class Vector {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	public static $verbose = false;

	public static function doc() {
		print(file_get_contents('Vector.doc.txt'));
		return;
	}

	public function __construct( array $kwargs ) {
		if (array_key_exists('dest', $kwargs))
		{
			$dest = $kwargs['dest'];
			if (array_key_exists('orig', $kwargs))
				$orig = $kwargs['orig'];
			else
				$orig = New Vertex([
					'x' => 0,
					'y' => 0,
					'z' => 0,
					'w' => 1,0
				]);

			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
			$this->_w = $dest->getW() - $orig->getW();

			if (self::$verbose == true)
				echo $this . " constructed" . PHP_EOL;
		}
		else
		{
			if (self::$verbose == true)
				echo 'Vector construction failed !' . PHP_EOL;
			return (false);
		}
	}

	public function __destruct() {
		if (self::$verbose == true)
			echo $this . " destructed" . PHP_EOL;
	}

	public function __toString() {
		$str = 'Vector( ' .
		'x:' . number_format($this->_x, 2, '.', '') . ', ' .
		'y:' . number_format($this->_y, 2, '.', '') . ', ' .
		'z:' . number_format($this->_z, 2, '.', '') . ', ' .
		'w:' . number_format($this->_w, 2, '.', '') . ' )';
		return ($str);
	}

	// Getters
	public function getX() {
		return ($this->_x);
	}
	public function getY() {
		return ($this->_y);
	}
	public function getZ() {
		return ($this->_z);
	}
	public function getW() {
		return ($this->_w);
	}

	public function magnitude()
	{
		$mag = sqrt(
			$this->_x * $this->_x + 
			$this->_y * $this->_y + 
			$this->_z * $this->_z
		);
		return ($mag);
	}

	public function normalize()
	{
		$mag = abs($this->magnitude());

		$norm = New Vector([
			'dest' => New Vertex([
				'x' => $this->_x / $mag,
				'y' => $this->_y / $mag,
				'z' => $this->_z / $mag
			])
		]);
		return ($norm);
	}

	public function add(Vector $rhs)
	{
		$addVector = New Vector([
			'dest' => New Vertex([
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z
			])
		]);
		return ($addVector);
	}

	public function sub(Vector $rhs)
	{
		$subVector = New Vector([
			'dest' => New Vertex([
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z
			])
		]);
		return ($subVector);
	}

	public function opposite()
	{
		$opp = New Vector([
			'dest' => New Vertex([
				'x' => -$this->_x,
				'y' => -$this->_y,
				'z' => -$this->_z
			])
		]);
		return ($opp);
	}

	public function scalarProduct($k)
	{
		$scalar = New Vector([
			'dest' => New Vertex([
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k
			])
		]);
		return ($scalar);
	}

	public function dotProduct(Vector $rhs)
	{
		$dot = ($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z);
		return ($dot);
	}

	public function cos(Vector $rhs)
	{
		$cos = ($this->dotProduct($rhs)) / (abs($this->magnitude()) * abs($rhs->magnitude()));
		return ($cos);
	}

	public function crossProduct(Vector $rhs)
	{
		$cross = new Vector([
			'dest' => new Vertex([
				'x' => ($this->_y * $rhs->_z) - ($this->_z * $rhs->_y),
				'y' => ($this->_z * $rhs->_x) - ($this->_x * $rhs->_z),
				'z' => ($this->_x * $rhs->_y) - ($this->_y * $rhs->_x),
			])
		]);
		return ($cross);
	}

}

?>