<?
$arg1 = intval($_GET["arg1"]);
$arg2 = intval($_GET["arg2"]);
$operation = $_GET["operation"];
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
        $result = "Error!";
}
echo "$arg1 $operation $arg2 = $result";
