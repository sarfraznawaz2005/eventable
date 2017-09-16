# Laravel Eventable

[![laravel 5.1](https://img.shields.io/badge/Laravel-5.1-brightgreen.svg?style=flat-square)](http://laravel.com)
[![laravel 5.2](https://img.shields.io/badge/Laravel-5.2-brightgreen.svg?style=flat-square)](http://laravel.com)
[![laravel 5.3](https://img.shields.io/badge/Laravel-5.3-brightgreen.svg?style=flat-square)](http://laravel.com)
[![laravel 5.4](https://img.shields.io/badge/Laravel-5.4-brightgreen.svg?style=flat-square)](http://laravel.com)
[![downloads](https://poser.pugx.org/sarfraznawaz2005/eventable/downloads)](https://packagist.org/packages/sarfraznawaz2005/eventable)

## Introduction ##

Simple Laravel 5 package to easily add event listening capabilities to any model on Create/Update/Delete operations.

## Requirements ##

 - PHP >= 5.6
 - Laravel 5

## Installation ##

Install via composer

```
composer require sarfraznawaz2005/eventable
```

That's it!

## Usage ##

Suppose you have a model called `Task` and you want to be able to do something when it's created/updated or deleted. To do that, just use the `Eventable` trait like so:

```
...
use Sarfraznawaz2005\Eventable\Eventable;

class Task extends Model
{
    use Eventable;
    
    ...
}
```

Now somewhere in your app, you can listen to events and do whatever you want:

```
Event::listen('task.created', function ($task) {
    // do something when task is created. In this case, just log it.
    Log::info('Task with id ' . $task->id . ' was created.');
});

Event::listen('task.updated', function ($task) {
    // do something when task is updated. In this case, just log it.
    Log::info('Task with id ' . $task->id . ' was updated.');
});

Event::listen('task.deleted', function ($task) {
    // do something when task is deleted. In this case, just log it.
    Log::info('Task with id ' . $task->id . ' was deleted.');
});
```

**Note:** Make sure your put event listening logic BEFORE saving/updating/deletng model logic.

## License ##

This code is published under the [MIT License](http://opensource.org/licenses/MIT).
This means you can do almost anything with it, as long as the copyright notice and the accompanying license file is left intact.
