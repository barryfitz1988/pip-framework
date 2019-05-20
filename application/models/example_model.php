<?php

class Example_model extends Model {


	public function  selectAllFromSRNumbersTable() {
		return $this->query("SELECT * FROM `sr-numbers`");
	}

}

