<html>
<?php
                echo "DoExpressCheckoutDetails API call failed. ";
        		echo "Detailed Error Message: " . $this->ErrorLongMsg;
        		echo "Short Error Message: " . $this->ErrorShortMsg;
        		echo "Error Code: " . $this->ErrorCode;
        		echo "Error Severity Code: " . $this->ErrorSeverityCode;
?>
       <script>
       alert("Payment failed");
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
