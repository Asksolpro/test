// JavaScript Document
  $(function() {
				a = 0;
                $( "#sd" ).datepicker({
                    // before datepicker opens run this function
                    beforeShow: function(){
						var theDateTo = new Date($( "#ed" ).datepicker('getDate'));
						
						/*var endtoday = theDateTo.setDate(theDateTo.getDate());*/
					    endtoday = new Date(theDateTo);
						var dd = endtoday.getDate();
					    var mm = endtoday.getMonth()+1; //January is 0! 
						var yyyy = endtoday.getFullYear(); 
						if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
						endtoday = dd+'/'+mm+'/'+yyyy;
						
                        // this gets today's date       
                        var theDate = new Date();
                        // sets "theDate" 2 days ahead of today
                        theDate.setDate(theDate.getDate());
                        // set min date as 2 days from today
                        $(this).datepicker('option','minDate',theDate);         
                    },
                    // When datepicker for start date closes run this function
					
                    onClose: function(){
						 $(".ques").slideDown(500);
						
                        // this gets the selected start date     
                        var theDate = new Date($(this).datepicker('getDate'));
						
						
						
						if(session_dateEnd==''){
							if(a==0){
								var newEndDate =  theDate.setDate(theDate.getDate() + 1);
								var newEndDate = new Date(newEndDate);
								var dd = newEndDate.getDate();
								var mm = newEndDate.getMonth()+1; //January is 0! 
								var yyyy = newEndDate.getFullYear(); 
								if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
								var newEndDate = dd+'/'+mm+'/'+yyyy;
								
								endtoday = newEndDate;
							}
						}
						
						a = a+1;
						
						
						
								
					
						var newtheDate = new Date($(this).datepicker('getDate'));
						//alert(newtheDate);
                        // set min date for the end date as one day after start date
						 theDate.setDate(theDate.getDate() + 1);
                        $('#ed').datepicker('option','minDate',theDate);
						startday =newtheDate.setDate(newtheDate.getDate());
						startday = new Date(startday);
						
						var dd = startday.getDate();
					    var mm = startday.getMonth()+1; //January is 0! 
						var yyyy = startday.getFullYear(); 
						if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
						startday = dd+'/'+mm+'/'+yyyy; 
					
						
						 	$.ajax({
									 type: "POST",
									 dataType: "html",
									 url: url_night,
									 data: "datefrom="+startday+"&dateto="+endtoday,
									 success: function(msg){
										 $("select#malam").html(msg);
										 
										 
									 }
								  }); 
                       }
					   
					  
                      
                });
                
                $( "#ed" ).datepicker({
                    // before datepicker opens run this function
                    beforeShow: function(){
                        // this gets today's date       
                        var theDate = new Date($( "#sd" ).datepicker('getDate'));
						
                        // sets "theDate" 2 days ahead of today
                        theDate.setDate(theDate.getDate() + 1);
                        // set min date as 2 days from today
                        $(this).datepicker('option','minDate',theDate);    
						     
                    },
					 onClose: function(){
						 //alert("apakah anda ingin mengganti type kamar");
						
                        // this gets the selected start date     
                        var theDate = new Date($( "#ed" ).datepicker('getDate'));
                        // this sets "theDate" 1 day forward of start date
			
                        $('#ed').datepicker('option','minDate',theDate);
						
						var endtoday = theDate.setDate(theDate.getDate());
						var endtoday = new Date(endtoday);
						var dd = endtoday.getDate();
					    var mm = endtoday.getMonth()+1; //January is 0! 
						var yyyy = endtoday.getFullYear(); 
						if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
						endtoday = dd+'/'+mm+'/'+yyyy; 
						
						
						
						//------------------------------------
						
						theDate.setDate(theDate.getDate() - 0);
						today =theDate;
						
					    var dd = today.getDate();
					    var mm = today.getMonth()+1; //January is 0! 
						var yyyy = today.getFullYear();
						if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
						 today = dd+'/'+mm+'/'+yyyy; 
						
							 $.ajax({
									 type: "POST",
									 dataType: "html",
									 url: url_night,
									 data: "datefrom="+startday+"&dateto="+today,
									 success: function(msg){
										 $("select#malam").html(msg);
									  }
								  });       
						 }
						 
						 
				   });
            });
            