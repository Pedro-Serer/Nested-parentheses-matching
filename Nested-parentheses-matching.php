<?php
    function verificadorDeExpressoes(string $expressaoAlgebrica): bool 
    {
        $correto = TRUE;

        $pilha = new splStack();

        for ($i=0; $i < strlen($expressaoAlgebrica); $i++) {
            $comeco = substr($expressaoAlgebrica, $i, 1);

            switch ($comeco) {
                case '(':
                case '{':
                case '[':
                    $pilha->push($comeco);
                    break;
                case ')':
                case '}':
                case ']':
                    if ($pilha->isEmpty()) {
                        $correto = FALSE;
                    } else{
                        $fim = $pilha->pop();
                        if (($comeco == ")" && $fim != "(") 
                            || ($comeco == "}" && $fim != "{") 
                            || ($comeco == "}" && $fim != "]")) {

                            $correto = FALSE;
                        }
                    }
                    break;
            }

            if (!$correto){
                break;
            }

            if (!$pilha->isEmpty()) {
                $correto = FALSE;
            }
        }

        return $correto;
    }
