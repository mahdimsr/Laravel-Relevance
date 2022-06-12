<?php

it('check create relevance method exists', function () {
    if (method_exists(\Msr\LaravelRelevance\Tests\UserModelTest::class, 'addRelevance')) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false, 'addRelevance method doesnt exists in UserModelTest model');
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

    $response = $authUser->addRelevance('follow', $targetUser);

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

    $response = $authUser->addRelevance('follow', $targetUser);

    $relevanceRecord = $authUser->getRelevance('follow', $targetUser);

    $this->assertEquals($response->id, $relevanceRecord->id);
});

it('check unique relevance', function () {
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

    $response = $authUser->addRelevance('follow', $targetUser);
    $response = $authUser->addRelevance('follow', $targetUser);
    $response = $authUser->addRelevance('follow', $targetUser);
    $response = $authUser->addRelevance('follow', $targetUser);

    $relevanceCount = $authUser->relevance()->whereRelationName('follow')->whereModel($targetUser)->count();

    $this->assertEquals(1, $relevanceCount);
});

it('check delete an exiting relevance', function () {
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

    $response = $authUser->addRelevance('follow', $targetUser);
    $relevanceRecord = $authUser->getRelevance('follow', $targetUser);

    $authUser->removeRelevance('follow', $targetUser);

    $this->assertModelMissing($relevanceRecord);
});

it('toggle relevance', function () {
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

    $secondTargetUser = \Msr\LaravelRelevance\Tests\UserModelTest::query()->create([
        'name' => 'secondTargetUser@mail.com',
        'email' => 'secondTargetUser@mail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ]);

    $followTargetResponse = $authUser->addRelevance('follow', $targetUser);
    $authUser->toggleRelevance('follow', $targetUser);
    $this->assertModelMissing($followTargetResponse);

    $followSecondTargetResponse = $authUser->toggleRelevance('follow', $secondTargetUser);
    $this->assertModelExists($followSecondTargetResponse);
});

it('check count of specific relevance', function () {
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

    $secondTargetUser = \Msr\LaravelRelevance\Tests\UserModelTest::query()->create([
        'name' => 'secondTargetUser@mail.com',
        'email' => 'secondTargetUser@mail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ]);

    $response = $authUser->addRelevance('follow', $targetUser);
    $response = $authUser->addRelevance('block', $targetUser);
    $response = $authUser->addRelevance('follow', $secondTargetUser);

    $followRelevanceCount = $authUser->relevanceCount('follow');
    $blockRelevanceCount = $authUser->relevanceCount('block');

    $this->assertEquals(2, $followRelevanceCount);
    $this->assertEquals(1, $blockRelevanceCount);
});

it('check relevance relation exists', function () {
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

    $response = $authUser->addRelevance('follow', $targetUser);

    $relevanceExists = $authUser->relevanceExist('follow', $targetUser);
    $relevanceNotExists = $authUser->relevanceExist('block', $targetUser);

    $this->assertTrue($relevanceExists);
    $this->assertNotTrue($relevanceNotExists);
});
