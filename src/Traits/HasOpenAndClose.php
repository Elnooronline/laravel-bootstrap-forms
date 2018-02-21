<?php

namespace Elnooronline\LaravelBootstrapForms\Traits;

use Form;

trait HasOpenAndClose
{
    /**
     * Open the form tag.
     *
     * @param $url
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function open($url, $attributes = [])
    {
        return Form::open(array_merge($attributes, ['url' => $url]));
    }

    /**
     * Open the form tag with get method.
     *
     * @param $url
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function get($url, $attributes = [])
    {
        return Form::open(array_merge($attributes, [
            'url' => $url,
            'method' => 'get',
        ]));
    }

    /**
     * Open the form tag with post method.
     *
     * @param $url
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function post($url, $attributes = [])
    {
        return Form::open(array_merge($attributes, [
            'url' => $url,
            'method' => 'post',
        ]));
    }

    /**
     * Open the form tag with put method.
     *
     * @param $url
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function put($url, $attributes = [])
    {
        return Form::open(array_merge($attributes, [
            'url' => $url,
            'method' => 'put',
        ]));
    }

    /**
     * Open the form tag with patch method.
     *
     * @param $url
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function patch($url, $attributes = [])
    {
        return Form::open(array_merge($attributes, [
            'url' => $url,
            'method' => 'patch',
        ]));
    }

    /**
     * Open the form tag with delete method.
     *
     * @param $url
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function delete($url, $attributes = [])
    {
        return Form::open(array_merge($attributes, [
            'url' => $url,
            'method' => 'delete',
        ]));
    }

    /**
     * Close the form tag.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function close()
    {
        return Form::close();
    }
}