<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'Inventory Management') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- <script src="https://use.fontawesome.com/7e850a5a48.js"></script> -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <!--bootstrap-->
       
     
        <!-- Upvote Down--->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset( 'dist/upvotejs/upvotejs.css' )}}">
        <script src="{{asset('dist/upvotejs/upvotejs.jquery.js')}}"></script>
        <script src="{{asset('dist/upvotejs/upvotejs.vanilla.js')}}"></script>

        <!--stackoverflow-->
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks/dist/css/stacks.min.css">
   
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!--Custom Scripts and Css-->

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('/sbadmin/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    </head>


    <body class="sb-nav-fixed">  
        @include('layouts.sidenav') 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
         
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-2.2.4.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="{{ asset('sbadmin/js/scripts.js') }}"></script>
        <!--Datatable cdn and public source--->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('/sbadmin/js/datatables-simple-demo.js') }}"></script>
        <!---Jquery va;lidation plugin-->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
        <!--- CK editor---->
        <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

        <!--Custom jquery for add-edit--->
        <script type="text/javascript" src="{{ asset('Jquery/crud_validation.js') }}?t={{time()}}"></script>
        <script type="text/javascript" src="{{ asset('Jquery/select2.js') }}?t={{time()}}"></script>
        
        <!--select tag---->
        <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> -->

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script> -->
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>   -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        
        
        <!--Upvote Down Script-->
        
        <script type="text/javascript">
            function initupvotejsobject(templateid, templatedivclass, idcount, target, cssClass, params)
             {              
             const proto = document.getElementById(templateid).getElementsByClassName(templatedivclass)[0];
        
        const gen = function() {
            //var idcount = 0;
            return (target, cssClass, params) => {                
                const obj = proto.cloneNode(true);
                obj.className += ' ' + cssClass;
                obj.id = params.vote_for + idcount;
                //console.log(obj);
                //console.log(target);
                //console.log(document.getElementById(target.substr(1)));
                document.getElementById(target.substr(1)).appendChild(obj);                                
                //console.log(params); return false;
                return Upvote.create(obj.id, params);
            };
        }();

        return gen(target, cssClass, params);        
    }
</script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
    </body>
</html>