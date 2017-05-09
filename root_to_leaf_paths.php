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

root_to_leaf($tree, []);

function root_to_leaf($tree, $data) {
  if ($tree == NULL) {
    return;
  }
  $data[] = $tree->val;
  if ($tree->left === NULL && $tree->right === NULL) {
    print_r($data);
  }
  else {
    root_to_leaf($tree->left, $data);
    root_to_leaf($tree->right, $data);
  }
}