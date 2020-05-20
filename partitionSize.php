<?php 
function getPartitionSize($startingHeight, $minHeight, $maxCapacity) {
    $tempPiles = [];
    $piles = [];
    $isDone = false;
	$hasMore = true;

    array_push($tempPiles, $startingHeight);

    while (!$isDone && sizeof($tempPiles) > 0) {
        $hasMore = true;
        forEach ($tempPiles as $pile) {
            if ($pile > $maxCapacity) {
			    $a = (int) ($pile / $minHeight);
				$b = $a + ($pile % $minHeight);
				array_push($piles, $b, $a);

                if($a > $maxCapacity || $b > $maxCapacity) {
                    $hasMore = false;
				}
            } else {
                array_push($piles, $pile);
            }
        }
        echo "<br>Step: " . implode( ", ", $piles);

		if($hasMore) {
			$isDone = true;
		}else {
			$tempPiles = $piles;
            $piles = [];
		}
	}
	return sizeof($piles);
}

/*********************************************************************************************/
$startingHeight = 13;
$minHeight = 2;
$maxCapacity = 3;
echo "<br> Starting Pile Height: ". $startingHeight;
echo "<br> Min Pile Height: ". $minHeight;
echo "<br> Max Pile Height in Partition: ". $maxCapacity;
echo "<br>==================================================";
echo "<br>             Final Result                         ";
echo "<br>==================================================";
echo "<br> Partition Size: ".getPartitionSize($startingHeight, $minHeight, $maxCapacity);
echo "<br>==================================================";


?>