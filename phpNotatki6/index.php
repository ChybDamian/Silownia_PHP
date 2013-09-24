
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title> Programowanie obiektowe PHP </title>
	</head>
	<body>
		<?php
			function czytelnyArray($arr){
				echo '<pre>'; 
				print_r($arr);
				echo '</pre>';
			}
			// PHP pt 10 min 8			
			class Animal{
				public $name; // zmienna dostępna dla każdego obiekty klasy
				private $age; // można ją tylko zmienić za pomocą funkcji znajdującej się w Klasie
				const HEADS = 1; // const oznacza stałą.
				
				public function Animal($val = 'none', $age = 'none' ){
					$this->name = $val;
					$this->age = $age;

				}
				
				public function getAge(){
					return $this->age;
				}
				
				public function setAge($value){
					// ustawianie zmiennych przy pomocy funkcji pozwala np na sprawdzenie czy podana wartość jest poprawna
					if( is_int($value) ) 
						$this->age = $value;
				}
				
			}
			
			$dog = new Animal();
			$dog->name = 'Reksio';
			$dog->setAge(18);
			
			$cat = new Animal('japacz', 10);
			
			echo $dog->name . ' ma ' . $dog->getAge() . ' lat <br/>';
			echo $cat->name . ' ma ' . $cat->getAge() . ' lat <br/>';
			echo 'stała: ' . $dog::HEADS . '<br/><br/><br/>';
			
			//$animals = file_get_contents("text.txt"); // wczytuje do string'a
						
			$animals = file("text.txt"); // wczytuje do array'a dzieląc względem \n
			echo 'Zawartość text.txt: <br/><br/>';
			foreach( $animals as $animal ){
				list($race,$age,$sound) = explode(',', $animal);
				$sound = trim($sound); // usuwa znak nowej lini na końcu - pozbywa się " ",\t,\n,\r,\0 i pionowego tab
				echo 'rasa: ' . $race . '<br/>';
				echo 'wiek: ' . $age . '<br/>';	
				echo 'dźwięk: ' . $sound . '<br/><br/>';
			}
			
			
			
			
		?>		
	</body>
</html>