<?php
//Calculator.
//-arg1- -operation- -arg2-
//for example: 5 add 3
//calculator take data from GET like http://calculator.php?arg1=5&arg2=3&operation=add

$arg1Error = "";
$arg2Error = "";
$operationError = "";
$error = false;
$parameter = $_GET;
$errorMessage = "";


//Check GET for arg1, arg2 and operation. Remove it from GET.

if (isset($parameter["arg1"]))
{
    $arg1 = $parameter["arg1"];
    unset($parameter["arg1"]);
}
 else 
{
    $arg1Error = " arg1";
    $error = true;
}
if (isset($parameter["arg2"]))
{
    $arg2 = $parameter["arg2"];
    unset($parameter["arg2"]);
}
 else 
{
    $arg2Error = " arg2";
    $error = true;
}
if (isset($parameter["operation"]))
{
    $operation = $parameter["operation"];
    unset($parameter["operation"]);
}
 else 
{
    $operationError = " operation";
    $error = true;
}
if ($error)
{
    $errorMessage = $errorMessage."Not present".$arg1Error.$arg2Error.$operationError.".\n";
}

//GET have more parameters than arg1, arg2 and operation

if (!empty($parameter))
{
    $error = true;
    $errorMessage = $errorMessage."Unknown parameters";
    foreach ($parameter as $key => $value)
    {
        $errorMessage = $errorMessage." ".$key;
    }
    $errorMessage = $errorMessage.".\n";
}

//Check arg1 and arg2 for numeric

if (isset($arg1) && !is_numeric($arg1))
{
    $error = true;
    $errorMessage = $errorMessage."Not a number arg1=".$arg1.".\n";
}
if (isset($arg2) && !is_numeric($arg2))
{
    $error = true;
    $errorMessage = $errorMessage."Not a number arg2=".$arg2.".\n";
}

//Check for Chuck Nor....arrgh.

if ($arg2 == "0")
{
    $error = true;
    $errorMessage = $errorMessage."In this universe to divide by 0 is impossible.\n";
}

//Time to calculate

if (!$error)
{
    $arg1 = intval($arg1);
    $arg2 = intval($arg2);
    switch ($operation)
    {
        case "add":
            $result = $arg1 + $arg2;
            break;
        case "sub":
            $result = $arg1 - $arg2;
            break;
        case "mul":
            $result = $arg1 * $arg2;
            break;
        case "div":
            $result = $arg1/$arg2;
            break;
        default:
            $error = true;
            $errorMessage = $errorMessage."Unknown operation ".$operation.".\n";
    }
}
if ($error)
{
    echo "ERROR\n\n$errorMessage";
}
else
{
    echo "$arg1 $operation $arg2 = $result";
}