<?php

namespace Deiucanta\Smart;

trait FieldTypes
{
    public function bigIncrements()
    {
        return $this->type('bigIncrements')->cast('integer');
    }

    public function bigInteger()
    {
        return $this->type('bigInteger')->cast('integer')->rule('numeric');
    }

    public function binary()
    {
        return $this->type('binary');
    }

    public function boolean()
    {
        return $this->type('boolean')->cast('boolean')->rule('boolean');
    }

    public function char($size = null)
    {
        return $this->type('char', $size ? [$size] : []);
    }

    public function date()
    {
        return $this->type('date')->cast('date');
    }

    public function dateTime()
    {
        return $this->type('dateTime')->cast('datetime');
    }

    public function dateTimeTz()
    {
        return $this->type('dateTimeTz')->cast('datetime');
    }

    public function decimal($total, $decimal)
    {
        return $this->type('decimal', [$total, $decimal])->cast('double')->rule('numeric');
    }

    public function double($total, $decimal)
    {
        return $this->type('double', [$total, $decimal])->cast('double')->rule('numeric');
    }

    public function enum($values)
    {
        return $this->type('enum', $values)->rule('in:' . implode(',', $values));
    }

    public function float($total, $decimal)
    {
        return $this->type('float', [$total, $decimal])->cast('float')->rule('numeric');
    }

    public function geometry()
    {
        return $this->type('geometry');
    }

    public function geometryCollection()
    {
        return $this->type('geometryCollection');
    }

    public function increments()
    {
        return $this->type('increments')->cast('integer');
    }

    public function integer()
    {
        return $this->type('integer')->cast('integer')->rule('numeric');
    }

    public function ipAddress()
    {
        return $this->type('ipAddress')->rule('ip');
    }

    public function json()
    {
        return $this->type('json')->cast('array')->rule('array');
    }

    public function jsonb()
    {
        return $this->type('jsonb')->cast('array')->rule('array');
    }

    public function lineString()
    {
        return $this->type('lineString');
    }

    public function longText()
    {
        return $this->type('longText');
    }

    public function macAddress()
    {
        return $this->type('macAddress');
    }

    public function mediumIncrements()
    {
        return $this->type('mediumIncrements')->cast('integer');
    }

    public function mediumInteger()
    {
        return $this->type('mediumInteger')->cast('integer')->rule('numeric');
    }

    public function mediumText()
    {
        return $this->type('mediumText');
    }

    public function morphs()
    {
        throw new Exception('`morphs` is not supported');
    }

    public function multiLineString()
    {
        return $this->type('multiLineString');
    }

    public function multiPoint()
    {
        return $this->type('multiPoint');
    }

    public function multiPolygon()
    {
        return $this->type('multiPolygon');
    }

    public function point()
    {
        return $this->type('point');
    }

    public function polygon()
    {
        return $this->type('polygon');
    }

    public function smallIncrements()
    {
        return $this->type('smallIncrements')->cast('integer');
    }

    public function smallInteger()
    {
        return $this->type('smallInteger')->cast('integer')->rule('numeric');
    }

    public function softDeletes()
    {
        return $this->type('softDeletes')->cast('datetime');
    }

    public function softDeletesTz()
    {
        return $this->type('softDeletesTz')->cast('datetime');
    }

    public function string($size = null)
    {
        return $this->type('string', $size ? [$size] : []);
    }

    public function text()
    {
        return $this->type('text');
    }

    public function time()
    {
        return $this->type('time');
    }

    public function timeTz()
    {
        return $this->type('timeTz');
    }

    public function timestamp()
    {
        return $this->type('timestamp')->cast('datetime');
    }

    public function timestampTz()
    {
        return $this->type('timestampTz')->cast('datetime');
    }

    public function timestamps()
    {
        throw new Exception('`timestamps` is not supported');
    }

    public function timestampsTz()
    {
        throw new Exception('`timestampsTz` is not supported');
    }

    public function tinyIncrements()
    {
        return $this->type('tinyIncrements')->cast('integer');
    }

    public function tinyInteger()
    {
        return $this->type('tinyInteger')->cast('integer')->rule('numeric');
    }

    public function unsignedBigInteger()
    {
        return $this->type('unsignedBigInteger')->cast('integer')->rule('numeric');
    }

    public function unsignedDecimal($total, $decimal)
    {
        return $this->type('unsignedDecimal', [$total, $decimal])->cast('double')->rule('numeric');
    }

    public function unsignedInteger()
    {
        return $this->type('unsignedInteger')->cast('integer')->rule('numeric');
    }

    public function unsignedMediumInteger()
    {
        return $this->type('unsignedMediumInteger')->cast('integer')->rule('numeric');
    }

    public function unsignedSmallInteger()
    {
        return $this->type('unsignedSmallInteger')->cast('integer')->rule('numeric');
    }

    public function unsignedTinyInteger()
    {
        return $this->type('unsignedTinyInteger')->cast('integer')->rule('numeric');
    }

    public function uuid()
    {
        return $this->type('uuid');
    }

    public function year()
    {
        return $this->type('year')->cast('integer')->rule('numeric');
    }

    // extra

    public function email($size = null)
    {
        return $this->type('string', $size ? [$size] : [])->rule('email');
    }

    public function url($size = null)
    {
        return $this->type('string', $size ? [$size] : [])->rule('url');
    }

    public function slug($size = null)
    {
        return $this->type('string', $size ? [$size] : [])->rule('regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/');
    }
}
