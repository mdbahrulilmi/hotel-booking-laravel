<?php

test('returns a successful response', function () {
    $response = $this->get('/');
    $response->assertStatus(301);
    $response->assertRedirect('/login');

});