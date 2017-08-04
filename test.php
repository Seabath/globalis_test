<?php
include './prolo.php';

class Test {
  var $nb_test;
  var $nb_success;

  public function Test() {
    $this->nb_test = 0;
    $this->nb_success = 0;
  }

  function execute($string, $expected, $desc = null) {
    $time_start = microtime(true);
    $val = main($string);
    $memory_used = memory_get_usage() / 1024;
    $duration = number_format(microtime(true) - $time_start, 4);

    $this->nb_test++;

    if ($val != $expected) 
      echo "test failed: $desc, expected: $expected and got $val \n";

    else {
      echo "test $this->nb_test OK, duration: $duration sec, memory: $memory_used ko\n";
      $this->nb_success++;
    }
  }

  function execute_from_file($file_path, $expected, $desc = null) {
    $string = file_get_contents($file_path);
    $this->execute($string, $expected, $desc);
  }


  public function execute_full() {


    //error cases
    $this->execute("0\n", -1, "Empty land");
    $this->execute("-4\n 64541 165 165 4189 2", -1, "Bad input negative size");
    $this->execute("10\n 1", -1, "Bad input size");
    $this->execute("1\n 1 0 1 12 1", -1, "Bad input size");
    $this->execute("4\n 64541 165 165 -4189", -1, "Bad input negative height");
    $this->execute("abc\n manger des pates, c'est bon", -1, "Bad input letters");

    //success cases
    $this->execute("2\n 0 1", 0, "simple land");
    $this->execute("2\n 1 0", 1, "simple land");
    $this->execute("10\n 30 27 17 42 29 12 14 41 42 42", 6, "small land");
    $this->execute("20\n 12 82 60 90 21 54 89 20 12 48 30 27 17 42 29 12 14 41 42 42", 17, "medium land");
    $this->execute_from_file("test_files/test_large", 99985, "max size");
    $this->execute_from_file("test_files/test_large", 99985, "max size");
    $this->execute_from_file("test_files/test_large", 99985, "max size");
    $this->execute_from_file("test_files/test_large", 99985, "max size");



    echo "test passed: $this->nb_test\n";
    echo "test succeed: $this->nb_success\n";
  }
}

$test = new Test();
$test->execute_full();
?>
