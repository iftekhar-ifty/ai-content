<div>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" id="payment-form">
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" wire:model="amount" id="amount" class="form-control">
                @error('amount') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" wire:model="name" id="name" class="form-control">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" wire:model="email" id="email" class="form-control">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="card-element">Credit or debit card</label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>

    @push('js')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            document.addEventListener('livewire:load', () => {
                console.log('dd')
                {{--const stripe = Stripe('{{ config('services.stripe.key') }}');--}}
                const stripe = Stripe('pk_test_51INz3BAAbBvvJ1CbMgJFM1Jr3o9L98hWTLi92GMdiMWmVebXaYXtJHkMIHKcwqGPKBlb42R9dCIRsF8jB9oKdq5a00KNiFfyCq');
                const elements = stripe.elements();
                const cardElement = elements.create('card');
                cardElement.mount('#card-element');

                const form = document.getElementById('payment-form');

                form.addEventListener('submit', async (event) => {
                    alert('d');
                    event.preventDefault();

                    const {token, error} = await stripe.createToken(cardElement);

                    if (error) {
                        // Inform the user if there was an error.
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = error.message;
                    } else {
                        // Send the token to your server.
                    @this.set('stripeToken', token.id);
                    @this.call('submit');
                    }
                });
            });
        </script>
    @endpush

</div>
