$(document).ready(function(){
	cat();
	brand();
	product();
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

				if($("body").width() < 480){

					$("body").scrollTop(683);

	
        
        		}

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

			url	:"register.php",

			method	:"POST",

			data	:$("form").serialize(),

			success	:	function(data){

                            $("#signup_msg").html(data);

					
                                        
                        
                    }
                            
            })

        })
        
        $("#login").click(function(event){
		event.preventDefault();
		var email = $("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url	:"action.php",
			method:	"POST",
			data	:	{userLogin:1,userEmail:email,userPassword:pass},
			success	:function(data){
                            alert(data);
				
                }
                            
            })

        })
})


            
                
                

        
