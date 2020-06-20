@component('mail::message')
# Thank you for exchanging you money.
Here are your order details:

@component('mail::table')
| Title | Amount        
| ------------- |:-------------
| Currency bought | {{ $order->currency->name }}    
| Purchased | {{ number_format($order->purchased_amount, 2, '.', ',') }}
| Exchange rate | {{ number_format($order->exchange_rate, 2, '.', ',') }}
| Surcharge | {{ $order->surcharge_percent }} %
| Surcharge amount | {{ number_format($order->surcharge_amount, 2, '.', ',') }} $
| Discount | {{ $order->discount_percent }} % 
| Discount amount | {{ number_format($order->discount_amount, 2, '.', ',') }} $
@endcomponent

# Total paid: {{ number_format($order->usd_amount, 2, '.', ',') }} $

Thanks!<br>
Your {{ config('app.name') }}!
@endcomponent
