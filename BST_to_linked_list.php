<?php
class Tree {
  public $val;
  public $left = NULL;
  public $right = NULL;
  function __construct($val) {
    $this->val = $val;
  }
}

$tree = new Tree(10);
$tree->left = new Tree(8);
$tree->right = new Tree(13);
$tree->left->left = new Tree(7);
$tree->left->right = new Tree(9);
$tree->right->left = new Tree(12);
$tree->right->right = new Tree(15);

inOrderTraverse($tree, $inTrail);
echo "INORDER:\n" . implode(', ', $inTrail) . "\n\n";
BST_to_LinkedList($tree, $prev_node, $head);
traverse_linked_list($head);


function BST_to_LinkedList(&$tree, &$prev_node = NULL, &$head = NULL) {
  if ($tree === NULL) {
    return NULL;
  }
  // Process Left
  BST_to_LinkedList($tree->left, $prev_node, $head);

  // Process Root
  // Current node
  $cur_node = $tree;
  $cur_node->left = $prev_node;
  if ($prev_node !== NULL) {
    $prev_node->right = $cur_node;
  }
  // Set head at the left most node.
  else {
    $head = $cur_node;
  }
  // Set prev node to root
  $prev_node = $cur_node;

  // Process Right
  BST_to_LinkedList($tree->right, $prev_node, $head);
}

function traverse_linked_list($head) {
  $data = [];
  while ($head !== NULL) {
    $data[] = $head->val;
    $head = $head->right;
  }
  echo "Linked list: " . implode(', ', $data) . "\n";
}

/**
 * LEFT, ROOT, RIGHT
 * @param $tree
 */
function inOrderTraverse($tree, &$trail) {
  if ($tree->left !== NULL) {
    inOrderTraverse($tree->left, $trail);
  }
  $trail[] = $tree->val;
  if ($tree->right !== NULL) {
    inOrderTraverse($tree->right,$trail);
  }
}

/**
 * ROOT, LEFT, RIGHT
 * @param $tree
 */
function preOrderTraverse($tree, &$trail) {
  $trail[] = $tree->val;
  if ($tree->left !== NULL) {
    preOrderTraverse($tree->left, $trail);
  }
  if ($tree->right !== NULL) {
    preOrderTraverse($tree->right,$trail);
  }
}

/**
 * LEFT, RIGHT, ROOT
 * @param $tree
 */
function postOrderTraverse($tree, &$trail) {
  if ($tree->left !== NULL) {
    postOrderTraverse($tree->left, $trail);
  }
  if ($tree->right !== NULL) {
    postOrderTraverse($tree->right,$trail);
  }
  $trail[] = $tree->val;
}

