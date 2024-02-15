<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imagination Invoice Example</title>
    <!-- For Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
    
    <!-- For Invoice  -->
    <script src="invoice.js"></script>
     <style>
        .btn , .NoPrint 
{
    display: none;
}

.form-control
{
    border: 0px;
}

.input-group-text
{
    border: 0px;
    background-color: white;
}

table 
{
    border : 1px solid black;
}
.input-group-text {
   width: 85px;
}   
     </style>

</head>
  <body>
    @php
    $settings = DB::table('settings')->first();
    @endphp

    <div class="container ">
       

        <div class="card">
            <div class="card-header text-center">
              <h4>INVOICE</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Customer</span>
                            <input type="text" class="form-control" placeholder="Customer"  >
                        </div>
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Address</span>
                            <input type="text" class="form-control" placeholder="Address"  >
                        </div>
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >City</span>
                            <input type="text" class="form-control" placeholder="City"  >
                        </div>
                    </div>
                    <div class="col-4">
                      
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Inv. No</span>
                            <input type="text" class="form-control" placeholder="Inv. No"  >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" >Inv. Date</span>
                            <input type="date" class="form-control" placeholder="Inv. Date"  >
                        </div>



                    </div>
                </div>


                <table class="table table-bordered">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Rate</th>
                        <th scope="col" class="text-end">Amount</th>
                        <th scope="col" class="NoPrint">                         
                            <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>
                          
                        </th>

                      </tr>
                    </thead>
                    <tbody id="TBody">
                        @foreach ($order->order_item as $key=>$item) 
                      <tr id="TRow" class="d-none">
                        <td scope="row">{{ $key+1 }}</td>
                        <td scope="row">{{ $item->product->product_name }}</td>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="number" class="form-control text-end" name="qty" onchange="Calc(this);" value="{{  $item->quantity }}"></td>
                        <td><input type="number" class="form-control text-end" name="rate"  onchange="Calc(this);"></td>
                        <td><input type="number" class="form-control text-end" name="amt" value="0" disabled=""></td>
                        <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>


                  <div class="row">
                    <div class="col-8">
                      
                        <button type="button" class="btn btn-primary" onclick="GetPrint()">Print</button>

                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Total</span>
                            <input type="number" class="form-control text-end" id="FTotal" name="FTotal" disabled="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >GST</span>
                            <input type="number" class="form-control text-end" id="FGST" name="FGST" onchange="GetTotal()">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Net Amt</span>
                            <input type="number" class="form-control text-end" id="FNet" name="FNet" disabled="">
                        </div>


                    </div>
                </div>
             </div>
          </div>

    </div>



    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    function GetPrint()
{
    /*For Print*/
    window.print();
}

function BtnAdd()
{
    /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find("input").val('');
    $(v).removeClass("d-none");
    $(v).find("th").first().html($('#TBody tr').length - 1);
}

function BtnDel(v)
{
    /*Delete Button*/
       $(v).parent().parent().remove(); 
       GetTotal();

        $("#TBody").find("tr").each(
        function(index)
        {
           $(this).find("th").first().html(index);
        }

       );
}

function Calc(v)
{
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();
    
    var qty = document.getElementsByName("qty")[index].value;
    var rate = document.getElementsByName("rate")[index].value;

    var amt = qty * rate;
    document.getElementsByName("amt")[index].value = amt;

    GetTotal();
}

function GetTotal()
{
    /*Footer Calculation*/   

    var sum=0;
    var amts =  document.getElementsByName("amt");

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ; 
    }

    document.getElementById("FTotal").value = sum;

    var gst =  document.getElementById("FGST").value;
    var net = +(sum) + +(gst);
    document.getElementById("FNet").value = net;

}
    </script>  
</body>
</html>