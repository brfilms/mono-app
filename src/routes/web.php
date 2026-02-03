<?php

use Illuminate\Support\Facades\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/metrics', function () {
   $registry = new CollectorRegistry(new InMemory());
   $renderer = new RenderTextFormat();

   return response(
       $renderer->render($registry->getMetricFamilySamples()),
       200,
       ['Content-Type' => RenderTextFormat::MIME_TYPE]
   );
});
