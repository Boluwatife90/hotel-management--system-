<?php require_once './include/header.php' ?>


<?php 

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:http://localhost/hotel-booking/index.php');
    exit;
}


if(isset($_SESSION["myprice"])){
       $myprice = $_SESSION["myprice"];

}else{
    echo 'not set';
};

?>
    
    

    <div class="container"  >  
        <h3> Complete your payment </h3>
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AYUqEnHDCbBcDg0PEc2oEpxcBh1xcoD-UlyX9QtOuugpzYP5_fUnKpQ4OW5rgYjTx4gCoy1ndm9UpY1V"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"  ></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: <?php echo $myprice?> // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='http://localhost/hotel-booking';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


   <?php require_once './include/footer.php' ?>