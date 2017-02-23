<?php
class Tree {
  public $val;
  public $left = NULL;
  public $right = NULL;
  function __construct($val) {
    $this->val = $val;
  }
}

$tree = new Tree(2);
$tree->left = new Tree(3);
$tree->right = new Tree(4);
$tree->left->left = new Tree(5);
$tree->left->right = new Tree(6);
$tree->right->left = new Tree(7);
$tree->right->right = new Tree(8);
$tree->right->right->left = new Tree(9);

$min = find_max_min($tree, 'min');
echo "The min value of the tree: $min\n";
$max = find_max_min($tree, 'max');
echo "The max value of the tree: $max\n";

function find_max_min($tree, $type) {
  if ($tree == NULL) {
      return NULL;
  }
  // Add the tree node value in the array.
  $array[] = $tree->val;
  // Find left subtree min or max.
  $left_val = find_max_min($tree->left, $type);
  // Find right subtree min or max.
  $right_val = find_max_min($tree->right, $type);

  // If left min/max is not null then add in the array.
  if ($left_val !== NULL) {
      $array[] = $left_val;
  }
  // If right min/max is not null then add in the array.
  if ($right_val !== NULL) {
      $array[] = $right_val;
  }
  // Return the max/min number from the array.
  return $type($array);
}