
const rateWtax = document.querySelector("#rateWtax");
const rate = document.querySelector("#rate");
const quantity = document.querySelector("#quantity");
const discount = document.querySelector("#discount");
const cgst = document.querySelector("#cgst");
const cgstamt = document.querySelector("#cgstamt");
const sgstamt = document.querySelector("#sgstamt");
const sgst = document.querySelector("#sgst");
const totaltax = document.querySelector("#totaltax");
const totalamt = document.querySelector("#totalamt");

$('.action').on("submit",function(e)
{
    e.preventDefault();
});

const searchinput = document.querySelector("#searchinput");
$(function () {
    //serachbar 
    setInterval(function () {
        if ( searchinput.value!= "") {
            $('#searchlist').show();
        }
        else {
            $('#searchlist').hide();
        }
        
     
    }, 100);
});

setInterval(function()
{

    //calculate cgst amount
    if(rate.value>0 && quantity.value>0 && cgst.value>0)
    {
        var amt = (rate.value * quantity.value);
        var totalamount = amt-(amt*discount.value/100);

        //calculate cgst
        var cg = totalamount * cgst.value/100;
        
        cgstamt.value = cg.toFixed(2);
        
    }
    if(rate.value>0 && quantity.value>0 && sgst.value>0)
    {
        var amt = (rate.value * quantity.value);
        var totalamount = amt-(amt*discount.value/100);

        //calculate cgst
        var sg = totalamount * sgst.value/100;
        
        sgstamt.value = sg.toFixed(2);
        
    }

    if(sgstamt.value>0 && cgstamt.value>0)
    {
        totaltax.value = (parseInt(sgstamt.value)+parseInt(cgstamt.value)).toFixed(2);
        var tamt = (rate.value * quantity.value);
        var totalamountt = tamt-(tamt*discount.value/100);
        var netamount = totalamountt+parseInt(totaltax.value);
        totalamt.value = netamount.toFixed(2);
    }


  
},500);
