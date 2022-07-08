<?php
    function expressionChecker(string $expression): bool 
    {
        $valid = TRUE;

        $stack = new splStack();

        for ($i=0; $i < strlen($expression); $i++) {
            $char = substr($expression, $i, 1);

            switch ($char) {
                case '(':
                case '{':
                case '[':
                    $stack->push($char);
                    break;
                case ')':
                case '}':
                case ']':
                    if ($stack->isEmpty()) {
                        $valid = FALSE;
                    } else{
                        $last = $stack->pop();
                        if (($char == ")" && $last != "(") 
                            || ($char == "}" && $last != "{") 
                            || ($char == "}" && $last != "]")) {

                            $valid = FALSE;
                        }
                    }
                    break;
            }

            if (!$valid){
                break;
            }

            if (!$stack->isEmpty()) {
                $valid = FALSE;
            }
        }

        return $valid;
    }