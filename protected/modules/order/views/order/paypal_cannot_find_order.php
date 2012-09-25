<html>
       <script>
       alert("Technial problem. Contact support for checking your order and recieving your tips!");
       // add relevant message above or remove the line if not required
       window.onload = function(){
           if(window.opener){
                window.close();
            }
           else{
                if(top.dg.isOpen() == true){
                    top.dg.closeFlow();
                    return true;
                 }
             }
       };

</script>
</html>
