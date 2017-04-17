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

        
})        
                    
                
                

        