<?php

function component($productimg, $productname, $productprice, $productid, $type, $button, $Status, $btn, $maxqty)
{
  $element = "
      
    <div class=\"col-md-4\">
          <div class=\"card mb-4 shadow-sm\">
          <form action=\"main.php\" method=\"post\">
             <img src=\"$productimg\" width=\"100%\" height=\"auto\">
            <div class=\"card-body\">
              <h4 class=\"card-text\" >$productname</h4>
               <input type='hidden' name='ordername' value=\"$productname\">
               
              <p class=\"card-text\"><h5 class=\"card-text\" >Php  $productprice</h5></p>
              <input type='hidden' name='orderprice' value=\"$productprice\">
        <div class=\"form-group mb-3\">
          <span class=\"qty\" ><h5 class=\"card-text\" >Qty: <input class=\"input\" type=\"number\" name=\"qty\"  value=\"1\" min=\"1\" max=$maxqty></h5> </span>
        </div>
              <h5 class=\"$btn col-12\">$Status</h5>
              <div class=\"d-flex justify-content-between align-items-center\">
              
                <div class=\"btn-group mx-auto\">
                  <button type=\"$button\" class=\"btn btn-danger col-12 $type\" name=\"add\">Add to cart<span class=\"ml-2\"><i class=\"fa fa-shopping-cart\"></i></span></button>
                  <input type='hidden' name='productid' value=\"$productid\">
                </div>
              </div>
            </div>
            </form>
            </div>
        </div>
    
               
                   
    ";
  echo $element;
}


function getcart($productimg, $productname, $productprice, $productid, $producttprice, $productqty, $btn, $status, $preparing)
{

  $element = "
         <link href=\"./css/form-validation.css\" rel=\"stylesheet\">
     <form action=\"main_cart.php?action=remove&id=$productid\" method=\"post\" >
     <li class=\"row list-group-item d-flex lh-condensed\">
        <div class=\"item-img\">
          <img src=\"$productimg\" width=\"100\" height=\"auto\">
        </div>

        <div class=\"item-desc\">
            <div class=\"item-name\">$productname</div>
            <div class=\"item-price\">Php $productprice</div>

            <div class=\"item-qty mx-auto\">
              <button type=\"button\" id=\"btnminus\" class=\"btn\" onclick=\"minusitem($productid)\">&minus;</button>
              <input type=\"number\" name=\"add\" id=\"valqty\" class=\"outline-danger\"  value=$productqty>
              <button type=\"button\" id=\"btnplus\" class=\"btn\" onclick=\"additem($productid)\">&plus;</button>
            </div>

            <div class=\"item-total mx-auto\">Php $producttprice.00</div>
            <div class=\"item-btn\">
              <button type=\"$btn\" name=\"remove\" class=\"btn btn-danger btn-sm $status\">$preparing</button>
        </div>
            </div>
            
      </li>

          </form>
          

                

                


                
    ";
  echo $element;
}
function getbill($productimg, $productname, $productprice, $productid, $producttprice, $productqty)
{
  $element = "
    


      <link href=\"./css/form-validation.css\" rel=\"stylesheet\">
     <form action=\"billout.php\" method=\"post\" >
        <li class=\"row list-group-item d-flex lh-condensed\">
        <div class=\"item-img\">
          <img src=\"$productimg\" width=\"100\" height=\"auto\">
        </div>

        <div class=\"item-desc\">
            <div class=\"item-name\">$productname</div>
            <div class=\"item-price\">Php $productprice</div>
            <div class=\"item-qty\">Qty: $productqty
            </div>
            <div class=\"item-total\">Php $producttprice</div>
        </div>
      </li>
    </form>
    </br>

                              ";

  echo $element;
}

