<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($key, $function)
    {
        return $this->bindings[$key] = $function;
    }
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception(message: "No matching bindings found" . $key);
        }

        $resolve = $this->bindings[$key];
        return call_user_func($resolve);
    }
}
