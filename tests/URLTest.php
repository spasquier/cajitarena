<?php
namespace CajitaArena\Tests;

use CajitaArena\URL;

class URLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prueba de referencia #1: que se devuelva el slug de una cadena normal.
     */
    public function testSluggifyRetursSluggifiedString()
    {
        $cadena_original = 'Esta cadena es convertida en un slug';
        $cadena_esperada = 'esta-cadena-es-convertida-en-un-slug';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    /**
     * Prueba de referencia #2: que se devuelva el slug de una cadena
     * que contiene dígitos.
     */
    public function testSluggifyReturnsExpectedForStringsContainingNumbers()
    {
        $cadena_original = 'Esta1 cadena2 es3 44 en un slug10';
        $cadena_esperada = 'esta1-cadena2-es3-44-en-un-slug10';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    /**
     * Prueba de referencia #3: que se se devuelva el slug de una cadena
     * que contiene caracteres especiales.
     */
    public function testSluggifyReturnsExpectedForStringsContainingSpecialCharacters()
    {
        $cadena_original = 'Esta! @cadena#$ %$es ()convertida en un "slug';
        $cadena_esperada = 'esta-cadena-es-convertida-en-un-slug';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    /**
     * Prueba de referencia #4: que se devuelva el slug de una cadena
     * que contiene carácteres no ingleses (acentos por ejemplo).
     */
    public function testSluggifyReturnsExpectedForStringsContainingNonEnglishCharacters()
    {
        $cadena_original = 'Esta cadena con Ç añadida será convertida en un slug';
        $cadena_esperada = 'esta-cadena-con-c-anadida-sera-convertida-en-un-slug';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    /**
     * Prueba de referencia #5: que se devuelva el slug de una cadena vacia.
     */
    public function testSluggifyReturnsExpectedForEmptyStrings()
    {
        $cadena_original = '';
        $cadena_esperada = '';

        $url = new URL();
        $resultado = $url->sluggify($cadena_original);

        $this->assertEquals($cadena_esperada, $resultado);
    }

    /**
     * Prueba que reemplaza las otras pruebas repetitivas usando
     * un dataProvider de PHPUnit
     *
     * @param string $cadena_original Cadena que será procesada por el método
     * @param string $cadena_esperada Cadena que se espera generé el método
     *
     * @dataProvider providerTestSluggifyReturnsSluggifiedString
     */
    public function testSluggifyReturnsSluggifiedString($cadena_original, $cadena_esperada)
    {
        $url = new URL();
        $resultado = $url->sluggify($cadena_original);
        $this->assertEquals($cadena_esperada, $resultado);
    }

    /**
     * Método que devuelve el dataProvider para testSluggifyReturnsSluggifiedString
     * de forma que evitemos repetir tantas veces el mismo código al probar
     * escenarios con estructuras similares.
     *
     * @return array
     */
    public function providerTestSluggifyReturnsSluggifiedString()
    {
        return array(
            array('Esta cadena es convertida en un slug', 'esta-cadena-es-convertida-en-un-slug'),
            // Este es un nuevo escenario, verificar si una cadena completamente
            // en mayúscula es convertida correctamente, se puede notar que es
            //más fácil agregar más escenarios con este dataProvider que agregar
            //otro método repetitivo para comprobar un nuevo escenario.
            array('ESTA CADENA ES CONVERTIDA EN UN SLUG', 'esta-cadena-es-convertida-en-un-slug'),
            array('Esta1 cadena2 es3 44 en un slug10', 'esta1-cadena2-es3-44-en-un-slug10'),
            array('Esta! @cadena#$ %$es ()convertida en un "slug', 'esta-cadena-es-convertida-en-un-slug'),
            array('Esta cadena con Ç añadida será convertida en un slug', 'esta-cadena-con-c-anadida-sera-convertida-en-un-slug'),
            array('', ''),
        );
    }
}