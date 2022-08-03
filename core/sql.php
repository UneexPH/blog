<?php

function insert (string $entidade, array $dados) : String 
{
$instrucao = "INSERT INTO {$entidade}";

$campos = implode(', ', array_keys($dados));
$valores = implode(', ', array_values($dados));

$instrucao.= "({$campos})";
$instrucao .= "VALUES ({$valores})";

return $instrucao;
}

function update (string $entidade, array $dados, array $criterio = []) : string
{
    $instrucao = "UPDATE{$entidade}";

    foreach ($dados as $campo => $dados){
        $set[] = "{$campo}" = {$dados}";
    }

    $instrucao .= ' SET ' . implode(',', $set) ;

    if (!empty($criterio)){
        $intrucao .= ' WHERE';
        
        foreach($criterio as $expressao) {
            $instrucao .= ' '. implode (' ',$expressao);
        }
    }

    return $instrucao;
}

function delete (string $entidade, array $criterio = []) : String
{
    $instrucao = "DELETE {$entidade}";

    if(!empty($criterio)){
        $instrucao .=' WHERE ';

        foreach($criterio as $expressao){
            $instrucao .=' ' . implode(' ', $expressao);
        }
    }

    return $instrucao;
}

function select (string $entidade, array $campos, array $criterio = [], 
string $ordem = null) : string
{
    $instrucao = "SELECT " . IMPLODE (', ' ,$campos);
    $instrucao .=" FROM {$entidade}";

    if(!empty($criterio)){
        $instrucao .= ' WHERE ';

        foreach($criterio as $expressao){
            $instrucao .=' ' . implode(' ', $expressao);
        }
    }

    if(!empty($ordem)){
        $instrucao .= " ORDER BY $ordem ";
    }

    return $instrucao;
}
?>