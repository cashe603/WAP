$(document).ready(function(){
	cat();
	brand();
	product();
        login();
        cart_container();
        cart_checkout();
        cart_count();
        
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}

        function brand(){
                $.ajax({
                        url     :"action.php",
                        method  :"POST",
                        data    : {brand:1},
                        success : function(data){
                                $("#get_brand").html(data);
    
                        }
                })
        }
        
        
        function product(){
                $.ajax({
                        url     :"action.php",
                        method  :"POST",
                        data    : {getProduct:1},
                        success : function(data){
                                $("#get_product").html(data);
    
                        }
                })
        }
        
        $("body").delegate(".category","click",function(event){
                $("#get_product").html("<h3>Loading...</h3>");
                event.preventDefault();
                var cid = $(this).attr('cid');
                    $.ajax({

			url		:	"action.php",
                        method	:	"POST",
                        data	:	{get_selected_Category:1,cat_id:cid},
                        success	:	function(data){
                                $("#get_product").html(data);
                                if($("body").width() < 480){
                                $("body").scrollTop(683);
                                }

			}
		})

	})

        $("body").delegate(".brand","click",function(event){
                event.preventDefault();
                var bid = $(this).attr('bid');
                    $.ajax({

			url		:	"action.php",
                        method	:	"POST",
                        data	:{selectBrand:1,brand_id:bid},
                        success	:	function(data){
                            $("#get_product").html(data);
                                if($("body").width() < 480){
                                    $("body").scrollTop(683);
                                }

			}

		})

	})
        $("#search_btn").click(function(){
            var pkeywords =$("#search").val();
            if(pkeywords != "") {
                
			$.ajax({

			url		:	"action.php",
                        method	:	"POST",
                        data	:{search:1,pkeywords:pkeywords},
                        success	:	function(data){
                        $("#get_product").html(data);

			}

		})
        }
        
        
        else {
            alert("Input required");
        }
            
        })
        
        $(document).keypress(function(e) {
    		if(e.which == 13) {
        alert('Tap or Click To Search.Enter is Disabled');
        }
    })
        
        $("#signup_button").click(function(){
            
            $.ajax({

			url	        :"register.php",
                        method	:"POST",
                        data	        :$("form").serialize(),
                        success	:	function(data){
                        $("#signup_msg").html(data);

                }
            })
        })
        
    function login(){
        $(document).ready(function(){  
      $('#login_button').click(function(event){
          event.preventDefault();
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"login.php",  
                     method:"POST",  
                     data:{username:username, password:password},  
                     success:function(data){  
                          if(data == 'No')  
                          {  
                               alert("Wrong Data");  
                          }  
                          else  
                          {  window.location.replace("profile.php");alert("Welcome Padawan");
                              }  
                     }  
                })  
           }  
           else  
           {  
                alert("Both Fields are required");  
           }  
      })  
        })
}

    $("body").delegate("#product","click",function(event){
        event.preventDefault();
        var p_id = $(this).attr('p_id');
                $.ajax({

			url		:	"action.php",
                        method	:	"POST",
                        data	:{addProduct:1,proId:p_id},
                        success:function(data){  
                            $("#product_msg").html(data);
                            cart_count();
                     
                        }
                })
                
    })
    

	function cart_container(){
            $.ajax({

			url	         :	"action.php",
                        method	:	"POST",
                        data	:	{get_cart_product:1},
                        success	:	function(data){
                        $("#cart_product").html(data);

			}
		})
        }
	
	function cart_count(){

		$.ajax({

                    
			url	:	"action.php",

			method	:	"POST",

			data	:	{cart_count:1},

			success	:	function(data){

				$(".badge").html(data);

			}

		})

	}

	

	$("#cart_container").click(function(event){

		event.preventDefault();

		$.ajax({

			url	:	"action.php",

			method	:	"POST",

			data	:	{get_cart_product:1},

			success	:	function(data){

				$("#cart_product").html(data);

			}

		})

		

	})
	
	
	function cart_checkout(){

		$.ajax({

			url	         :	"action.php",

			method	:	"POST",

			data	:	{cart_checkout:1},

			success	: function(data){

				$("#cart_checkout").html(data);

			}

		})

	}
	
	
	$("body").delegate(".qty","keyup", function () {
                
            var pid =$(this).attr("pid");
            var qty = $("#qty-"+pid).val();
            var price = $("#price-"+pid).val();
            var total = qty * price;
            $("#total-"+pid).val(total); 
            
        })
        
        $("body").delegate(".remove", "click", function(event){
            event.preventDefault();
            var pid = $(this).attr("remove_id");
                $.ajax({

			url	         :   "action.php",

			method	:     "POST",

			data	:	{removeFromCart:1,removeId:pid},

			success	: function(data){

                            $("#cart_msg").html(data);
                            cart_checkout();
				
                        }

		})

        })
        
        $("body").delegate(".update","click",function(event){

		event.preventDefault();

		var pid = $(this).attr("update_id");

		var qty = $("#qty-"+pid).val();

		var price = $("#price-"+pid).val();

		var total = $("#total-"+pid).val();

		$.ajax({

			url	:"action.php",

			method	:	"POST",

			data	:	{updateProduct:1,updateId:pid,qty:qty,price:price,total:total},

			success	:	function(data){

				$("#cart_msg").html(data);

				cart_checkout();

			}

		})

	})
	
	
})
