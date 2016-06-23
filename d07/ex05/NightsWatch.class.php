<?php

class NightsWatch {

	private		$_fighters = array();

	public function recruit( $fighter ) {
		if (is_a($fighter, IFighter))
			$this->_fighters[] = $fighter;
	}

	public function fight() {
		foreach ($this->_fighters as $fighter)
			$fighter->fight();
	}
}

?>
