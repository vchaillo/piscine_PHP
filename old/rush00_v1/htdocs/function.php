<?PHP
function get_name_by_id($id_product)
{
    $username = "root";
    $passwd = "12345";
    $dbname = "minishop";

    $minishop = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
    $result = mysqli_query($minishop, "SELECT * FROM Product");
    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row["id"] == $id_product)
        {
            $name = $row["name"];
            return($name);
        }
    }
}

function get_price_by_id($id_product)
{
    $username = "root";
    $passwd = "12345";
    $dbname = "minishop";

    $minishop = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
    $result = mysqli_query($minishop, "SELECT * FROM Product");
    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row["id"] == $id_product)
        {
            $price = $row["price"];
            return($price);
        }
    }
}

function get_description_by_id($id_product)
{
    $username = "root";
    $passwd = "12345";
    $dbname = "minishop";

    $minishop = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
    $result = mysqli_query($minishop, "SELECT * FROM Product");
    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row["id"] == $id_product)
        {
            $description = $row["description"];
            return($description);
        }
    }
}

function get_image_by_id($id_product)
{
    $username = "root";
    $passwd = "12345";
    $dbname = "minishop";

    $minishop = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
    $result = mysqli_query($minishop, "SELECT * FROM Product");
    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row["id"] == $id_product)
        {
            $image = $row["image"];
            return($image);
        }
    }
}
?>