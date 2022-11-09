<?php

    require_once(__DIR__ . "/../src/Enum.php");

    use pctlib\enums\Enum;
    
    class NumbersEnum extends Enum {
        public static function ONE() {return static::__callStatic("ONE");}
        public static function FOUR() {return static::__callStatic("FOUR");}

        protected static function EnumElements(): array { 
            return ["ONE" => 1, "TWO" => 2, "THREE", "FOUR", "FIVE" => 5];
        }
    } //
    
    function NumbersEnumInfo(NumbersEnum $enum) {        
        echo "enum->Name(): " . $enum->Name() . "\n";
        echo "enum->Value(): " . $enum->Value() . "\n";
        echo "enum->__toString(): " . $enum . "\n";
    }

    echo "\n";
    echo "*************************** Enum Static Functions ***************************\n\n";
    echo "NumbersEnum::Names(): " . print_r(NumbersEnum::Names(), true) . "\n";
    echo "NumbersEnum::Values(): " . print_r(NumbersEnum::Values(), true) . "\n";

    echo "\n*********************** NumbersEnum::ONE() ***********************\n\n";
    NumbersEnumInfo(NumbersEnum::ONE());

    echo "\n*********************** NumbersEnum::TWO() ***********************\n\n";
    NumbersEnumInfo(NumbersEnum::TWO());

    echo "\n*********************** NumbersEnum::THREE() ***********************\n\n";
    NumbersEnumInfo(NumbersEnum::THREE());

    echo "\n*********************** NumbersEnum::FOUR() ***********************\n\n";
    NumbersEnumInfo(NumbersEnum::FOUR());

    echo "\n******************* NumbersEnum::NewByValue(5) ********************\n\n";
    NumbersEnumInfo(NumbersEnum::NewByValue(5));      

    echo "\n";
    echo "************************** Comparing Enums ***************************\n\n";
    echo "NumbersEnum::ONE()  == NumbersEnum::ONE()         : " . (NumbersEnum::ONE() == NumbersEnum::ONE() ? "true\n" : "false\n");
    echo "NumbersEnum::ONE()  == NumbersEnum::TWO()         : " . (NumbersEnum::ONE() == NumbersEnum::TWO() ? "true\n" : "false\n");
    echo "NumbersEnum::FIVE() == NumbersEnum::NewByValue(5) : " . (NumbersEnum::FIVE() == NumbersEnum::NewByValue(5) ? "true\n" : "false\n");

    echo "\n";  

    
    


?>
