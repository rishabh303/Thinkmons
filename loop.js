
            var x;
        $(document).ready(function(){
      //  $("button").click(function(){

            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'http://www.car-ing.com/app/Get_Events.php',
                success: function(data) {
                	var len = data.length;
                	console.log(len);
                	var con=data[1];
                	var i;
                   x="";
                	for(i=0;i<len;i++){
                		console.log("we are in loop");
                		console.log(data[i].EVENT_ID);
                		console.log(data[i].EVENT_NAME);
                		console.log(data[i].EVENT_DESCRIPTION);
                		console.log(data[i].EVENT_URL);
                    x += data[i].EVENT_ID + "<br>";
                     x += data[i].EVENT_NAME + "<br>";
                     x += data[i].EVENT_URL + "<br>";


                	}

                	
                }

    
        //    });
             });
});
                   for(var i = 0; i< 5; i++)
      {
           document.write('<div class="col-sm-4">');
           document.write('<div class="product-image-wrapper">');
document.write('    <div class="single-products">');
document.write('    <div class="productinfo text-center">');
document.write('<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />');
document.write('     </div>');
document.write('     <div class="product-overlay">');
document.write('      <div class="overlay-content"> ');
document.write('     </div>');
document.write('     </div>');
document.write('     </div>');
document.write('     </div>');
document.write('     </div>');
 }








	
