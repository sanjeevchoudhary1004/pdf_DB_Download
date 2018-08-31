$num_of_ids = 10000; //Number of "ids" to generate.
$i = 0; //Loop counter.
$n = 0; //"id" number piece.
$l = "AAA"; //"id" letter piece.

while ($i <= $num_of_ids) { 
    $id = $l . sprintf("%04d", $n); //Create "id". Sprintf pads the number to make it 4 digits.
    echo $id . "<br>"; //Print out the id.

    if ($n == 9999) { //Once the number reaches 9999, increase the letter by one and reset number to 0.
        $n = 0;
        $l++;
    }

    $i++; $n++; //Letters can be incremented the same as numbers. Adding 1 to "AAA" prints out "AAB".
}


//
<?php
        $length = 4;
    $id = '';
    for ($i=0;$i<$length;$i++){
        $id .= rand(1, 9);

    }
echo $id;
?>

//
public function autoincemp()
{
    global $value2;
    $query = "SELECT empid from tbemployee order by empid desc LIMIT 1";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $value2 = $row['empid'];
        $value2 = substr($value2, 3, 5);
        $value2 = (int) $value2 + 1;
        $value2 = "EMP" . sprintf('%04s', $value2);
        $value = $value2;
        return $value;
    } else {
        $value2 = "EMP0001";
        $value = $value2;
        return $value;
    }
}