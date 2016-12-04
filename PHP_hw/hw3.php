<HTML>
<head>
<style>
	table {
		width: 80%;
		border-collapse: collapse;
	}

	table, td, th {
		border: 1px solid black;
	}

	th {
		background-color: #3b8ce2;
		}
</style>
</head>
<body>
<?php
$InfoArray = array(); 
$InfoArray[] = array("ID" => 782386, "FName" => "Dan", "LName" => "Jose");
$InfoArray[] = array("ID" => 824798, "FName" => "John", "LName" => "Madrchd");
$InfoArray[] = array("ID" => 678913, "FName" => "James", "LName" => "Vyas");
$InfoArray[] = array("ID" => 782386, "FName" => "Mathew", "LName" => "Smith");
$InfoArray[] = array("ID" => 314560, "FName" => "Paul", "LName" => "Logan");

class htmltable{
	public $htmltable;
	public function __construct($htmltable = array()){
	
	}

	public function createtable($InfoArray){
		$this->htmltable .= '<table>';
		$this->htmltable .= '<thead>';
		$this->htmltable .= '<tr>';
		
		foreach($InfoArray[0] as $key => $value) {			
				$this->htmltable .= '<th>' . $key . '</th>';
		}
		$this->htmltable .= '</th>';
		$this->htmltable .= '<thead>';
		$this->htmltable .= '<tbody>';

		foreach($InfoArray as $row){
			$this->htmltable .='<tr>';
		
		foreach($row as $key => $val){
			$this->htmltable .= "<td>". $val . "</td>";
		}
			$this->htmltable .= '</tr>';			
		}		
	$this->htmltable .= '</tbody>';
	echo $this->htmltable;
	}		
}

$call = new htmltable;
$call->createtable($InfoArray);
?>
</body>
</HTML>