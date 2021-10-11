 <script type="text/javascript">
  
   async function confirm(payload) {
    const account = await network.get("sterling/TransferAPIs/api/Spay/InterbankNameEnquiry?Referenceid=01&RequestType=01&Translocation=01&ToAccount=0037514051&destinationbankcode=000001",
        {
            headers: {
                "Sandbox-Key": "3c630dba871739d98b9e8157872b380d",
                "Ocp-Apim-Subscription-Key": "t",
                "Ocp-Apim-Trace": "true",
                "Appid": "69",
                "Content-Type": "application/json",
                "ipval": "0"
            }
        })
    const value = getVoucherValue(payload.voucher)
    console.log({payload})
    if (value) {
        return `CON [Sandbox, no real money]\nPlease confirm that you're about to send NGN${value} to Prince Account (${payload.bank.name}) \n1. Confirm \n2. Cancel`
    } else {
        return `END You've provided an invalid voucher code`
    }
}
 </script>