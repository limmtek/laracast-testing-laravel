<?php

function createPost(array $attributes = [])
{
    return factory(\App\Post::class)->create($attributes);
}