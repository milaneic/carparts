<?php

session_start();
$total_price=0;
$total_item=0;

$output='
<div class="table-responsive" id="order-table">
<tr>
<th width="40%">Naziv proizvoda:</th>
<th width="10%">Kolicina:</th>
<th width="20%">Cena:</th>
<th width="15%">Ukupno:</th>
<th width="5%">Akcije:</th>
</tr>
';

if(!empty($_SESSION["shopping_cart"]))
{
foreach($_SESION["shopping_cart"] as $keys->$values)
{
    $output.='
    <tr>
    <td>'.$values["product_name"].'</td>
    <td>'.$values["product_quantity"].'</td>
    <td align="right">$'.$values["product_price"].'</td>
    <td align="right">$'.number_format($values["product_quantity"]*$values["product_price"],2).'</td>
    <td><button name="delete" class="btn" id="'.$values["product_quantity"].'">Obrisi</button></td>
    
    </tr>
    ';
    $total_price=$total_price+($values["product_quantity"]*$values["product_price"]);
    $total_item=$total_item+1;

    $output.='
    <tr>
    <td colspan="3" align="right">Ukupno</td>
    <td align="rigth">$'.number_format($total_price,2).'</td></td>
    <td></td>
    </tr>';
}
}
else    
{
$output.='
<tr>
<td colspan="5" align="center">Vasa korpa je prazna!</td>
    <tr>
';
}
$output.='</table></div>';
$data=array('cart_details' => $output,
'total_price'=>'$'.number_format($total_price,2),
'total_item'=>$total_item);

echo json_encode($data);
?>