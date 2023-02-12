<?php
class Password {
    public $lower, $upper, $nums, $alphabet_nums, $password;

    public function __construct() {
        $this->lower = implode("", range('a', 'z'));
        $this->upper = implode("", range('A', 'Z'));
        $this->nums = implode("", range(0, 9));
        $this->alphabet_nums .= $this->lower. $this->upper. $this->nums; 
        $this->password = '';
       
    }

    public function generate_pass(int $lenght, string $hardness): string {
        if($hardness === "easy"){
            $this->alphabet_nums = str_split($this->alphabet_nums, 26);
            $this->alphabet_nums[0] = str_shuffle($this->alphabet_nums[0]);
            $this->alphabet_nums = str_split($this->alphabet_nums[0], $lenght);
            $this->alphabet_nums = $this->alphabet_nums[0];
            $this->password = $this->alphabet_nums;
        }
        else if ($hardness === "medium"){
            $this->alphabet_nums = str_split($this->alphabet_nums, 52);
            $this->alphabet_nums[0] = str_shuffle($this->alphabet_nums[0]);
            $this->alphabet_nums = str_split($this->alphabet_nums[0], $lenght);
            $this->alphabet_nums = $this->alphabet_nums[0];
            $this->password = $this->alphabet_nums;
        }   
        else if ($hardness === "hard"){
            $this->alphabet_nums = str_split($this->alphabet_nums, 62);
            $this->alphabet_nums[0] = str_shuffle($this->alphabet_nums[0]);
            $this->alphabet_nums = str_split($this->alphabet_nums[0], $lenght);
            $this->alphabet_nums = $this->alphabet_nums[0];
            $this->password = $this->alphabet_nums;
        } else {
            echo "Zadej delku hesla (cele cislo) a slozitost hesla ('easy', 'medium', 'hard').";
        } 
        return $this->password;
    }

    public function check() {
        $pass = $this->password;
        $pass2 = $this->generate_pass(18, "easy");
        if($pass == $pass2) {
            echo "$pass --- $pass2", "</br>";
            echo "Hesla jsou stejná";
        }
        else {
            echo "$pass --- $pass2", "</br>";
            echo "Hesla jsou rozdílná";
        }
    }
}
?>