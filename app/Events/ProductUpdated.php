<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $action;
    public ?Product $product;
    public ?int $productId;

    public function __construct(string $action, ?Product $product = null, ?int $productId = null)
    {
        $this->action    = $action;
        $this->product   = $product;
        $this->productId = $productId ?? $product?->id;
    }

    public function broadcastOn(): array
    {
        return [new Channel('inventory')];
    }

    public function broadcastAs(): string
    {
        return 'product.updated';
    }

    public function broadcastWith(): array
    {
        return [
            'action'     => $this->action,
            'product_id' => $this->productId,
            'product'    => $this->product,
        ];
    }
}
