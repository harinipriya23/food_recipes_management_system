<?php

function base_path($path)
{
    return BASE_PATH . $path;
}
function views($path, $attributes)
{
    extract($attributes);
    return require base_path("views/$path");
}
function controllers($path)
{
    return base_path("controllers/$path");
}
