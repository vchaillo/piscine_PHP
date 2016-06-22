<?php

require_once 'Vertex.class.php';

class Matrix {

	const	IDENTITY = 0;
	const	SCALE = 1;
	const	RX = 2;
	const	RY = 3;
	const	RZ = 4;
	const	TRANSLATION = 5;
	const	PROJECTION = 6;

	private	$_x;
	private	$_y;
	private	$_z;
	private	$_w;
	public static $verbose = false;

	public static function doc() {
		print(file_get_contents('Matrix.doc.txt'));
	}

	public function __construct( array $kwargs ) {
		if (isset($kwargs['preset']))
		{
			$matrix = array();
			$preset = $kwargs['preset'];
			if ($preset == self::IDENTITY) {
				$matrix[0] = [1, 0, 0, 0];
				$matrix[1] = [0, 1, 0, 0];
				$matrix[2] = [0, 0, 1, 0];
				$matrix[3] = [0, 0, 0, 1];
			}
			elseif ($preset == self::SCALE 
					&& isset($kwargs['scale'])) {
				$scale = (float)$kwargs['scale'];
				$matrix[0] = [$scale, 0, 0, 0];
				$matrix[1] = [0, $scale, 0, 0];
				$matrix[2] = [0, 0, $scale, 0];
				$matrix[3] = [0, 0, 0, 1];

			}
			elseif ($preset == self::TRANSLATION
					&& isset($kwargs['vtc'])
					&& is_a($kwargs['vtc'], Vector)) {
				$vtc = $kwargs['vtc'];
				$matrix[0] = [1, 0, 0, $vtc->getX()];
				$matrix[1] = [0, 1, 0, $vtc->getY()];
				$matrix[2] = [0, 0, 1, $vtc->getZ()];
				$matrix[3] = [0, 0, 0, 1];
			}
			else if ($preset == self::PROJECTION
					&& isset($kwargs['fov'])
					&& isset($kwargs['ratio'])
					&& isset($kwargs['near'])
					&& isset($kwargs['far']))
			{
				$r = (float)$kwargs['ratio'];
				$n = (float)$kwargs['near'];
				$f = (float)$kwargs['far'];
				$e = $n / tan(deg2rad((float)$kwargs['fov'] * 0.5));	//Focal Length

				$t1 = - ($f + $n) / ($f - $n);
				$t2 = - (2 * $f * $n) / ($f - $n);

				$matrix[0] = [$e / $r	, 0		, 0		, 0		];
				$matrix[1] = [0			, $e	, 0		, 0		];
				$matrix[2] = [0			, 0		, $t1	, $t2	];
				$matrix[3] = [0			, 0		, -1	, 0		];
			}
			else if (($preset == self::RX
					|| $preset == self::RY
					|| $preset == self::RZ)
					&& isset($kwargs['angle']))
			{
				$angle = (float)$kwargs['angle'];
				$cos = cos($angle);
				$sin = sin($angle);

				if ($preset == self::RX)
				{
					$matrix[0] = [1		, 0		, 0		, 0];
					$matrix[1] = [0		, $cos	, -$sin	, 0];
					$matrix[2] = [0		, $sin	, $cos	, 0];
					$matrix[3] = [0		, 0		, 0		, 1];
				}
				else if ($preset == self::RY)
				{
					$matrix[0] = [$cos	, 0		, $sin	, 0];
					$matrix[1] = [0		, 1		, 0		, 0];
					$matrix[2] = [-$sin	, 0		, $cos	, 0];
					$matrix[3] = [0		, 0		, 0		, 1];
				}
				else if ($preset == self::RZ)
				{
					$matrix[0] = [$cos	, -$sin	, 0		, 0];
					$matrix[1] = [$sin	, $cos	, 0		, 0];
					$matrix[2] = [0		, 0		, 1		, 0];
					$matrix[3] = [0		, 0		, 0		, 1];
				}
			}

			$this->_x = new Vertex(['x' => $matrix[0][0], 'y' => $matrix[0][1], 'z' => $matrix[0][2], 'w' => $matrix[0][3]]);
			$this->_y = new Vertex(['x' => $matrix[1][0], 'y' => $matrix[1][1], 'z' => $matrix[1][2], 'w' => $matrix[1][3]]);
			$this->_z = new Vertex(['x' => $matrix[2][0], 'y' => $matrix[2][1], 'z' => $matrix[2][2], 'w' => $matrix[2][3]]);
			$this->_w = new Vertex(['x' => $matrix[3][0], 'y' => $matrix[3][1], 'z' => $matrix[3][2], 'w' => $matrix[3][3]]);

			if (self::$verbose == TRUE)
			{
				echo 'Matrix ';
				if ($preset == self::IDENTITY)
					echo 'IDENTITY';
				else if ($preset == self::SCALE)
					echo 'SCALE preset';
				else if ($preset == self::TRANSLATION)
					echo 'TRANSLATION preset';
				else if ($preset == self::PROJECTION)
					echo 'PROJECTION preset';
				else if ($preset == self::RX)
					echo 'Ox ROTATION preset';
				else if ($preset == self::RY)
					echo 'Oy ROTATION preset';
				else if ($preset == self::RZ)
					echo 'Oz ROTATION preset';
				echo ' instance constructed' .PHP_EOL;
			}
		}
		else
		{
			if (isset($kwargs['x']) && is_a($kwargs['x'], Vertex))
				$this->_x = $kwargs['x'];
			else
				$this->_x = new Vertex(['x' => 0, 'y' => 0, 'z' => 0, 'w' => 0]);

			if (isset($kwargs['y']) && is_a($kwargs['y'], Vertex))
				$this->_y = $kwargs['y'];
			else
				$this->_y = new Vertex(['x' => 0, 'y' => 0, 'z' => 0, 'w' => 0]);

			if (isset($kwargs['z']) && is_a($kwargs['z'], Vertex))
				$this->_z = $kwargs['z'];
			else
				$this->_z = new Vertex(['x' => 0, 'y' => 0, 'z' => 0, 'w' => 0]);

			if (isset($kwargs['w']) && is_a($kwargs['w'], Vertex))
				$this->_w = $kwargs['w'];
			else
				$this->_w = new Vertex(['x' => 0, 'y' => 0, 'z' => 0, 'w' => 0]);
		}
	}

