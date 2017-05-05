<?php
class LinkedList {
  public $val;
  public $next = NULL;
  function __construct($val) {
    $this->val = $val;
  }
}

$l = new LinkedList(1);
$l->next = new LinkedList(2);
$l->next->next = new LinkedList(3);
$l->next->next->next = new LinkedList(4);
$l->next->next->next->next = new LinkedList(5);

print_forward($l);
echo "\n";
print_reverse($l);
echo "\n";
function print_forward($l) {
    if ($l !== NULL) {
        echo $l->val ." ";
        print_forward($l->next);
    }
}
function print_reverse($l) {
    if ($l !== NULL) {
        print_reverse($l->next);
        echo $l->val ." ";
    }
}