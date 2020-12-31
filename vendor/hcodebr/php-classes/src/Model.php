<?php

namespace Hcode;

class Model {

	private $values = [];

	public function setData($data)
			{

				foreach ($data as $key => $value) {
					
					$this->{"set".$key}($value);
				}
			}

	public function __call($name, $args)
	{	 // a partir de 0, trazer 0, 1, 2
		$method = substr($name, 0, 3);
		// saber o nome do campo, descarta os 3 primeiros
		$fieldName = substr($name, 3, strlen($name));

		if (in_array($fieldName, $this->fields))
		{
			
			switch ($method)
			{

				case "get":
					return $this->values[$fieldName];
				break;

				case "set":
					$this->values[$fieldName] = $args[0];
				break;

			}

		}

		
	}

		public function getValues()
		{
			return $this->values;
		}

}

?>