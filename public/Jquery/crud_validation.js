$(document).ready(function(){

    $("#regForm").validate({ // initialize the plugin
        onfocusout: function(element) { 
                $(element).valid(); 
                //             $("input[name=Mobile]").attr("maxlength", "10");
                //   $('.Mobile').keypress(function(e) {
                //       var arr = [];
                //       var kk = e.which;
                
                //       for (i = 48; i < 58; i++)
                //           arr.push();
                
                //       if (!(arr.indexOf(kk)>=0))
                //           e.preventDefault();
                //   });    
        },
        
        rules: {
                    first_name:  { 
                        required:true,
                        maxlength:20,
                    },

                    last_name:{
                        required:true,
                        maxlength:20,
                    },
                    birthdate:{
                        required:true,
                    },
                    email:{
                        required:true,
                            email: true,
                    },
                    address:{
                        required:true,
                    },
                    gender:{
                        required:true,
                    },
                    "hobby[]":{
                        required:true,
                    },
                    mobile:{
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10,    
                    },
                    image:{
                        required: true,
                    },
                             
            },

            messages: {
                    first_name:{ 
                        required: "First name is required" ,
                        maxlength: "First name cannot be more than 20 characters",
                    },
                    last_name:{ 
                        required: "Last name is required",
                        maxlength: "Last name cannot be more than 20 characters",
                    },
                    birthdate:{
                            required: "Date of birth is required",
                            date: "Date of birth should be a valid date",
                    },
                    email:{
                            required: "Email is required",
                            email: "Email must be a valid email addressress",
                            maxlength: "Email cannot be more than 50 characters",
                        },
                    address:{
                            required: "address is required",
                    },

                    gender:{
                        required:"Gender is required",
                    },

                    "hobby[]":{
                        required:"Hobby is required",
                    },
                    mobile:{
                        required: "Mobile number is required",
                        minlength: "Mobile number must be of 10 digits",
                        digits: "Must be Digits only",
                    },
                    image:{
                        required: "image is required",
                    },


                } ,

                errorPlacement: function(error, element) {
                    // $(error).addressClass('form-control alert alert-danger');    
                    if (element.attr("name") == "gender"|| element.attr("name") == "profession" || element.attr("name") == "hobby[]") {
                        element.closest('.form-group').after(error);
                    }else{
                        error.insertAfter(element);
                    }

                    $(function() {
                        $('#image').change(function(){
                            if(Math.round(this.files[0].size/(1024*1024)) > 2) {
                                alert('Please select image size less than 2 MB');
                            }else{
                                ('success');
                            }
                        });
                     });
                }                        
    });
});

$("#editForm").validate({ // initialize the plugin
    onfocusout: function(element) { 
            $(element).valid(); 
//             $("input[name=Mobile]").attr("maxlength", "10");
//   $('.Mobile').keypress(function(e) {
//       var arr = [];
//       var kk = e.which;
   
//       for (i = 48; i < 58; i++)
//           arr.push();
   
//       if (!(arr.indexOf(kk)>=0))
//           e.preventDefault();
//   });    
        },
        
    rules: {

                    first_name:  { 
                        required:true,
                        maxlength:20,
                    },

                    last_name:{
                        required:true,
                        maxlength:20,
                    },
                    birthdate:{
                        required:true,
                    },
                    email:{
                        required:true,
                            email: true,
                    },
                    address:{
                        required:true,
                    },
                    gender:{
                        required:true,
                    },
                    "hobby[]":{
                        required:true,
                    },
                    mobile:{
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10,
                        
                    },
                    // image:{
                    //     required: true,
                    // },
                   

                    
            },

            messages: {
                    first_name:{ 
                        required: "First name is required",
                        maxlength: "First name cannot be more than 20 characters",
                    },
                    last_name:{ 
                        required: "Last name is required",
                        maxlength: "Last name cannot be more than 20 characters",
                    },
                    birthdate:{
                            required: "Date of birth is required",
                            date: "Date of birth should be a valid date",
                    },
                    email:{
                            required: "Email is required",
                            email: "Email must be a valid email addressress",
                            maxlength: "Email cannot be more than 50 characters",
                        },
                    address:{
                            required: "addressress is required",
                    },

                    gender:{
                        required:"Gender is required",
                    },

                    "hobby[]":{
                        required:"Hobby is required",
                    },
                    mobile:{
                        required: "Mobile number is required",
                        minlength: "Mobile number must be of 10 digits",
                        digits:"Must be Digits only",
                    },
                    // image:{
                    //     //required: "image is required",
                    // },

                    
                } ,

                errorPlacement: function(error, element) {
                    // $(error).addressClass('form-control alert alert-danger');    
                    if (element.attr("name") == "gender"|| element.attr("name") == "profession" || element.attr("name") == "hobby[]") {
                        element.closest('.form-group').after(error);
                    }else{
                        error.insertAfter(element);
                    }

                    $(function() {
                        $('#image').change(function(){
                            if(Math.round(this.files[0].size/(1024*1024)) > 2) {
                                alert('Please select image size less than 2 MB');
                            }else{
                                ('success');
                            }
                        });
                     });
                }

                
        
    });