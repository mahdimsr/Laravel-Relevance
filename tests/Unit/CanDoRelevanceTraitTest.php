<?php

it('check create relevance method exists', function () {
    if (method_exists(\Msr\LaravelRelevance\Tests\UserModelTest::class, 'createRelevance')) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false, 'createRelevance method doesnt exists in UserModelTest model');
    }
});

it('check user can follow other user', function () {
    $authUser = \Msr\LaravelRelevance\Tests\UserModelTest::query()->create([
       'name' => 'authUser@mail.com',
       'email' => 'authUser@mail.com',
       'password' => \Illuminate\Support\Facades\Hash::make('123456'),
   ]);

    $targetUser = \Msr\LaravelRelevance\Tests\UserModelTest::query()->create([
       'name' => 'targetUser@mail.com',
       'email' => 'targetUser@mail.com',
       'password' => \Illuminate\Support\Facades\Hash::make('123456'),
   ]);

    $response = $authUser->createRelevance('follow', $targetUser);

    $this->assertModelExists($response);
});

it('get relevance record', function () {
    $authUser = \Msr\LaravelRelevance\Tests\UserModelTest::query()->create([
        'name' => 'authUser@mail.com',
        'email' => 'authUser@mail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ]);

    $targetUser = \Msr\LaravelRelevance\Tests\UserModelTest::query()->create([
        'name' => 'targetUser@mail.com',
        'email' => 'targetUser@mail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ]);

    $response = $authUser->createRelevance('follow', $targetUser);

    $relevanceRecord = $authUser->getRelevance('follow', $targetUser);

    $this->assertEquals($response->id, $relevanceRecord->id);
});
