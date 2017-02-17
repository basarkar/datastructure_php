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

inOrderTraverse($tree, $inTrail);
//echo "INORDER:\n" . implode(', ', $trail) . "\n\n"; $trail = NULL;
preOrderTraverse($tree, $preTrail);
//echo "PREORDER:\n" . implode(', ', $trail) . "\n\n"; $trail = NULL;
postOrderTraverse($tree, $postTrail);
//echo "POSTORDER:\n" . implode(', ', $trail) . "\n\n"; $trail = NULL;

$first = 3;
$second = 5;
$lca = LCA($tree, $first, $second);
echo "LCA between $first and $second is = $lca \n";
$path=[];
findPath($tree, $path, 7);
print_R($path);

function findPath($tree, &$path, $val) {
    if ($tree === NULL) {
        return FALSE;
    }
    if ($val == $tree->val) {
        array_push($path, $tree->val);
        return TRUE;
    }

    if (findPath($tree->left, $path, $val) || findPath($tree->right, $path, $val)) {
        array_push($path, $tree->val);
        return TRUE;
    }
    return FALSE;
}

function LCA($tree, $first, $second) {
  inOrderTraverse($tree, $inTrail); echo implode(', ', $inTrail) . "\n";
  postOrderTraverse($tree, $postTrail); echo implode(', ', $postTrail) . "\n";
  // Find elements in the inTrail
  $key1 = array_search($first, $inTrail);
  $key2 = array_search($second, $inTrail);
  if ($key1>$key2) {
    $i = $key2;
    $last = $key1;
  }
  else {
    $i = $key1;
    $last = $key2;
  }
  for (;$i<=$last;$i++) {
    $a[$inTrail[$i]] = array_search($inTrail[$i], $postTrail);
  }

  return array_search(max($a), $a);

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


