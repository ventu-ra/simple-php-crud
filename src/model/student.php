<?php
class Student
{
  public function __construct(
    public readonly int $id = 0,
    public string $name = "",
    public string $address = "",
    public int|string $marks = ""
  ) {
  }

}
?>

