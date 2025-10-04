<?php
class Student
{
  public function __construct(
    public int $id,
    public string $name,
    public string $address,
    public int $marks
  ) {
  }
}
?>

