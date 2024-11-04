<div>
    <div x-data="{
        pay() {
            $wire.getSnapToken();
        }
    }" x-on:span-token-generated.window="snap.pay($event.detail.token, {
        onSuccess: result => {
            $wire.success()
        },
        onPending: result =>{

        },
        onError: result => {

        }
    })">
        <button x-on:click="pay">Pay!</button>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $clientKey }}"></script>
</div>