function getactivetable($num, $uname, $status, $date, $date_out, $btn, $diss, $payment, $kick, $db, $good, $uid, $discount, $change, $paying, $hide, $discount_hide)
{

  $element = "
    <form action=\"tables.php?action=kick&sta=$uname&id=$num&userid=$uid\" method=\"post\" >
            <tr>
              <td>$num</td>
              <td>$uname</td>
              <td class=\"$btn\">$status</td>
              <td class=\"text-muted\">$date</td>
              <td class=\"text-muted\">$date_out</td>
              
              <td><button type=\"$paying\" class=\"btn btn-primary btn-sm\" name=\"good\" $db $hide>$payment</button></td>
                <input type='hidden' name='goodid'value='$good'>
                <td>₱ $change</td>

                <td><button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"discount\" $db $discount_hide>$discount</button></td>
                <input type='hidden' name='discountid'value='$discount'>
           

              <td><button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"kick\" $diss>Kick</button></td>
                <input type='hidden' name='kickid'value='$kick'>
            </tr>
            </form>

   ";
  echo $element;
}
function takeout_admin($takeoutid, $takeout, $status, $buttoname, $paymentname)
{
  $element = "
         <form action=\"takeout_admin.php?action=takeout&id=$takeoutid\" method=\"post\">
          <td>$takeout</td>
          <td>$status</td>
          <td><button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"discount_takeout\">$buttoname</button></td>

          <td><button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"payment_takeout\">$paymentname</button></td>
         </form>

   ";
  echo $element;
}
function ttable($tablename, $tableid, $type, $button)
{
  $element = "

<form action=\"home.php\" method=\"post\">
     
     
        
          
          <button class=\"couple mx-5 btn btn-lg text-success $type\" name=\"reserve\" type=\"$button\" disable>$tablename</button>
          <input type='hidden' name='tableid'value='$tableid'>
          
        
        
        </form>
        ";
  echo $element;
}
function tttable($tablename, $tableid, $type, $button)
{
  $element = "

<form action=\"home.php\" method=\"post\">
     
     
        
           <button class=\"family mx-1 btn btn-lg text-success display-1 $type\" name=\"reserve\" type=\"$button\">$tablename</button>
          
          
          <input type='hidden' name='tableid'value='$tableid'>
          
        
        
        </form>
        ";
  echo $element;
}




function getorder($tablename, $tablenum, $usern, $user, $status, $time, $out, $color, $served, $btn, $itemid, $useryes)
{
  $element = "

<form action=\"orders.php?action=served&sta=$served&date=$time&item=$tablename&itemid=$itemid&userid=$useryes\" method=\"post\">
     
     
        
            <tr>
              <td>$tablename</td>
              
              <td>$tablenum</td>
              <td>$usern</td>
              <td>$user</td>
              <td class=\"$color\">$status</td>
        <td class=\"text-muted\">$time</td>
        <td class=\"text-muted\">$out</td>
        <td><button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"serve\" $btn>Served</button></td>
                <input type='hidden' name='serveid'value=$served'>
            </tr>
        
        </form>
        ";
  echo $element;
}

function getfeedback($umail, $date, $feedback)
{
  $element = "

<form action=\"feedback.php\" method=\"post\">
     
     
        
       <div class=\"media border p-3 mt-3\">
         <i class=\"fas fa-user-circle display-3 mr-3\"></i>
         <div class=\"media-body\">
           <h4>$umail<small class=\"text-muted\"><i>  Posted on $date</i></small></h4>
           <p>$feedback</p>      
         </div>
       </div>
        
        </form>
        ";
  echo $element;
}
/*
function getreceipt($name,$price,$qty,$total){
 $element = "

<form action=\"main_receipt.php\" method=\"post\">
     
     
        
       <li class=\"row list-group-item d-flex justify-content-between lh-condensed\">
          <div class=\"col-2\">
            <h6 class=\"my-0 text-left\" name=\"rename\" id=\"rename\">$name</h6>
          </div>
      <div class=\"col-2\">
            <h6 class=\"my-0 text-right\" name=\"reprice\" id=\"reprice\">Php $price</h6>
          </div>
      <div class=\"col-2\">
            <label for=\"qty\" class=\"ml-4\" name=\"reqty\" id=\"reqty\">$qty</label>
          </div>
          <div class=\"col-2\">
            <p class=\"my-0 text-right\" name=\"retotal\" id=\"retotal\">Php $total</p>
          </div>
          </li>
        
        
        </form>
        ";
    echo $element;
}*/

