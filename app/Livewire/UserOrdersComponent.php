<?php

namespace App\Livewire;

use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserOrdersComponent extends Component
{
    public $selectedOrder;

    public function render()
    {
        $user = Auth::guard('customer')->user();
        $customer_id = $user->customer_id;

        // Retrieve orders for the authenticated customer
        $orders = Order::with('customer', 'order_item', 'shipping', 'transaction')
        ->where('customer_id', $customer_id)->orderBy('created_at', 'desc')
        ->get();

        $orderProducts = collect();
        // Iterate through each order and collect the associated products with images
        foreach ($orders as $order) {
            $orderItems = $order->order_item;

            foreach ($orderItems as $orderItem) {
                $product = $orderItem->product; // Get the product details for the order item
                $product->load('product_images');

                // Add price and quantity properties to the product
                $product->price = $orderItem->price;
                $product->quantity = $orderItem->quantity;

                // Optionally, you can also retrieve color and size information
                $color = Color::find($orderItem->color_id);
                $size = Size::find($orderItem->size_id);
                // Add color and size information to the product if needed
                $product->color = $color;
                $product->size = $size;

                $orderProducts->push($product);
            }
        }
        return view('livewire.user-orders-component',compact('orders'));
    }


    public function trackOrder($orderId)
    {
        $this->dispatch('orderTracked', $orderId)->to('my-order-component');
    }

}
