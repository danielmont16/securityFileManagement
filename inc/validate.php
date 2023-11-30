<?php
//creating class validate
  class validate{

    //this validation checks if some fields are not empty
    public function checkEmpty($data, $fields){
      $msg = null;
      foreach ($fields as $value){
        if (empty($data[$value])){
          $msg .= "<p>$value field empty</p>";
        }
      }
      return $msg;
    }
    
    //this validation checks if some fields are not numeric
    public function checkNumeric($data1, $fields1){
      $msg1 = null;
      foreach ($fields1 as $value1){
        if (!preg_match("/^[0-9]+$/", $data1[$value1])){
          $msg1 .= "<p>$value1 field must be numeric</p>";
        }
      }
      return $msg1;
    }

    //this validation checks if some fields are not string
    public function checkString($data2, $fields2){
      $msg2 = null;
      foreach ($fields2 as $value2){
        if (!preg_match("/^[a-zA-z ]*$/", $data2[$value2])){
          $msg2 .= "<p>$value2 field must be text</p>";
        }
      }
      return $msg2;
    }

     //this validation checks if the email structure is correct
    public function checkEmail($email){
      
      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

      if (preg_match($pattern,$email)){
        return true;
      }
        return false;
    }

    

  }
?>