<?php

namespace Waavi\Sanitizer\Laravel;

trait SanitizesInput
{
    /**
     *  Sanitize input before validating.
     *
     *  @return void
     */
    public function validate()
    {
        $this->sanitize();
        parent::validate();
    }

    /**
     *  Sanitize this request's input
     *
     *  @return void
     */
    public function sanitize()
    {
        $this->sanitizer = \Sanitizer::make($this->input(), $this->filters());
        $this->replace($this->sanitizer->sanitize());
    }

    /**
     *  Filters to be applied to the input.
     *
     *  @return void
     */
    public function filters()
    {
        return [];
    }
}