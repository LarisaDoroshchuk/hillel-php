<?php

function dataComparison($operandFirst,  $operandSecond)
{
    if($operandFirst === null || $operandSecond === null){
        echo "You should not have the operator - null! Remove this operator from variables. \n";
    }else{


        $operandFirstList = $operandFirst === true ? 'true' : ($operandFirst === false ? 'false' : $operandFirst);
        $operandSecondList = $operandSecond === true ? 'true' : ($operandSecond === false ? 'false' : $operandSecond);


        $equalStrict = $operandFirst === $operandSecond ? '===' : 'not ===';
        echo "Answer(===) : {$operandFirstList} {$equalStrict} {$operandSecondList} \n";

        $equalNotStrict = $operandFirst == $operandSecond ? '==' : 'not ==';
        echo "Answer(==) : {$operandFirstList}  {$equalNotStrict} {$operandSecondList} \n";

        $notEqual = $operandFirst == $operandSecond ? '==' : '!=';
        echo "Answer(!= || ==) : {$operandFirstList} {$notEqual} {$operandSecondList} \n";

        $StrictNotEqual = $operandFirst === $operandSecond ? '===' : '!==';
        echo "Answer(!== || ===) : {$operandFirstList} {$StrictNotEqual} {$operandSecondList} \n";


        if (is_numeric($operandFirst) && !is_string($operandFirst) && is_numeric($operandSecond) && !is_string($operandSecond)) {

            if ($operandFirst < $operandSecond) {
                echo "Answer(<) : {$operandFirstList} < {$operandSecondList} \n";
            } elseif ($operandFirst > $operandSecond) {
                echo "Answer(<) : {$operandFirstList} > {$operandSecondList} \n";
            } else {
                echo "Answer(<) : {$operandFirstList} == {$operandSecondList} \n";
            }

            if ($operandFirst > $operandSecond) {
                echo "Answer(>) : {$operandFirstList} > {$operandSecondList} \n";
            } else if ($operandFirst < $operandSecond) {
                echo "Answer(>) : {$operandFirstList} < {$operandSecondList} \n";
            } else {
                echo "Answer(>) : {$operandFirstList} == {$operandSecondList} \n";
            }


            $result = ($operandFirst <=> $operandSecond);
            if ($result === 1) {
                echo "Answer(<=>) : {$operandFirstList} > {$operandSecondList} \n";
            } else if ($result === -1) {
                echo "Answer(<=>) : {$operandFirstList} < {$operandSecondList} \n";
            } else {
                echo "Answer(<=>) : {$operandFirstList} = {$operandSecondList} \n";
            }

        } else {
            echo "Your data is not numbers and checks for '< ' and ' >' and ' <=>' are not possible. \n";
        }
    }
}

    dataComparison(null, null);


