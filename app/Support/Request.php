<?php

namespace App\Support;

class Request
{

   private array $get;
   private array $post;
   private array $server;
   private array $files;

   private function __construct(
      array $get,
      array $post,
      array $server,
      array $files,
   ) {
      $this->get = $get;
      $this->post = $post;
      $this->server = $server;
      $this->files = $files;
   }

   public static function capture(): self
   {
      return new self(
         $_GET,
         $_POST,
         $_SERVER,
         $_FILES
      );
   }

   public function method(): string
   {
      return strtoupper($this->server['REQUEST_METHOD'] ?? 'GET');
   }

   public function uri(): string
   {
      return parse_url($this->server['REQUEST_URI'] ?? '/', PHP_URL_PATH);
   }

   public function input(string $key, mixed $default = null): mixed
   {
      return $this->post[$key]
         ?? $this->get[$key]
         ?? $default;
   }


   public function post(string $key, mixed $default = null): mixed
   {
      return $this->post[$key] ?? $default;
   }

   public function postInt(string $key, ?int $default = null): ?int
   {
      $val = $this->post($key, null);
      if ($val === null || $val === '') return $default;
      if (!is_numeric($val)) return $default;
      return (int)$val;
   }
}