function userreceipt($or, $user, $torder, $tqty, $subtotal, $table, $date, $btncheck)
{


  $element = "

<form action=\"issued.php?action=check&id=$or\" method=\"post\">
     
     
        
       <tr>
              <td>$or</td>
              <input type='hidden' name='or'value=$or'>
              <td>$user</td>
              <input type='hidden' name='u'value=$user'>
              <td>$torder</td>
              <td>$tqty</td>
              <td>Php $subtotal</td>
              <td>$table</td>
              <td class=\"text-muted\">$date</td>
              

              <td><button type=\"submit\"  class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\" name=\"check\"  >Check</button></td>
               
                <input type='hidden' name='checkitem' value=$btncheck' class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">
            </tr>
            </form> 
       
        
        ";
  echo $element;
}
function stocks($img, $name, $price, $qty, $stockid)
{
  $element = "

<form action=\"stocks.php?action=update&stock=$qty\" method=\"post\">
     
     
            <tr>
             <td>
         <img src=\"$img\" width=\"50\" height=\"auto\">
         <span>$name</span>
       </td>
        <td>Php $price</td>

              <td><input class=\"input\" type=\"number\" name=\"stockqty\"  value=\"$qty\"></td>
            
        <td><button type=\"submit\" class=\"btn btn-primary btn-sm\" name=\"edit\">EDIT</button></td>
         <input type='hidden' name='stockid'value='$stockid'>
            </tr>


            <div class=\"modal fade my-auto\" id=\"myModal\" role=\"dialog\">
        <div class=\"modal-dialog modal--dialog-centered modal-lg\">

        
         <div class=\"modal-header bg-dark\">
            <h2 class=\"modal-title text-white\">RECEIPT</h2>
            <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\">&times;</button>
          </div>

          <div class=\"modal-body\">  
            <div class=\"row text-dark\">
              <div class=\"col-12 mx-auto\">
                  <div class=\"row d-flex justify-content-between\">
                    <div class=\"col-2\">
                      <h5 class=\"my-0 text-left\"><b>Order</b></h5>
                    </div>
                    <div class=\"col-2\">
                      <h5 class=\"my-0 text-right\"><b>Unit Price</b></h5>
                    </div>
                    <div class=\"col-2\">
                      <h5 class=\"my-0 ml-4\"><b>Qty</b></h5>
                    </div>
                    <div class=\"col-2\">
                      <h5 class=\"my-0 text-right\"><b>Total</b></h5>
                    </div>
                    <div class=\"col-2\">
                      <h5 class=\"my-0 text-right\"><b>Time Paid</b></h5>
                    </div>
                    <div class=\"col-2\">
                      <h5 class=\"my-0 text-right\"><b>Cashier</b></h5>
                    </div>
                  </div>

        
        </form>
        ";
  echo $element;
}


function allitems()
{
  $element = "
 
      <script src=\"jquery-3.5.1.min.js\"></script>
    <script src=\"sweetalert2.all.min.js\"></script>

        <form action=\"issued.php\" method=\"post\">
          
            <script>
     Swal.fire({
  title: 'Ordered   yawa',  
  width: 600,
  padding: '3em',
  
  background: '#fff url(https://media.giphy.com/media/xTiTnF6v2Th2GPmZ7q/giphy.gif)',
 
})
     
            </script>

        
        </form>
        ";
  echo $element;
}


