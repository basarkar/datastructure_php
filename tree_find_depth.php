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

$depth = find_depth($tree);
echo "The depth of the tree: $depth\n";

function find_depth($tree) {
    if ($tree == NULL) {
        return 0;
    }
    $left_depth = find_depth($tree->left);
    $right_depth = find_depth($tree->right);
    return ($left_depth > $right_depth) ? $left_depth + 1 : $right_depth + 1;
}