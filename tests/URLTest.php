<?php
namespace CajitaArena\Tests;

use CajitaArena\URL;

class URLTest extends \PHPUnit_Framework_TestCase
{
    public function testSluggifyRetursSluggifiedString()
    {
        $cadena_original = 'Esta cadena es convertida en un slug';
        $cadena_esperada = 'esta-cadena-es-convertida-en-un-slug';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    public function testSluggifyReturnsExpectedForStringsContainingNumbers()
    {
        $cadena_original = 'Esta1 cadena2 es3 44 en un slug10';
        $cadena_esperada = 'esta1-cadena2-es3-44-en-un-slug10';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    public function testSluggifyReturnsExpectedForStringsContainingSpecialCharacters()
    {
        $cadena_original = 'Esta! @cadena#$ %$es ()convertida en un "slug';
        $cadena_esperada = 'esta-cadena-es-convertida-en-un-slug';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    public function testSluggifyReturnsExpectedForStringsContainingNonEnglishCharacters()
    {
        $cadena_original = 'Esta cadena con Ç añadida será convertida en un slug';
        $cadena_esperada = 'esta-cadena-con-c-anadida-sera-convertida-en-un-slug';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    public function testSluggifyReturnsExpectedForEmptyStrings()
    {
        $cadena_original = '';
        $cadena_esperada = '';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }
}