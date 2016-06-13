<?php

class Targaryen {

	public function resistsFire() {
		return false;
	}

	public function getBurned() {
		if (static::resistsFire() == false)
			return 'burns alive';
		else
			return 'emerges naked but unharmed';
	}

}

?>
