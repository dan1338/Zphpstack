<?php

class Stack {
	private $size;
	private $idx;
	private $buf;

	function __construct($size) {
		$this->size = $size;
		$this->idx = 0;
		$this->buf = array();
	}

	function push($x) {
		if (!$this->isFull()) {
			$this->buf[$this->idx++] = $x;
		}
	}

	function pop() {
		if (!$this->isEmpty()) {
			$value = $this->buf[--$this->idx];
			unset($this->buf[$this->idx]);
			return $value;
		}
	}

	function isEmpty() {
		return $this->idx == 0;
	}

	function isFull() {
		return $this->idx == $this->size;
	}

	function getSize() {
		return $this->size;
	}

	function printStack() {
		print_r($this->buf);
	}
}

$stack = new Stack(8);

while (true) {
	$s = readline(">");

	if ($s == "q") {
		break;
	} else if (sscanf($s, "push %d", $value) == 1) {
		$stack->push($value);
	} else if ($s == "pop") {
		$value = $stack->pop();
		if ($value) {
			printf("%d\n", $value);
		}
	} else {
		$stack->printStack();
	}
}

?>
