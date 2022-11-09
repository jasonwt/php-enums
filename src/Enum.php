<?php

    namespace pctlib\enums;

    abstract class Enum {
        private string $name = "";

        protected function __construct(string $name) {
            $this->name = $name;
        }

        public function __toString() : string {
            if (!is_string($this->Value()))
                return print_r($this->Value(), true);
                
            return $this->Value();
        }

        public function Name() : string {
            return $this->name;
        }

        public function Value() {
            return static::Values()[$this->name];
        }

        abstract protected static function EnumElements() : array;

        public static function Values() : array {
            if (static::EnumElements() === array())
                return array();                

            $values = array();

            foreach (static::EnumElements() as $k => $v)                    
                $values[(is_numeric($k) ? $v : $k)] = (is_numeric($k) ? $k : $v);                    

            return $values;
        }

        public static function Names() : array {
            return array_keys(static::Values());
        }

        public static function NewByValue($value) : ?Enum {
            $flippedArray = array_flip(static::Values());

            if (isset($flippedArray[$value]))
                return new static($flippedArray[$value]);

            return null;
        }

        public static function __callStatic(string $name, array $arguments = array()) : Enum {
            if (in_array($name, static::Names()))
                return new static($name);

            $debugBacktrace = debug_backtrace();

            $exceptionString = "\nPHP Fatal error:  Uncaught Error: Call to undefined method " . __CLASS__ . "::" . $name . "() in " . (count($debugBacktrace) > 1 ? $debugBacktrace[1]["file"] : __FILE__) . ":" . $debugBacktrace[0]["line"] . "\n";                

            $exceptionString .= "Stack trace:\n";

            for ($cnt = 1; $cnt < count($debugBacktrace); $cnt ++)
                $exceptionString .= "#" . ($cnt-1) . " " . $debugBacktrace[$cnt]["file"] . "(" . $debugBacktrace[$cnt]["line"] . "): " . $debugBacktrace[$cnt]["function"] . "\n";
                            
            die($exceptionString . "\n");
        }  
    }
?>