<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <?php if ($_SESSION['lang'] === 'ENG')
        echo "<div class='container mx-auto bg-gray-300 rounded-lg mt-6 p-8 shadow-md max-w-md w-full'>
        <h1 class='text-center text-xl mb-2'>Payment Verification</h1>
        <form id='paymentForm' action='index.php?action=payment' method='post'>
            <label for='cardHolderName' class='block mb-2'>Cardholder Name</label>
            <input type='text' id='cardHolderName' placeholder='Enter cardholder's name' required
                class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
                <label for='cardNumber' class='block mb-2'>Card Number</label>
                <input type='text' id='cardNumber' placeholder='Enter 16 digit card number' maxlength='16' required class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
                
                <label for='expirationDate' class='block mb-2'>Expiration Date (MM/YY)</label>
                <input type='text' id='expirationDate' placeholder='MM/YY' required maxlength='5' class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
                
                <label for='cvv' class='block mb-2'>CVV</label>
                <input type='password' id='cvv' placeholder='Enter 3 digit CVV' maxlength='3' required class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
                
                <input type='submit' value='Verify Payment' class='w-full bg-green-500 text-white rounded-lg py-2 cursor-pointer transition duration-300 hover:bg-red-500'>
        </form>";
    else
        echo "<div class='container mx-auto bg-gray-300 rounded-lg mt-6 p-8 shadow-md max-w-md w-full'>
        <h1 class='text-center text-xl mb-2'>Verification de paiement</h1>
        <form id='paymentForm' action='index.php?action=payment' method='post'>
    <label for='cardHolderName' class='block mb-2'>Nom du titulaire de la carte</label>
        <input type='text' id='cardHolderName' placeholder='Entrez le nom du titulaire de la carte' required class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
        
        <label for='cardNumber' class='block mb-2'>Numéro de carte</label>
        <input type='text' id='cardNumber' placeholder='Entrez le numéro de carte à 16 chiffres' maxlength='16' required class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
        
        <label for='expirationDate' class='block mb-2'>Date d'expiration (MM/AA)</label>
        <input type='text' id='expirationDate' placeholder='Entrez la date d'expiration au format MM/AA' required maxlength='5' class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
        
        <label for='cvv' class='block mb-2'>CVV</label>
        <input type='password' id='cvv' placeholder='Entrez le CVV à 3 chiffres' maxlength='3' required class='w-full px-4 py-2 mb-4 rounded-lg border-none'>
        <input type='submit' value='AJouter les informations' class='w-full bg-green-500 text-white rounded-lg py-2 cursor-pointer transition duration-300 hover:bg-red-500'>
        </form>";
    ?>

    </div>
</section>