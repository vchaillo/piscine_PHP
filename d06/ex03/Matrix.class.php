<?php

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
		if (array_key_exists('preset', $kwargs))
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
			elseif ($preset == self::RX
					&& isset($kwargs['angle'])) {
				# code...
			}
			elseif ($preset == self::RY
					&& isset($kwargs['angle'])) {
				# code...
			}
			elseif ($preset == self::RZ
					&& isset($kwargs['angle'])) {
				# code...
			}
			elseif ($preset == self::TRANSLATION
					&& isset($kwargs['vtc'])
					&& is_a($kwargs['vtc'], Vector)) {
				$vtc = $kwargs['vtc'];
				$matrix[0] = [0, 0, 0, $vtc->getX()];
				$matrix[1] = [0, 0, 0, $vtc->getY()];
				$matrix[2] = [0, 0, 0, $vtc->getZ()];
				$matrix[3] = [0, 0, 0, 1];
			}
			elseif ($preset == self::PROJECTION
					&& isset($kwargs['fov'])
					&& isset($kwargs['ratio'])
					&& isset($kwargs['near'])
					&& isset($kwargs['far'])) {
				# code...
			}

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
			# code...
		}
	}

	public function __destruct() {
		if (self::$verbose == true)
			echo 'Matrix instance destructed' . PHP_EOL;
	}

	public function __toString() {
	}

}

?>
