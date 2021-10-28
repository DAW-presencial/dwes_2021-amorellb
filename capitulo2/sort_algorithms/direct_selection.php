<?php

$unsortedArray = [49, 24, 36, 80, 31];
$unsortedArray2 = [49, 24, 36, 80, 31];

function direct_selection_sort_upward(&$array_to_sort) {
  $array = $array_to_sort;
  for ($i = 0; $i < count($array_to_sort); $i++) {
    $min_value = min($array);
    $current_value = $array_to_sort[$i];
    $min_value_index = array_search($min_value, $array_to_sort);

    $array_to_sort[$min_value_index] = $current_value;
    $array_to_sort[$i] = $min_value;

    array_splice($array, array_search($min_value, $array), 1);
  }
  return $array_to_sort;
}

function direct_selection_sort_downward(&$array_to_sort2) {
  $array = $array_to_sort2;
  for ($i = 0; $i < count($array_to_sort2); $i++) {
    $min_value = max($array);
    $current_value = $array_to_sort2[$i];
    $min_value_index = array_search($min_value, $array_to_sort2);

    $array_to_sort2[$min_value_index] = $current_value;
    $array_to_sort2[$i] = $min_value;

    array_splice($array, array_search($min_value, $array), 1);
  }
  return $array_to_sort2;
}

$sorted_array = direct_selection_sort_upward($unsortedArray);
$sorted_array2 = direct_selection_sort_downward($unsortedArray2);
print_r($sorted_array);
echo '<br>';
print_r($sorted_array2);