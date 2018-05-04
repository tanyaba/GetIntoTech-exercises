<?php
$user = $_REQUEST["choice"];
$computer = computerChoice();

function playGame($user, $computer){ 
        //$computer= computerChoice();
        //echo $user." vs ".$computer."<br>";
        $trueValue="Congratulations, you win!<br>";
        $falseValue="Sorry, you loose :( <br>";
        switch ($user){
            case $computer:
                echo "It's a draw!<br>";
                break;
            case 'rock':
                echo $computer=='scissors' ? $trueValue: $falseValue;
                break;
            case 'paper':
                echo $computer=='rock' ? $trueValue: $falseValue;
                break;
            case 'scissors':
                echo $computer=='paper' ? $trueValue: $falseValue;
                break;
        }
        return $user." vs ".$computer."<br>";
        
    }
    
function computerChoice(){   
    $translate =['paper','rock', 'scissors'];
    return $translate[rand (0, 2)];
}

$result= playGame($user, $computer);


/*
function userCoice(){
    do {
            echo "\nPlease enter your choice (paper, rock or scissors): "."\n";
            $user= strtolower(stream_get_line(STDIN, 8, "\n"));
            if ($user != 'paper' && $user !='rock' && $user!='scissors'){
                echo 'Oops you seem to have entered something else'."\n";  
                $user="wrong input";
            }        
        } while($user=="wrong input");
        return $user;*/