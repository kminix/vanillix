<?php
declare(strict_types=1);

namespace App\Routing;

final class Route {

    public function __construct(
        public readonly string $method,
        public readonly string $pathPattern,
        public readonly array $handler,
    ){ }
}