	public function __destruct() {
		if (self::$verbose == true)
			echo 'Matrix instance destructed' . PHP_EOL;
	}

	public function __toString() {
		return (
			"M | vtcX | vtcY | vtcZ | vtxO\n".
			"-----------------------------\n".
			'x | '.number_format($this->_x->getX(), 2, '.', '').
				' | '.number_format($this->_x->getY(), 2, '.', '').
				' | '.number_format($this->_x->getZ(), 2, '.', '').
				' | '.number_format($this->_x->getW(), 2, '.', '')."\n".
			'y | '.number_format($this->_y->getX(), 2, '.', '').
				' | '.number_format($this->_y->getY(), 2, '.', '').
				' | '.number_format($this->_y->getZ(), 2, '.', '').
				' | '.number_format($this->_y->getW(), 2, '.', '')."\n".
			'z | '.number_format($this->_z->getX(), 2, '.', '').
				' | '.number_format($this->_z->getY(), 2, '.', '').
				' | '.number_format($this->_z->getZ(), 2, '.', '').
				' | '.number_format($this->_z->getW(), 2, '.', '')."\n".
			'w | '.number_format($this->_w->getX(), 2, '.', '').
				' | '.number_format($this->_w->getY(), 2, '.', '').
				' | '.number_format($this->_w->getZ(), 2, '.', '').
				' | '.number_format($this->_w->getW(), 2, '.', '')
		);
	}

	public function			getvtcX()
	{
		return (new Vertex([
			'x' => $this->_x->getX(),
			'y' => $this->_y->getX(),
			'z' => $this->_z->getX(),
			'w' => $this->_w->getX()
		]));
	}

	public function			getvtcY()
	{
		return (new Vertex([
			'x' => $this->_x->getY(),
			'y' => $this->_y->getY(),
			'z' => $this->_z->getY(),
			'w' => $this->_w->getY()
		]));
	}

	public function			getvtcZ()
	{
		return (new Vertex([
			'x' => $this->_x->getZ(),
			'y' => $this->_y->getZ(),
			'z' => $this->_z->getZ(),
			'w' => $this->_w->getZ()
		]));
	}

	public function			getvtcW()
	{
		return (new Vertex([
			'x' => $this->_x->getW(),
			'y' => $this->_y->getW(),
			'z' => $this->_z->getW(),
			'w' => $this->_w->getW()
		]));
	}
	
	public function			mult( Matrix $rhs )
	{
		return (new Matrix([
			'x' => new Vertex([
				'x' => self::dotProduct($this->_x, $rhs->getvtcX()),
				'y' => self::dotProduct($this->_x, $rhs->getvtcY()),
				'z' => self::dotProduct($this->_x, $rhs->getvtcZ()),
				'w' => self::dotProduct($this->_x, $rhs->getvtcW())
			]),
			'y' => new Vertex([
				'x' => self::dotProduct($this->_y, $rhs->getvtcX()),
				'y' => self::dotProduct($this->_y, $rhs->getvtcY()),
				'z' => self::dotProduct($this->_y, $rhs->getvtcZ()),
				'w' => self::dotProduct($this->_y, $rhs->getvtcW())
			]),
			'z' => new Vertex([
				'x' => self::dotProduct($this->_z, $rhs->getvtcX()),
				'y' => self::dotProduct($this->_z, $rhs->getvtcY()),
				'z' => self::dotProduct($this->_z, $rhs->getvtcZ()),
				'w' => self::dotProduct($this->_z, $rhs->getvtcW())
			]),
			'w' => new Vertex([
				'x' => self::dotProduct($this->_w, $rhs->getvtcX()),
				'y' => self::dotProduct($this->_w, $rhs->getvtcY()),
				'z' => self::dotProduct($this->_w, $rhs->getvtcZ()),
				'w' => self::dotProduct($this->_w, $rhs->getvtcW())
			])
		]));
	}

	public function			transformVertex( Vertex $vtx )
	{
		return (new Vertex([
			'x' => self::dotProduct($this->_x, $vtx),
			'y' => self::dotProduct($this->_y, $vtx),
			'z' => self::dotProduct($this->_z, $vtx),
			'w' => self::dotProduct($this->_w, $vtx)
		]));
	}

	private static function	dotProduct( Vertex $vtx1, Vertex $vtx2 )
	{
		return (
			$vtx1->getX() * $vtx2->getX() +
			$vtx1->getY() * $vtx2->getY() +
			$vtx1->getZ() * $vtx2->getZ() +
			$vtx1->getW() * $vtx2->getW()
		);
	}
}

?>
