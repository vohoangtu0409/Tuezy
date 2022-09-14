<?php
$request = \Illuminate\Http\Request::capture();
container()->instance('request', $request);
container()->bind('request', \Illuminate\Http\Client\Request::class);