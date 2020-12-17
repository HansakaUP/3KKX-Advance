<?php

class Validator {

	private $_passed = false;
	private $_errors = array();
	private $_db = null;

	public function __construct() {
		// Connect
	}

	public function check($source, $images, $items = array()) {

		foreach ($items as $item => $rules) {
			
			foreach ($rules as $rule => $rule_value) {

				if ($item == "image" or $item == "screenshots") {

					$file = $images[$item];

					if ($rule == "name") {
						$name = $rule_value;
					}

					if ($rule == "required" && empty($file)) {
						$this->addError("{$name} is required.");
					} else if (!empty($file)) {

						if ($item == "image") {
							foreach ($file as $file_data => $file_value) {
								
								switch ($file_data) {
									case 'type':
										if ($rule == "filetype") {
											if ($file_value != $rule_value) {
												$this->addError("{$name} is must be jpeg format.");
											}
										}
										break;
									case 'error':
										if ($rule == "error") {
											if ($file_value > $rule_value) {
												$this->addError("{$name} may be invalid or corrupted.");
											}
										}
										break;
									case 'size':
										if ($rule == "maxsize") {
											if ($file_value > $rule_value) {
												$this->addError("{$name} size should be less than 1MB.");
											}
										}
										break;
									
									default:
										# code...
										break;
								}

							}
						} else {
							
							foreach ($file as $file_data => $file_value) {

								if ($rule == "imgcount") {
									if (count($file_value) > $rule_value) {
										$this->addError("You can only upload 3 {$name}.");
									}
								} else {
									foreach ($file_value as $img_key => $img_value) {

										switch ($file_data) {
											case 'type':
												if ($rule == "filetype") {
													if ($img_value != $rule_value) {
														$this->addError("{$name} is must be jpeg format.");
													}
												}
												break;
											case 'error':
												if ($rule == "error") {
													if ($img_value > $rule_value) {
														$this->addError("{$name} may be invalid or corrupted.");
													}
												}
												break;
											case 'size':
												if ($rule == "maxsize") {
													if ($img_value > $rule_value) {
														$this->addError("{$name} size should be less than 1MB.");
													}
												}
												break;
											
											default:
												# code...
												break;
										}

									}
								}

							}

						}

					}

				} else {

					$value = trim($source[$item]);

					if ($rule == "name") {
						$name = $rule_value;
					}

					if ($rule == "required" && empty($value)) {
						$this->addError("{$name} is required.");
					} else if (!empty($value)) {
						
						switch ($rule) {
							case 'min':
								if (strlen($value) < $rule_value) {
									$this->addError("{$name} must be a minimum of {$rule_value} characters.");
								}
								break;
							case 'max':
								if (strlen($value) > $rule_value) {
									$this->addError("{$name} must be a maximum of {$rule_value} characters.");
								}
								break;
							case 'checkdate':
								$date = explode('-', $value);
								if (!count($date) == 3) {
									$this->addError("Invalid date format.");
								} else {
									if (!checkdate($date[1], $date[2], $date[0])) {
										$this->addError("Invalid date");
									}
								}
								break;
							default:
								# code...
								break;
						}

					}

				}

			}

		}

		if (empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;

	}

	private function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors() {
		return $this->_errors;
	}

	public function passed() {
		return $this->_passed;
	}

}