<html>
   <head>
      <title>Ajax Example</title>
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      <script>
         function getMessage(){
          var tok = $('#_token').val();
            $.ajax({
               url:"ajax",
               data:tok,
               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
   </head>
   
   <body>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
        <input type="button" onclick="getMessage()" name="test" value="Click me">
        <input type="hidden" name="_token" id=_token value="{{{ csrf_token() }}}">
   </body>

</html>