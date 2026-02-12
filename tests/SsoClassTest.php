<?php

use Imv\Sso\Sso;

test('constructor', function () {
    $app = app(Sso::class);

    expect($app)->toBeInstanceOf(Sso::class);
});
