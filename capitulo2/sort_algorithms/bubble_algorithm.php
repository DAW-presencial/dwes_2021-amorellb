<?php
$unsortedArray = [49, 24, 36, 80, 31];
$unsortedArray2 = [49, 24, 36, 80, 31];

function bubble_sort_downward(array &$sorted_array)
{
  for ($i = 0; $i < count($sorted_array); $i++) {
    for ($j = 0; $j < count($sorted_array); $j++) {
      if ($sorted_array[$i] > $sorted_array[$j]) {
        $current = $sorted_array[$i];
        $sorted_array[$i] = $sorted_array[$j];
        $sorted_array[$j] = $current;
      }
    }
  }
  return $sorted_array;
}

function bubble_sort_upward(array &$sorted_array)
{
  for ($i = 0; $i < count($sorted_array); $i++) {
    for ($j = 0; $j < count($sorted_array); $j++) {
      if ($sorted_array[$i] < $sorted_array[$j]) {
        $current = $sorted_array[$j];
        $sorted_array[$j] = $sorted_array[$i];
        $sorted_array[$i] = $current;
      }
    }
  }
  return $sorted_array;
}

bubble_sort_downward($unsortedArray);
bubble_sort_upward($unsortedArray2);

print_r($unsortedArray);
echo '<br>';
print_r($unsortedArray2);