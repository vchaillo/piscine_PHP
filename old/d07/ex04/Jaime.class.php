<?php

class Jaime extends Lannister {

	public function sleepWith( $param ) {
		if (is_a($param, 'Cersei'))
			print('With pleasure, but only in a tower in Winterfell, then.' . PHP_EOL);
		else
			parent::sleepWith( $param );
	}

}

?>