/*function allitemsauantity($a1,$a2,$a3,$a4,$b1,$b2,$b3,$b4,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$d1,$d2){
 $element = "
 
      

        <form action=\"dashboard.php\" method=\"post\">
          
              <div class=\"col-11 col-md-3\">
          <div class=\"card mb-4 shadow-mg\">
            <img src=\"./images/sweet-n-sour.png\" width=\"250\" height=\"auto\"></img>
            <div class=\"card-body\">
              <h5 class=\"card-text\">Swwet N Sour Fish Fillet Rice Bowl (RB#1)</h5>
              <h6 class=\"card-text text-primary\">Sales Count: $a1</h6>
              <div class=\"d-flex justify-content-between align-items-center\">
               
              </div>
            </div>
          </div>
        </div>

        <div class=\"col-11 col-md-3\">
          <div class=\"card mb-4 shadow-mg\">
            <img src=\"./images/tofu.png\" width=\"250\" height=\"auto\"></img>
            <div class=\"card-body\">
              <h5 class=\"card-text\">Tofu Rice Bowl (RB#2)</h5>
              <h6 class=\"card-text text-primary\">Sales Count: $a2</h6>
              <div class=\"d-flex justify-content-between align-items-center\">
               
              </div>
            </div>
          </div>
        </div>

              

        
        </form>
        ";
    echo $element;
}*/
function dailysales($date, $tnorder, $dis, $vat, $sales, $gsales)
{
  $element = "
 
      

        <form action=\"daily_sales.php\" method=\"post\">
          
            <tr>
              <td>$date</td>
              <td>$tnorder</td>
              <td>Php $dis</td>
              <td>Php $vat</td>
              <td>Php $sales</td>
              <td>Php $gsales</td>
            </tr>

        
        </form>
        ";
  echo $element;
}

function weeklysales($date, $tnorder, $dis, $vat, $sales, $gsales)
{
  $element = "
 
      

        <form action=\"weekly_sales.php\" method=\"post\">
          
             <tr>
              <td>Week $date</td>
              <td>$tnorder</td>
              <td>Php $dis</td>
              <td>Php $vat</td>
              <td>Php $sales</td>
              <td>Php $gsales</td>
            </tr>

        
        </form>
        ";
  echo $element;
}
function monthlysales($date, $tnorder, $dis, $vat, $sales, $gsales)
{
  $element = "
 
      

        <form action=\"monthly_sale.php\" method=\"post\">
          
             <tr>
              <td>$date</td>
              <td>$tnorder</td>
              <td>Php $dis</td>
              <td>Php $vat</td>
              <td>Php $sales</td>
              <td>Php $gsales</td>
            </tr>

        
        </form>
        ";
  echo $element;
}

function bill($image, $name, $price, $qty, $tpirce)
{
  $element = "
 
      

        <link href=\"./css/form-validation.css\" rel=\"stylesheet\">
     <form action=\"bill-out.php\" method=\"post\" >
        <li class=\"row list-group-item d-flex lh-condensed\">
        <div class=\"item-img\">
          <img src=\"$image\" width=\"100\" height=\"auto\">
        </div>

        <div class=\"item-desc\">
            <div class=\"item-name\">$name</div>
            <div class=\"item-price\">Php $price</div>
            <div class=\"item-qty\">Qty: $qty
            </div>
            <div class=\"item-total\">Php $tpirce</div>
        </div>
      </li>
    </form>
    
    
        ";
  echo $element;
}


function b($n)
{
  $el = " 
    
       <form action=\"main_receipt.php\" method=\"POST\">
      
          <li class='row d-flex mb-3 mr-3 justify-content-between lh-condensed'>
            <div class='col-1 pt-1'>
              <h6 class='my-0 font-weight-bold text-left'>$n</h6>
            </div>
            
          </li>
           
    </form>";
  echo $el;
}


function takeoutb($n)
{
  $el = " 
    
       <form action=\"takeout_receipt.php\" method=\"POST\">
      
          <li class='row d-flex mb-3 mr-3 justify-content-between lh-condensed'>
            <div class='col-1 pt-1'>
              <h6 class='my-0 font-weight-bold text-left'>$n</h6>
            </div>
            
          </li>
           
    </form>";
  echo $el;
}
function cartbutton($dissable, $sta)
{

  $element = "
      <button type=\"$dissable\" class=\"btn btn-danger font-weight-bold col-12 $sta\" name=\"placeorder\">PLACE ORDER</button>
       ";

  echo $element;
}

function takeout_cartbutton($dissable, $sta, $invi)
{

  $element = "
      <button type=\"$dissable\" class=\"btn btn-danger font-weight-bold col-12 $sta\" name=\"takeout\" data-toggle=\"modal\" data-target=\"#payment\" $invi>TAKE OUT</button>
       ";

  echo $element;
}

function billoutbutton($dissable, $sta)
{

  $element = "<form action=\"bill-out.php\">
  <div class=\"row\">
  <button type=\"$dissable\" class=\"btn btn-danger font-weight-bold col-12 $sta\" data-toggle=\"modal\" data-target=\"#payment\" >BILL OUT</button>
  </div>
  </form>";

  echo $element;
}


function blockaccount($username, $color, $status, $disable, $block, $button, $userid)
{
  $element = "
  <form action=\"block-account.php?action=block&&id=$userid\" method=\"post\">
  <tr>
    <td>$username</td>
      <td class=$color>$status</td>
    <td>
      <button type=\"$button\" name=\"unblock\" class=\"btn btn-primary btn-sm $disable\">$block</button>
    </td>
  </tr>
  </form>
  ";
  echo $element;
}



function takeout($productimg, $productname, $productprice, $productid, $type, $button, $Status, $btn, $maxqty)
{
  $element = "
      
    <div class=\"col-md-4\">
          <div class=\"card mb-4 shadow-sm\">
          <form action=\"takeout_main.php\" method=\"post\">
             <img src=\"$productimg\" width=\"100%\" height=\"auto\">
            <div class=\"card-body\">
              <h4 class=\"card-text\" >$productname</h4>
               <input type='hidden' name='takeout_ordername' value=\"$productname\">
               
              <p class=\"card-text\"><h5 class=\"card-text\" >Php  $productprice</h5></p>
              <input type='hidden' name='orderprice' value=\"$productprice\">
        <div class=\"form-group mb-3\">
          <span class=\"qty\" ><h5 class=\"card-text\" >Qty: <input class=\"input\" type=\"number\" name=\"takeout_qty\"  value=\"1\" min=\"1\" max=$maxqty></h5> </span>
        </div>
              <h5 class=\"$btn col-12\">$Status</h5>
              <div class=\"d-flex justify-content-between align-items-center\">
              
                <div class=\"btn-group mx-auto\">
                  <button type=\"$button\" class=\"btn btn-danger col-12 $type\" name=\"add\">Add to cart<span class=\"ml-2\"><i class=\"fa fa-shopping-cart\"></i></span></button>
                  <input type='hidden' name='takeout_productid' value=\"$productid\">
                </div>
              </div>
            </div>
            </form>
            </div>
        </div>
    
               
                   
    ";
  echo $element;
}


function takeoutcart($productimg, $productname, $productprice, $productid, $producttprice, $productqty, $btn, $status, $preparing)
{

  $element = "
         <link href=\"./css/form-validation.css\" rel=\"stylesheet\">
     <form action=\"takeout_cart.php?action=remove&id=$productid\" method=\"post\" >
     <li class=\"row list-group-item d-flex lh-condensed\">
        <div class=\"item-img\">
          <img src=\"$productimg\" width=\"100\" height=\"auto\">
        </div>

        <div class=\"item-desc\">
            <div class=\"item-name\">$productname</div>
            <div class=\"item-price\">Php $productprice</div>
            <div class=\"item-qty\">
              <button type=\"button\" id=\"btnminus\" class=\"btn\" onclick=\"takeout_minusitem($productid)\">&minus;</button>
              
            <input type=\"number\" name=\"add\" id=\"valqty\" class=\"outline-danger\"  value=$productqty>

              <button type=\"button\" id=\"btnplus\" class=\"btn\" onclick=\"takeout_additem($productid)\">&plus;</button>

            </div>
            <div class=\"item-total\">Php $producttprice.00</div>
            <div class=\"item-btn\">
              <button type=\"$btn\" name=\"takeout_remove\" class=\"btn btn-danger btn-sm $status\">$preparing</button>
        </div>
            </div>
            
      </li>

          </form>
          

                

                


                
    ";
  echo $element;
}
